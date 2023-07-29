<?php

class Ecommerce extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("General_model");
        $this->load->model("Admin_model");
        $this->load->model("Master_model");
        $this->load->model("Dashboard_model");

        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }

        $data['resep_approval'] = $this->Master_model->count_resep_approval();
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_confirm'] = $this->General_model->paymment_confirm();
        $data['payment_mpasi'] = $this->General_model->paymment_confirm_mpasi();
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("ecommerce/list_payment_confirm", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function new_orders()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_orders'] = $this->General_model->get_new_orders();
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("ecommerce/new_orders", $data);
        $this->load->view("template/footer.php", $data);

    }

    public function logs($order_id)
    {
       
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['detail_log'] = $this->General_model->get_logs($order_id);
        $data['recipe_log'] = $this->General_model->get_log_recipe($order_id);
        $data['list_ulasan'] = $this->General_model->get_one("tx_order_rating","order_id = '$order_id'");
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("ecommerce/logs.php", $data);
        $this->load->view("template/footer.php", $data);

    }

    public function processed_orders()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_orders'] = $this->General_model->get_processed_orders();
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("ecommerce/processed_orders", $data);
        $this->load->view("template/footer.php", $data);

    }

    public function order_history()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_orders'] = $this->General_model->get_order_history();
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("ecommerce/order_history", $data);
        $this->load->view("template/footer.php", $data);

    }

    public function add()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("paymentmethod_type/add", $data);
        $this->load->view("template/footer.php", $data);

    }

    public function approval($category, $customer_id, $order_id, $seller_id)
    {
        
        $get_buyers = $this->General_model->get_buyers($customer_id);
        $get_sellers = $this->General_model->get_sellers($seller_id);

        if ($category == 'approved') {
            $status = 'ST003';
            $data= array(
                'order_status_id' => $status,
            );

            $updates = $this->General_model->update('tx_order_parent',$data,'order_id',$order_id);
            //payment  paid
            $data_payment = array(
                'is_paid' => 1,
            );

            $update_payment = $this->General_model->update('tx_order_payment',$data_payment,'order_id',$order_id);
            //close payment paid


            //order logs
            $data_log1 = array(
                'order_id' => $order_id,
                'customer_id' => 0,
                'order_status_id' => 'ST002',
                'action_by' => 'system',
                'logged_time' => date('Y-m-d H:m:s'),
            );

            $data_log2 = array(
                'order_id' => $order_id,
                'customer_id' => 0,
                'order_status_id' => 'ST003',
                'action_by' => 'system',
                'logged_time' => date('Y-m-d H:m:s'),
            );
            
            $insert_order_log = $this->General_model->insert('tx_order_log',$data_log1);
            $insert_order_log = $this->General_model->insert('tx_order_log',$data_log2);
            //close order logs

            if ($updates) {

                $url = "https://fcm.googleapis.com/fcm/send";  

                $serverKey = "AAAA0q3-9sg:APA91bEEPK68CqlCgPOxj4kyd779ias5bf26Z-paqLGT87XDS1qNVoFdd-UNJSCd16B7bLYctCLQCNsDGPX3W0eNLMqLvfErQ-Ox9zgjMe4IurpKxbow4h9GyYo1TGT846yvyCYf3rc_";  

                $tokenArray = [];
                foreach ($get_buyers as $usertoken) {
                    $tokenArray[] = $usertoken['firebase_token'];
                }

                $fields_buyer = array (
                    'registration_ids' => $tokenArray,
                    'data' => array (
                            "date" => date('Y-m-d H:i:s'),
                            "type"=>'ORDER_PAYMENT_APPROVED',
                            "target_id" => $order_id,
                            "title" => 'MauMasak',
                            "source" => 'buyer',
                            "body" => 'Pembayaran berhasil diterima, pesanan sudah diteruskan kepada penjual untuk disiapkan'
                    )
                );

                $headers_buyer = array
                (
                    'Authorization: key='.$serverKey,
                    'Content-Type: application/json'
                );

                $fields_buyer = json_encode($fields_buyer);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://fcm.googleapis.com/fcm/send");
                curl_setopt($ch,CURLOPT_HTTPHEADER, $headers_buyer);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_HEADER, FALSE);
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_buyer);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

                $responses = curl_exec($ch);
                curl_close($ch);

                    $tokenArray_seller = [];
                    foreach ($get_sellers as $usertokens) {
                        $tokenArray_seller[] = $usertokens['firebase_token'];
                    }

                    $fields_seller = array (
                        'registration_ids' => $tokenArray_seller,
                        'data' => array (
                                "date" => date('Y-m-d H:i:s'),
                                "type"=>'ORDER_PAYMENT_APPROVED',
                                "target_id" => $order_id,
                                "title" => 'MauMasak',
                                "source" => 'seller',
                                "body" => 'Ada pesanan baru menunggu, mohon lakukan konfirmasi segera!'
                        )
                    );

                    $header_seller = array
                    (
                        'Authorization: key='.$serverKey,
                        'Content-Type: application/json'
                    );
                    
                    $fields_seller = json_encode($fields_seller);
                    $ch2 = curl_init();
                    curl_setopt($ch2, CURLOPT_URL, "https://fcm.googleapis.com/fcm/send");
                    curl_setopt($ch2,CURLOPT_HTTPHEADER, $header_seller);
                    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($ch2, CURLOPT_HEADER, FALSE);
                    curl_setopt($ch2, CURLOPT_POST, TRUE);
                    curl_setopt($ch2, CURLOPT_POSTFIELDS, $fields_seller);
                    curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, FALSE);

                    $responses_seller = curl_exec($ch2);
                    curl_close($ch2);

                
                $data_notification_buyer = array(
                    'type'                  => 'ORDER_PAYMENT_APPROVED',
                    'sender_customer_id'    => 0,
                    'target_id'             => $order_id,
                    'receiver_customer_id'  => $customer_id,
                    'source'  		    => 'buyer',
                    'message'               => 'Pembayaran berhasil diterima, pesanan sudah diteruskan kepada penjual untuk disiapkan',
                );

                $data_notification_seller = array(
                    'type'                  => 'ORDER_PAYMENT_APPROVED',
                    'sender_customer_id'    => 0,
                    'target_id'             => $order_id,
                    'receiver_customer_id'  => $seller_id,
                    'source'  		    => 'seller',
                    'message'               => 'Ada pesanan baru menunggu, mohon lakukan konfirmasi segera!',
                );

                    $insert_notification_buyer = $this->General_model->insert('m_notification', $data_notification_buyer);
                    $insert_notification_seller = $this->General_model->insert('m_notification', $data_notification_seller);
                    if ($insert_notification_buyer and $insert_notification_seller) {
                        echo ("<script LANGUAGE='JavaScript'>alert('Order Berhasil Dikonfirmasi'); window.location.href='".base_url('ecommerce')."';</script>");
                    }

                    else
                    {
                        echo ("<script LANGUAGE='JavaScript'>alert('Notifikasi gagal!!'); window.location.href='".base_url('ecommerce/')."';</script>");

                    }

            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal memberikan approval!!'); window.location.href='".base_url('admin/detailrecipe/'.$recipe_id)."';</script>");
            }
        }
        elseif ($category == 'rejected') {
            $status = 'ST001';
            $data= array(
                'order_status_id' => $status,
            );

            $updates = $this->General_model->update('tx_order_parent',$data,'order_id',$order_id);
            //payment  paid
            $data_payment = array(
                'is_paid' => 0,
            );

            $update_payment = $this->General_model->update('tx_order_payment',$data_payment,'order_id',$order_id);
            //close payment paid



            if ($updates) {

                $url = "https://fcm.googleapis.com/fcm/send";  

                $serverKey = "AAAA0q3-9sg:APA91bEEPK68CqlCgPOxj4kyd779ias5bf26Z-paqLGT87XDS1qNVoFdd-UNJSCd16B7bLYctCLQCNsDGPX3W0eNLMqLvfErQ-Ox9zgjMe4IurpKxbow4h9GyYo1TGT846yvyCYf3rc_";  

                $tokenArray = [];
                foreach ($get_buyers as $usertoken) {
                    $tokenArray[] = $usertoken['firebase_token'];
                }

                $fields_buyer = array (
                    'registration_ids' => $tokenArray,
                    'data' => array (
                            "date" => date('Y-m-d H:i:s'),
                            "type"=>'ORDER_PAYMENT_REJECTED',
                            "target_id" => $order_id,
                            "title" => 'MauMasak',
                            "source" => 'buyer',
                            "body" => 'Maaf, kami belum berhasil verifikasi pembayaran anda. Pastikan anda telah melakukan pembayaran.'
                    )
                );

                $headers_buyer = array
                (
                    'Authorization: key='.$serverKey,
                    'Content-Type: application/json'
                );

                $fields_buyer = json_encode($fields_buyer);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://fcm.googleapis.com/fcm/send");
                curl_setopt($ch,CURLOPT_HTTPHEADER, $headers_buyer);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_HEADER, FALSE);
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_buyer);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

                $responses = curl_exec($ch);
                curl_close($ch);

                
                $data_notification_buyer = array(
                    'type'                  => 'ORDER_PAYMENT_REJECTED',
                    'sender_customer_id'    => 0,
                    'target_id'             => $order_id,
                    'receiver_customer_id'  => $customer_id,
                    'source'            => 'buyer',
                    'message'               => 'Maaf, kami belum berhasil verifikasi pembayaran anda. Pastikan anda telah melakukan pembayaran.',
                );


                    $insert_notification_buyer = $this->General_model->insert('m_notification', $data_notification_buyer);
                    if ($insert_notification_buyer) {
                        echo ("<script LANGUAGE='JavaScript'>alert('Konfirmasi Pembayaran di Tolak!!'); window.location.href='".base_url('ecommerce')."';</script>");
                    }

                    else
                    {
                        echo ("<script LANGUAGE='JavaScript'>alert('Notifikasi gagal!!'); window.location.href='".base_url('ecommerce')."';</script>");

                    }

            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal memberikan approval!!'); window.location.href='".base_url('ecommerce'.$recipe_id)."';</script>");
            }
        }

    }

    public function detailpayment($customer_id, $order_id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_payment'] = $this->General_model->paymentdetail($order_id);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("ecommerce/detail_payment", $data);
        $this->load->view("template/footer.php", $data);

    }

}
?>