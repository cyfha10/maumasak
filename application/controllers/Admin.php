<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Admin_model");
        $this->load->model("Master_model");
        $this->load->model("Dashboard_model");
        $this->load->model("General_model");
        $this->load->model("Mpasi_model");
        
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }

        $data['resep_approval'] = $this->Master_model->count_resep_approval();
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        //die($email);


        $popular_ingredients = $this->Master_model->popular_ingredients();

        // POPULAR INGREDIENTS
        $ingArray = array();
        foreach ($popular_ingredients as $recipe) {
            $ingridients = $recipe['ingredients'];
            $content=utf8_encode($ingridients);
            $result=json_decode($content,true);
            
            foreach ($result as $key => $value) {
              foreach ($value['items'] as $item) {
                  $ingArray[] = trim(strtolower($item['title']));
                  
              } 
            }
        }



        $dataah = array_count_values($ingArray);
        arsort($dataah);
        $this->Master_model->truncate_graph_ing();

        $i=0;
        foreach ($dataah as $key1 => $value1) {
            //echo $key1.'---'.$value1.'<br>';
            $data_input = array('grafik_ingredients' => $key1, 'grafik_jum' => $value1);
            $insert_ingredients = $this->Master_model->insert_ingredients($data_input);

            if(++$i > 9) break;
        }

        //CLOSE POPULAR INGREDIENTS


        // POPULAR INGREDIENTS MPASI

        $popular_ingredient_mpasi = $this->General_model->get('m_mpasi');

        $ingArrayMpasi = array();
        foreach ($popular_ingredient_mpasi as $mpasi_ing) {
            $ingridients_mpasi = $mpasi_ing['ingredients'];
            $content_mpasi = utf8_encode($ingridients_mpasi);
            $result_mpasi = json_decode($content_mpasi,true);
            
            foreach ($result_mpasi as $key_mpasi => $value_mpasi) {
              foreach ($value_mpasi['items'] as $item_mpasi) {
                  $ingArrayMpasi[] = trim(strtolower($item_mpasi['title']));
                  
              } 
            }
        }


        $dataah_mpasi = array_count_values($ingArrayMpasi);
        arsort($dataah_mpasi);
        $this->Mpasi_model->truncate_mpasi_graph_ing();

        $ccc=0;
        foreach ($dataah_mpasi as $key2 => $value2) {
            //echo $key1.'---'.$value1.'<br>';
            $data_inputs = array('grafik_mpasi' => $key2, 'grafik_mpasi_jum' => $value2);
            $insert_ingredient_mpasii = $this->General_model->insert('grafik_ingredients_mpasi', $data_inputs);

            if(++$ccc > 9) break;
        }

        //CLOSE POPULAR INGREDIENTS MPASI

        
        //USER GROWTH
        for ($i=1; $i <= 12 ; $i++) { 
            
            if($i == 1){ $month = 'Jan'; }
            elseif($i == 2){ $month = 'Feb'; }
            elseif($i == 3){ $month = 'Mar'; }
            elseif($i == 4){ $month = 'Apr'; }
            elseif($i == 5){ $month = 'Mei'; }
            elseif($i == 6){ $month = 'Jun'; }
            elseif($i == 7){ $month = 'Jul'; }
            elseif($i == 8){ $month = 'Agt'; }
            elseif($i == 9){ $month = 'Sep'; }
            elseif($i == 10){ $month = 'Okt'; }
            elseif($i == 11){ $month = 'Nov'; }
            elseif($i == 12){ $month = 'Des'; }

            //USER GROWTH";
            $get_count = $this->Master_model->count_users_month($i);
            $jumlah = $get_count->jumlah;
            $update_month = array('grafik_bulan' => $month, 'grafik_jumlah' => $jumlah);
            $data['update_grafik_users'] = $this->Master_model->update_grafik_user($update_month,$i);

            //ORDER ALL";
            $get_count_order = $this->General_model->count_orders_month($i);
            $jumlah_order = $get_count_order->jumlah_order;
            $update_order = array('grafik_order_bulan' => $month, 'grafik_order_jumlah' => $jumlah_order);
            $data['update_grafik_order'] = $this->General_model->update('grafik_order',$update_order,'grafik_order_id',$i);

            //ORDER FINISH";
            $get_count_order_finish = $this->General_model->count_orders_month_finish($i);
            $jumlah_order_finish = $get_count_order_finish->jumlah_order_finish;
            $update_order_finish = array('grafik_order_finish' => $jumlah_order_finish);
            $data['update_grafik_order_finish'] = $this->General_model->update('grafik_order',$update_order_finish,'grafik_order_id',$i);

            //ORDER DELIVERY";
            $get_count_order_delivery = $this->General_model->count_orders_month_delivery($i);
            $jumlah_order_delivery = $get_count_order_delivery->jumlah_order_delivery;
            $update_order_delivery = array('grafik_order_delivery' => $jumlah_order_delivery);
            $data['update_grafik_order_delivery'] = $this->General_model->update('grafik_order',$update_order_delivery,'grafik_order_id',$i);

            //ORDER PROCESS";
            $get_count_order_process = $this->General_model->count_orders_month_process($i);
            $jumlah_order_process = $get_count_order_process->jumlah_order_process;
            $update_order_process = array('grafik_order_proses' => $jumlah_order_process);
            $data['update_grafik_order_process'] = $this->General_model->update('grafik_order',$update_order_process,'grafik_order_id',$i);

            //ORDER NEW";
            $get_count_order_new = $this->General_model->count_orders_month_new($i);
            $jumlah_order_new = $get_count_order_new->jumlah_order_new;
            $update_order_new = array('grafik_order_new' => $jumlah_order_new);
            $data['update_grafik_order_new'] = $this->General_model->update('grafik_order',$update_order_new,'grafik_order_id',$i);

            //ORDER CANCEL";
            $get_count_order_cancel = $this->General_model->count_orders_month_cancel($i);
            $jumlah_order_cancel = $get_count_order_cancel->jumlah_order_cancel;
            $update_order_cancel = array('grafik_order_cancel' => $jumlah_order_cancel);
            $data['update_grafik_order_finish'] = $this->General_model->update('grafik_order',$update_order_cancel,'grafik_order_id',$i);

            // ORDER MPASI

            //ORDER ALL";
            $get_count_order_mpasi = $this->General_model->count_orders_month_mpasi($i);
            $jumlah_order_mpasi = $get_count_order_mpasi->jumlah_order;
            $update_order_mpasi = array('grafik_order_bulan' => $month, 'grafik_order_jumlah' => $jumlah_order_mpasi);
            $data['update_grafik_order_mpasi'] = $this->General_model->update('grafik_order_mpasi',$update_order_mpasi,'grafik_order_id',$i);

            //ORDER FINISH";
            $get_count_order_finish_mpasi = $this->General_model->count_orders_month_finish_mpasi($i);
            $jumlah_order_finish_mpasi = $get_count_order_finish_mpasi->jumlah_order_finish;
            $update_order_finish_mpasi = array('grafik_order_finish' => $jumlah_order_finish_mpasi);
            $data['update_grafik_order_finish_mpasi'] = $this->General_model->update('grafik_order_mpasi',$update_order_finish_mpasi,'grafik_order_id',$i);

            //ORDER DELIVERY";
            $get_count_order_delivery_mpasi = $this->General_model->count_orders_month_delivery_mpasi($i);
            $jumlah_order_delivery = $get_count_order_delivery_mpasi->jumlah_order_delivery;
            $update_order_delivery_mpasi = array('grafik_order_delivery' => $jumlah_order_delivery);
            $data['update_grafik_order_delivery_mpasi'] = $this->General_model->update('grafik_order_mpasi',$update_order_delivery_mpasi,'grafik_order_id',$i);

            //ORDER PROCESS";
            $get_count_order_process_mpasi = $this->General_model->count_orders_month_process_mpasi($i);
            $jumlah_order_process_mpasi = $get_count_order_process_mpasi->jumlah_order_process;
            $update_order_process_mpasi = array('grafik_order_proses' => $jumlah_order_process_mpasi);
            $data['update_grafik_order_process_mpasi'] = $this->General_model->update('grafik_order_mpasi',$update_order_process_mpasi,'grafik_order_id',$i);

            //ORDER NEW";
            $get_count_order_new_mpasi = $this->General_model->count_orders_month_new_mpasi($i);
            $jumlah_order_new_mpasi = $get_count_order_new->jumlah_order_new;
            $update_order_new_mpasi = array('grafik_order_new' => $jumlah_order_new_mpasi);
            $data['update_grafik_order_new_mpasi'] = $this->General_model->update('grafik_order_mpasi',$update_order_new_mpasi,'grafik_order_id',$i);

            //ORDER CANCEL";
            $get_count_order_cancel_mpasi = $this->General_model->count_orders_month_cancel_mpasi($i);
            $jumlah_order_cancel_mpasi = $get_count_order_cancel_mpasi->jumlah_order_cancel;
            $update_order_cancel_mpasi = array('grafik_order_cancel' => $jumlah_order_cancel_mpasi);
            $data['update_grafik_order_finish_mpasi'] = $this->General_model->update('grafik_order_mpasi',$update_order_cancel_mpasi,'grafik_order_id',$i);

            // CLOSE ORDER MPASI


        }


        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep'] = $this->Master_model->count_resep();
        $data['customer'] = $this->Master_model->count_customer();
        $data['customer_active'] = $this->Master_model->count_active_customer();
        $data['tag'] = $this->Master_model->count_tag();
        $data['trycook'] = $this->Master_model->count_trycook();

        // MPASI COUNT
        $data['mpasi'] = $this->Mpasi_model->count_mpasi();
        $data['mpasi_try'] = $this->Mpasi_model->count_mpasi_trycook();


        $data['order'] = $this->General_model->count('tx_order_parent');
        $data['rating_order'] = $this->General_model->count_avg();
        $data['total_trx_order'] = $this->General_model->count_sum_where("grand_total_amount", "tx_order_parent", "recipe_type = 'recipe'");
        $data['total_revenue'] = $this->General_model->count_sum_where("revenue", "tx_order_parent",  "recipe_type = 'recipe'");
        $data['recipe_sale'] = $this->General_model->count_where('m_recipe', 'is_commerce_active = 1');

        //MPASI SALE
        $data['mpasi_sale'] = $this->General_model->count_where('m_mpasi', 'is_commerce_active = 1');
        $data['rating_order_mpasi'] = $this->General_model->count_avg_mpasi();
        $data['total_trx_order_mpasi'] = $this->General_model->count_sum_where("grand_total_amount", "tx_order_parent", "recipe_type = 'mpasi'");
        $data['total_revenue_mpasi'] = $this->General_model->count_sum_where("revenue", "tx_order_parent", "recipe_type = 'mpasi'");
        //CLOSE MPASI SALE

        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        $data['popular_recipe'] = $this->Master_model->popular_recipe();

        // MPASI
        $data['resep_mpasi'] = $this->Master_model->count_mpasi();
        $data['popular_mpasi'] = $this->Mpasi_model->popular_mpasi();

        $month = date('m');
        
        // MONTHLY
        $data['recipe_monthly'] = $this->Master_model->count_recipe_monthly($month);
        $data['try_recipe_monthly'] = $this->Master_model->count_recipe_try_monthly($month);
        $data['mpasi_monthly'] = $this->Mpasi_model->count_mpasi_monthly($month);
        $data['try_mpasi_monthly'] = $this->Mpasi_model->count_mpasi_try_monthly($month);

        //$this->graphic();
        $data['graph'] = $this->Master_model->grafik_user();
        $data['graph_order'] = $this->General_model->get('grafik_order');
        $data['graph_order_finish'] = $this->General_model->get('grafik_order');
        $data['graph_order_delivery'] = $this->General_model->get('grafik_order');
        $data['graph_order_process'] = $this->General_model->get('grafik_order');
        $data['graph_order_new'] = $this->General_model->get('grafik_order');
        $data['graph_order_cancel'] = $this->General_model->get('grafik_order');
        $data['graph_cuisine'] = $this->Master_model->graph_cuisine();
        $data['graph_device'] = $this->Master_model->graph_device();
        $data['graph_ingredient'] = $this->Master_model->graph_ingredients();
        $data['last_activities'] = $this->General_model->get_notification_all();

        // GRAPH MPASI
        $data['graph_mpasi'] = $this->Mpasi_model->graph_category();
        $data['graph_ing_mpasi'] = $this->General_model->get('grafik_ingredients_mpasi');

        $data['popular_recipe_sale'] = $this->General_model->popular_recipe_sale();
        $data['popular_mpasi_sale'] = $this->General_model->popular_mpasi_sale();

        //GRAFIK MPASI SALE
        $data['graph_order_mpasi'] = $this->General_model->get('grafik_order_mpasi');
        $data['graph_order_finish_mpasi'] = $this->General_model->get('grafik_order_mpasi');
        $data['graph_order_delivery_mpasi'] = $this->General_model->get('grafik_order_mpasi');
        $data['graph_order_process_mpasi'] = $this->General_model->get('grafik_order_mpasi');
        $data['graph_order_new_mpasi'] = $this->General_model->get('grafik_order_mpasi');
        $data['graph_order_cancel_mpasi'] = $this->General_model->get('grafik_order_mpasi');
        //CLOSE GRAFIK MPASI SALE

        

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
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/admin/list_admin.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addadmin()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['data_roles'] = $this->Master_model->m_role();
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/admin/add_admin.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function act_admin()
    {
        $id_admin = $this->session->userdata('id_admin');
        $pass = $this->input->post('pass_id');
        $repass = $this->input->post('repass_id');
        $roles = $this->input->post('roles');

        if ($pass == $repass) {
            $data= array(
                'email' => $this->input->post('email'),
                'admin_name' => $this->input->post('nama'),
                'password' => md5($this->input->post('pass')),
                'role_id' => $roles,
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
        $data['admin']          = $this->Admin_model->data_admin($email);
        $data['row']        =  $this->Master_model->get_admin($id);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        $this->load->view("template/header.php", $data);
        $this->load->view("admin/admin/edit_admin.php", $data);
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
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/role/list_role.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addrole()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/role/add_role.php", $data);
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
        $data['admin']          = $this->Admin_model->data_admin($email);
        $data['row']        =  $this->Master_model->get_role($id);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        $this->load->view("template/header.php", $data);
        $this->load->view("admin/role/edit_role.php", $data);
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
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/tag/list_tags.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addtags()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/tag/add_tag.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function act_tags()
    {
        $data= array(
            'tag_name' => '#'.$this->input->post('nama'),
        );

        $get_same_tag = $this->Master_model->get_name_tags('#'.$this->input->post('nama'));
        if ($get_same_tag) {
            echo ("<script LANGUAGE='JavaScript'>alert('Tag tidak boleh ada yang sama!!'); window.location.href='".base_url('admin/addtags/')."';</script>");
        }
        else 
        {
            $input_role = $this->Master_model->insert_tags($data);
            if ($input_role) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan data Tag'); window.location.href='".base_url('admin/listtags')."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data Tag!!'); window.location.href='".base_url('admin/addtags')."';</script>");
            }
        }
    }
    
    public function act_recipetags($id)
    {
        $data= array(
            'tag_name' => '#'.$this->input->post('nama'),
        );

        $get_same_tag = $this->Master_model->get_name_tags('#'.$this->input->post('nama'));
        if ($get_same_tag) {
            echo ("<script LANGUAGE='JavaScript'>alert('Tag tidak boleh ada yang sama!!'); window.location.href='".base_url('admin/createhastag/'.$id)."';</script>");
        }
        else
        {
            $input_role = $this->Master_model->insert_tags($data);
            if ($input_role) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan data Tag'); window.location.href='".base_url('admin/createhastag/'.$id)."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data Tag!!'); window.location.href='".base_url('admin/createhastag/'.$id)."';</script>");
            }
        }

        
    }

    public function edittags($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin']      = $this->Admin_model->data_admin($email);
        $data['row']        =  $this->Master_model->get_tags($id);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        $this->load->view("template/header.php", $data);
        $this->load->view("admin/tag/edit_tag.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function updatetags($kode)
    {
        
        $data= array(
            'tag_name' => '#'.$this->input->post('nama'),
        );

        $get_same_tag = $this->Master_model->get_name_tags('#'.$this->input->post('nama'));
        if ($get_same_tag) {
            echo ("<script LANGUAGE='JavaScript'>alert('Tag tidak boleh ada yang sama!!'); window.location.href='".base_url('admin/edittags/'.$kode)."';</script>");
        }
        else
        {
            $update_name = $this->Master_model->updatetags($data,$kode);

            if ($update_name) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengubah data Tag'); window.location.href='".base_url('admin/listtags')."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengubah data Tag!!'); window.location.href='".base_url('admin/edittags/'.$kode)."';</script>");
            }
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
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/recipe/list_recipe_status.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addrecipestatus()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/recipe/add_recipestatus.php", $data);
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
        $data['admin']          = $this->Admin_model->data_admin($email);
        $data['row']        =  $this->Master_model->get_recipestatus($id);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        $this->load->view("template/header.php", $data);
        $this->load->view("admin/recipe/edit_recipestatus.php", $data);
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
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/cuisine/list_cuisine.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addcuisine()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/cuisine/add_cuisine.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function act_cuisine()
    {
        $file = $this->input->post('upload');

        //upload config => upload ke root server (subdomain)
        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/cuisine";
        $config = array(
            'upload_path' => $target_path,
            'allowed_types' => "jpg|png|jpeg",
            'max_size' => '0',
            'overwrite'=>true,
            'file_name' => 'cuisine_'.date('YmdHis')."_".time(),
          );

          //if it's not available, create directory first
          if (!is_dir($target_path)) {
              mkdir($target_path, 0777, TRUE);
          }

        
        $this->load->library('upload', $config);
        $this->upload->do_upload('upload');
 
        if ( ! $this->upload->do_upload('upload')){
            $error = array('error' => $this->upload->display_errors());
            //echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url('dashboard')."';</script>");

            echo ("<script LANGUAGE='JavaScript'>window.alert('Cek File Gambar Anda');window.location.href='".base_url('admin/addcuisine')."';</script>");

        }else{

            $data = array('upload_data' => $this->upload->data());
            $path = $data['upload_data']['file_name'];

            // $data = array('upload_data' => $this->upload->data());
            $image = $_FILES['upload']['name'];
            $tipee = $_FILES['upload']['type']; // image/jpeg
            $pecah = explode('/', $tipee);
            $tipegambar = $pecah[1];
            
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
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data cuisine!!'); window.location.href='".base_url('admin/addcuisine')."';</script>");
            }
        }

                
    }

    public function editcuisine($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin']      = $this->Admin_model->data_admin($email);
        $data['row']        =  $this->Master_model->get_cuisine($id);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        $this->load->view("template/header.php", $data);
        $this->load->view("admin/cuisine/edit_cuisine.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function updatecuisine($kode)
    {
        $file = $this->input->post('upload');

        //upload config => upload ke root server (subdomain)
        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/cuisine";
        $config = array(
            'upload_path' => $target_path,
            'allowed_types' => "jpg|png|jpeg",
            'max_size' => '0',
            'overwrite'=>true,
            'file_name' => 'cuisine_'.date('YmdHis')."_".time(),
          );
          $this->load->library('upload', $config);

          //if it's not available, create directory first
          if (!is_dir($target_path)) {
              mkdir($target_path, 0777, TRUE);
          }

        
        $this->load->library('upload', $config);
        $this->upload->do_upload('upload');

            // if ( ! $this->upload->do_upload('upload')){
            //     $error = array('error' => $this->upload->display_errors());
            //     //echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url('dashboard')."';</script>");

            //     echo ("<script LANGUAGE='JavaScript'>window.alert('Cek File Gambar Anda');window.location.href='".base_url('admin/addcuisine')."';</script>");

            // }else{
            if (file_exists($_FILES["upload"]["tmp_name"])) {
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['file_name'];

                // $data = array('upload_data' => $this->upload->data());
                $image = $_FILES['upload']['name'];
                $tipee = $_FILES['upload']['type']; // image/jpeg
                $pecah = explode('/', $tipee);
                $tipegambar = $pecah[1];
                
                $data= array(
                    'cuisine_name' => $this->input->post('nama'),
                    'cuisine_image' => $config['file_name'].'.'.$tipegambar,
                    'description' => $this->input->post('deskripsi'),
                );

                $update_cuisine = $this->Master_model->updatecuisine($data, $kode);

                if ($update_cuisine) {
                    echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan data cuisine'); window.location.href='".base_url('admin/listcuisine')."';</script>");
                }
                else
                {
                    $root_pathh = dirname(dirname(dirname(dirname(FILE)))).DIRECTORY_SEPARATOR;
                    $target_pathh = $root_pathh."filestocks/cuisine";

                    //get last profile image
                    $get_cuisine = $this->Master_model->get_cuisine($kode);
                    $cuisine_image = $get_cuisine->cuisine_image;
                    
                    if($cuisine_image != null) {
                        //delete last image
                        $target_filee = $target_pathh."/".$cuisine_image;
                        if(file_exists($target_filee)) {
                            unlink($target_filee);
                        }
                    }

                    echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data cuisine!!'); window.location.href='".base_url('admin/addcuisine')."';</script>");
                }
            }
            else
            {
                
                $data= array(
                    'cuisine_name' => $this->input->post('nama'),
                    'description' => $this->input->post('deskripsi'),
                );

                $update_cuisine = $this->Master_model->update_cuisine($data, $kode);

                if ($update_cuisine) {
                    echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan data cuisine'); window.location.href='".base_url('admin/listcuisine')."';</script>");
                }
                else
                {
                    echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data cuisine!!'); window.location.href='".base_url('admin/addcuisine')."';</script>");
                }
            }
            // }
    }
    
    public function updatecuisine1($kode)
    {
        $file = $this->input->post('upload');

        //upload config => upload ke root server (subdomain)
        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/cuisine";
        $config = array(
            'upload_path' => $target_path,
            'allowed_types' => "jpg|png|jpeg",
            'max_size' => '0',
            'overwrite'=>true,
            'file_name' => 'cuisine_'.date('YmdHis')."_".time(),
          );
          $this->load->library('upload', $config);

          //if it's not available, create directory first
          if (!is_dir($target_path)) {
              mkdir($target_path, 0777, TRUE);
          }

        
        $this->load->library('upload', $config);
        $this->upload->do_upload('upload');

            // }else{
            if (file_exists($_FILES["upload"]["tmp_name"])) {
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['file_name'];

                // $data = array('upload_data' => $this->upload->data());
                $image = $_FILES['upload']['name'];
                $tipee = $_FILES['upload']['type']; // image/jpeg
                $pecah = explode('/', $tipee);
                $tipegambar = $pecah[1];
                
                $data= array(
                    'cuisine_image' => $config['file_name'].'.'.$tipegambar,
                );

                $update_cuisine = $this->Master_model->updatecuisine($data, $kode);

                if ($update_cuisine) {
                    echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan data cuisine'); window.location.href='".base_url('admin/listcuisine')."';</script>");
                }
                else
                {
                    $root_pathh = dirname(dirname(dirname(dirname(FILE)))).DIRECTORY_SEPARATOR;
                    $target_pathh = $root_pathh."filestocks/cuisine";

                    //get last profile image
                    $get_cuisine = $this->Master_model->get_cuisine($kode);
                    $cuisine_image = $get_cuisine->cuisine_image;
                    
                    if($cuisine_image != null) {
                        //delete last image
                        $target_filee = $target_pathh."/".$cuisine_image;
                        if(file_exists($target_filee)) {
                            unlink($target_filee);
                        }
                    }

                    echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data cuisine!!'); window.location.href='".base_url('admin/addcuisine')."';</script>");
                }
            }
            
    }

    public function updatecuisine2($kode)
    {
        $file = $this->input->post('upload');

        //upload config => upload ke root server (subdomain)
        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/cuisine";
        $config = array(
            'upload_path' => $target_path,
            'allowed_types' => "jpg|png|jpeg",
            'max_size' => '0',
            'overwrite'=>true,
            'file_name' => 'cuisine_'.date('YmdHis')."_".time(),
          );
          $this->load->library('upload', $config);

          //if it's not available, create directory first
          if (!is_dir($target_path)) {
              mkdir($target_path, 0777, TRUE);
          }

        
        $this->load->library('upload', $config);
        $this->upload->do_upload('upload');
        
            // }else{
            if (file_exists($_FILES["upload"]["tmp_name"])) {
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['file_name'];

                // $data = array('upload_data' => $this->upload->data());
                $image = $_FILES['upload']['name'];
                $tipee = $_FILES['upload']['type']; // image/jpeg
                $pecah = explode('/', $tipee);
                $tipegambar = $pecah[1];
                
                $data= array(
                    'cuisine_image_2' => $config['file_name'].'.'.$tipegambar,
                );

                $update_cuisine = $this->Master_model->updatecuisine($data, $kode);

                if ($update_cuisine) {
                    echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan data cuisine'); window.location.href='".base_url('admin/listcuisine')."';</script>");
                }
                else
                {
                    $root_pathh = dirname(dirname(dirname(dirname(FILE)))).DIRECTORY_SEPARATOR;
                    $target_pathh = $root_pathh."filestocks/cuisine";

                    //get last profile image
                    $get_cuisine = $this->Master_model->get_cuisine($kode);
                    $cuisine_image = $get_cuisine->cuisine_image;
                    
                    if($cuisine_image != null) {
                        //delete last image
                        $target_filee = $target_pathh."/".$cuisine_image;
                        if(file_exists($target_filee)) {
                            unlink($target_filee);
                        }
                    }

                    echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data cuisine!!'); window.location.href='".base_url('admin/addcuisine')."';</script>");
                }
            }
            
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
        $data['list_recipe'] = $this->Master_model->m_recipe_join();
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
        $this->load->view("admin/recipe/list_recipe.php", $data);
        $this->load->view("template/footer.php", $data);
    }
    
    public function editrecipe()
    {
        $idd = $this->uri->segment(3);
        $id_recipes = $this->uri->segment(4);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);

        $data['customer'] = $this->Master_model->customer_one($idd);

        $data['recipes'] = $this->Master_model->get_recipes_one($id_recipes);

        $customer_id = $data['customer']->customer_id;
        // die($customer_id);

        if (!$customer_id) {
            echo ("<script LANGUAGE='JavaScript'>; window.location.href='".base_url('admin/listrecipe')."';</script>");
        }

        if ($idd) {
            $data['datacuisine'] = $this->Master_model->m_cuisine();
            $data['datacategory'] = $this->Master_model->m_category();
            $data['datasetmenu'] = $this->Master_model->m_set_menu();
            $data['datarecipestatus'] = $this->Master_model->m_recipe_status();
            $data['customer'] = $this->Master_model->customer_one($idd);
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>; window.location.href='".base_url('admin/listrecipe')."';</script>");
        }
        

        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/recipe/edit_recipe.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function updaterecipes()
    {

        $customer_id = $this->input->post('customer_id');
        $recipe_id = $this->input->post('recipe_id');
        $nama_resep = $this->input->post('nama_resep');
        $deskripsiresep = $this->input->post('deskripsiresep');
        $cuisine = $this->input->post('cuisine');
        $kategori = $this->input->post('kategori');
        $setmenu = $this->input->post('setmenu');
        $porsi = $this->input->post('porsi');
        $waktupersiapanbahan = $this->input->post('waktupersiapanbahan');
        $waktupersiapanbumbu = $this->input->post('waktupersiapanbumbu');
        $waktupersiapanmasak = $this->input->post('waktupersiapanmasak');
        $difficult = $this->input->post('difficult');
        $recipe_status = $this->input->post('recipe_status');

        $filesstep = $this->input->post('myPhoto');
        $deskripsistep = $this->input->post('deskripsistep');

        $filesstep1 = $this->input->post('myPhoto1');
        $deskripsistep = $this->input->post('deskripsistep');

        $catatan = $this->input->post('catatan');
        $kalimat_kecil = strtolower($nama_resep);
        $kalimat_new = ucwords($kalimat_kecil);
        $updaterecipez = array(
            'title' => ucfirst($kalimat_new),
            'about' => $deskripsiresep,
            'portion' => $porsi,
            'preparation_time' => $waktupersiapanbahan,
            'inactive_time' => $waktupersiapanbumbu,
            'cooking_time' => $waktupersiapanmasak,
            'difficulties' => $difficult,
            'cuisine_id' => $cuisine,
            'category_id' => $kategori,
            'set_menu_id' => $setmenu,
            'customer_id' => $customer_id,
            'recipe_status_id' => 1
            // 'ingredients' => $data_ingridients,
        );

        $updaterecipezz = $this->Master_model->updaterecipe($updaterecipez, $recipe_id);
        if ($updaterecipezz) {

            // ================================== JSON INGRIDIENT ============================================
                $i = $this->input->post('i');
                //echo(print_r($i).'<br>');

                $jml = count($i);
                //echo $jml.'<br>';
                //$ingridient =array();
                for ($j=2; $j <=$jml+1 ; $j++) { 
                    for ($l=0; $l < count($this->input->post('title1'.$j)) ; $l++) { 
                        //echo count($this->input->post('title1'.$j)).'<br><br>';
                        $data['item'][$j][] = [
                            'title' => ucfirst($this->input->post('title1'.$j)[$l]),
                            'desc' => $this->input->post('desc1'.$j)[$l],
                        ];

                        // echo (print_r($data['item'][$j]));
                        // echo ("$j <br>");
                    }

                    $ingridient[] = [
                        'items'         => $data['item'][$j],
                        'title_item'   => ucwords(strtolower(($this->input->post('headtitle'.$j)))),
                    ];

                    

                }
                //die();

                

                // die(print_r($ingridient));
                //die();
                //var_dump($data['item']);
                //die();
                // die();

                // for ($k=1; $k <= $jml; $k++) { 
                //     $ingridient[] = [
                //         'items'         => $data['item'][$k],
                //         'title_item'   => ucwords(strtolower(($this->input->post('headtitle'.$k)))),
                //     ];

                // }

                $json_ingridient = json_encode($ingridient);

                //die($json_ingridient);

            // ================================== CLOSE JSON INGRIDIENT ======================================
            // ================================== JSON STEP ==================================================
                // STEP IMAGE 1

               
                // STEP ARRAY
                $datakuzz = array();
                
                    $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
                    $target_path = $root_path."filestocks/recipes/".$customer_id;
                    $links = 'https://filestocks.maumasak.id/recipes/'.$customer_id;

                    if (!is_dir($target_path)) 
                    {
                          mkdir($target_path, 0777, TRUE);
                    }

                    $config['upload_path'] = $target_path;
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size']      = '0';
                    $config['overwrite']     = FALSE;
                    $config['file_name']     = $customer_id.'_step_'.date('YmdHis')."_".time();
                    
                    $this->load->library('upload');

                    $files=$_FILES;

                    foreach ($deskripsistep as $row_datazz => $valuezz) {
                        if ($valuezz) {
                            
                            if ($_FILES['userfile'] != ''){
                                // print_r($files['userfile']['name'][$row_datazz]);
                                if ($files['userfile']['name'][$row_datazz] == '') {
                                    $datakuzz[] = array('image' => "", 'img_fulluri' => "", 'remark' => $valuezz, );
                                }
                                else
                                {
                                    $config['file_name']='step_'.$customer_id.'_'.$row_datazz;
                                    $_FILES['userfile']['name']=$files['userfile']['name'][$row_datazz];
                                    $_FILES['userfile']['type']= $files['userfile']['type'][$row_datazz];
                                    $_FILES['userfile']['tmp_name']=$files['userfile']['tmp_name'][$row_datazz];
                                    $_FILES['userfile']['error']=$files['userfile']['error'][$row_datazz];
                                    $_FILES['userfile']['size']=$files['userfile']['size'][$row_datazz];

                                    $image = $_FILES['userfile']['name'];
                                    $tipee = $_FILES['userfile']['type']; // image/jpeg
                                    $pecah = explode('/', $tipee);
                                    $tipegambar = $pecah[1];
                                    //$tipegambar = substr($image,-3);
                                    $datakuzz[] = array('image' => $config['file_name'].'.'.$tipegambar, 'img_fulluri' => $links.$config['file_name'].'.'.$tipegambar, 'remark' => $valuezz, );

                                    //echo $i;
                                    $this->upload->initialize($config);
                                    $this->upload->do_upload();
                                }                                
                            } //if ($_FILES['userfile'] != ''){
                            else
                            {
                                $datakuzz[] = array('image' => NULL, 'img_fulluri' => NULL, 'remark' => $valuezz, );
                            }
                        }
                    } // foreach ($title as $row_data => $values) {
                
                // print_r($datakuzz);
                // die();
                //$items = $item['item'][$dataku];
                $finalzz = array(
                    'steps' => $datakuzz,
                );

                $json_step = json_encode($finalzz);
            // ================================ CLOSE JSON STEP =================================================

                $updaterecipe = array(
                    'ingredients' => $json_ingridient,
                    'steps' => $json_step,
                    'recipe_status_id' => $recipe_status,
                );


                $updaterecipes = $this->Master_model->update_recipe($updaterecipe, $recipe_id);

                if ($updaterecipes) {
                    echo ("<script LANGUAGE='JavaScript'>;window.location.href='".base_url('admin/listrecipe')."';</script>");
                }
            }
    }
    
    public function updatecover($recipe_id)
    {
        $file = $this->input->post('cover_image');
        $customer_id = $this->input->post('customer_id');

        //upload config => upload ke root server (subdomain)
        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/recipes/".$customer_id;
        $config = array(
            'upload_path' => $target_path,
            'allowed_types' => "jpg|png|jpeg",
            'max_size' => '0',
            'overwrite'=>true,
            'file_name' => $customer_id.'_cover_'.date('YmdHis')."_".time(),
          );

          //if it's not available, create directory first
          if (!is_dir($target_path)) {
              mkdir($target_path, 0777, TRUE);
          }

        
        $this->load->library('upload', $config);
 
        if ( ! $this->upload->do_upload('cover_image')){
            $error = array('error' => $this->upload->display_errors());
            //echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url('dashboard')."';</script>");

            echo ("<script LANGUAGE='JavaScript'>window.alert('Cek File Gambar Anda');window.location.href='".base_url('admin/detailrecipe/'.$recipe_id)."';</script>");

        }else{

            $data = array('upload_data' => $this->upload->data());
            $path = $data['upload_data']['file_name'];

            // $data = array('upload_data' => $this->upload->data());
            $image = $_FILES['cover_image']['name'];
            $tipee = $_FILES['cover_image']['type']; // image/jpeg
            $pecah = explode('/', $tipee);
            $tipegambar = $pecah[1];
            
            if ($tipegambar == 'jpeg') {
                $tipegambar = 'jpg';
            }
            $dataku = array(
                'cover_image' => $config['file_name'].'.'.$tipegambar,
                'notes' => $this->input->post('catatan'),
            );

            
            $updaterecipes = $this->Master_model->update_recipe($dataku, $recipe_id);
	    
            if ($updaterecipes) {
                echo ("<script LANGUAGE='JavaScript'>;window.location.href='".base_url('admin/detailrecipe/'.$recipe_id)."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data cuisine!!'); window.location.href='".base_url('admin/detailrecipe/'.$recipe_id)."';</script>");
            }

        }

                
    }

    public function deleterecipe($id)
    {
        $delete = $this->Master_model->hapusresep($id);

        if ($delete) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data resep'); window.location.href='".base_url('admin/listrecipe')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data resep!!'); window.location.href='".base_url('admin/listrecipe/')."';</script>");
        }

    }

    public function pilihpelanggan()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_customer'] = $this->Master_model->m_customer_recipe();
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/recipe/pilihresep.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addrecipe()
    {
        $idd = $this->uri->segment(3);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);

        $data['customer'] = $this->Master_model->customer_one($idd);

        $customer_id = $data['customer']->customer_id;
        // die($customer_id);

        if (!$customer_id) {
            echo ("<script LANGUAGE='JavaScript'>; window.location.href='".base_url('admin/listrecipe')."';</script>");
        }

        if ($idd) {
            $data['datacuisine'] = $this->Master_model->m_cuisine();
            $data['datacategory'] = $this->Master_model->m_category();
            $data['datasetmenu'] = $this->Master_model->m_set_menu();
            $data['datarecipestatus'] = $this->Master_model->m_recipe_status();
            $data['customer'] = $this->Master_model->customer_one($idd);
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>; window.location.href='".base_url('admin/listrecipe')."';</script>");
        }
        

        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/recipe/add_recipe.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function actrecipes()
    {

        $customer_id = $this->input->post('customer_id');
        $nama_resep = $this->input->post('nama_resep');
        $deskripsiresep = $this->input->post('deskripsiresep');
        $cuisine = $this->input->post('cuisine');
        $kategori = $this->input->post('kategori');
        $setmenu = $this->input->post('setmenu');
        $porsi = $this->input->post('porsi');
        $waktupersiapanbahan = $this->input->post('waktupersiapanbahan');
        $waktupersiapanbumbu = $this->input->post('waktupersiapanbumbu');
        $waktupersiapanmasak = $this->input->post('waktupersiapanmasak');
        $difficult = $this->input->post('difficult');
        $recipe_status = $this->input->post('recipe_status');

        $filesstep = $this->input->post('myPhoto');
        $deskripsistep = $this->input->post('deskripsistep');

        $filesstep1 = $this->input->post('myPhoto1');
        $deskripsistep = $this->input->post('deskripsistep');

        $catatan = $this->input->post('catatan');
        $kalimat_kecil = strtolower($nama_resep);
	$kalimat_new = ucwords($kalimat_kecil);
        $saveresep = array(
            'title' => ucfirst($kalimat_new),
            'about' => $deskripsiresep,
            'portion' => $porsi,
            'preparation_time' => $waktupersiapanbahan,
            'inactive_time' => $waktupersiapanbumbu,
            'cooking_time' => $waktupersiapanmasak,
            'difficulties' => $difficult,
            'cuisine_id' => $cuisine,
            'category_id' => $kategori,
            'set_menu_id' => $setmenu,
            'customer_id' => $customer_id,
            'recipe_status_id' => 1
            // 'ingredients' => $data_ingridients,
        );

        $input_recipe = $this->Master_model->insert_recipe($saveresep);
        if ($input_recipe) {
            $getresep = $this->Master_model->getrecipe_orderby();
            $recipe_id = $getresep->recipe_id;

            // ================================== JSON INGRIDIENT ============================================
                $i = $this->input->post('i');
                $jml = count($i);
                for ($j=1; $j <=$jml ; $j++) { 
                    for ($l=0; $l < count($this->input->post('title1'.$j)) ; $l++) { 

                        $data['item'][$j][] = [
                            'title' => ucfirst($this->input->post('title1'.$j)[$l]),
                            'desc' => $this->input->post('desc1'.$j)[$l],
                        ];
                    }
                }
                // die();
                for ($k=1; $k <= $jml; $k++) { 
                    $ingridient[] = [
                        'items'         => $data['item'][$k],
                        'title_item'   => ucwords(strtolower(($this->input->post('headtitle'.$k)))),
                    ];
                }

                $json_ingridient = json_encode($ingridient);
            // ================================== CLOSE JSON INGRIDIENT ======================================
            // ================================== JSON STEP ==================================================
                // STEP IMAGE 1

               
                // STEP ARRAY
                $datakuzz = array();
                
                    $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
                    $target_path = $root_path."filestocks/recipes/".$customer_id;
                    $links = 'https://filestocks.maumasak.id/recipes/'.$customer_id;

                    if (!is_dir($target_path)) 
                    {
                          mkdir($target_path, 0777, TRUE);
                    }

                    $config['upload_path'] = $target_path;
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size']      = '0';
                    $config['overwrite']     = FALSE;
                    $config['file_name']     = $customer_id.'_step_'.date('YmdHis')."_".time();
                    
                    $this->load->library('upload');

                    $files=$_FILES;

                    foreach ($deskripsistep as $row_datazz => $valuezz) {
                        if ($valuezz) {
                            
                            if ($_FILES['userfile'] != ''){
                                // print_r($files['userfile']['name'][$row_datazz]);
                                if ($files['userfile']['name'][$row_datazz] == '') {
                                    $datakuzz[] = array('image' => "", 'img_fulluri' => "", 'remark' => $valuezz, );
                                }
                                else
                                {
                                    $config['file_name']='step_'.$customer_id.'_'.$row_datazz;
                                    $_FILES['userfile']['name']=$files['userfile']['name'][$row_datazz];
                                    $_FILES['userfile']['type']= $files['userfile']['type'][$row_datazz];
                                    $_FILES['userfile']['tmp_name']=$files['userfile']['tmp_name'][$row_datazz];
                                    $_FILES['userfile']['error']=$files['userfile']['error'][$row_datazz];
                                    $_FILES['userfile']['size']=$files['userfile']['size'][$row_datazz];

                                    $image = $_FILES['userfile']['name'];
                                    $tipee = $_FILES['userfile']['type']; // image/jpeg
                                    $pecah = explode('/', $tipee);
                                    $tipegambar = $pecah[1];
                                    //$tipegambar = substr($image,-3);
                                    $datakuzz[] = array('image' => $config['file_name'].'.'.$tipegambar, 'img_fulluri' => $links.$config['file_name'].'.'.$tipegambar, 'remark' => $valuezz, );

                                    //echo $i;
                                    $this->upload->initialize($config);
                                    $this->upload->do_upload();
                                }                                
                            } //if ($_FILES['userfile'] != ''){
                            else
                            {
                                $datakuzz[] = array('image' => NULL, 'img_fulluri' => NULL, 'remark' => $valuezz, );
                            }
                        }
                    } // foreach ($title as $row_data => $values) {
                
                // print_r($datakuzz);
                // die();
                //$items = $item['item'][$dataku];
                $finalzz = array(
                    'steps' => $datakuzz,
                );

                $json_step = json_encode($finalzz);
            // ================================ CLOSE JSON STEP =================================================

                $updaterecipe = array(
                    'ingredients' => $json_ingridient,
                    'steps' => $json_step,
                    'recipe_status_id' => $recipe_status,
                );


                $updaterecipes = $this->Master_model->update_recipe($updaterecipe, $recipe_id);

                if ($updaterecipes) {
                    echo ("<script LANGUAGE='JavaScript'>;window.location.href='".base_url('admin/addrecipe_images/'.$recipe_id)."';</script>");
                }
            }
    }

    public function addrecipe_images($recipe_id)
    {
        $email = $this->session->userdata('email');
        $data['admin'] = $this->Admin_model->data_admin($email);

        $data['recipe'] = $this->Master_model->get_recipes($recipe_id);

        $this->load->view("template/header.php", $data);
        $this->load->view("admin/recipe/add_recipeimages.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function act_recipeimages($recipe_id)
    {
        $file = $this->input->post('cover_image');
        $customer_id = $this->input->post('customer_id');

        //upload config => upload ke root server (subdomain)
        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/recipes/".$customer_id;
        $config = array(
            'upload_path' => $target_path,
            'allowed_types' => "jpg|png|jpeg",
            'max_size' => '0',
            'overwrite'=>true,
            'file_name' => $customer_id.'_cover_'.date('YmdHis')."_".time(),
          );

          //if it's not available, create directory first
          if (!is_dir($target_path)) {
              mkdir($target_path, 0777, TRUE);
          }

        
        $this->load->library('upload', $config);
 
        if ( ! $this->upload->do_upload('cover_image')){
            $error = array('error' => $this->upload->display_errors());
            //echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url('dashboard')."';</script>");

            echo ("<script LANGUAGE='JavaScript'>window.alert('Cek File Gambar Anda');window.location.href='".base_url('admin/addrecipe_images/'.$recipe_id)."';</script>");

        }else{

            $data = array('upload_data' => $this->upload->data());
            $path = $data['upload_data']['file_name'];

            // $data = array('upload_data' => $this->upload->data());
            $image = $_FILES['cover_image']['name'];
            $tipee = $_FILES['cover_image']['type']; // image/jpeg
            $pecah = explode('/', $tipee);
            $tipegambar = $pecah[1];
            
            if ($tipegambar == 'jpeg') {
                $tipegambar = 'jpg';
            }
            $dataku = array(
                'cover_image' => $config['file_name'].'.'.$tipegambar,
                'notes' => $this->input->post('catatan'),
            );

            
            $updaterecipes = $this->Master_model->update_recipe($dataku, $recipe_id);

            if ($updaterecipes) {
                echo ("<script LANGUAGE='JavaScript'>;window.location.href='".base_url('admin/createhastag/'.$recipe_id)."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data cuisine!!'); window.location.href='".base_url('admin/addrecipe_images/'.$recipe_id)."';</script>");
            }

        }

                
    }

    public function detailrecipe($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin']                      = $this->Admin_model->data_admin($email);
        $data['row']                        = $this->Master_model->get_recipes_one($id);
        $data['row_comment']                = $this->Master_model->get_recipekomen_one($id);
        $data['row_rating']                 = $this->Master_model->get_reciperating_one($id);
        $data['row_trycook']                = $this->Master_model->get_recipe_trycook_one($id);
        $data['resep_approval'] 	    = $this->Master_model->count_resep_approval();
	$data['reseptag']                   = $this->Master_model->m_recipe_join_tag($id);
	
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/recipe/detail_recipe.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function createhastag($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_tag'] = $this->Master_model->m_tags_sort();
        $data['row']            =  $this->Master_model->getrecipe_by_id($id);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/recipe/hastag_recipe.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function actindexing()
    {
        $tags_check = $this->input->post('tags_check');
        $recipe_id = $this->input->post('recipe_id');

        $getresep = $this->Master_model->getrecipe_by_id($recipe_id);
        $ingridient = $getresep->ingredients;
        $content=utf8_encode($ingridient);
        $result=json_decode($content,true);

        $judul_resep = $getresep->title;

        if($tags_check!='' || $tags_check!=NULL) {
                $indexing_key = "";
                $indexing_key_ingredients = "";
                $indexing_key_tags = "";

                //CREATE INDEX KEY INGREDIENTS
                
                foreach ($result[0]['items'] as $valueIng) {
                    $indexing_key_ingredients .= metaphone($valueIng['title'])." "; 
                }

                //CREATE INDEX KEY TAGS
                
                        $jumlah_tags = $this->Master_model->get_count_recipetags($recipe_id);
                        if ($jumlah_tags > 0) {
                            $delete_byrecipe_id = $this->Master_model->delete_recipetags_by_recipe_id($recipe_id);
                            if ($delete_byrecipe_id) {
                                foreach ($tags_check as $tagging) {
                                    $tagListing = explode("_", $tagging);
                                    $tag_id = $tagListing[0];
                                    $tag_name = $tagListing[1];
                                    $indexing_key_tags .= metaphone($tag_name)." "; 

                                    //INSERT TO RECIPES TAGS
                                    $data= array(
                                        'tag_id'    => $tag_id,
                                        'recipe_id' => $recipe_id,
                                    );

                                        $insert_recipe_tags = $this->Master_model->insert_recipe_tags($data,$recipe_id);
                                    //CLOSE INSERT TO RECIPES TAGS
                                }
                            }
                            else
                            {
                                foreach ($tags_check as $tagging) {
                                    $tagListing = explode("_", $tagging);
                                    $tag_id = $tagListing[0];
                                    $tag_name = $tagListing[1];
                                    $indexing_key_tags .= metaphone($tag_name)." "; 
                                }

                                //INSERT TO RECIPES TAGS
                                    $data= array(
                                        'tag_id'    => $tag_id,
                                        'recipe_id' => $recipe_id,
                                    );

                                        $insert_recipe_tags = $this->Master_model->insert_recipe_tags($data,$recipe_id);
                                    //CLOSE INSERT TO RECIPES TAGS
                            }
                        }
                        else
                        {
                            foreach ($tags_check as $tagging) {
                                $tagListing = explode("_", $tagging);
                                $tag_id = $tagListing[0];
                                $tag_name = $tagListing[1];
                                $indexing_key_tags .= metaphone($tag_name)." "; 

                                //INSERT TO RECIPES TAGS
                                    $data= array(
                                        'tag_id'    => $tag_id,
                                        'recipe_id' => $recipe_id,
                                    );

                                        $insert_recipe_tags = $this->Master_model->insert_recipe_tags($data,$recipe_id);
                                    //CLOSE INSERT TO RECIPES TAGS
                            }
                        }

                // INDEXING JUDUL     
                $indexing_key_judul = " ";
                $words = explode(" ", $judul_resep);
                foreach ($words as $word) {
                    $indexing_key_judul .= metaphone($word)." "; 
                }
                // CLOSE INDEXING JUDUL
                
                //CLOSE CREATE INDEX KEY TAG


                //PENGGABUNAGN INDEX KEY INGREDIENTS & TAGS
                $indexing_key = $indexing_key_ingredients.' '.$indexing_key_tags.' '.$indexing_key_judul;

                $data= array(
                    'indexing' => $indexing_key
                );

                    $update_indexing = $this->Master_model->update_recipe($data,$recipe_id);

                    if ($update_indexing) {
                        echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyisipkan data Tag'); window.location.href='".base_url('admin/listrecipe')."';</script>");
                    }
                    else
                    {
                        echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyisipkan data Tag!!'); window.location.href='".base_url('admin/edittags/'.$kode)."';</script>");
                    }
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Silahkan pilih tag untuk resep');window.location.href='".base_url('admin/createhastag/'.$recipe_id)."';</script>");
        }
        //die();

        //print_r($tags_check);
         //INDEXING KEY

        

    //CLOSE INDEXING
    }

    public function approval($category, $customer_id, $recipe_id)
    {
        $catatan = $this->input->post('catatan');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        $getcustomerdetail = $this->Master_model->get_customer_detail();

        $getcustomer = $this->Master_model->get_customer_one($customer_id);
        $fullname = $getcustomer->fullname;

        if ($category == 'approved') {
            $status = 2;
            $data= array(
                'recipe_status_id' => $status,
            );

            $updates = $this->Master_model->updateapproval($data,$recipe_id);

            if ($updates) {

                $url = "https://fcm.googleapis.com/fcm/send";  

                $serverKey = "AAAA0q3-9sg:APA91bEEPK68CqlCgPOxj4kyd779ias5bf26Z-paqLGT87XDS1qNVoFdd-UNJSCd16B7bLYctCLQCNsDGPX3W0eNLMqLvfErQ-Ox9zgjMe4IurpKxbow4h9GyYo1TGT846yvyCYf3rc_";          
                $tokenArray = [];
                    foreach ($getcustomerdetail as $usertoken) {
                        $tokenArray[] = $usertoken['firebase_token'];
                    }
                $fields = array (
                    'registration_ids' => array($tokenArray),
                    'data' => array (
                            "date" => date('Y-m-d H:i:s'),
                            "type"=>'NOTIF_RECIPE_PUBLISHED',
                            "target_id" => $recipe_id,
                            "title" => 'Maumasak.id',
                            "body" => 'Hore, resep anda berhasil ditayangkan'
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
                    'type'                  => 'NOTIF_RECIPE_PUBLISHED',
                    'sender_customer_id'    => 0,
                    'target_id'             => $recipe_id,
                    'receiver_customer_id'  => $customer_id,
                    'message'               => 'Hore, resep anda berhasil ditayangkan',
                );

                    $insert_notification_approval = $this->Master_model->insert_notification_approval($data_notification);
                    if ($insert_notification_approval) {
                    	$data_notification = array(
                            'customer_id'   => $customer_id,
                            'point'         => 1,
                            'source'        => 'recipe',
                        );

                            $insert_point = $this->General_model->insert('m_customer_point', $data_notification);
                            if ($insert_point) {
                        	echo ("<script LANGUAGE='JavaScript'>alert('Resep berhasil disetujui '); window.location.href='".base_url('admin/approvalrecipe')."';</script>");
                            }

                            else
                            {
                                echo ("<script LANGUAGE='JavaScript'>alert('Notifikasi gagal!!'); window.location.href='".base_url('admin/approvaldetail/'.$recipe_id)."';</script>");

                            }
                    }

                    else
                    {
                        echo ("<script LANGUAGE='JavaScript'>alert('Notifikasi gagal!!'); window.location.href='".base_url('admin/detailrecipe/'.$recipe_id)."';</script>");

                    }

            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal memberikan approval!!'); window.location.href='".base_url('admin/detailrecipe/'.$recipe_id)."';</script>");
            }
        }
        elseif ($category == 'rejected') {
            $status = 4;
            $data= array(
                'recipe_status_id' => $status,
            );

            $updates = $this->Master_model->updateapproval($data,$recipe_id);

            if ($updates) {
                echo ("<script LANGUAGE='JavaScript'>alert('Resep ditolak!!'); window.location.href='".base_url('admin/approvalrecipe')."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal memberikan approval!!'); window.location.href='".base_url('admin/detailrecipe/'.$recipe_id)."';</script>");
            }
        }
        elseif ($category == 'revision') {
            $status = 3;
            $data= array(
                'notes' => $catatan,
                'recipe_status_id' => $status,
            );

            $updates = $this->Master_model->updateapproval($data,$$recipe_id);

            if ($updates) {

                $url = "https://fcm.googleapis.com/fcm/send";  

                $serverKey = "AAAA0q3-9sg:APA91bEEPK68CqlCgPOxj4kyd779ias5bf26Z-paqLGT87XDS1qNVoFdd-UNJSCd16B7bLYctCLQCNsDGPX3W0eNLMqLvfErQ-Ox9zgjMe4IurpKxbow4h9GyYo1TGT846yvyCYf3rc_";          
                
                $tokenArray = [];
                foreach ($getcustomerdetail as $usertoken) {
                    $tokenArray[] = $usertoken['firebase_token'];
                }

                $fields = array (
                    'registration_ids' => array($tokenArray),
                    'data' => array (
                            "date" => date('Y-m-d H:i:s'),
                            "type"=>'NOTIF_RECIPE_REVISION',
                            "target_id" => $recipe_id,
                            "title" => 'Maumasak.id',
                            "body" => 'Resep anda perlu direvisi'
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


                $data_notifications = array(
                    'type'                  => 'NOTIF_RECIPE_PUBLISHED',
                    'sender_customer_id'    => 0,
                    'target_id'             => $recipe_id,
                    'receiver_customer_id'  => $customer_id,
                    'message'               => 'Resep anda perlu direvisi',
                );

                    $insert_notification_approvals = $this->Master_model->insert_notification_approval($data_notifications);
                    if ($insert_notification_approval) {
                        echo ("<script LANGUAGE='JavaScript'>alert('Resep masih ada yang di revisi.. '); window.location.href='".base_url('admin/approvalrecipe')."';</script>");
                    }

                    else
                    {
                        echo ("<script LANGUAGE='JavaScript'>alert('Notifikasi gagal!!'); window.location.href='".base_url('admin/detailrecipe/'.$recipe_id)."';</script>");

                    }
                // echo ("<script LANGUAGE='JavaScript'>alert('Resep membutuhkan revisi!!'); window.location.href='".base_url('admin/listrecipe')."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal memberikan approval!!'); window.location.href='".base_url('admin/detailrecipe/'.$recipe_id)."';</script>");
            }
        }
        else
        {
                echo ("<script LANGUAGE='JavaScript'>alert('Silahkan pilih approval anda!!'); window.location.href='".base_url('admin/detailrecipe/'.$recipe_id)."';</script>");
        }

        

    }

    public function listcustomer()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_customer'] = $this->Master_model->m_customer();
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/customer/list_customer.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function listcustomerreal()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_customer'] = $this->Master_model->m_customer();
        $data['list_customer'] = $this->Master_model->m_customer_real();
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/customer/list_customer_real.php", $data);
        $this->load->view("template/footer.php", $data);
    }
    
    public function detailcustomer($customer_id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['row'] = $this->Master_model->getcustomer_one($customer_id);
        $data['row_detail'] = $this->Master_model->getcustomer_detail($customer_id);
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/customer/detailcustomer.php", $data);
        $this->load->view("template/footer.php", $data);
    }
    
    public function customerdetail_real($customer_id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['row'] = $this->Master_model->getcustomer_one($customer_id);
        $data['row_detail'] = $this->Master_model->getcustomer_detail($customer_id);

        $data['wallet'] = $this->General_model->get_sum_wallet($customer_id);
        $data['poin'] = $this->General_model->get_sum_poin($customer_id);
        $data['withdraw'] = $this->General_model->get_sum_withdraw($customer_id);
        $data['follower'] = $this->Master_model->getfollower($customer_id);
        $data['following'] = $this->Master_model->getfollowing($customer_id);

        $data['recipe_count'] = $this->Master_model->getrceipe_count_by_customer($customer_id);
        $data['mpasi_count'] = $this->General_model->getmpasi_count_by_customer($customer_id);
        
        $data['recipe_customer'] = $this->Master_model->getrecipe_by_customer_id($customer_id);
        $data['recipe_trycook'] = $this->Master_model->gettrycook_by_customer_id($customer_id);
        $data['recipe_comment'] = $this->General_model->get_join_wheres("m_recipe_comment", "m_recipe", "m_recipe_comment.recipe_id = m_recipe.recipe_id", "m_recipe_comment.customer_id = $customer_id");
        $data['recipe_like'] = $this->General_model->get_join_wheres("m_recipe_action", "m_recipe", "m_recipe_action.recipe_id = m_recipe.recipe_id", "m_recipe_action.customer_id = $customer_id");
        $data['list_orders'] = $this->General_model->get_join_dua("tx_order_parent", "tx_order_detail", "m_recipe", "tx_order_parent.order_id = tx_order_detail.order_id", "tx_order_detail.recipe_id = m_recipe.recipe_id", "tx_order_parent.customer_id = $customer_id");
        $data['list_rating'] = $this->General_model->get_one("tx_order_rating", "customer_id = $customer_id");

        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/customer/customer_detail_real.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function real_recipe($customer_id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['row'] = $this->Master_model->getcustomer_one($customer_id);
        $data['row_detail'] = $this->Master_model->getcustomer_detail($customer_id);

        $data['wallet'] = $this->General_model->get_sum_wallet($customer_id);
        $data['poin'] = $this->General_model->get_sum_poin($customer_id);
        $data['withdraw'] = $this->General_model->get_sum_withdraw($customer_id);
        $data['follower'] = $this->Master_model->getfollower($customer_id);
        $data['following'] = $this->Master_model->getfollowing($customer_id);

        $data['recipe_count'] = $this->Master_model->getrceipe_count_by_customer($customer_id);
        $data['mpasi_count'] = $this->General_model->getmpasi_count_by_customer($customer_id);
        
        $data['recipe_customer'] = $this->Master_model->getrecipe_by_customer_id($customer_id);
        $data['recipe_trycook'] = $this->Master_model->gettrycook_by_customer_id($customer_id);
        $data['recipe_comment'] = $this->General_model->get_join_wheres("m_recipe_comment", "m_recipe", "m_recipe_comment.recipe_id = m_recipe.recipe_id", "m_recipe_comment.customer_id = $customer_id");
        $data['recipe_like'] = $this->General_model->get_join_wheres("m_recipe_action", "m_recipe", "m_recipe_action.recipe_id = m_recipe.recipe_id", "m_recipe_action.customer_id = $customer_id");
        $data['list_orders'] = $this->General_model->get_join_dua("tx_order_parent", "tx_order_detail", "m_recipe", "tx_order_parent.order_id = tx_order_detail.order_id", "tx_order_detail.recipe_id = m_recipe.recipe_id", "tx_order_parent.customer_id = $customer_id and tx_order_parent.recipe_type = 'recipe'");
        $data['list_rating'] = $this->General_model->get_one("tx_order_rating", "customer_id = $customer_id");

        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/customer/real_recipe.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function real_mpasi($customer_id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['row'] = $this->Master_model->getcustomer_one($customer_id);
        $data['row_detail'] = $this->Master_model->getcustomer_detail($customer_id);

        $data['wallet'] = $this->General_model->get_sum_wallet($customer_id);
        $data['poin'] = $this->General_model->get_sum_poin($customer_id);
        $data['withdraw'] = $this->General_model->get_sum_withdraw($customer_id);
        $data['follower'] = $this->Master_model->getfollower($customer_id);
        $data['following'] = $this->Master_model->getfollowing($customer_id);

        $data['recipe_count'] = $this->Master_model->getrceipe_count_by_customer($customer_id);
        $data['mpasi_count'] = $this->General_model->getmpasi_count_by_customer($customer_id);

        $data['recipe_customer'] = $this->General_model->get_one("m_mpasi","customer_id = $customer_id");
        $data['recipe_trycook'] = $this->General_model->gettrycook_by_customer_id($customer_id);
        $data['recipe_comment'] = $this->General_model->get_join_wheres("m_mpasi_comment", "m_mpasi", "m_mpasi_comment.mpasi_id = m_mpasi.mpasi_id", "m_mpasi_comment.customer_id = $customer_id");
        $data['recipe_like'] = $this->General_model->get_join_wheres("m_mpasi_action", "m_mpasi", "m_mpasi_action.mpasi_id = m_mpasi.mpasi_id", "m_mpasi_action.customer_id = $customer_id");
        $data['list_orders'] = $this->General_model->get_join_dua("tx_order_parent", "tx_order_detail", "m_mpasi", "tx_order_parent.order_id = tx_order_detail.order_id", "tx_order_detail.recipe_id = m_mpasi.mpasi_id", "tx_order_parent.customer_id = $customer_id and tx_order_parent.recipe_type = 'mpasi'");
        $data['list_rating'] = $this->General_model->get_one("tx_order_rating", "customer_id = $customer_id");

        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/customer/real_mpasi.php", $data);
        $this->load->view("template/footer.php", $data);
    }
    
    public function detailcustomer_real($customer_id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['row'] = $this->Master_model->getcustomer_one($customer_id);
        $data['row_detail'] = $this->Master_model->getcustomer_detail($customer_id);
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/customer/detailcustomer_real.php", $data);
        $this->load->view("template/footer.php", $data);
    }
    
    public function detailcustomer_anonim($customer_id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['row'] = $this->Master_model->getcustomer_one($customer_id);
        $data['row_detail'] = $this->Master_model->getcustomer_detail($customer_id);
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/customer/detailcustomer_anonim.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function listcustomeranonim()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_customer'] = $this->Master_model->m_customer_anonim();
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/customer/list_customer_anonim.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function editcustomer_anonim($customer_id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        $data['editcustomer'] = $this->Master_model->getcustomer_one($customer_id);
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/customer/edit_customer_anonim.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function updatecustomer_anonim($customer_id)
    {
        $user_id        = $this->input->post('user_id');
        $fullname_id    = $this->input->post('fullname_id');
        $email_id       = $this->input->post('email_id');
        $phone_id       = $this->input->post('phone_id');
        $bio            = $this->input->post('bio');
        $gender         = $this->input->post('gender');
        $birthdate      = $this->input->post('birthdate');
        $status         = $this->input->post('status');

        if ($pass == $repass) {
            $data= array(
                'username'      => $user_id,
                'email'         => $email_id,
                'fullname'      => $fullname_id,
                'phone'         => $phone_id,
                'birthdate'     => $birthdate,
                'gender'        => $gender,
                'bio'           => $bio,
                'is_verified'   => 1,
                'is_active'     => $status,

            );
            // var_dump($data);
            // die();

            $update_customer = $this->Master_model->update_customer($data, $customer_id);
            if ($update_customer) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengubah data customer'); window.location.href='".base_url('admin/listcustomeranonim')."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengubah data customer!!'); window.location.href='".base_url('admin/addcustomer')."';</script>");
            }
        }

        
    }
    
    public function updatephoto($customer_id)
    {
        $file = $this->input->post('photo');

        //upload config => upload ke root server (subdomain)
        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/customer/".$customer_id;
        $config = array(
            'upload_path' => $target_path,
            'allowed_types' => "jpg|png|jpeg",
            'max_size' => '0',
            'overwrite'=>true,
            'file_name' => $customer_id.'_photo_'.date('YmdHis')."_".time(),
          );

          //if it's not available, create directory first
          if (!is_dir($target_path)) {
              mkdir($target_path, 0777, TRUE);
          }

        
        $this->load->library('upload', $config);
 
        if ( ! $this->upload->do_upload('photo')){
            $error = array('error' => $this->upload->display_errors());
            //echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url('dashboard')."';</script>");

            echo ("<script LANGUAGE='JavaScript'>window.alert('Cek File Gambar Anda');window.location.href='".base_url('admin/editcustomer_anonim/'.$customer_id)."';</script>");

        }else{

            $data = array('upload_data' => $this->upload->data());
            $path = $data['upload_data']['file_name'];

            // $data = array('upload_data' => $this->upload->data());
            $image = $_FILES['photo']['name'];
            $tipee = $_FILES['photo']['type']; // image/jpeg
            $pecah = explode('/', $tipee);
            $tipegambar = $pecah[1];
            
            if ($tipegambar == 'jpeg') {
                $tipegambar = 'jpg';
            }
            $dataku = array(
                'profile_image' => $config['file_name'].'.'.$tipegambar,
            );

            
            $updatecustomer = $this->Master_model->update_customer($dataku, $customer_id);
        
            if ($updatecustomer) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengubah photo!!');window.location.href='".base_url('admin/editcustomer_anonim/'.$customer_id)."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengubah photo!!'); window.location.href='".base_url('admin/editcustomer_anonim/'.$customer_id)."';</script>");
            }

        }

                
    }

    public function addcustomer()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/customer/add_customer.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function act_customer()
    {
        $user_id        = $this->input->post('user_id');
        $fullname_id    = $this->input->post('fullname_id');
        $pass_id        = $this->input->post('pass_id');
        $email_id       = $this->input->post('email_id');
        $phone_id       = $this->input->post('phone_id');
        $bio            = $this->input->post('bio');
        $gender         = $this->input->post('gender');
        $birthdate      = $this->input->post('birthdate');
        $status         = $this->input->post('status');

        if ($pass == $repass) {
            $data= array(
                'username'      => $user_id,
                'email'         => $email_id,
                'password'      => '',
                'fullname'      => $fullname_id,
                'phone'         => $phone_id,
                'birthdate'     => $birthdate,
                'gender'        => $gender,
                'bio'           => $bio,
                'customer_type' => 'ANONIM',
                'is_verified'   => 1,
                'is_active'     => $status,

            );
            // var_dump($data);
            // die();

            $input_customer = $this->Master_model->insert_customer($data);
            if ($input_customer) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan data customer'); window.location.href='".base_url('admin/listcustomeranonim')."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data customer!!'); window.location.href='".base_url('admin/addcustomer')."';</script>");
            }
        }

        
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

    public function deletecomment($id)
    {
        $delete = $this->Master_model->hapuskomen($id);

        if ($delete) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data komentar'); window.location.href='".base_url('admin/listrecipe')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data komentar!!'); window.location.href='".base_url('admin/listrecipe/')."';</script>");
        }

    }

    public function deleterating($id)
    {
        $delete = $this->Master_model->hapusrating($id);

        if ($delete) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data rating'); window.location.href='".base_url('admin/listrecipe')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data rating!!'); window.location.href='".base_url('admin/listrecipe/')."';</script>");
        }

    }
    
    public function delete_trycook($id)
    {
        $delete = $this->Master_model->hapus_trycook($id);
        $delete_comment_try = $this->Master_model->hapus_comment_trycook($id);

        if ($delete and $delete_comment_try) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data trycook'); window.location.href='".base_url('admin/listrecipe')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data trycook!!'); window.location.href='".base_url('admin/listrecipe/')."';</script>");
        }

    }

    public function deletetry_comment($id)
    {
        $delete = $this->Master_model->hapus_trycook_comment($id);

        if ($delete) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus komentar trycook'); window.location.href='".base_url('admin/listrecipe')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus komentar trycook!!'); window.location.href='".base_url('admin/listrecipe/')."';</script>");
        }

    }

    public function listkategori()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_kategori'] = $this->Master_model->m_category();
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/kategori/list_kategori.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addcategory()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/kategori/add_category.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function act_category()
    {
        $file = $this->input->post('upload');
        $category_name = $this->input->post('category_name');
        $namafiles = str_replace(' ', '', $category_name);

        //upload config => upload ke root server (subdomain)
        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/category";
        $config = array(
            'upload_path' => $target_path,
            'allowed_types' => "jpg|png|jpeg",
            'max_size' => '0',
            'overwrite'=>true,
            'file_name' => $namafiles,
          );
          $this->load->library('upload', $config);

          //if it's not available, create directory first
          if (!is_dir($target_path)) {
              mkdir($target_path, 0777, TRUE);
          }

        
        $this->load->library('upload', $config);
 
        // if ( ! $this->upload->do_upload('upload')){
        //     $error = array('error' => $this->upload->display_errors());
        //     //echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url('dashboard')."';</script>");

        //     echo ("<script LANGUAGE='JavaScript'>window.alert('Cek File Gambar Anda');window.location.href='".base_url('admin/addcuisine')."';</script>");

        // }else{

            $data = array('upload_data' => $this->upload->data());
            $path = $data['upload_data']['file_name'];

            // $data = array('upload_data' => $this->upload->data());
            $image = $_FILES['upload']['name'];
            $tipee = $_FILES['upload']['type']; // image/jpeg
            $pecah = explode('/', $tipee);
            $tipegambar = $pecah[1];
            
            $data= array(
                'category_name' => $this->input->post('category_name'),
                'category_image' => $config['file_name'].'.'.$tipegambar,
            );

            $input_category = $this->Master_model->insert_category($data);

            if ($input_category) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan data kategori'); window.location.href='".base_url('admin/listkategori')."';</script>");
            }
            else
            {
                unlink("./upload/".$config['file_name'].'.'.$tipegambar);

                echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data kategori!!'); window.location.href='".base_url('admin/addcategory')."';</script>");
            }
        // }
                
    }

    public function editkategori($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin']      = $this->Admin_model->data_admin($email);
        $data['row']        =  $this->Master_model->get_category($id);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        $this->load->view("template/header.php", $data);
        $this->load->view("admin/kategori/edit_category.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function updatecategory($kode)
    {
        $file = $this->input->post('upload');

        $category_name = $this->input->post('category_name');
        $namafiles = str_replace(' ', '', $category_name);

        //upload config => upload ke root server (subdomain)
        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/category";
        $config = array(
            'upload_path' => $target_path,
            'allowed_types' => "jpg|png|jpeg",
            'max_size' => '0',
            'overwrite'=>true,
            'file_name' => $namafiles,
          );
          $this->load->library('upload', $config);

          //if it's not available, create directory first
          if (!is_dir($target_path)) {
              mkdir($target_path, 0777, TRUE);
          }

        
        $this->load->library('upload', $config);

            // if ( ! $this->upload->do_upload('upload')){
            //     $error = array('error' => $this->upload->display_errors());
            //     //echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url('dashboard')."';</script>");

            //     echo ("<script LANGUAGE='JavaScript'>window.alert('Cek File Gambar Anda');window.location.href='".base_url('admin/addcuisine')."';</script>");

            // }else{

                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['file_name'];

                // $data = array('upload_data' => $this->upload->data());
                $image = $_FILES['upload']['name'];
	        $tipee = $_FILES['upload']['type']; // image/jpeg
	        $pecah = explode('/', $tipee);
	        $tipegambar = $pecah[1];
                
                $data= array(
                    'category_name' => $this->input->post('category_name'),
                    'category_image' => $config['file_name'].'.'.$tipegambar,
                    'is_active' => $this->input->post('status'),
                );

                $update_category = $this->Master_model->update_category($data, $kode);

                if ($update_category) {
                    echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan data kategori'); window.location.href='".base_url('admin/listkategori')."';</script>");
                }
                else
                {
                    unlink("./upload/".$config['file_name'].'.'.$tipegambar);

                    echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data kategori!!'); window.location.href='".base_url('admin/addcategory')."';</script>");
                }
            // }
    }

    public function listsetmenu()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_setmenu'] = $this->Master_model->m_set_menu();
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/setmenu/list_setmenu.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addsetmenu()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/setmenu/add_setmenu.php", $data);
        $this->load->view("template/footer.php", $data);
    }
        
    public function act_setmenu()
    {
        $file = $this->input->post('upload');

        //upload config => upload ke root server (subdomain)
        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/set_menu";

        $getbanner = $this->Master_model->get_setmenu_orderby();
        $set_menu_id = $getbanner->set_menu_id;

        $set_menu_id = $set_menu_id + 1;

        $config = array(
            'upload_path' => $target_path,
            'allowed_types' => "jpg|png|jpeg",
            'max_size' => '0',
            'overwrite'=>true,
            'file_name' => 'set_menu'.'_'.$set_menu_id,
          );
          $this->load->library('upload', $config);

          //if it's not available, create directory first
          if (!is_dir($target_path)) {
              mkdir($target_path, 0777, TRUE);
          }

        
        $this->load->library('upload', $config);
        $this->upload->do_upload('upload');

            if (! file_exists($_FILES["upload"]["tmp_name"])) {
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['file_name'];

                $image = $_FILES['upload']['name'];
                $tipee = $_FILES['upload']['type']; // image/jpeg
                $pecah = explode('/', $tipee);
                $tipegambar = $pecah[1];
                
                $datakuu = array(
                        'set_menu'          => $this->input->post('setmenu_name'),
                        'set_menu_image'    => $config['file_name'].'.'.$tipegambar,
                );

                $input_setmenu = $this->Master_model->insert_setmenu($datakuu);

                if ($input_setmenu) {
                    echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan Set Menu'); window.location.href='".base_url('admin/listsetmenu')."';</script>");
                }
                else
                {
                    unlink("./upload/".$config['file_name'].'.'.$tipegambar);

                    echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan Set Menu!!'); window.location.href='".base_url('admin/editsetmenu/'.$kode)."';</script>");
                }
            }
            else
            {
                $datakuuu = array(
                        'set_menu'          => $this->input->post('setmenu_name'),
                );

                $input_setmenuu = $this->Master_model->insert_setmenu($datakuuu);

                if ($input_setmenuu) {
                    echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan Set Menu'); window.location.href='".base_url('admin/listsetmenu')."';</script>");
                }
                else
                {
                    unlink("./upload/".$config['file_name'].'.'.$tipegambar);

                    echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan Set Menu!!'); window.location.href='".base_url('admin/editsetmenu/'.$kode)."';</script>");
                }
            }
        
                
    }

    public function editsetmenu($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin']      = $this->Admin_model->data_admin($email);
        $data['row']        =  $this->Master_model->get_setmenu($id);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        $this->load->view("template/header.php", $data);
        $this->load->view("admin/setmenu/edit_setmenu.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function updatesetmenu($kode)
    {
        $file = $this->input->post('upload');

        //upload config => upload ke root server (subdomain)
        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/setmenu";

        $getsetmenu = $this->Master_model->get_setmenu($kode);
        $set_menu_id = $getsetmenu->set_menu_id;

        $set_menu_idd = $set_menu_id + 1;

        $config = array(
            'upload_path' => $target_path,
            'allowed_types' => "jpg|png|jpeg",
            'max_size' => '0',
            'overwrite'=>true,
            'file_name' => 'setmenu'.'_'.$set_menu_idd.'_'.date('YmdHis')."_".time(),
          );

          //if it's not available, create directory first
          if (!is_dir($target_path)) {
              mkdir($target_path, 0777, TRUE);
          }

        
        $this->load->library('upload', $config);
        $this->upload->do_upload('upload');
        
            // Get Image Dimension
            $fileinfo = @getimagesize($_FILES["upload"]["file_name"]);
            $width = $fileinfo[0];
            $height = $fileinfo[1];
            
            if (file_exists($_FILES["upload"]["tmp_name"])) {                
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['file_name'];

                $image = $_FILES['upload']['name'];
                $tipee = $_FILES['upload']['type']; // image/jpeg
                $pecah = explode('/', $tipee);
                $tipegambar = $pecah[1];
                
                $datakuu = array(
                        'set_menu' => $this->input->post('menu_name'),
                        'set_menu_image' => $config['file_name'].'.'.$tipegambar,
                );

                $updatesetmenu = $this->Master_model->updatesetmenu($datakuu, $kode);

                if ($updatesetmenu) {
                    echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan Set Menu'); window.location.href='".base_url('admin/listsetmenu')."';</script>");
                }
                else
                {
                    echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan Set Menu!!'); window.location.href='".base_url('admin/editsetmenu/'.$kode)."';</script>");
                }
            }
            else
            {
                $datakuuz = array(
                        'set_menu' => $this->input->post('menu_name'),
                );

                $updatesetmenu = $this->Master_model->updatesetmenu($datakuu, $kode);

                if ($updatesetmenu) {
                    echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan Set Menu'); window.location.href='".base_url('admin/listsetmenu')."';</script>");
                }
                else
                {
                    unlink("./upload/".$config['file_name'].'.'.$tipegambar);

                    echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan Set Menu!!'); window.location.href='".base_url('admin/editsetmenu/'.$kode)."';</script>");
                }
            }
            
    }


    public function listarticle()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_artikel'] = $this->Master_model->m_article();
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/artikel/list_artikel.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addarticle($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['customer'] = $this->Master_model->customer_one($id);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/artikel/add_article.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function actarticle()
    {
        $file = $this->input->post('upload');
        $judul = $this->input->post('judul');
        $customer_id = $this->input->post('customer_id');
        $namafiles = str_replace(' ', '', $judul);

        $data= array(
            'title' => $this->input->post('judul'),
            'customer_id' => $this->input->post('customer_id'),
            'content' => $this->input->post('isian'),
        );

        $input_artikel = $this->Master_model->insert_article($data);

        if ($input_artikel) {
            $getarticle = $this->Master_model->get_article_orderby();
            $article_id = $getarticle->article_id;

            //upload config => upload ke root server (subdomain)
            $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
            $target_path = $root_path."filestocks/articles/".$customer_id;
            $config = array(
                'upload_path' => $target_path,
                'allowed_types' => "jpg|png|jpeg",
                'max_size' => '0',
                'overwrite'=>true,
                'file_name' => $customer_id.'_article_'.date('YmdHis')."_".time(),
              );
              $this->load->library('upload', $config);

              //if it's not available, create directory first
              if (!is_dir($target_path)) {
                  mkdir($target_path, 0777, TRUE);
              }

            
            $this->load->library('upload', $config);
            $this->upload->do_upload('upload');
            // if ( ! $this->upload->do_upload('upload')){
            //     $error = array('error' => $this->upload->display_errors());
            //     //echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url('dashboard')."';</script>");

            //     echo ("<script LANGUAGE='JavaScript'>window.alert('Cek File Gambar Anda');window.location.href='".base_url('admin/addcuisine')."';</script>");

            // }else{

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
                
                $update_article = array(
                    'article_image' => $config['file_name'].'.'.$tipegambar,
                );

                $update_articles = $this->Master_model->updatearticle($update_article, $article_id);

                
                if ($update_articles) {
                    echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan data artikel'); window.location.href='".base_url('admin/listarticle')."';</script>");
                }
                else
                {
                    unlink("./upload/".$config['file_name'].'.'.$tipegambar);

                    echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data artikel!!'); window.location.href='".base_url('admin/addarticle')."';</script>");
                }
        }
        
                
    }

    public function editartikel($article_id, $customer_id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin']      = $this->Admin_model->data_admin($email);
        $data['row']        =  $this->Master_model->get_article($article_id);
        $data['customer'] = $this->Master_model->customer_one($customer_id);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        $this->load->view("template/header.php", $data);
        $this->load->view("admin/artikel/edit_article.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function choosecustomers()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_customer'] = $this->Master_model->choosecustomer();
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/choosecustomers.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function updatearticle($article_id, $customer_id)
    {
        $file = $this->input->post('upload');

        //upload config => upload ke root server (subdomain)
        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/articles/".$customer_id;
        $config = array(
            'upload_path' => $target_path,
            'allowed_types' => "jpg|png|jpeg",
            'max_size' => '0',
            'overwrite'=>true,
            'file_name' => $customer_id.'_article_'.date('YmdHis')."_".time(),
          );
          $this->load->library('upload', $config);

          //if it's not available, create directory first
          if (!is_dir($target_path)) {
              mkdir($target_path, 0777, TRUE);
          }

        
        $this->load->library('upload', $config);
        $this->upload->do_upload('upload');
            // if ( ! $this->upload->do_upload('upload')){
            //     $error = array('error' => $this->upload->display_errors());
            //     //echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url('dashboard')."';</script>");

            //     echo ("<script LANGUAGE='JavaScript'>window.alert('Cek File Gambar Anda');window.location.href='".base_url('admin/addcuisine')."';</script>");

            // }else{
            if (! file_exists($_FILES["upload"]["tmp_name"])) {
                
                $data= array(
                    'title' => $this->input->post('article_name'),
                    'content' => $this->input->post('isian'),
                );

                $updatearticle = $this->Master_model->updatearticle($data, $article_id);

                if ($updatearticle) {
                    echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan data cuisine'); window.location.href='".base_url('admin/listarticle')."';</script>");
                }
                else
                {
                    echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data artikel!!'); window.location.href='".base_url('admin/addcuisine')."';</script>");
                }
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['file_name'];

                // $data = array('upload_data' => $this->upload->data());
                $image = $_FILES['upload']['name'];
                $type = $_FILES['upload']['type'];
                //die($image);
                $tipegambar = substr($image,-3);
                
                $dataku= array(
                    'title' => $this->input->post('article_name'),
                    'content' => $this->input->post('isian'),
                    'article_image' => $config['file_name'].'.'.$tipegambar,
                );

                $updatearticle = $this->Master_model->updatearticle($dataku, $article_id);

                if ($updatearticle) {
                    echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan data artikel'); window.location.href='".base_url('admin/listarticle')."';</script>");
                }
                else
                {
                    echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data artikel!!'); window.location.href='".base_url('admin/addcuisine')."';</script>");
                }
            }
    }

    public function choosecustomer()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_customer'] = $this->Master_model->choosecustomer();
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/artikel/choosecustomer.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function chooserecipe()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_recipe'] = $this->Master_model->m_recipe_choose();
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/recipe/chooserecipe.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addrecommendation($id)
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
        $this->load->view("admin/recipe/addrecommendation.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function act_rekomen($kode)
    {
        
        $data= array(
            'recipe_id' => $kode,
            'sorting' => $this->input->post('sorting'),
        );

        $insert_rekomen = $this->Master_model->insert_rekomen($data);

        if ($insert_rekomen) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengubah data Role'); window.location.href='".base_url('admin/reciperecomen')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengubah data Rekomendasi!!'); window.location.href='".base_url('admin/addrecommendation/'.$kode)."';</script>");
        }
            
    }

    public function reciperecomen()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_recipe'] = $this->Master_model->m_recipe_recommendation();
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/recipe/list_recipe_recommendation.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function editrekomen($recipe_id, $id_rekomen)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['row_recipes'] = $this->Master_model->getrecipe_by_id($recipe_id);
        $data['row_rekomen'] = $this->Master_model->recipe_rekomen_one($id_rekomen);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/recipe/editrecommendation.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function choose_recipe($recipe_id, $id_rekomen)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_recipe'] = $this->Master_model->m_recipe_choose();
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/recipe/choose_recipe.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function update_rekomen($recipe_id, $id_rekomen)
    {
        
        $data= array(
            'recipe_id' => $recipe_id,
            'sorting' => $this->input->post('sorting'),
        );

        $updaterekomen = $this->Master_model->update_rekomen($data,$id_rekomen);

        if ($updaterekomen) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengubah data rekomendasi resep'); window.location.href='".base_url('admin/reciperecomen')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengubah data rekomendasi resep!!'); window.location.href='".base_url('admin/editrekomen/'.$recipe_id.'/'.$id_rekomen)."';</script>");
        }
            
    }

    public function deleterekomen($id)
    {
        $delete = $this->Master_model->deleterekomen($id);

        if ($delete) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data rekomendasi resep'); window.location.href='".base_url('admin/reciperecomen')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data rekomendasi resep!!'); window.location.href='".base_url('admin/reciperecomen/')."';</script>");
        }

    }

    public function listbanner()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['listbanner'] = $this->Master_model->m_banner();
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/banner/list_banner.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addbanner()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/banner/add_banner.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function actbanner()
    {
        $file = $this->input->post('upload');

        //upload config => upload ke root server (subdomain)
        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/banner";

        $getbanner = $this->Master_model->getbanner_orderby();
        $banner_id = $getbanner->banner_id;

        $banner_idd = $banner_id + 1;

        $config = array(
            'upload_path' => $target_path,
            'allowed_types' => "jpg|png|jpeg",
            'max_size' => '0',
            'overwrite'=>true,
            'file_name' => 'banner'.'_'.$banner_id,
          );
          $this->load->library('upload', $config);

          //if it's not available, create directory first
          if (!is_dir($target_path)) {
              mkdir($target_path, 0777, TRUE);
          }

        
        $this->load->library('upload', $config);
 
        if ( ! $this->upload->do_upload('upload')){
            $error = array('error' => $this->upload->display_errors());
            //echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url('dashboard')."';</script>");

            echo ("<script LANGUAGE='JavaScript'>window.alert('Cek File Gambar Anda');window.location.href='".base_url('admin/addbanner')."';</script>");

        }else{

            // Get Image Dimension
            $fileinfo = @getimagesize($_FILES["upload"]["tmp_name"]);
            $width = $fileinfo[0];
            $height = $fileinfo[1];
            
            //if ($width == 412 and $height == 117) {
                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['file_name'];

                $image = $_FILES['upload']['name'];
                $tipee = $_FILES['upload']['type']; // image/jpeg
                $pecah = explode('/', $tipee);
                $tipegambar = $pecah[1];
                
                $datakuu = array(
                        'banner_title' => $this->input->post('judul_banner'),
                        'banner_desc' => $this->input->post('deskripsi'),
                        'banner_type' => $this->input->post('tipe'),
                        'banner_image' => $config['file_name'].'.'.$tipegambar,
                );

                $inputbanner = $this->Master_model->insert_banner($datakuu);

                if ($inputbanner) {
                    echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan banner'); window.location.href='".base_url('admin/listbanner')."';</script>");
                }
                else
                {
                    echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan banner!!'); window.location.href='".base_url('admin/addbanner')."';</script>");
                }
            //}
            //else
            //{
                    //echo ("<script LANGUAGE='JavaScript'>alert('Pastikan banner ukuran 412 x 117'); window.location.href='".base_url('admin/listbanner')."';</script>");
            //}
            
        }

                
    }

    public function editbanner($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin']      = $this->Admin_model->data_admin($email);
        $data['row']        =  $this->Master_model->get_banner_one($id);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        $this->load->view("template/header.php", $data);
        $this->load->view("admin/banner/edit_banner.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function updatebanner($kode)
    {
        $file = $this->input->post('upload');

        //upload config => upload ke root server (subdomain)
        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/banner";
        $config = array(
            'upload_path' => $target_path,
            'allowed_types' => "jpg|png|jpeg",
            'max_size' => '0',
            'overwrite'=>true,
            'file_name' => 'banner_'.$kode,
          );

          //if it's not available, create directory first
          if (!is_dir($target_path)) {
              mkdir($target_path, 0777, TRUE);
          }

        
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('upload')){
                $error = array('error' => $this->upload->display_errors());
                //echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url('dashboard')."';</script>");

                echo ("<script LANGUAGE='JavaScript'>window.alert('Cek File Gambar Anda');window.location.href='".base_url('admin/editbanner/'.$kode)."';</script>");

            }else{

                if (file_exists($_FILES["upload"]["tmp_name"])) {
                    $data = array('upload_data' => $this->upload->data());
                    $path = $data['upload_data']['file_name'];

                    // $data = array('upload_data' => $this->upload->data());
                    $image = $_FILES['upload']['name'];
                    $type = $_FILES['upload']['type']; // image/jpeg
                    $pecah = explode('/', $type);
                    $tipegambar = $pecah[1];
                    
                    $data= array(
                        'banner_title' => $this->input->post('banner_name'),
                        'banner_image' => $config['file_name'].'.'.$tipegambar,
                        'banner_type' => $this->input->post('tipe'),
                        'banner_desc' => $this->input->post('deskripsi'),
                    );

                    $updatebanner = $this->Master_model->updatebanner($data, $kode);

                    if ($updatebanner) {
                        echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengubah data banner'); window.location.href='".base_url('admin/listbanner')."';</script>");
                    }
                    else
                    {
                        echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengubah data banner!!'); window.location.href='".base_url('admin/editbanner/'.$kode)."';</script>");
                    }
                }
            }
    }


    public function deletebanner($id)
    {
        $delete = $this->Master_model->deletebanner($id);

        if ($delete) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data banner'); window.location.href='".base_url('admin/listbanner')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data banner!!'); window.location.href='".base_url('admin/listbanner/')."';</script>");
        }

    }

    public function approvalrecipe()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_recipe'] = $this->Master_model->m_recipe_join_approval();
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("admin/recipe/approval_recipe.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function approvaldetail($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin']                      = $this->Admin_model->data_admin($email);
        $data['row']                        = $this->Master_model->get_recipes_one($id);
        $data['row_comment']                = $this->Master_model->get_recipekomen_one($id);
        $data['row_rating']                 = $this->Master_model->get_reciperating_one($id);
        $data['row_trycook']                = $this->Master_model->get_recipe_trycook_one($id);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        $this->load->view("template/header.php", $data);
        $this->load->view("admin/recipe/detail_recipe.php", $data);
        $this->load->view("template/footer.php", $data);
    }
    
    public function openstore($customer_id)
    {
        $data= array(
            'is_store_open' => 1,
        );

        $update_toko = $this->General_model->update('m_customer', $data, 'customer_id', $customer_id);

        if ($update_toko) {
            echo ("<script LANGUAGE='JavaScript'>alert('Toko Berhasil dibuka'); window.location.href='".base_url('admin/customerdetail_real/'.$customer_id)."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal Membuka Toko!!'); window.location.href='".base_url('admin/customerdetail_real/'.$customer_id)."';</script>");
        }
    }

    public function closestore($customer_id)
    {
        $data= array(
            'is_store_open' => 0,
        );

        $update_toko = $this->General_model->update('m_customer', $data, 'customer_id', $customer_id);

        if ($update_toko) {
            echo ("<script LANGUAGE='JavaScript'>alert('Toko Berhasil dibuka'); window.location.href='".base_url('admin/customerdetail_real/'.$customer_id)."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal Membuka Toko!!'); window.location.href='".base_url('admin/customerdetail_real/'.$customer_id)."';</script>");
        }
    }

    

    


}