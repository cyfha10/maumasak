<?php

class Masterecom extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Admin_model");
        $this->load->model("Master_model");
        $this->load->model("General_model");
            
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }

        $data['resep_approval'] = $this->Master_model->count_resep_approval();
    }

    public function textsuggest()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_suggest'] = $this->General_model->get('m_text_suggestion');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        
        $this->load->view("template/header.php", $data);
        $this->load->view("masterecom/textsuggest/list", $data);
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
        $this->load->view("masterecom/textsuggest/add", $data);
        $this->load->view("template/footer.php", $data);

    }

    public function act_add()
    {
        $datakuu = array(
                'text_suggestion'   => $this->input->post('text_suggestion'),
                'source_for'           => $this->input->post('source'),
                'is_active'             => $this->input->post('status'),
        );

        $insert = $this->General_model->insert('m_text_suggestion', $datakuu);

        if ($insert) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan text suggestion'); window.location.href='".base_url('masterecom/textsuggest')."';</script>");
        }
        else
        {
            unlink("./upload/".$config['file_name'].'.'.$tipegambar);

            echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan text suggestion!!'); window.location.href='".base_url('masterecom/textsuggest')."';</script>");
        }
    }

    public function edit($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        $data['list_suggest'] = $this->General_model->get_where_one('m_text_suggestion', 'text_suggest_id', $id);

        $this->load->view("template/header.php", $data);
        $this->load->view("masterecom/textsuggest/edit", $data);
        $this->load->view("template/footer.php", $data);

    }

    public function update($id)
    {
        $datakuu = array(
                'text_suggestion'   => $this->input->post('text_suggestion'),
                'source_for'           => $this->input->post('source'),
                'is_active'             => $this->input->post('status'),
        );

        $update = $this->General_model->update('m_text_suggestion', $datakuu, 'text_suggest_id', $id);

        if ($update) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengubah text suggestion'); window.location.href='".base_url('masterecom/textsuggest')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengubah text suggestion!!'); window.location.href='".base_url('masterecom/textsuggest')."';</script>");
        }
    }

    public function delete( $id)
    {
        $delete = $this->General_model->delete('m_text_suggestion','text_suggest_id', $id);

        if ($delete) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data text suggestion'); window.location.href='".base_url('masterecom/textsuggest')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data text suggestion!!'); window.location.href='".base_url('masterecom/textsuggest')."';</script>");
        }

    }


    public function sellerstatus()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_seller'] = $this->General_model->get('m_seller_status');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        
        $this->load->view("template/header.php", $data);
        $this->load->view("masterecom/sellerstatus/list_seller_status", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addsellerstatus()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("masterecom/sellerstatus/addsellerstatus", $data);
        $this->load->view("template/footer.php", $data);

    }

    public function act_addsellerstatus()
    {

        $get_sellerstatus = $this->General_model->get_where_one('m_seller_status', 'seller_status_id', $this->input->post('seller_status_id'));

        $seller_status_id = $get_sellerstatus->seller_status_id;
        
        if ($seller_status_id == '') {

            $datakuu = array(
                'seller_status_id'        => $this->input->post('seller_status_id'),
                'seller_status'           => $this->input->post('seller_status'),
            );

            $insert = $this->General_model->insert('m_seller_status', $datakuu);

            if ($insert) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan Seller Status'); window.location.href='".base_url('masterecom/sellerstatus')."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan Seller Status!!'); window.location.href='".base_url('masterecom/sellerstatus')."';</script>");
            }
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Data Seller Status ID Ada yang Sama!!'); window.location.href='".base_url('masterecom/sellerstatus')."';</script>");
        }



        
    }

    public function editsellerstatus($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        $data['list_seller'] = $this->General_model->get_where_one('m_seller_status', 'seller_status_id', $id);

        $this->load->view("template/header.php", $data);
        $this->load->view("masterecom/sellerstatus/edit_sellerstatus", $data);
        $this->load->view("template/footer.php", $data);

    }

    public function updatesellerstatus($id)
    {

        $get_sellerstatus = $this->General_model->get_where_one('m_seller_status', 'seller_status_id', $this->input->post('seller_status_id'));

        $seller_status_id = $get_sellerstatus->seller_status_id;
        
        if ($seller_status_id == '') {

            $datakuu = array(
                'seller_status_id'        => $this->input->post('seller_status_id'),
                'seller_status'           => $this->input->post('seller_status'),
            );

            $update = $this->General_model->update('m_seller_status', $datakuu, 'seller_status_id', $id);

            if ($update) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengubah Seller Status'); window.location.href='".base_url('masterecom/sellerstatus')."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengubah Seller Status!!'); window.location.href='".base_url('masterecom/sellerstatus')."';</script>");
            }
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Data Seller Status ID Ada yang Sama!!'); window.location.href='".base_url('masterecom/sellerstatus')."';</script>");
        }
    }

    public function deletesellerstatus( $id)
    {
        $delete = $this->General_model->delete('m_seller_status','seller_status_id', $id);

        if ($delete) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data Seller Status'); window.location.href='".base_url('masterecom/sellerstatus')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data Seller Status!!'); window.location.href='".base_url('masterecom/sellerstatus')."';</script>");
        }

    }

    public function withdrawstatus()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_withdraw'] = $this->General_model->get('m_withdraw_status');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        
        $this->load->view("template/header.php", $data);
        $this->load->view("masterecom/withdrawstatus/list_withdrawstatus", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addwithdrawstatus()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("masterecom/withdrawstatus/addwithdrawstatus", $data);
        $this->load->view("template/footer.php", $data);

    }

    public function act_addwithdrawstatus()
    {

        $get_withdrawstatus = $this->General_model->get_where_one('m_withdraw_status', 'withdraw_status_id', $this->input->post('withdraw_status_id'));

        $withdraw_status_id = $get_withdrawstatus->withdraw_status_id;
        
        if ($seller_status_id == '') {

            $datakuu = array(
                'withdraw_status_id'        => $this->input->post('withdraw_status_id'),
                'withdraw_status'           => $this->input->post('withdraw_status'),
                'remark'                    => $this->input->post('remarks'),
            );

            $insert = $this->General_model->insert('m_withdraw_status', $datakuu);

            if ($insert) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan withdraw status'); window.location.href='".base_url('masterecom/withdrawstatus')."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan withdraw status!!'); window.location.href='".base_url('masterecom/addwithdrawstatus')."';</script>");
            }
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Data withdraw status ID Ada yang Sama!!'); window.location.href='".base_url('masterecom/addwithdrawstatus')."';</script>");
        }



        
    }

    public function editwithdrawstatus($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        $data['list_withdraw'] = $this->General_model->get_where_one('m_withdraw_status', 'withdraw_status_id', $id);

        $this->load->view("template/header.php", $data);
        $this->load->view("masterecom/withdrawstatus/edit_withdrawstatus", $data);
        $this->load->view("template/footer.php", $data);

    }

    public function updatewithdrawstatus($id)
    {

        $get_withdrawstatus = $this->General_model->get_where_one('m_withdraw_status', 'withdraw_status_id', $this->input->post('withdraw_status_id'));

        $withdraw_status_id = $get_withdrawstatus->withdraw_status_id;
        
        if ($seller_status_id == '') {

            $datakuu = array(
                'withdraw_status_id'        => $this->input->post('withdraw_status_id'),
                'withdraw_status'           => $this->input->post('withdraw_status'),
                'remark'                    => $this->input->post('remark'),
            );

            $update = $this->General_model->update('m_withdraw_status', $datakuu, 'withdraw_status_id', $id);

            if ($update) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengubah withdraw status'); window.location.href='".base_url('masterecom/withdrawstatus')."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengubah withdraw status!!'); window.location.href='".base_url('masterecom/withdrawstatus')."';</script>");
            }
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Data withdraw status ID Ada yang Sama!!'); window.location.href='".base_url('masterecom/withdrawstatus')."';</script>");
        }
    }

    public function deletewithdrawstatus( $id)
    {
        $delete = $this->General_model->delete('m_withdraw_status','withdraw_status_id', $id);

        if ($delete) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data withdraw status'); window.location.href='".base_url('masterecom/withdrawstatus')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data withdraw status!!'); window.location.href='".base_url('masterecom/withdrawstatus')."';</script>");
        }

    }

    public function orderstatus()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_orderstatus'] = $this->General_model->get('m_order_status');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        
        $this->load->view("template/header.php", $data);
        $this->load->view("masterecom/orderstatus/list_orderstatus", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addorderstatus()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("masterecom/orderstatus/addorderstatus", $data);
        $this->load->view("template/footer.php", $data);

    }

    public function act_addorderstatus()
    {

        $get_orderstatus = $this->General_model->get_where_one('m_order_status', 'order_status_id', $this->input->post('order_status_id'));

        $order_status_id = $get_orderstatus->order_status_id;
        
        if ($order_status_id == '') {

            $datakuu = array(
                'order_status_id'        => $this->input->post('order_status_id'),
                'order_status'           => $this->input->post('order_status'),
                'order_status_seller'    => $this->input->post('orderstatus_seller'),
                'status_alias_buyer'     => $this->input->post('statusalias_buyer'),
                'status_alias_seller'    => $this->input->post('statusalias_seller'),
                'order_status_notes'     => $this->input->post('notes'),
            );

            $insert = $this->General_model->insert('m_order_status', $datakuu);

            if ($insert) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan Order status'); window.location.href='".base_url('masterecom/orderstatus')."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan Order status!!'); window.location.href='".base_url('masterecom/addorderstatus')."';</script>");
            }
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Data Order status ID Ada yang Sama!!'); window.location.href='".base_url('masterecom/orderstatus')."';</script>");
        }
    }

    public function editorderstatus($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        $data['dataorder'] = $this->General_model->get_where_one('m_order_status', 'order_status_id', $id);

        $this->load->view("template/header.php", $data);
        $this->load->view("masterecom/orderstatus/edit_orderstatus", $data);
        $this->load->view("template/footer.php", $data);

    }

    public function updateorderstatus($id)
    {

        $get_withdrawstatus = $this->General_model->get_where_one('m_order_status', 'order_status_id', $this->input->post('order_status_id'));

        $order_status_id = $get_orderstatus->order_status_id;
        
        if ($order_status_id == '') {

            $datakuu = array(
                'order_status_id'        => $this->input->post('order_status_id'),
                'order_status'           => $this->input->post('order_status'),
                'order_status_seller'    => $this->input->post('order_status_seller'),
                'status_alias_buyer'     => $this->input->post('status_alias_buyer'),
                'status_alias_seller'    => $this->input->post('status_alias_seller'),
                'order_status_notes'     => $this->input->post('order_status_notes'),
            );

            $update = $this->General_model->update('m_order_status', $datakuu, 'order_status_id', $id);

            if ($update) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengubah Order status'); window.location.href='".base_url('masterecom/orderstatus')."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengubah Order status!!'); window.location.href='".base_url('masterecom/editorderstatus/'.$id)."';</script>");
            }
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Data Order status ID Ada yang Sama!!'); window.location.href='".base_url('masterecom/orderstatus')."';</script>");
        }
    }

    public function deleteorderstatus( $id)
    {
        $delete = $this->General_model->delete('m_order_status','order_status_id', $id);

        if ($delete) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data Order status'); window.location.href='".base_url('masterecom/orderstatus')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data Order status!!'); window.location.href='".base_url('masterecom/orderstatus')."';</script>");
        }

    }

    public function bank()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_bank'] = $this->General_model->get('m_bank');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        
        $this->load->view("template/header.php", $data);
        $this->load->view("masterecom/bank/list_bank", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addbank()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("masterecom/bank/addbank", $data);
        $this->load->view("template/footer.php", $data);

    }

    public function act_addbank()
    {
        $datakuu = array(
            'bank_code'     => $this->input->post('bank_code'),
            'bank_name'     => $this->input->post('bank_name'),
            'is_llg'        => $this->input->post('is_llg'),
            'is_rtg'        => $this->input->post('is_rtg'),
            'is_onl'        => $this->input->post('is_onl'),
        );

        $insert = $this->General_model->insert('m_bank', $datakuu);

        if ($insert) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan data bank'); window.location.href='".base_url('masterecom/bank')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data bank!!'); window.location.href='".base_url('masterecom/bank')."';</script>");
        }
        
    }

    public function editbank($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        $data['databank'] = $this->General_model->get_where_one('m_bank', 'bank_id', $id);

        $this->load->view("template/header.php", $data);
        $this->load->view("masterecom/bank/edit_bank", $data);
        $this->load->view("template/footer.php", $data);

    }

    public function updatebank($id)
    {

        $get_withdrawstatus = $this->General_model->get_where_one('m_bank', 'bank_code', $this->input->post('bank_code'));

        $bank_code = $get_orderstatus->bank_code;
        
        if ($bank_code == '') {

            $datakuu = array(
                'bank_code'     => $this->input->post('bank_code'),
                'bank_name'     => $this->input->post('bank_name'),
                'is_llg'        => $this->input->post('is_llg'),
                'is_rtg'        => $this->input->post('is_rtg'),
                'is_onl'        => $this->input->post('is_onl'),
            );

            $update = $this->General_model->update('m_bank', $datakuu, 'bank_id', $id);

            if ($update) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengubah data Bank'); window.location.href='".base_url('masterecom/bank')."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengubah data Bank!!'); window.location.href='".base_url('masterecom/editbank/'.$id)."';</script>");
            }
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Data Kode Bank Ada yang Sama!!'); window.location.href='".base_url('masterecom/bank')."';</script>");
        }
    }

    public function deletebank( $id)
    {
        $delete = $this->General_model->delete('m_bank','bank_id', $id);

        if ($delete) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data bank'); window.location.href='".base_url('masterecom/bank')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data bank!!'); window.location.href='".base_url('masterecom/bank')."';</script>");
        }

    }
    



}

?>