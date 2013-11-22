<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home
 *
 * @author ArMz-SWEngineer
 */
class selling extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("selling_model");
        $this->load->model("menu_model");
        $this->theme->usingJavaScript("applications/selling.js");
        $this->load->helper('url');
        $this->theme->authenticateSession(true);
    }

    public function index() {
        $this->theme->setPageTitle("Selling System.");
        $this->theme->usingLayoutName("themePanel");
        $elements = "";
        $this->theme->setContent($this->load->view("selling/frmSelling", $elements, TRUE));
        $this->theme->getDisplay();
    }

    public function frmSellingProduct() {
        $this->session->unset_userdata("listProduct");
        $this->session->unset_userdata("MemberSelling");
        $this->theme->setPageTitle("Product Management - Selling Product.");
        $this->theme->usingLayoutName("themePanel");
        $elements['data'] = $this->selling_model->getProductAll();
        $this->theme->setContent($this->load->view("selling/frmProductselling", $elements, TRUE));
        $this->theme->getDisplay();
    }

    public function frmSearchProduct() {
        $elements['data'] = $this->selling_model->getProductAll($this->input->post());
        echo $this->load->view("selling/frmProductSearch", $elements, TRUE);
    }

    public function frmProductSellingQty() {
        $elements['data'] = $this->selling_model->getProductData($this->input->post());
        echo $this->load->view("selling/frmProductSellingQty", $elements, TRUE);
    }

    public function frmActiocAddProduct() {
        if ($this->session->userdata("listProduct")) {
            $data = $this->session->userdata("listProduct");
            $data[] = array("product_code" => $this->input->post("txt_product_code"), "Qty" => $this->input->post("txt_qty"), "type" => "Stock");
            $this->session->set_userdata(array("listProduct" => $data));
        } else {
            $data[] = array("product_code" => $this->input->post("txt_product_code"), "Qty" => $this->input->post("txt_qty"), "type" => "Stock");
            $this->session->set_userdata(array("listProduct" => $data));
        }

//        print_r($this->session->userdata("listProduct"));

        redirect("selling/frmListProductInCart");
    }

    public function frmProductSellingNonStock() {
        $elements['data'] = $this->selling_model->getProductData($this->input->post());
        $elements['priceRate'] = $this->selling_model->getPriceRate($this->input->post());
        echo $this->load->view("selling/frmProductSellingNonStock", $elements, TRUE);
    }

    public function frmProductSellingReserve() {
        $elements['product_code'] = $this->input->post("product_code");
        echo $this->load->view("selling/frmProductSellingReserve", $elements, TRUE);
    }

    public function frmActiocAddProductRoom() {
        if ($this->session->userdata("listProduct")) {
            $data = $this->session->userdata("listProduct");
            $data[] = array("product_code" => $this->input->post("txt_product_code"), "time_name_id" => $this->input->post("txt_hours"), "dateStart" => $this->input->post("dateStart"), "dateEnd" => $this->input->post("dateEnd"), "type" => "Room");
            $this->session->set_userdata(array("listProduct" => $data));
        } else {
            $data[] = array("product_code" => $this->input->post("txt_product_code"), "time_name_id" => $this->input->post("txt_hours"), "dateStart" => $this->input->post("dateStart"), "dateEnd" => $this->input->post("dateEnd"), "type" => "Room");
            $this->session->set_userdata(array("listProduct" => $data));
        }

//        print_r($this->session->userdata("listProduct"));

        redirect("selling/frmListProductInCart");
    }

    public function frmListProductInCart() {
        $this->theme->setPageTitle("Product Management - Selling Product.");
        $this->theme->usingLayoutName("themePanel");
        $elements['data'] = $this->selling_model->getProductInsession();
        $this->theme->setContent($this->load->view("selling/frmListProductInCart", $elements, TRUE));
//                print_r($this->session->all_userdata());
        $this->theme->getDisplay();               //print_r($this->session->userdata("listProduct"));
    }

    public function frmSaveSelling() {
        $element["billCode"] = $this->selling_model->actionSaveSelling();
        $element["data"] = $this->selling_model->getDataNewBill($element["billCode"]);
        echo $this->load->view("selling/frmShowNewBill", $element, TRUE);
    }

    public function frmShowNewBill() {
        echo $this->load->view("selling/frmShowNewBill", null, TRUE);
    }

    public function frmCheckStock() {
        $element["check"] = $this->selling_model->checkStock($this->input->post());
        echo $element["check"];
    }

    public function frmProductSellingMember() {
        $elements['productMemberCode'] = $this->input->post("product_code");
        $elements['data'] = $this->selling_model->getNumday($this->input->post());
        echo $this->load->view("selling/frmProductSellingMember", $elements, TRUE);
    }

    public function frmActionSellingMember() {
        $id_member = $this->selling_model->actionAddMember($this->input->post());
        $name_member = $this->selling_model->getName($id_member);

        $session_MemberSelling[] = array("sellingMemberID" => $id_member, "sellingMemberName" => $name_member);

        if ($this->session->userdata("MemberSelling")) {
            $this->session->unset_userdata("MemberSelling");
            $this->session->set_userdata(array("MemberSelling" => $session_MemberSelling));
        } else {
            $this->session->set_userdata(array("MemberSelling" => $session_MemberSelling));
        }

        if ($this->session->userdata("listProduct")) {
            $data = $this->session->userdata("listProduct");
            $data[] = array("product_code" => $this->input->post("txt_productMemberCode"), "type" => "Member", "dateStart" => $this->input->post("dateStart"), "dateEnd" => $this->input->post("dateEnd")
                , "member_id" => $id_member);

            if ($this->input->post("txt_locker") == "FREE") {
                $data[] = array("product_code" => $this->input->post("txt_lockerSelectFree"), "type" => "LOCKER", "dateStart" => $this->input->post("dateStart"), "dateEnd" => $this->input->post("dateEnd")
                    , "member_id" => $id_member, "price" => "0");
            } else if ($this->input->post("txt_locker") == "SALE") {
                $data[] = array("product_code" => $this->input->post("txt_lockerSelectSale"), "type" => "LOCKER", "dateStart" => $this->input->post("dateStart"), "dateEnd" => $this->input->post("dateEnd")
                    , "member_id" => $id_member, "price" => $this->input->post("txt_locker_price"));
            }

            $this->session->set_userdata(array("listProduct" => $data));
        } else {

            $data[] = array("product_code" => $this->input->post("txt_productMemberCode"), "type" => "Member", "dateStart" => $this->input->post("dateStart"), "dateEnd" => $this->input->post("dateEnd")
                , "member_id" => $id_member);

            if ($this->input->post("txt_locker") == "FREE") {
                $data[] = array("product_code" => $this->input->post("txt_lockerSelectFree"), "type" => "LOCKER", "dateStart" => $this->input->post("dateStart"), "dateEnd" => $this->input->post("dateEnd")
                    , "member_id" => $id_member, "price" => "0");
            } else if ($this->input->post("txt_locker") == "SALE") {
                $data[] = array("product_code" => $this->input->post("txt_lockerSelectSale"), "type" => "LOCKER", "dateStart" => $this->input->post("dateStart"), "dateEnd" => $this->input->post("dateEnd")
                    , "member_id" => $id_member, "price" => $this->input->post("txt_locker_price"));
            }

            $this->session->set_userdata(array("listProduct" => $data));
        }

        redirect("selling/frmListProductInCart");
    }

    public function frmGetLocker() {
        $elements['data'] = $this->selling_model->getLocker();
        echo $this->load->view("selling/frmLockerList", $elements, TRUE);
    }

    public function frmActiocAddProductReserve() {
        if ($this->session->userdata("listProduct")) {
            $data = $this->session->userdata("listProduct");

            $num = 0;
            foreach ($this->session->userdata("listProduct") as $key => $val) {
                $dataNew[$key] = $val;
                if ($val['product_code'] == $this->input->post("txt_product_code")) {
                    $dataNew[$key]['qty'] = $data[$key]['qty'] + 1;
                    $num++;
                }
            }

            if ($num > 0) {
                $this->session->unset_userdata("listProduct");
                $this->session->set_userdata(array("listProduct" => $dataNew));
            } else {
                $data[] = array("product_code" => $this->input->post("txt_product_code"), "dateStart" => $this->input->post("dateStart"), "dateEnd" => $this->input->post("dateEnd"), "type" => "Reserve", "qty" => "1");
                $this->session->set_userdata(array("listProduct" => $data));
            }
        } else {
            $data[] = array("product_code" => $this->input->post("txt_product_code"), "dateStart" => $this->input->post("dateStart"), "dateEnd" => $this->input->post("dateEnd"), "type" => "Reserve", "qty" => "1");
            $this->session->set_userdata(array("listProduct" => $data));
        }

        redirect("selling/frmListProductInCart");
    }

    public function frmReserveRoom() {
        $this->session->unset_userdata("listProduct");
        $this->theme->setPageTitle("Product Management - Reserve Room.");
        $this->theme->usingLayoutName("themePanel");
        $elements['data'] = $this->selling_model->getProductAll();
        $elements['room'] = $this->selling_model->getRoom();
        $elements[''] = $this->selling_model->getRoom();
        $this->theme->setContent($this->load->view("selling/frmReserveRoom", $elements, TRUE));
        $this->theme->getDisplay();
    }

    public function frmReserveRoomData() {
        $elements['data'] = $this->selling_model->getReserveRoomData($this->input->post());
        $elements['room'] = $this->selling_model->getRoom();
        $elements['day'] = $this->input->post("day");
        $elements['month'] = $this->input->post("month");
        $elements['year'] = $this->input->post("year");
        echo $this->load->view("selling/frmReserveRoomData", $elements, TRUE);
    }

    public function checkRoom() {
        $elements = $this->selling_model->actionCheckRoom($this->input->post());
        echo $elements;
    }

    public function frmActiocReserveRoom() {
        $this->selling_model->actiocReserveRoom($this->input->post());
        redirect("selling/frmReserveRoom");
    }

    public function frmGetPriceRate() {
        $element["data"] = $this->selling_model->getPriceRate($this->input->post());
        echo $this->load->view("selling/frmSelectPriceRate", $element, TRUE);
    }

    public function frmSellingRoom() {
        $element["billCode"] = $this->selling_model->actiocSellingRoom($this->input->post());
        $element["data"] = $this->selling_model->getDataNewBill($element["billCode"]);
        echo $this->load->view("selling/frmShowNewBill", $element, TRUE);
    }

    public function frmActionCancleReserveRoom() {
        $this->selling_model->actionCancleReserveRoom($this->input->post());
    }

    public function frmCancleSelling() {
        $this->session->unset_userdata("listProduct");
        $this->theme->setPageTitle("Product Management - Cancle Selling Product.");
        $this->theme->usingLayoutName("themePanel");
        $elements['data'] = $this->selling_model->getSellingProductBill();
        $this->theme->setContent($this->load->view("selling/frmCancleSelling", $elements, TRUE));
        $this->theme->getDisplay();
    }

    public function frmShowBillDetail() {
        $element["data"] = $this->selling_model->getDataNewBill($this->input->post("billing_code"));
        $element["billCode"] = $this->input->post("billing_code");
        echo $this->load->view("selling/frmShowNewBill", $element, TRUE);
    }

    public function frmActionCancleBill() {
        $this->selling_model->actionCancleBill($this->input->post());
    }

    public function frmSelectMember() {
        $element["data"] = $this->selling_model->getMember();
        echo $this->load->view("selling/frmSelectMember", $element, TRUE);
    }

    public function frmActionSelectMember() {
        $session_MemberSelling[] = array("sellingMemberID" => $this->input->post("member_id"), "sellingMemberName" => $this->input->post("member_name"));

        if ($this->session->userdata("MemberSelling")) {
            $this->session->unset_userdata("MemberSelling");
            $this->session->set_userdata(array("MemberSelling" => $session_MemberSelling));
        } else {
            $this->session->set_userdata(array("MemberSelling" => $session_MemberSelling));
        }
    }

    public function frmSearchMember() {
        $element["data"] = $this->selling_model->getSearchMember($this->input->post());
        echo $this->load->view("selling/frmSelectMemberSearch", $element, TRUE);
    }

    public function checkProductInCart() {
        if ($this->session->userdata("listProduct")) {
            echo "TRUE";
        } else {
            echo "FALSE";
        }
    }

    public function frmPrintBill() {
        $this->session->unset_userdata("listProduct");
        $this->theme->setPageTitle("Selling System - Print Bill");
        $this->theme->usingLayoutName("themePanel");
//        $elements['data'] = $this->selling_model->getSellingProductBill();
        $elements = "";
        $this->theme->setContent($this->load->view("selling/frmPrintBill", $elements, TRUE));
        $this->theme->getDisplay();
    }
    
    public function frmGetBill(){
        $element["data"] = $this->selling_model->getSellingProductBill($this->input->post());
        echo $this->load->view("selling/frmPrintBillList", $element, TRUE);
    }

}

?>
