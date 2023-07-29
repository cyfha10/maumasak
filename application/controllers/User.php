<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Admin_model");
        $this->load->model("Master_model");
        $this->load->model("General_model");
        $this->load->model("Withdraw_model");
        
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }

        $data['resep_approval'] = $this->Master_model->count_resep_approval();
    }

    public function sellerverif()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_customer'] = $this->General_model->get_one_many_orderby('m_customer', 'seller_status_id', 'SL002', 'customer_id');
        $data['list_status'] = $this->General_model->get('m_seller_status');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        $filter = $this->input->post('filter');
        $data['filter'] = '';
        if ($filter) {
            $status = $this->input->post('status');
            $data['filter'] = $status;
            if ($status == 'all') {
                $data['list_customer'] = $this->General_model->get("m_customer");
            }
            else
            {
                $data['list_customer'] = $this->General_model->get_one_many("m_customer", "seller_status_id", 
                    "$status");
            }
        }
        $this->load->view("template/header.php", $data);
        $this->load->view("users/seller_verif.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function approval($category, $customer_id)
    {
        $getcustomerdetails = $this->Withdraw_model->get_customer_detail($customer_id);

        if ($category == 'approved') {
            $status = 'SL003';
            $datas = array(
                'seller_status_id' => $status,
            );

            $updates = $this->General_model->update('m_customer', $datas, 'customer_id', $customer_id);

            if ($updates) {

                $url = "https://fcm.googleapis.com/fcm/send";  

                $serverKey = "AAAA0q3-9sg:APA91bEEPK68CqlCgPOxj4kyd779ias5bf26Z-paqLGT87XDS1qNVoFdd-UNJSCd16B7bLYctCLQCNsDGPX3W0eNLMqLvfErQ-Ox9zgjMe4IurpKxbow4h9GyYo1TGT846yvyCYf3rc_";          
                $tokenArray = [];
                    foreach ($getcustomerdetails as $usertoken) {
                        $tokenArray = $usertoken['firebase_token'];
                    }
                $fields = array (
                    'registration_ids' => array($tokenArray),
                    'data' => array (
                            "date" => date('Y-m-d H:i:s'),
                            "type"=>'SELLER_VERIFICATION',
                            "target_id" => $customer_id,
                            "title" => 'Maumasak.id',
                            "source" => 'seller',
                            "body" => 'Hore, Verifikasi KTP dan Selfie Anda disetujui'
                    )
                );

                $headers = array
                (
                    'Authorization: key='.$serverKey,
                    'Content-Type: application/json'
                );
                
                $fields = json_encode($fields);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://fcm.googleapis.com/fcm/send");
                curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_HEADER, FALSE);
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

                $responses = curl_exec($ch);
                curl_close($ch);
                
                $data_notification = array(
                    'type'                  => 'SELLER_VERIFICATION',
                    'sender_customer_id'    => 0,
                    'target_id'             => $customer_id,
                    'receiver_customer_id'  => $customer_id,
                    'source'                => 'seller',
                    'message'               => 'Hore, Verifikasi KTP dan Selfie Anda disetujui',
                );

                    $insert_notification_approval = $this->Master_model->insert_notification_approval($data_notification);
                    if ($insert_notification_approval) {
                        echo ("<script LANGUAGE='JavaScript'>alert('Notif verifikasi penjual disetujui'); window.location.href='".base_url('user/sellerverif')."';</script>");
                    }

                    else
                    {
                        echo ("<script LANGUAGE='JavaScript'>alert('Notif verifikasi penjual gagal!!'); window.location.href='".base_url('user/sellerverif')."';</script>");

                    }

            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal memberikan approval!!'); window.location.href='".base_url('user/sellerverif')."';</script>");
            }
        }

        else if ($category == 'rejected') {
            $status = 'SL001';
            $datas = array(
                'seller_status_id' => $status,
            );

            $updatez = $this->General_model->update('m_customer', $datas, 'customer_id', $customer_id);

            if ($updatez) {

                $url = "https://fcm.googleapis.com/fcm/send";  

                $serverKey = "AAAA0q3-9sg:APA91bEEPK68CqlCgPOxj4kyd779ias5bf26Z-paqLGT87XDS1qNVoFdd-UNJSCd16B7bLYctCLQCNsDGPX3W0eNLMqLvfErQ-Ox9zgjMe4IurpKxbow4h9GyYo1TGT846yvyCYf3rc_";          
                $tokenArray = [];
                    foreach ($getcustomerdetails as $usertoken) {
                        $tokenArray = $usertoken['firebase_token'];
                    }
                $fields = array (
                    'registration_ids' => array($tokenArray),
                    'data' => array (
                            "date" => date('Y-m-d H:i:s'),
                            "type"=>'SELLER_REJECTION',
                            "target_id" => $customer_id,
                            "title" => 'Maumasak.id',
                            "source" => 'seller',
                            "body" => 'Maaf, Verifikasi KTP dan Selfie Anda ditolak!!!'
                    )
                );

                $headers = array
                (
                    'Authorization: key='.$serverKey,
                    'Content-Type: application/json'
                );
                
                $fields = json_encode($fields);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://fcm.googleapis.com/fcm/send");
                curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_HEADER, FALSE);
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

                $responses = curl_exec($ch);
                curl_close($ch);
                
                $data_notification = array(
                    'type'                  => 'SELLER_REJECTION',
                    'sender_customer_id'    => 0,
                    'target_id'             => $customer_id,
                    'receiver_customer_id'  => $customer_id,
                    'source'                => 'seller',
                    'message'               => 'Maaf, Verifikasi KTP dan Selfie Anda ditolak!!!',
                );

                    $insert_notification_approval = $this->Master_model->insert_notification_approval($data_notification);
                    if ($insert_notification_approval) {
                        echo ("<script LANGUAGE='JavaScript'>alert('Notif verifikasi ditolak'); window.location.href='".base_url('user/sellerverif')."';</script>");
                    }

                    else
                    {
                        echo ("<script LANGUAGE='JavaScript'>alert('Notif verifikasi gagal!!'); window.location.href='".base_url('user/sellerverif')."';</script>");

                    }

            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal memberikan approval!!'); window.location.href='".base_url('user/sellerverif')."';</script>");
            }
        }

    }


}