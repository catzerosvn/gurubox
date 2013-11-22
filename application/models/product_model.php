<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of signin_model
 *
 * @author Administrator
 */
class product_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
    }

    public function getProductType() {
        $dataArray = $this->db->select("*")->get("products_type")->result_array();
        return $dataArray;
    }

    public function actionAddNewProduct($post) {
        if ($post['txt_productType'] == 1) {// เพิ่ม Product ห้องพัก===============================
            $this->db
                    ->set("product_id", "")
                    ->set("ref_product_type_id", $post['txt_productType'])
                    ->set("ref_site_code", $post['txt_branch'])
                    ->set("product_name", $post['txt_productName'])
                    ->set("product_detail", $post['txt_productDetail'])
                    ->set("is_enable", "Y")
                    ->insert("products_stocks");

            $insert_id = $this->db->insert_id();

            if (strlen($insert_id) == 1) {
                $productCode = "PS000" . $insert_id;
            } else if (strlen($insert_id) == 2) {
                $productCode = "PS00" . $insert_id;
            } else if (strlen($insert_id) == 3) {
                $productCode = "PS0" . $insert_id;
            } else if (strlen($insert_id) >= 4) {
                $productCode = "PS" . $insert_id;
            }

            for ($i = 1; $i <= 10; $i++) {
                if ($post['txt_timename_' . $i] != "") {
                    $this->db->set("row_id", "")
                            ->set("ref_product_code", $productCode)
                            ->set("index", $i)
                            ->set("time_name", $post['txt_timename_' . $i])
                            ->set("product_cost", $post['txt_time_cost_' . $i])
                            ->set("product_sale", $post['txt_time_sale_' . $i])
                            ->insert("product_price_rate");
                }
            }

            $this->db->set("product_code", $productCode)->where("product_id", $insert_id)->update("products_stocks");
        } else {// เพิ่ม Product ที่มี Stock===============================================
            $numday= null;
            if($post['txt_productType'] == 3){
                $numday = $post['txt_numday'];
            }
            
            $this->db
                    ->set("product_id", "")
                    ->set("ref_product_type_id", $post['txt_productType'])
                    ->set("ref_site_code", $post['txt_branch'])
                    ->set("product_name", $post['txt_productName'])
                    ->set("product_detail", $post['txt_productDetail'])
                    ->set("member_numday",$numday)
                    ->set("product_cost", $post['txt_cost'])
                    ->set("product_sale", $post['txt_sale'])
                    ->set("product_quantity", 0)
                    ->set("is_enable", "Y")
                    ->insert("products_stocks");

            // ======= PRODUCT CODE ==========================
            $dataArray = $this->db
                            ->select("product_id")
                            ->where("product_name", $post['txt_productName'])
                            ->where("ref_product_type_id", $post['txt_productType'])
                            ->where("ref_site_code", $post['txt_branch'])
                            ->get("products_stocks")->result_array();

            if (strlen($dataArray[0]['product_id']) == 1) {
                $productCode = "PS000" . $dataArray[0]['product_id'];
            } else if (strlen($dataArray[0]['product_id']) == 2) {
                $productCode = "PS00" . $dataArray[0]['product_id'];
            } else if (strlen($dataArray[0]['product_id']) == 3) {
                $productCode = "PS0" . $dataArray[0]['product_id'];
            } else if (strlen($dataArray[0]['product_id']) >= 4) {
                $productCode = "PS" . $dataArray[0]['product_id'];
            }

            $this->db->set("product_code", $productCode)->where("product_id", $dataArray[0]['product_id'])->update("products_stocks");
        }
    }

    public function getProduct($post = "") {
        $this->db->select("*")
                ->join("products_type", "products_type.product_type_id = products_stocks.ref_product_type_id", "left")
                ->where("is_enable", "Y");

        if (isset($post['txt_key'])) {
            if ($post['txt_key'] != "") {
                if ($post['txt_searchType'] == "NAME") {
                    $this->db->like("product_name", $post['txt_key']);
                } else if ($post['txt_searchType'] == "PRODUCTCODE") {
                    $this->db->like("product_code", $post['txt_key']);
                }
            }
        }

        $dataArary = $this->db->get("products_stocks")->result_array();

        return $dataArary;
    }

    public function getProductData($post) {
        $dataArray['data'] = $this->db->select("*")
                        ->join("products_type", "products_type.product_type_id = products_stocks.ref_product_type_id", "left")
                        ->where("product_id", $post['product_id'])
                        ->get("products_stocks")->result_array();

        if ($dataArray['data'][0]['ref_product_type_id'] == 1) {
            $dataArray['priceRate'] = $this->db->select("*")->where("ref_product_code", $dataArray['data'][0]['product_code'])->order_by("index")->get("product_price_rate")->result_array();
        }

        $dataArray['type'] = $dataArray['data'][0]['ref_product_type_id'];

        return $dataArray;
    }

    public function actionEditProduct($post) {
        if ($post['txt_type'] == 1) {
            $this->db->set("ref_product_type_id", $post['txt_productType'])
                    ->set("ref_site_code", $post['txt_branch'])
                    ->set("product_name", $post['txt_productName'])
                    ->set("product_detail", $post['txt_productDetail'])
                    ->where("product_id", $post['txt_productID'])
                    ->update("products_stocks");
            
            $idArray = $this->db->select("product_code")->where("product_id", $post['txt_productID'])->get("products_stocks")->result_array();
                    
            $this->db->where("ref_product_code",$idArray[0]['product_code'])->delete("product_price_rate");

            for ($i = 1; $i <= 10; $i++) {
                if ($post['txt_timename_' . $i] != "") {
                    $this->db->set("row_id", "")
                            ->set("ref_product_code", $idArray[0]['product_code'])
                            ->set("index", $i)
                            ->set("time_name", $post['txt_timename_' . $i])
                            ->set("product_cost", $post['txt_time_cost_' . $i])
                            ->set("product_sale", $post['txt_time_sale_' . $i])
                            ->insert("product_price_rate");
                }
            }
        } else {
            $numday= null;
            if($post['txt_type'] == 3){
                $numday = $post['txt_numday'];
            }
            
            $this->db->set("ref_product_type_id", $post['txt_productType'])
                    ->set("ref_site_code", $post['txt_branch'])
                    ->set("product_name", $post['txt_productName'])
                    ->set("product_detail", $post['txt_productDetail'])
                    ->set("member_numday",$numday)
                    ->set("product_sale", $post['txt_sale'])
                    ->set("product_cost", $post['txt_cost'])
                    ->where("product_id", $post['txt_productID'])
                    ->update("products_stocks");
        }
    }

    public function actionDeleteProduct($post) {
        $empName = $this->session->userdata("SESSION_FULLNAME");
        
        $this->db->set("is_enable", "N")
                ->set("delete_by", $empName)
                ->set("delete_date", date("Y-m-d"))
                ->where("product_id", $post['product_id'])
                ->update("products_stocks");
    }

    public function getProductStock() {
        $this->db->select("*")
                ->join("products_type", "products_type.product_type_id = products_stocks.ref_product_type_id", "left")
                ->where("is_enable", "Y")
                ->where("ref_product_type_id", 2);

        $dataArary = $this->db->get("products_stocks")->result_array();

        return $dataArary;
    }

    public function actionImportProduct($post) {
        $empName = $this->session->userdata("SESSION_FULLNAME");
        $empID = $this->session->userdata("SESSION_USER_ID");
        
        $this->db->set("product_import_id", "")
                ->set("import_date", date("Y-m-d h:i:s"))
                ->set("create_by_id", $empID)
                ->set("is_cancel", "N")
                ->insert("product_import");

        $insert_id = $this->db->insert_id();

        foreach ($post as $key => $val) {
            if ($val > 0) {
                $dataArray = $this->db->select("product_quantity")
                                ->where("product_code", $key)
                                ->get("products_stocks")->result_array();

                $newQTY = $dataArray[0]['product_quantity'] + $val;

                $this->db->set("product_quantity", $newQTY)->where("product_code", $key)->update("products_stocks");

                $this->db->set("row_id", "")
                        ->set("ref_import_id", $insert_id)
                        ->set("ref_product_code", $key)
                        ->set("quantity", $val)
                        ->insert("product_import_items");
            }
        }

        $dataReturn = $this->getProductStock();

        return $dataReturn;
    }

    public function getImportBill($post = "") {
        $this->db->select("*")
                ->join("employees", "employees.employee_code = product_import.create_by_id", "left")
                ->where("is_cancel", "N");

        if (isset($post['txt_date'])) {
            
        } else {
            $this->db->where("import_date >=", date("Y-m-d"));
            $this->db->where("import_date <=", date("Y-m-d 23.59.59"));
        }

        $this->db->order_by("product_import_id", "DESC");
        $dataReturn = $this->db->get("product_import")->result_array();

        return $dataReturn;
    }

    public function getDataImport($post) {
        $dataReturn = $this->db->select("*")
                        ->join("products_stocks", "products_stocks.product_code = product_import_items.ref_product_code", "left")
                        ->where("ref_import_id", $post['import_id'])
                        ->get("product_import_items")->result_array();

        return $dataReturn;
    }

    public function actionCancleImportProduct($post) {
        $empName = $this->session->userdata("SESSION_FULLNAME");
        $empID = $this->session->userdata("SESSION_USER_ID");
        
        $this->db->set("is_cancel", "Y")
                ->set("cancel_by_id", $empID)
                ->where("product_import_id", $post['import_id'])
                ->update("product_import");

        $dataArray = $this->db->select("*")->where("ref_import_id", $post['import_id'])->get("product_import_items")->result_array();

        if (count($dataArray) > 0) {
            foreach ($dataArray as $val) {
                $dataArray2 = $this->db->select("product_quantity")->where("product_code", $val['ref_product_code'])->get("products_stocks")->result_array();

                $newQTY = $dataArray2[0]['product_quantity'] - $val['quantity'];

                $this->db->set("product_quantity", $newQTY)->where("product_code", $val['ref_product_code'])->update("products_stocks");
            }
        }
    }

}

?>
