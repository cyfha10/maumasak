<?php

class Trycook extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Admin_model");
        $this->load->model("Master_model");
        $this->load->model("Dashboard_model");
        $this->load->model("General_model");
        $this->load->model("Trycook_model");
        
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }

        $data['resep_approval'] = $this->Master_model->count_resep_approval();
    }

    public function trycookmpasi()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_trycook'] = $this->Trycook_model->get_all_trycook();
        $data['datarecipestatus'] = $this->General_model->get('m_recipe_status');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        

        $this->load->view("template/header.php", $data);
        $this->load->view("trycook/trycook_mpasi.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function trycookrecipe()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_trycook'] = $this->Trycook_model->trycook_recipe();
        $data['datarecipestatus'] = $this->General_model->get('m_recipe_status');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        

        $this->load->view("template/header.php", $data);
        $this->load->view("trycook/trycook_recipe.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function deltryrecipe($id)
    {
        $get_trycook = $this->General_model->get_where_one('m_trycook', 'trycook_id', $id);
        $customer_id = $get_trycook->customer_id;
        $trycook_image = $get_trycook->trycook_image;

        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/recipes/trycook/".$customer_id.'/'.$trycook_image;

        if(file_exists($target_path)) {
            //delete target image
            unlink($target_path);
            
            $trycooks = $this->General_model->delete('m_trycook', 'trycook_id', $id);
            $try_action = $this->General_model->delete('m_trycook_action', 'trycook_id', $id);
            $try_comment = $this->General_model->delete('m_trycook_comment', 'trycook_id', $id);

            if ($trycooks or $try_action or $try_commen) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data trycook'); window.location.href='".base_url('trycook/trycookrecipe')."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data trycook!!'); window.location.href='".base_url('trycook/trycookrecipe')."';</script>");
            }

        }else {

            $trycooks = $this->General_model->delete('m_trycook', 'trycook_id', $id);
            $try_action = $this->General_model->delete('m_trycook_action', 'trycook_id', $id);
            $try_comment = $this->General_model->delete('m_trycook_comment', 'trycook_id', $id);

            if ($trycooks or $try_action or $try_commen) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data trycook'); window.location.href='".base_url('trycook/trycookrecipe')."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data trycook!!'); window.location.href='".base_url('trycook/trycookrecipe')."';</script>");
            }
        }


    }

    public function deltrympasi($id)
    {
        
        $get_trycook = $this->General_model->get_where_one('m_mpasi_trycook', 'mpasi_trycook_id', $id);
        $customer_id = $get_trycook->customer_id;
        $trycook_image = $get_trycook->trycook_image;

        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/mpasi/trycook/".$customer_id.'/'.$trycook_image;

        if(file_exists($target_path)) {
            //delete target image
            unlink($target_path);
            
            $trycooks = $this->General_model->delete('m_mpasi_trycook', 'mpasi_trycook_id', $id);
            $try_action = $this->General_model->delete('m_mpasi_trycook_action', 'mpasi_trycook_id', $id);
            $try_comment = $this->General_model->delete('m_mpasi_trycook_comment', 'mpasi_trycook_id', $id);

            if ($trycooks or $try_action or $try_commen) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data trycook mpasi'); window.location.href='".base_url('trycook/trycookmpasi')."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data trycook mpasi!!'); window.location.href='".base_url('trycook/trycookmpasi')."';</script>");
            }

        }else {
            
            $trycooks = $this->General_model->delete('m_mpasi_trycook', 'mpasi_trycook_id', $id);
            $try_action = $this->General_model->delete('m_mpasi_trycook_action', 'mpasi_trycook_id', $id);
            $try_comment = $this->General_model->delete('m_mpasi_trycook_comment', 'mpasi_trycook_id', $id);

            if ($trycooks or $try_action or $try_commen) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data trycook mpasi'); window.location.href='".base_url('trycook/trycookmpasi')."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data trycook mpasi!!'); window.location.href='".base_url('trycook/trycookmpasi')."';</script>");
            }
        }

    }




}

?>