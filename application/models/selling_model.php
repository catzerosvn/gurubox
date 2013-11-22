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
class selling_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
    }

    public function getProductAll($post = "") {
        $this->db->select("*")
                ->join("products_type", "products_type.product_type_id = products_stocks.ref_product_type_id", "left")
                ->where("is_enable", "Y");

        if (isset($post['txt_key'])) {
            if ($post['txt_key'] != "") {
                $this->db->like("product_name", $post['txt_key']);
            }
        }

        $dataArary = $this->db->get("products_stocks")->result_array();

        return $dataArary;
    }

    public function getProductData($post = "") {
        $this->db->select("*")
                ->join("products_type", "products_type.product_type_id = products_stocks.ref_product_type_id", "left")
                ->where("is_enable", "Y");

        $this->db->where("product_code", $post['product_code']);

        $dataArary = $this->db->get("products_stocks")->result_array();

        return $dataArary;
    }

    public function getPriceRate($post = "") {
        $this->db->select("*");
        $this->db->where("ref_product_code", $post['product_code']);
        $dataArary = $this->db->get("product_price_rate")->result_array();

        return $dataArary;
    }

    public function getProductInsession() {
        $data = array();
        $dataVal2 = array();

        if ($this->session->userdata("listProduct")) {
            foreach ($this->session->userdata("listProduct") as $val) {


                if (isset($val['type']) and $val['type'] == "Room") {// ADD ROOM
                    $dataArray = $this->db->select("*")->where("product_code", $val['product_code'])->get("products_stocks")->result_array();

                    foreach ($dataArray as $val2) {
                        $dataVal2[$val2['product_code']]['product_code'] = $val2['product_code'];
                        $roomName = $val2['product_name'];
                    }

                    $dataArrayRoom = $this->db->select("*")->where("row_id", $val['time_name_id'])->get("product_price_rate")->result_array();

                    $dataVal2[$val2['product_code']]['product_name'] = $roomName . " (" . $dataArrayRoom[0]['time_name'] . ")";
                    $dataVal2[$val2['product_code']]['product_sale'] = $dataArrayRoom[0]['product_sale'];
                    $dataVal2[$val2['product_code']]['sellingQty'] = 1;
                    $dataVal2[$val2['product_code']]['dateStart'] = $val['dateStart'];
                    $dataVal2[$val2['product_code']]['dateEnd'] = $val['dateEnd'];
                } else if (isset($val['type']) and $val['type'] == "Stock") {// Stock
                    $dataArray = $this->db->select("*")->where("product_code", $val['product_code'])->get("products_stocks")->result_array();

                    foreach ($dataArray as $val2) {
                        if (isset($dataVal2[$val2['product_code']]['product_code'])) {
                            $dataVal2[$val2['product_code']]['sellingQty'] = $dataVal2[$val2['product_code']]['sellingQty'] + $val['Qty'];
                        } else {
                            $dataVal2[$val2['product_code']]['product_code'] = $val2['product_code'];
                            $dataVal2[$val2['product_code']]['product_name'] = $val2['product_name'];
                            $dataVal2[$val2['product_code']]['product_sale'] = $val2['product_sale'];
                            $dataVal2[$val2['product_code']]['sellingQty'] = $val['Qty'];
                        }
                    }
                } else if (isset($val['type']) and $val['type'] == "Member") {// Member
                    $dataArray = $this->db->select("*")->where("product_code", $val['product_code'])->get("products_stocks")->result_array();

                    foreach ($dataArray as $val2) {
                        $dataVal2[$val2['product_code']]['product_code'] = $val2['product_code'];
                        $dataVal2[$val2['product_code']]['product_name'] = $val2['product_name'];
                        $dataVal2[$val2['product_code']]['product_sale'] = $val2['product_sale'];
                        $dataVal2[$val2['product_code']]['sellingQty'] = 1;
                        $dataVal2[$val2['product_code']]['dateStart'] = $val['dateStart'];
                        $dataVal2[$val2['product_code']]['dateEnd'] = $val['dateEnd'];
                    }
                } else if (isset($val['type']) and $val['type'] == "LOCKER") {// LOCKER
                    $dataArray = $this->db->select("*")->where("product_code", $val['product_code'])->get("products_stocks")->result_array();

                    foreach ($dataArray as $val2) {
                        $dataVal2[$val2['product_code']]['product_code'] = $val2['product_code'];
                        $dataVal2[$val2['product_code']]['product_name'] = $val2['product_name'];
                        $dataVal2[$val2['product_code']]['product_sale'] = $val['price'];
                        $dataVal2[$val2['product_code']]['sellingQty'] = 1;
                        $dataVal2[$val2['product_code']]['dateStart'] = $val['dateStart'];
                        $dataVal2[$val2['product_code']]['dateEnd'] = $val['dateEnd'];
                    }
                } else if (isset($val['type']) and $val['type'] == "Reserve") {// ADD Reserve
                    $dataArray = $this->db->select("*")->where("product_code", $val['product_code'])->get("products_stocks")->result_array();

                    foreach ($dataArray as $val2) {
                        $dataVal2[$val2['product_code']]['product_code'] = $val2['product_code'];
                        $dataVal2[$val2['product_code']]['product_name'] = $val2['product_name'];
                        $dataVal2[$val2['product_code']]['product_sale'] = $val2['product_sale'];
                        $dataVal2[$val2['product_code']]['sellingQty'] = $val['qty'];
                        $dataVal2[$val2['product_code']]['dateStart'] = $val['dateStart'];
                        $dataVal2[$val2['product_code']]['dateEnd'] = $val['dateEnd'];
                    }
                }
            }// END $val2
        }

        return $dataVal2;
    }

    public function checkRoom($product_code) {
        $dataArray = $this->db->select("*")
                        ->join("services_timetable", "services_timetable.ref_product_code = products_stocks.product_code", "left")
                        ->where("product_code", $product_code)
                        ->where("datetime_end >=", date("Y-m-d H:i:s"), "datetime_start <=", date("Y-m-d H:i:s"))
                        ->get("products_stocks")->result_array();

        return $dataArray;
    }

    public function actionSaveSelling() {
        $empName = $this->session->userdata("SESSION_FULLNAME");
        $empID = $this->session->userdata("SESSION_USER_ID");

        $memberArray = $this->session->userdata("MemberSelling");
        $memberID = $memberArray[0]['sellingMemberID'];
        $memberName = $memberArray[0]['sellingMemberName'];

        $this->db->set("billing_id", "")
                ->set("ref_members_id", $memberID)
                ->set("billing_date", date("Y-m-d H:i:s"))
                ->set("create_by_id", $empID)
                ->set("create_by", $empName)
                ->set("create_date", date("Y-m-d H:i:s"))
                ->set("payment_channel", "CASH")
                ->set("ref_site_code", "GB1")
                ->insert("billing_transaction");

        $insert_id = $this->db->insert_id();

        if (strlen($insert_id) == 1) {
            $billCode = "SB000" . $insert_id;
        } else if (strlen($insert_id) == 2) {
            $billCode = "SB00" . $insert_id;
        } else if (strlen($insert_id) == 3) {
            $billCode = "SB0" . $insert_id;
        } else if (strlen($insert_id) >= 4) {
            $billCode = "SB" . $insert_id;
        }

        $totalAmount = 0;
        foreach ($this->session->userdata("listProduct") as $val) {
            $dataArray = array();
            $dataArray = $this->db->select("*")->where("product_code", $val['product_code'])->get("products_stocks")->result_array();
            if ($dataArray[0]['ref_product_type_id'] == 2) {//Stock
                $this->db->set("item_reference_id", "")
                        ->set("ref_billing_code", $billCode)
                        ->set("ref_product_code", $val['product_code'])
                        ->set("product_name", $dataArray[0]['product_name'])
                        ->set("unit_cost_price", $dataArray[0]['product_cost'])
                        ->set("unit_sale_price", $dataArray[0]['product_sale'])
                        ->set("quantity", $val['Qty'])
                        ->insert("billing_transaction_items");

                $newStockQty = $dataArray[0]['product_quantity'] - $val['Qty'];

                $this->db->set("product_quantity", $newStockQty)
                        ->where("product_code", $val['product_code'])
                        ->update("products_stocks");

                $totalAmount = $totalAmount + ($val['Qty'] * $dataArray[0]['product_sale']);
            } else if ($dataArray[0]['ref_product_type_id'] == 1) {//Room 
                $dataRoom = $this->db->select("*")->where("row_id", $val['time_name_id'])->get("product_price_rate")->result_array();

                $this->db->set("item_reference_id", "")
                        ->set("ref_billing_code", $billCode)
                        ->set("ref_product_code", $val['product_code'])
                        ->set("product_name", $dataArray[0]['product_name'])
                        ->set("unit_cost_price", $dataRoom[0]['product_cost'])
                        ->set("unit_sale_price", $dataRoom[0]['product_sale'])
                        ->set("quantity", 1)
                        ->insert("billing_transaction_items");

                $this->db->set("services_id ", "")
                        ->set("ref_product_code ", $val['product_code'])
                        ->set("ref_billing_code ", $billCode)
                        ->set("product_name ", $dataArray[0]['product_name'])
                        ->set("datetime_start", date("Y-m-d $val[dateStart]"))
                        ->set("datetime_end", date("Y-m-d $val[dateEnd]"))
                        ->set("is_room_rent ", "Y")
                        ->set("ref_site_code", "GB1")
                        ->insert("services_timetable");

                $totalAmount = $totalAmount + ($dataRoom[0]['product_sale']);
            } else if ($dataArray[0]['ref_product_type_id'] == 3) {//Member
                $dataMember = $this->db->select("*")->where("product_code", $val['product_code'])->get("products_stocks")->result_array();

                $this->db->set("item_reference_id", "")
                        ->set("ref_billing_code", $billCode)
                        ->set("ref_product_code", $val['product_code'])
                        ->set("product_name", $dataMember[0]['product_name'])
                        ->set("unit_cost_price", $dataMember[0]['product_cost'])
                        ->set("unit_sale_price", $dataMember[0]['product_sale'])
                        ->set("quantity", 1)
                        ->insert("billing_transaction_items");

                $this->db->set("ref_product_code", $val['product_code'])
                        ->set("date_member_start", $val['dateStart'])
                        ->set("date_member_end", $val['dateEnd'])
                        ->where("member_id", $val['member_id'])
                        ->update("members");

                $totalAmount = $totalAmount + ($dataMember[0]['product_sale']);
            } else if ($dataArray[0]['ref_product_type_id'] == 5) {//LOCKER
                $dataLocker = $this->db->select("*")->where("product_code", $val['product_code'])->get("products_stocks")->result_array();

                $this->db->set("item_reference_id", "")
                        ->set("ref_billing_code", $billCode)
                        ->set("ref_product_code", $val['product_code'])
                        ->set("product_name", $dataLocker[0]['product_name'])
                        ->set("unit_cost_price", 0)
                        ->set("unit_sale_price", $val['price'])
                        ->set("quantity", 1)
                        ->insert("billing_transaction_items");

                $this->db->set("row_id", "")
                        ->set("ref_product_code", $val['product_code'])
                        ->set("date_start", $val['dateStart'])
                        ->set("date_end", $val['dateEnd'])
                        ->set("ref_member_id", $val['member_id'])
                        ->insert("product_locker_reserve");

                $totalAmount = $totalAmount + ($val['price']);
            } else if ($dataArray[0]['ref_product_type_id'] == 4) {//Reserve
                $dataReserve = $this->db->select("*")->where("product_code", $val['product_code'])->get("products_stocks")->result_array();

                $this->db->set("item_reference_id", "")
                        ->set("ref_billing_code", $billCode)
                        ->set("ref_product_code", $val['product_code'])
                        ->set("product_name", $dataReserve[0]['product_name'])
                        ->set("unit_cost_price", $dataReserve[0]['product_cost'])
                        ->set("unit_sale_price", $dataReserve[0]['product_sale'])
                        ->set("quantity", $val['qty'])
                        ->insert("billing_transaction_items");

                $totalAmount = $totalAmount + ($dataReserve[0]['product_sale'] * $val['qty']);
            }
        }

        $this->db->set("total_amount", $totalAmount)
                ->set("billing_code", $billCode)
                ->where("billing_id", $insert_id)
                ->update("billing_transaction");

        return $billCode;
    }

    public function getDataNewBill($billCode) {
        $dataArray = $this->db->select("*")
                        ->where("ref_billing_code", $billCode)
                        ->get("billing_transaction_items")->result_array();

        return $dataArray;
    }

    public function checkStock($post) {
        $dataArray = $this->db->select("*")
                        ->where("product_code", $post['txt_product_code'])
                        ->get("products_stocks")->result_array();

        $check = $dataArray[0]['product_quantity'] - $post['saleQty'];

        if ($check < 0) {
            return "มี Product เหลือจำนวน " . $dataArray[0]['product_quantity'];
        } else {
            return "TRUE";
        }
    }

    public function actionAddMember($post) {
        $birthday = ($post['txt_BornYear'] - 543) . "-" . $post['txt_BornMonth'] . "-" . $post['txt_BornDay'];

        $this->db->set("member_id", "")
                ->set("prefix_name", $post['txt_prefix'])
                ->set("firstname", $post['txt_memberName'])
                ->set("lastname", $post['txt_memberLastname'])
                ->set("birthdate", $birthday)
                ->set("license_number", $post['txt_memberIDcard'])
                ->set("phone_number", $post['txt_Tel'])
                ->set("email", $post['txt_mail']);

        if ($post['txt_career'] == "OTHER") {
            $this->db->set("career", 999);
            $this->db->set("custom_career", $post['txt_addCareer']);
        } else {
            $this->db->set("career", $post['txt_career']);
            $this->db->set("custom_career", "");
        }

        if ($post['txt_point'] != "") {
            $this->db->set("point", $post['txt_point']);
        } else {
            $this->db->set("point", "0");
        }

        $this->db->insert("members");

        //===================================================================================================
        $insert_id = $this->db->insert_id();
        //======================================================

        if (strlen($insert_id) == 1) {
            $memberUser = "user000" . $insert_id;
        } else if (strlen($insert_id) == 2) {
            $memberUser = "user00" . $insert_id;
        } else if (strlen($insert_id) == 3) {
            $memberUser = "user0" . $insert_id;
        } else if (strlen($insert_id) == 4) {
            $memberUser = "user" . $insert_id;
        }

        $this->db->set("ref_member_id", $insert_id)
                ->set("username", $memberUser)
                ->set("password", md5("1234"))
                ->set("is_activate", "Y")
                ->set("is_enabled", "Y")
                ->insert("members_accounts");

        return $insert_id;
    }

    public function getName($id_member) {
        $dataArray = $this->db->select("*")->where("member_id", $id_member)->get("members")->result_array();
        $name = $dataArray[0]['firstname'] . " " . $dataArray[0]['lastname'];
        return $name;
    }

    public function getLocker($product_code = "") {
        $this->db->select("*")
                ->join("product_locker_reserve", "product_locker_reserve.ref_product_code = products_stocks.product_code", "left")
                ->where("ref_product_type_id", 5);

        if ($product_code != "") {
            $this->db->where("product_code", $product_code);
            $this->db->where("date_end >=", date("Y-m-d"), "date_start <=", date("Y-m-d"));
        }

        $datReturn = $this->db->get("products_stocks")->result_array();

        return $datReturn;
    }

    public function getReserveRoomData($post) {
        if (strlen($post['month']) == 1) {
            $month = "0" . $post['month'];
        } else if (strlen($post['month']) == 2) {
            $month = $post['month'];
        }

        if (strlen($post['day']) == 1) {
            $day = "0" . $post['day'];
        } else if (strlen($post['day']) == 2) {
            $day = $post['day'];
        }

        $this->db->select("*")
                ->where("datetime_start >=", date("$post[year]-$month-$day 00.00.01"))
                ->where("datetime_end <=", date("$post[year]-$month-$day 23.59.59"));

        if (isset($post['room']) and $post['room'] != "0") {
            $this->db->where("ref_product_code", $post['room']);
        }

        $dataArray = $this->db->order_by("ref_product_code,datetime_start")->get("services_timetable")->result_array();

        return $dataArray;
    }

    public function getRoom() {
        $dataArray = $this->db->select("*")
                        ->where("ref_product_type_id", 1)
                        ->order_by("product_code")
                        ->get("products_stocks")->result_array();

        return $dataArray;
    }

    public function getReserveRoomData_Form($day_post, $month_post, $year, $selectRoom) {
        if (strlen($month_post) == 1) {
            $month = "0" . $month_post;
        } else if (strlen($month_post) == 2) {
            $month = $month_post;
        }

        if (strlen($day_post) == 1) {
            $day = "0" . $day_post;
        } else if (strlen($day_post) == 2) {
            $day = $day_post;
        }

        $this->db->select("*")
                ->where("datetime_start >=", date("$year-$month-$day 00.00.01"))
                ->where("datetime_end <=", date("$year-$month-$day 23.59.59"));

        if ($selectRoom != "0") {
            $this->db->where("ref_product_code", $selectRoom);
        }

        $dataArray = $this->db->order_by("ref_product_code,datetime_start")->get("services_timetable")->result_array();

        return $dataArray;
    }

    public function actionCheckRoom($post) {
        if (strlen($post['txt_month']) == 1) {
            $month = "0" . $post['txt_month'];
        } else if (strlen($post['txt_month']) == 2) {
            $month = $post['txt_month'];
        }

        if (strlen($post['txt_day']) == 1) {
            $day = "0" . $post['txt_day'];
        } else if (strlen($post['txt_day']) == 2) {
            $day = $post['txt_day'];
        }

        $year = $post['txt_year'];

        $product_code = $post['txt_room'];

        $timeStart = $post['dateStart'];
        $timeEnd = $post['dateEnd'];

        $sql = "
            SELECT
                    *
                    FROM services_timetable
                    WHERE
                    (
                    ('$year-$month-$day $timeStart' BETWEEN datetime_start and datetime_end)
                    OR
                    ('$year-$month-$day $timeEnd'  BETWEEN datetime_start and datetime_end)
                    OR
                    (datetime_start  BETWEEN '$year-$month-$day $timeStart' and '$year-$month-$day $timeEnd')
                    OR
                    (datetime_end  BETWEEN '$year-$month-$day $timeStart' and '$year-$month-$day $timeEnd')
                    )
                    AND
                    ref_product_code = '$product_code'
        ";

        $dataArray = $this->db->query($sql)->result_array();

        if (count($dataArray) > 0) {
            return "NOT_RESERVE";
        } else {
            return "TRUE";
        }
    }

    public function actiocReserveRoom($post) {
        if (strlen($post['txt_month']) == 1) {
            $month = "0" . $post['txt_month'];
        } else if (strlen($post['txt_month']) == 2) {
            $month = $post['txt_month'];
        }

        if (strlen($post['txt_day']) == 1) {
            $day = "0" . $post['txt_day'];
        } else if (strlen($post['txt_day']) == 2) {
            $day = $post['txt_day'];
        }

        $year = $post['txt_year'];

        $product_code = $post['txt_room'];

        $timeStart = $post['dateStart'];
        $timeEnd = $post['dateEnd'];

        $dataArray = $this->db->select("*")->where("product_code", $post['txt_room'])->get("products_stocks")->result_array();

        $this->db->set("ref_product_code", $post['txt_room'])
                ->set("ref_row_id_price_rate", $post['txt_pricerate'])
                ->set("product_name", $dataArray[0]['product_name'])
                ->set("datetime_start", date("$year-$month-$day $timeStart"))
                ->set("datetime_end", date("$year-$month-$day $timeEnd"))
                ->set("is_room_rent", "N")
                ->set("ref_site_code", "GB1")
                ->set("reserve_name", $post['txt_name'])
                ->insert("services_timetable");
    }

    public function actiocSellingRoom($post) {
        $dataArray = $this->db->select("*")
                        ->where("services_id", $post['services_id'])
                        ->get("services_timetable")->result_array();

        $empName = $this->session->userdata("SESSION_FULLNAME");

        $this->db->set("billing_id", "")
                ->set("ref_members_id", "")
                ->set("billing_date", date("Y-m-d H:i:s"))
                ->set("create_by", $empName)
                ->set("create_date", date("Y-m-d H:i:s"))
                ->set("payment_channel", "CASH")
                ->set("ref_site_code", "GB1")
                ->insert("billing_transaction");

        $insert_id = $this->db->insert_id();

        if (strlen($insert_id) == 1) {
            $billCode = "SB000" . $insert_id;
        } else if (strlen($insert_id) == 2) {
            $billCode = "SB00" . $insert_id;
        } else if (strlen($insert_id) == 3) {
            $billCode = "SB0" . $insert_id;
        } else if (strlen($insert_id) >= 4) {
            $billCode = "SB" . $insert_id;
        }

        $totalAmount = 0;
        foreach ($dataArray as $val) {
            $dataRoom = $this->db->select("*")->where("row_id", $val['ref_row_id_price_rate'])->get("product_price_rate")->result_array();

            $this->db->set("item_reference_id", "")
                    ->set("ref_billing_code", $billCode)
                    ->set("ref_product_code", $val['ref_product_code'])
                    ->set("product_name", $val['product_name'])
                    ->set("unit_cost_price", $dataRoom[0]['product_cost'])
                    ->set("unit_sale_price", $dataRoom[0]['product_sale'])
                    ->set("quantity", 1)
                    ->insert("billing_transaction_items");

            $this->db->set("is_selling ", "Y")
                    ->set("ref_billing_code", $billCode)
                    ->where("services_id", $post['services_id'])
                    ->update("services_timetable");

            $totalAmount = $totalAmount + ($dataRoom[0]['product_sale']);
        }

        $this->db->set("total_amount", $totalAmount)
                ->set("billing_code", $billCode)
                ->where("billing_id", $insert_id)
                ->update("billing_transaction");

        return $billCode;
    }

    public function actionCancleReserveRoom($post) {
        $this->db->where("services_id", $post['services_id'])
                ->delete("services_timetable");
    }

    public function getSellingProductBill($post = "") {
        $this->db->select("*")
                ->join("members", "member_id = ref_members_id", "left")
                ->where("is_cancel", "N");

        if (isset($post['txt_dateStart'])) {
            $this->db->where("billing_date >=", date("$post[txt_dateStart] 00.00.01"));
            $this->db->where("billing_date <=", date("$post[txt_dateEnd] 23.59.59"));
        } else {
            $this->db->where("billing_date >=", date("Y-m-d 00.00.01"));
            $this->db->where("billing_date <=", date("Y-m-d 23.59.59"));
        }

        if (isset($post['txt_member'])) {
            if ($post['txt_member'] != "") {
                $this->db->like("firstname", $post['txt_member']);
            }
        }
        
        if (isset($post['txt_memberLastname'])) {
            if ($post['txt_memberLastname'] != "") {
                $this->db->like("lastname", $post['txt_memberLastname']);
            }
        }

        $dataArray = $this->db
                        ->order_by("billing_id", "DESC")
                        ->get("billing_transaction")->result_array();
        
        return $dataArray;
    }

    public function actionCancleBill($post) {
        $dataArray = $this->db->select("*")
                        ->join("products_stocks", "ref_product_code = product_code", "left")
                        ->where("ref_billing_code", $post['billing_code'])
                        ->get("billing_transaction_items")->result_array();

        foreach ($dataArray as $val) {
            if ($val['ref_product_type_id'] == 1) {
                $this->db->where("ref_billing_code", $post['billing_code'])->delete("services_timetable");
            } else if ($val['ref_product_type_id'] == 2) {
                $dataStock = $this->db->select("*")->where("product_code", $val['ref_product_code'])->get("products_stocks")->result_array();
                $newStock = $dataStock[0]['product_quantity'] + $val['quantity'];
                $this->db->set("product_quantity", $newStock)->where("product_code", $val['ref_product_code'])->update("products_stocks");
            } else if ($val['ref_product_type_id'] == 3) {
                
            } else if ($val['ref_product_type_id'] == 4) {
                $this->db->where("ref_billing_code", $post['billing_code'])->delete("services_timetable");
            } else if ($val['ref_product_type_id'] == 5) {
                $this->db->where("ref_product_code", $val['ref_product_code'])->delete("product_locker_reserve");
            }
        }

        $empName = $this->session->userdata("SESSION_FULLNAME");

        $this->db->set("is_cancel", "Y")
                ->set("cancel_by", $empName)
                ->set("cancel_date", date("Y-m-d H:i:s"))
                ->where("billing_code", $post['billing_code'])
                ->update("billing_transaction");
    }

    public function getMember() {
        return $this->db->select("*")->join("members_accounts", "ref_member_id = member_id", "left")->where("is_enabled", "Y")->get("members")->result_array();
    }

    public function getSearchMember($post) {
        return $this->db->select("*")->join("members_accounts", "ref_member_id = member_id", "left")->where("is_enabled", "Y")
                        ->where("(username LIKE '%$post[txt_keyMember]%' OR firstname LIKE '%$post[txt_keyMember]%' OR lastname LIKE '%$post[txt_keyMember]%')")->get("members")->result_array();
    }

    public function getNumday($post) {
        return $this->db->select("*")->where("product_code", $post['product_code'])->get("products_stocks")->result_array();
    }

    public function getBill($post) {
        
    }

}

?>
