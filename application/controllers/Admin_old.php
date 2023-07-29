<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Admin_model");
        $this->load->model("Master_model");
        
        if($this->session->userdata('status') != "login"){
        	redirect(base_url("login"));
        }
    }

    public function index()
    {
    	$email = $this->session->userdata('email');
    	//die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep'] = $this->Master_model->count_resep();
        $data['customer'] = $this->Master_model->count_customer();
        $data['tag'] = $this->Master_model->count_tag();
    	// var_dump($data['admin']);
    	// die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("template/home.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function errors()
    {
    	$email = $this->session->userdata('email');
    	//die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
    	// var_dump($data['admin']);
    	// die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("template/404page.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function listadmin()
    {
    	$email = $this->session->userdata('email');
    	//die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_admin'] = $this->Master_model->m_admin();
    	// var_dump($data['admin']);
    	// die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/list_admin.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addadmin()
    {
    	$email = $this->session->userdata('email');
    	//die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
    	// var_dump($data['admin']);
    	// die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/add_admin.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function act_admin()
    {
    	$id_admin = $this->session->userdata('id_admin');
    	$pass = $this->input->post('pass_id');
    	$repass = $this->input->post('repass_id');

    	if ($pass == $repass) {
    		$data= array(
	            'email' => $this->input->post('email'),
	            'admin_name' => $this->input->post('nama'),
	            'password' => md5($this->input->post('pass')),
	            'role_id' => 1,
	            'is_active' => 1,
	            'created_by' => $id_admin
	        );

	        $input_admin = $this->Master_model->insert_admin($data);
	        if ($input_admin) {
	        	echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan data admin'); window.location.href='".base_url('admin/listadmin')."';</script>");
	        }
	        else
	        {
	        	echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data admin!!'); window.location.href='".base_url('admin/addadmin')."';</script>");
	        }
    	}

    	
    }

    public function edit($id)
    {
    	$email = $this->session->userdata('email');
    	//die($email);
        $data['admin'] 			= $this->Admin_model->data_admin($email);
        $data['row']     	=  $this->Master_model->get_admin($id);

        $this->load->view("template/header.php", $data);
        $this->load->view("admin/edit_admin.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function updateadmin($kode)
    {
    	$pass_old = md5($this->input->post('pass_old'));
    	$pass = $this->input->post('pass_id');
    	$repass = $this->input->post('repass_id');

	    $getdata_admin = $this->Master_model->get_admin($kode);
	    $pass_lama = $getdata_admin->password;

	    if ($pass_old == $pass_lama) {
	    	if ($pass == $repass) {
	    		$data= array(
		            'email' => $this->input->post('email'),
		            'admin_name' => $this->input->post('nama'),
		            'password' => md5($this->input->post('pass')),
		        );

		        $update_admin = $this->Master_model->update($data,$kode);

		        if ($update_admin) {
		        	echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengubah data admin'); window.location.href='".base_url('admin/listadmin')."';</script>");
		        }
		        else
		        {
		        	echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengubah data admin!!'); window.location.href='".base_url('admin/edit/'.$kode)."';</script>");
		        }
	    	} // if ($pass == $repass) {
	    } // if ($pass_old == $pass_lama) {
    	else
    	{
        	echo ("<script LANGUAGE='JavaScript'>alert('Password Lama anda salah!!'); window.location.href='".base_url('admin/edit/'.$kode)."';</script>");
    	}
    }

    public function hapus($id)
    {
		$delete = $this->Master_model->hapus($id);

		if ($delete) {
        	echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data admin'); window.location.href='".base_url('admin/listadmin')."';</script>");
        }
        else
        {
        	echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data admin!!'); window.location.href='".base_url('admin/listadmin/')."';</script>");
        }

	}

	public function listrole()
    {
    	$email = $this->session->userdata('email');
    	//die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_role'] = $this->Master_model->m_role();
    	// var_dump($data['admin']);
    	// die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/list_role.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addrole()
    {
    	$email = $this->session->userdata('email');
    	//die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
    	// var_dump($data['admin']);
    	// die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/add_role.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function act_role()
    {
		$data= array(
	        'role_name' => $this->input->post('nama'),
	        'description' => $this->input->post('deskripsi'),
	    );

	    $input_role = $this->Master_model->insert_role($data);
	    if ($input_role) {
	    	echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan data Role'); window.location.href='".base_url('admin/listrole')."';</script>");
	    }
	    else
	    {
	    	echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data Role!!'); window.location.href='".base_url('admin/addrole')."';</script>");
	    }    	
    }

    public function editrole($id)
    {
    	$email = $this->session->userdata('email');
    	//die($email);
        $data['admin'] 			= $this->Admin_model->data_admin($email);
        $data['row']     	=  $this->Master_model->get_role($id);

        $this->load->view("template/header.php", $data);
        $this->load->view("admin/edit_role.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function updaterole($kode)
    {
    	
		$data= array(
            'role_name' => $this->input->post('nama'),
            'description' => $this->input->post('deskripsi'),
        );

        $update_role = $this->Master_model->updaterole($data,$kode);

        if ($update_role) {
        	echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengubah data Role'); window.location.href='".base_url('admin/listrole')."';</script>");
        }
        else
        {
        	echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengubah data Role!!'); window.location.href='".base_url('admin/editrole/'.$kode)."';</script>");
        }
	    	
    }

    public function hapusrole($id)
    {
		$delete = $this->Master_model->hapusrole($id);

		if ($delete) {
        	echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data Role'); window.location.href='".base_url('admin/listrole')."';</script>");
        }
        else
        {
        	echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data Role!!'); window.location.href='".base_url('admin/listrole/')."';</script>");
        }

	}

	public function listtags()
    {
    	$email = $this->session->userdata('email');
    	//die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_tag'] = $this->Master_model->m_tags();
    	// var_dump($data['admin']);
    	// die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/list_tags.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addtags()
    {
    	$email = $this->session->userdata('email');
    	//die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
    	// var_dump($data['admin']);
    	// die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/add_tag.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function act_tags()
    {
		$data= array(
            'tag_name' => $this->input->post('nama'),
        );

        $input_role = $this->Master_model->insert_tags($data);
        if ($input_role) {
        	echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan data Tag'); window.location.href='".base_url('admin/listtags')."';</script>");
        }
        else
        {
        	echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data Tag!!'); window.location.href='".base_url('admin/addtags')."';</script>");
        }
    }

    public function edittags($id)
    {
    	$email = $this->session->userdata('email');
    	//die($email);
        $data['admin'] 		= $this->Admin_model->data_admin($email);
        $data['row']     	=  $this->Master_model->get_tags($id);

        $this->load->view("template/header.php", $data);
        $this->load->view("admin/edit_tag.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function updatetags($kode)
    {
    	
		$data= array(
            'tag_name' => $this->input->post('nama'),
        );

        $update_name = $this->Master_model->updatetags($data,$kode);

        if ($update_name) {
        	echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengubah data Tag'); window.location.href='".base_url('admin/listtags')."';</script>");
        }
        else
        {
        	echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengubah data Tag!!'); window.location.href='".base_url('admin/edittags/'.$kode)."';</script>");
        }
	    	
    }

    public function hapustags($id)
    {
		$delete = $this->Master_model->hapustags($id);

		if ($delete) {
        	echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data Tag'); window.location.href='".base_url('admin/listtags')."';</script>");
        }
        else
        {
        	echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data Tag!!'); window.location.href='".base_url('admin/listtags/')."';</script>");
        }

	}

	public function listrecipestatus()
    {
    	$email = $this->session->userdata('email');
    	//die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_recipestatus'] = $this->Master_model->m_recipe_status();
    	// var_dump($data['admin']);
    	// die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/list_recipe_status.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addrecipestatus()
    {
    	$email = $this->session->userdata('email');
    	//die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
    	// var_dump($data['admin']);
    	// die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/add_recipestatus.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function act_recipestatus()
    {
		$data= array(
	        'recipe_status' => $this->input->post('nama'),
	        'description' => $this->input->post('deskripsi'),
	    );

	    $input_recipestatus = $this->Master_model->insert_recipestatus($data);
	    if ($input_recipestatus) {
	    	echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan data Status Resep'); window.location.href='".base_url('admin/listrecipestatus')."';</script>");
	    }
	    else
	    {
	    	echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data Status Resep!!'); window.location.href='".base_url('admin/addrecipestatus')."';</script>");
	    }    	
    }

    public function editrecipestatus($id)
    {
    	$email = $this->session->userdata('email');
    	//die($email);
        $data['admin'] 			= $this->Admin_model->data_admin($email);
        $data['row']     	=  $this->Master_model->get_recipestatus($id);

        $this->load->view("template/header.php", $data);
        $this->load->view("admin/edit_recipestatus.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function updaterecipestatus($kode)
    {
    	
		$data= array(
            'recipe_status' => $this->input->post('nama'),
            'description' => $this->input->post('deskripsi'),
        );

        $update_role = $this->Master_model->updaterecipestatus($data,$kode);

        if ($update_role) {
        	echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengubah data Status Resep'); window.location.href='".base_url('admin/listrecipestatus')."';</script>");
        }
        else
        {
        	echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengubah data Status Resep!!'); window.location.href='".base_url('admin/editrecipestatus/'.$kode)."';</script>");
        }
	    	
    }

    public function hapusrecipestatus($id)
    {
		$delete = $this->Master_model->hapusrecipestatus($id);

		if ($delete) {
        	echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data Status Resep'); window.location.href='".base_url('admin/listrecipestatus')."';</script>");
        }
        else
        {
        	echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data Status Resep!!'); window.location.href='".base_url('admin/listrecipestatus/')."';</script>");
        }

	}

	public function listcuisine()
    {
    	$email = $this->session->userdata('email');
    	//die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_cuisine'] = $this->Master_model->m_cuisine();
    	// var_dump($data['admin']);
    	// die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/list_cuisine.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addcuisine()
    {
    	$email = $this->session->userdata('email');
    	//die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
    	// var_dump($data['admin']);
    	// die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/add_cuisine.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function act_cuisine()
    {
        $file = $this->input->post('upload');

        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100000000000000;
        $config['max_width']            = 1024000000000000;
        $config['max_height']           = 76800000000000000000;
        $config['file_name']            = md5('cuisine');

 
        $this->load->library('upload', $config);
 
        if ( ! $this->upload->do_upload('upload')){
            $error = array('error' => $this->upload->display_errors());
            //echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url('dashboard')."';</script>");

            echo ("<script LANGUAGE='JavaScript'>window.alert('Cek File Gambar Anda');window.location.href='".base_url('admin/addcuisine')."';</script>");

        }else{
            $data = array('upload_data' => $this->upload->data());
            $image = $_FILES['upload']['name'];
            $type = $_FILES['upload']['type'];
            //die($image);
            $tipegambar = substr($image,-3);
            
            $data= array(
                'cuisine_name' => $this->input->post('nama'),
                'cuisine_image' => $config['file_name'].'.'.$tipegambar,
                'description' => $this->input->post('deskripsi'),
            );

            $input_cuisine = $this->Master_model->insert_cuisine($data);

            if ($input_cuisine) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan data cuisine'); window.location.href='".base_url('admin/listcuisine')."';</script>");
            }
            else
            {
                unlink("./upload/".$config['file_name'].'.'.$tipegambar);

                echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data cuisine!!'); window.location.href='".base_url('admin/addcuisine')."';</script>");
            }
        }

            	
    }

    public function editcuisine($id)
    {
    	$email = $this->session->userdata('email');
    	//die($email);
        $data['admin'] 		= $this->Admin_model->data_admin($email);
        $data['row']     	=  $this->Master_model->get_cuisine($id);

        $this->load->view("template/header.php", $data);
        $this->load->view("admin/edit_cuisine.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function updatecuisine($kode)
    {
    	$file = $this->input->post('upload');

        
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100000000000000;
            $config['max_width']            = 1024000000000000;
            $config['max_height']           = 76800000000000000000;
            // $config['file_name']            = md5('cuisine');
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);
     
            if ( ! $this->upload->do_upload('upload')){
                $error = array('error' => $this->upload->display_errors());

                echo ("<script LANGUAGE='JavaScript'>window.alert('Cek File Gambar Anda');window.location.href='".base_url('admin/editcuisine'.$kode)."';</script>");

            }else{
                $get_image_cuisine =  $this->Master_model->get_cuisine($kode);
                $nama_file = $get_image_cuisine->cuisine_image;

                if ($nama_file == '' or $nama_file == NULL) {
                    
                }
                else{
                    unlink("upload/".$nama_file);
                }

                
                //unlink(FCPATH.'assets'.DIRECTORY_SEPARATOR.$nama_file);

                //die();

                $data = array('upload_data' => $this->upload->data());
                $images_data = $this->upload->data('file_name');

                $data= array(
                    'cuisine_name' => $this->input->post('nama'),
                    'cuisine_image' => $images_data,
                    'description' => $this->input->post('deskripsi'),
                );

                $update_cuisine = $this->Master_model->updatecuisine($data,$kode);

                if ($update_cuisine) {
                    
                    echo ("<script LANGUAGE='JavaScript'>alert('Berhasil update data cuisine'); window.location.href='".base_url('admin/listcuisine')."';</script>");
                }
                else
                {
                    echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengubah data cuisine!!'); window.location.href='".base_url('admin/editcuisine/'.$kode)."';</script>");
                }

            } // else{ dari if ( ! $this->upload->do_upload('upload')){
	    	
    }

    public function hapuscuisine($id)
    {
        $get_image_cuisine =  $this->Master_model->get_cuisine($id);
        $nama_file = $get_image_cuisine->cuisine_image;

        if ($nama_file == '' or $nama_file == NULL) {
            $delete = $this->Master_model->hapuscuisine($id);

            if ($delete) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data cuisine'); window.location.href='".base_url('admin/listcuisine')."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data cuisine!!'); window.location.href='".base_url('admin/listcuisine/')."';</script>");
            }
        }
        else{
            unlink("./upload/".$nama_file);
            $delete = $this->Master_model->hapuscuisine($id);

            if ($delete) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data cuisine'); window.location.href='".base_url('admin/listcuisine')."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data cuisine!!'); window.location.href='".base_url('admin/listcuisine/')."';</script>");
            }
        }
	}

    public function listrecipe()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_recipe'] = $this->Master_model->m_recipe();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/list_recipe.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function detailrecipe($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin']      = $this->Admin_model->data_admin($email);
        $data['row']        =  $this->Master_model->get_recipes_one($id);

        $this->load->view("template/header.php", $data);
        $this->load->view("admin/detail_recipe.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function listcustomer()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_customer'] = $this->Master_model->m_customer();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/list_customer.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function block($id)
    {
        $data= array(
            'is_active' => 0,
        );

        $updates = $this->Master_model->block_customer($data,$id);

        if ($updates) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil memblokir data customer'); window.location.href='".base_url('admin/listcustomer')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal memblokir data customer'); window.location.href='".base_url('admin/listcustomer/')."';</script>");
        }

    }

    

    


}