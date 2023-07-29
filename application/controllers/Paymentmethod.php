<?php

class Paymentmethod extends CI_Controller
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

    public function index()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_type'] = $this->General_model->get('m_payment_method_type');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        
        $this->load->view("template/header.php", $data);
        $this->load->view("paymentmethod/list", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function deletes($payment_method_type_id)
    {


        $jumlah_method = $this->General_model->count_where('m_payment_method', "payment_method_type_id = '$payment_method_type_id'");

        if ($jumlah_method == 0) {

            $delete_type = $this->General_model->delete('m_payment_method_type','payment_method_type_id', $payment_method_type_id);

            if ($delete_type) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data Payment Method Type'); window.location.href='".base_url('paymentmethod')."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data Payment Method Type'); window.location.href='".base_url('paymentmethod')."';</script>");
            }
        }
        else
        {
            $delete_method = $this->General_model->delete('m_payment_method','payment_method_type_id', $payment_method_type_id);

            if ($delete_method) {
                
                $delete_type = $this->General_model->delete('m_payment_method_type','payment_method_type_id', $payment_method_type_id);

                if ($delete_type) {
                    echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data Payment Method Type'); window.location.href='".base_url('paymentmethod')."';</script>");
                }
                else
                {
                    echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data Payment Method Type'); window.location.href='".base_url('paymentmethod')."';</script>");
                }
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data Payment Method Type'); window.location.href='".base_url('paymentmethod')."';</script>");
            }
        }


        $delete_type = $this->General_model->delete('m_payment_method_type','payment_method_type_id', $payment_method_type_id);

        if ($delete_type) {
            $jumlah_method = $this->General_model->count_where('m_payment_method', 'payment_method_type_id = $payment_method_type_id');
            
            echo $jumlah_method;
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data Payment Method Type'); window.location.href='".base_url('paymentmethod')."';</script>");
        }

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
        $this->load->view("paymentmethod/add", $data);
        $this->load->view("template/footer.php", $data);

    }

    public function act_add()
    {
        $datakuu = array(
                'payment_method_type'   => $this->input->post('tipe'),
                'description'           => $this->input->post('tipe_deskripsi'),
                'sorting'               => $this->input->post('sort'),
                'is_active'             => $this->input->post('status'),
        );

        $insert = $this->General_model->insert('m_payment_method_type', $datakuu);

        if ($insert) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan tipe pembayaran'); window.location.href='".base_url('paymentmethod')."';</script>");
        }
        else
        {
            unlink("./upload/".$config['file_name'].'.'.$tipegambar);

            echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan tipe pembayaran!!'); window.location.href='".base_url('paymentmethod/')."';</script>");
        }
    }

    public function edit($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        $data['list_type'] = $this->General_model->get_where_one('m_payment_method_type', 'payment_method_type_id', $id);

        $this->load->view("template/header.php", $data);
        $this->load->view("paymentmethod/edit", $data);
        $this->load->view("template/footer.php", $data);

    }

    public function update($id)
    {
        $datakuu = array(
                'payment_method_type'   => $this->input->post('tipe'),
                'description'           => $this->input->post('tipe_deskripsi'),
                'sorting'               => $this->input->post('sort'),
                'is_active'             => $this->input->post('status'),
        );

        $update = $this->General_model->update('m_payment_method_type', $datakuu, 'payment_method_type_id', $id);

        if ($update) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengubah tipe pembayaran'); window.location.href='".base_url('paymentmethod')."';</script>");
        }
        else
        {
            unlink("./upload/".$config['file_name'].'.'.$tipegambar);

            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengubah tipe pembayaran!!'); window.location.href='".base_url('paymentmethod/')."';</script>");
        }
    }

    public function detail($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        $data['list_type'] = $this->General_model->get_where_one('m_payment_method_type', 'payment_method_type_id', $id);
        $data['list_method'] = $this->General_model->get_one_many('m_payment_method', 'payment_method_type_id', $id);

        $this->load->view("template/header.php", $data);
        $this->load->view("paymentmethod/detail", $data);
        $this->load->view("template/footer.php", $data);

    }

    public function addmethod($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        $data['list_bank'] = $this->General_model->get('m_bank');
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("paymentmethod/addmethod", $data);
        $this->load->view("template/footer.php", $data);

    }

    public function act_addmethod($payment_method_type_id)
    {

        //upload config => upload ke root server (subdomain)
        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/payment_method/".$customer_id;
        $config = array(
            'upload_path' => $target_path,
            'allowed_types' => "jpg|png|jpeg",
            'max_size' => '0',
            'overwrite'=>true,
            'file_name' => 'payment_photo_'.date('YmdHis')."_".time(),
          );

          //if it's not available, create directory first
          if (!is_dir($target_path)) {
              mkdir($target_path, 0777, TRUE);
          }

        
        $this->load->library('upload', $config);
 
        if ( ! $this->upload->do_upload('upload')){
            $error = array('error' => $this->upload->display_errors());
            //echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url('dashboard')."';</script>");

            echo ("<script LANGUAGE='JavaScript'>window.alert('Cek File Gambar Anda');window.location.href='".base_url('paymentmethod/addmethod/'.$payment_method_type_id)."';</script>");

        }else{

            $data = array('upload_data' => $this->upload->data());
            $path = $data['upload_data']['file_name'];

            // $data = array('upload_data' => $this->upload->data());
            $image = $_FILES['upload']['name'];
            $tipee = $_FILES['upload']['type']; // image/jpeg
            $pecah = explode('/', $tipee);
            $tipegambar = $pecah[1];
            
            if ($tipegambar == 'jpeg') {
                $tipegambar = 'jpg';
            }

            $datakuu = array(
                'payment_method_name'       => $this->input->post('metode'),
                'payment_method_icon'       => $config['file_name'].'.'.$tipegambar,
                'payment_method_type_id'    => $payment_method_type_id,
                'instruction'               => $this->input->post('instruction'),
                'service_fee'               => $this->input->post('fee'),
                'service_fee_type'          => $this->input->post('tipe_fee'),
                'bank_id'                   => $this->input->post('bank'),
                'account_number'            => $this->input->post('norek'),
                'account_name'              => $this->input->post('nama_rek'),
                'branch'                    => $this->input->post('cabang'),
                'is_active'                 => $this->input->post('status'),
            );

            $insert = $this->General_model->insert('m_payment_method', $datakuu);

            if ($insert) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan tipe pembayaran'); window.location.href='".base_url('paymentmethod/detail/'.$payment_method_type_id)."';</script>");
            }
            else
            {
                unlink("./upload/".$config['file_name'].'.'.$tipegambar);

                echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan tipe pembayaran!!'); window.location.href='".base_url('paymentmethod/detail//.$payment_method_type_id')."';</script>");
            }

        }

    }


    public function edit_pay($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        $data['edit_pay'] = $this->General_model->get_where_one('m_payment_method', 'payment_method_id', $id);
        $data['list_bank'] = $this->General_model->get('m_bank');

        $this->load->view("template/header.php", $data);
        $this->load->view("paymentmethod/edit_pay", $data);
        $this->load->view("template/footer.php", $data);

    }

    public function updatepay($payment_method_id)
    {
        $payment_method_type_id    = $this->input->post('payment_method_type_id');

        //upload config => upload ke root server (subdomain)
        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/payment_method/".$customer_id;
        $config = array(
            'upload_path' => $target_path,
            'allowed_types' => "jpg|png|jpeg",
            'max_size' => '0',
            'overwrite'=>true,
            'file_name' => 'payment_photo_'.date('YmdHis')."_".time(),
          );

          //if it's not available, create directory first
          if (!is_dir($target_path)) {
              mkdir($target_path, 0777, TRUE);
          }

        
        $this->load->library('upload', $config);

        if ($this->input->post('upload')) {

            if ( ! $this->upload->do_upload('upload')){
                $error = array('error' => $this->upload->display_errors());
                //echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url('dashboard')."';</script>");

                echo ("<script LANGUAGE='JavaScript'>window.alert('Cek File Gambar Anda');window.location.href='".base_url('paymentmethod/edit_pay/'.$payment_method_id)."';</script>");

            }else{

                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['file_name'];

                // $data = array('upload_data' => $this->upload->data());
                $image = $_FILES['upload']['name'];
                $tipee = $_FILES['upload']['type']; // image/jpeg
                $pecah = explode('/', $tipee);
                $tipegambar = $pecah[1];
                
                if ($tipegambar == 'jpeg') {
                    $tipegambar = 'jpg';
                }

                $datakuu = array(
                    'payment_method_name'       => $this->input->post('metode'),
                    'payment_method_icon'       => $config['file_name'].'.'.$tipegambar,
                    'payment_method_type_id'    => $payment_method_type_id,
                    'instruction'               => $this->input->post('instruction'),
                    'service_fee'               => $this->input->post('fee'),
                    'service_fee_type'          => $this->input->post('tipe_fee'),
                    'bank_id'                   => $this->input->post('bank'),
                    'account_number'            => $this->input->post('norek'),
                    'account_name'              => $this->input->post('nama_rek'),
                    'branch'                    => $this->input->post('cabang'),
                    'is_active'                 => $this->input->post('status'),
                );

                $update = $this->General_model->update('m_payment_method', $datakuu, 'payment_method_id', $payment_method_id);

                if ($update) {
                    echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan tipe pembayaran'); window.location.href='".base_url('paymentmethod/detail/'.$payment_method_type_id)."';</script>");
                }
                else
                {
                    echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan tipe pembayaran'); window.location.href='".base_url('paymentmethod/detail/'.$payment_method_type_id)."';</script>");
                }

            }
        } //if ($this->input->post('upload')) {
        else
        {
            $datakuu = array(
                'payment_method_name'       => $this->input->post('metode'),
                'payment_method_icon'       => $config['file_name'].'.'.$tipegambar,
                'payment_method_type_id'    => $payment_method_type_id,
                'instruction'               => $this->input->post('instruction'),
                'service_fee'               => $this->input->post('fee'),
                'service_fee_type'          => $this->input->post('tipe_fee'),
                'bank_id'                   => $this->input->post('bank'),
                'account_number'            => $this->input->post('norek'),
                'account_name'              => $this->input->post('nama_rek'),
                'branch'                    => $this->input->post('cabang'),
                'is_active'                 => $this->input->post('status'),
            );

            $update = $this->General_model->update('m_payment_method', $datakuu, 'payment_method_id', $payment_method_id);

            if ($update) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan tipe pembayaran'); window.location.href='".base_url('paymentmethod/detail/'.$payment_method_type_id)."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan tipe pembayaran'); window.location.href='".base_url('paymentmethod/detail/'.$payment_method_type_id)."';</script>");
            }
        }

    }


    public function deletepay($payment_method_type_id,$id)
    {
        $delete = $this->General_model->delete('m_payment_method','payment_method_id', $id);

        if ($delete) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data Payment Method'); window.location.href='".base_url('paymentmethod/detail/'.$payment_method_type_id)."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data Payment Method'); window.location.href='".base_url('paymentmethod/detail/'.$payment_method_type_id)."';</script>");
        }

    }




}

?>