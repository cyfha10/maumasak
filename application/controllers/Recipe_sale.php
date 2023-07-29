<?php

class Recipe_sale extends CI_Controller
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

    public function recipechoice()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_choice'] = $this->General_model->get_join('m_editor_choice', 'm_recipe', 'm_editor_choice.source_id = m_recipe.recipe_id');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("recipe_sale/list_choice.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function chooserecipe()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_recipe'] = $this->General_model->get_join_where('m_recipe', 'm_customer', 'm_recipe.customer_id = m_customer.customer_id', 'm_recipe.is_commerce_active', '1');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("recipe_sale/chooserecipe.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addchoice($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['row_recipes'] = $this->Master_model->getrecipe_by_id($id);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("recipe_sale/addchoice.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function act_choice($kode)
    {
        $id_admin = $this->session->userdata('id_admin');

        $data= array(
            'source' => 'recipe',
            'source_id' => $kode,
            'sorting' => $this->input->post('sorting'),
            'created_by' => $id_admin,
        );

        $insert_choice = $this->General_model->insert('m_editor_choice', $data);

        if ($insert_choice) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menambah resep jual pilihan'); window.location.href='".base_url('recipe_sale/recipechoice')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal menambah resep jual pilihan!!'); window.location.href='".base_url('recipe_sale/addchoice/'.$kode)."';</script>");
        }
            
    }

    public function editchoice($recipe_id, $choice_id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['row_recipes'] = $this->Master_model->getrecipe_by_id($recipe_id);
        $data['row_rekomen'] = $this->General_model->get_where_one('m_editor_choice', 'editor_choice_id', $choice_id);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("recipe_sale/editchoice.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function choose_recipe()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_recipe'] = $this->General_model->get_join_where('m_recipe', 'm_customer', 'm_recipe.customer_id = m_customer.customer_id', 'm_recipe.is_commerce_active', '1');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("recipe_sale/choose_recipe.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function update_choice($recipe_id, $choice_id)
    {
        $id_admin = $this->session->userdata('id_admin');

        $data= array(
            'source' => 'recipe',
            'source_id' => $recipe_id,
            'sorting' => $this->input->post('sorting'),
            'created_by' => $id_admin,
        );

        $updatechoice = $this->General_model->update('m_editor_choice', $data, 'editor_choice_id', $choice_id);

        if ($updatechoice) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengubah data resep jual pilihan'); window.location.href='".base_url('recipe_sale/recipechoice')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengubah data resep jual pilihan!!'); window.location.href='".base_url('recipe_sale/editchoice/'.$recipe_id.'/'.$choice_id)."';</script>");
        }
            
    }

    public function deletechoice($id)
    {
        $delete = $this->General_model->deletere('m_editor_choice', 'editor_choice_id', $id);

        if ($delete) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data resep jual pilihan'); window.location.href='".base_url('recipe_sale/recipechoice')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data resep jual pilihan!!'); window.location.href='".base_url('recipe_sale/recipechoice/')."';</script>");
        }

    }

    public function listrecipesale()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_recipe'] = $this->General_model->get_join_wheres('m_recipe', 'm_customer', 'm_recipe.customer_id = m_customer.customer_id', 'm_recipe.recipe_status_id = 2 and m_recipe.is_active = 1 and m_recipe.is_commerce_active = 1');
        $data['datarecipestatus'] = $this->Master_model->m_recipe_status();
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        $filter = $this->input->post('filter');

        if ($filter) {
            $recipe_status = $this->input->post('recipe_status');
            $data['filter'] = $recipe_status;
            if ($recipe_status == 'all') {
                $data['list_recipe'] = $this->Master_model->m_recipe_all();
            }
            else
            {
                $data['list_recipe'] = $this->Master_model->m_recipe_join_filter($recipe_status);
            }
        }

        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("recipe_sale/list_recipe.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    // OFFICIAL RECIPE

    public function recipeofficial()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_choice'] = $this->General_model->get_join('m_official_favorite', 'm_recipe', 'm_official_favorite.source_id = m_recipe.recipe_id');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("recipe_sale/recipeofficial.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function chooseofficial()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_recipe'] = $this->General_model->get_join_wheres('m_recipe', 'm_customer', 'm_recipe.customer_id = m_customer.customer_id', 'm_recipe.is_commerce_active = 1 and m_recipe.customer_id = 32');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("recipe_sale/chooseofficial.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addofficial($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['row_recipes'] = $this->Master_model->getrecipe_by_id($id);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("recipe_sale/addofficial.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function act_official($kode)
    {
        $id_admin = $this->session->userdata('id_admin');

        $data= array(
            'source' => 'recipe',
            'source_id' => $kode,
            'sorting' => $this->input->post('sorting'),
            'created_by' => $id_admin,
        );

        $insert_choice = $this->General_model->insert('m_official_favorite', $data);

        if ($insert_choice) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menambah resep jual Official'); window.location.href='".base_url('recipe_sale/recipeofficial')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal menambah resep jual Official!!'); window.location.href='".base_url('recipe_sale/addofficial/'.$kode)."';</script>");
        }
            
    }

    public function editofficial($recipe_id, $official_favorite_id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['row_recipes'] = $this->Master_model->getrecipe_by_id($recipe_id);
        $data['row_rekomen'] = $this->General_model->get_where_one('m_official_favorite', 'official_favorite_id', $official_favorite_id);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("recipe_sale/editofficial.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function choose_official()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_recipe'] = $this->General_model->get_join_where('m_recipe', 'm_customer', 'm_recipe.customer_id = m_customer.customer_id', 'm_recipe.is_commerce_active', '1');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("recipe_sale/choose_official.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function update_official($recipe_id, $official_favorite_id)
    {
        $id_admin = $this->session->userdata('id_admin');

        $data= array(
            'source' => 'recipe',
            'source_id' => $recipe_id,
            'sorting' => $this->input->post('sorting'),
            'created_by' => $id_admin,
        );

        $updatechoice = $this->General_model->update('m_official_favorite', $data, 'official_favorite_id', $official_favorite_id);

        if ($updatechoice) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengubah data resep jual official'); window.location.href='".base_url('recipe_sale/recipeofficial')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengubah data resep jual official!!'); window.location.href='".base_url('recipe_sale/editofficial/'.$recipe_id.'/'.$official_favorite_id)."';</script>");
        }
            
    }

    public function deleteofficial($id)
    {
        $delete = $this->General_model->delete('m_official_favorite', 'official_favorite_id', $id);

        if ($delete) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data resep jual official'); window.location.href='".base_url('recipe_sale/recipeofficial')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data resep jual official!!'); window.location.href='".base_url('recipe_sale/recipeofficial/')."';</script>");
        }

    }

}