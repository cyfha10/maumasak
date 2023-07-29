<?php

class Withdraw extends CI_Controller
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

    public function list()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_withdraw'] = $this->Withdraw_model->get_withdraw();
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("withdraw/list.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function history()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_withdraw'] = $this->Withdraw_model->get_withdraw_history();
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("withdraw/history.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function approval($category, $customer_id, $withdraw_id)
    {
        $getcustomerdetails = $this->Withdraw_model->get_customer_detail($customer_id);

        if ($category == 'approved') {
            $status = 'WT002';
            $datas = array(
                'withdraw_status_id' => $status,
            );

            $updates = $this->General_model->update('tx_withdraw', $datas, 'withdraw_id', $withdraw_id);

            if ($updates) {

                $url = "https://fcm.googleapis.com/fcm/send";  

                $serverKey = "AAAA0q3-9sg:APA91bEEPK68CqlCgPOxj4kyd779ias5bf26Z-paqLGT87XDS1qNVoFdd-UNJSCd16B7bLYctCLQCNsDGPX3W0eNLMqLvfErQ-Ox9zgjMe4IurpKxbow4h9GyYo1TGT846yvyCYf3rc_";          
                $tokenArray = [];
                    foreach ($getcustomerdetails as $usertoken) {
                        $tokenArray[] = $usertoken['firebase_token'];
                    }
                $fields = array (
                    'registration_ids' => array($tokenArray),
                    'data' => array (
                            "date" => date('Y-m-d H:i:s'),
                            "type"=>'WITHDRAW_APPROVAL',
                            "target_id" => $withdraw_id,
                            "title" => 'Maumasak.id',
                            "source" => 'seller',
                            "body" => 'Pengajuan pencairan dana disetujui, dana akan segera ditransfer ke rekening anda'
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
                    'type'                  => 'WITHDRAW_APPROVAL',
                    'sender_customer_id'    => 0,
                    'target_id'             => $withdraw_id,
                    'receiver_customer_id'  => $customer_id,
                    'source'                => 'seller',
                    'message'               => 'Pengajuan pencairan dana disetujui, dana akan segera ditransfer ke rekening anda',
                );

                    $insert_notification_approval = $this->Master_model->insert_notification_approval($data_notification);
                    if ($insert_notification_approval) {
                        echo ("<script LANGUAGE='JavaScript'>alert('Notif Pengajuan pencairan disetujui'); window.location.href='".base_url('withdraw/list')."';</script>");
                    }

                    else
                    {
                        echo ("<script LANGUAGE='JavaScript'>alert('Notif Pengajuan pencairan gagal!!'); window.location.href='".base_url('withdraw/list')."';</script>");

                    }

            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal memberikan approval!!'); window.location.href='".base_url('withdraw/list')."';</script>");
            }
        }

        else if ($category == 'rejected') {
            $status = 'WT003';
            $datas = array(
                'withdraw_status_id' => $status,
            );

            $updatez = $this->General_model->update('tx_withdraw', $datas, 'withdraw_id', $withdraw_id);

            if ($updatez) {

                $url = "https://fcm.googleapis.com/fcm/send";  

                $serverKey = "AAAA0q3-9sg:APA91bEEPK68CqlCgPOxj4kyd779ias5bf26Z-paqLGT87XDS1qNVoFdd-UNJSCd16B7bLYctCLQCNsDGPX3W0eNLMqLvfErQ-Ox9zgjMe4IurpKxbow4h9GyYo1TGT846yvyCYf3rc_";          
                $tokenArray = [];
                    foreach ($getcustomerdetails as $usertoken) {
                        $tokenArray[] = $usertoken['firebase_token'];
                    }
                $fields = array (
                    'registration_ids' => array($tokenArray),
                    'data' => array (
                            "date" => date('Y-m-d H:i:s'),
                            "type"=>'WITHDRAW_REJECTED',
                            "target_id" => $withdraw_id,
                            "title" => 'Maumasak.id',
                            "source" => 'seller',
                            "body" => 'Pengajuan pencairan dana Anda ditolak!!'
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
                    'type'                  => 'WITHDRAW_REJECTED',
                    'sender_customer_id'    => 0,
                    'target_id'             => $withdraw_id,
                    'receiver_customer_id'  => $customer_id,
                    'source'                => 'seller',
                    'message'               => 'Pengajuan pencairan dana Anda ditolak!!',
                );

                    $insert_notification_approval = $this->Master_model->insert_notification_approval($data_notification);
                    if ($insert_notification_approval) {
                        echo ("<script LANGUAGE='JavaScript'>alert('Notif Pengajuan pencairan ditolak'); window.location.href='".base_url('withdraw/list')."';</script>");
                    }

                    else
                    {
                        echo ("<script LANGUAGE='JavaScript'>alert('Notif Pengajuan pencairan gagal!!'); window.location.href='".base_url('withdraw/list')."';</script>");

                    }

            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal memberikan approval!!'); window.location.href='".base_url('withdraw/list')."';</script>");
            }
        }

        else if ($category == 'transfer') {
            
        }

    }

    public function act_transfer()
    {
        $customer_id        = $this->input->post('customer_id');
        $tgl_transfer       = $this->input->post('tgl_transfer');
        $withdraw_id 	    = $this->input->post('withdraw_id');

        $getcustomerdetails = $this->Withdraw_model->get_customer_detail($customer_id);

        $datas = array(
            'withdraw_status_id' => 'WT003',
            'transfer_date' => $tgl_transfer,
        );

        $updatez = $this->General_model->update('tx_withdraw', $datas, 'withdraw_id', $withdraw_id);

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
                        "type"=>'WITHDRAW_TRANSFERED',
                        "target_id" => $customer_id,
                        "title" => 'Maumasak.id',
                        "source" => 'seller',
                        "body" => 'Dana sudah berhasil ditransfer ke rekening anda'
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
                'type'                  => 'WITHDRAW_TRANSFERED',
                'sender_customer_id'    => 0,
                'target_id'             => $withdraw_id,
                'receiver_customer_id'  => $customer_id,
                'source'                => 'seller',
                'message'               => 'Dana sudah berhasil ditransfer ke rekening anda',
            );

                $insert_notification_approval = $this->Master_model->insert_notification_approval($data_notification);
                if ($insert_notification_approval) {
                    echo ("<script LANGUAGE='JavaScript'>alert('Notif Transfer Dana berhasil'); window.location.href='".base_url('withdraw/list')."';</script>");
                }

                else
                {
                    echo ("<script LANGUAGE='JavaScript'>alert('Notif Transfer Dana gagal!!'); window.location.href='".base_url('withdraw/list')."';</script>");

                }

        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal memberikan approval!!'); window.location.href='".base_url('withdraw/list')."';</script>");
        }// else
    }


}