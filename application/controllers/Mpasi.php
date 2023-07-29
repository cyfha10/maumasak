<?php

class Mpasi extends CI_Controller
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

    public function categorympasi_list()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_kategori'] = $this->General_model->get('m_category_mpasi');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("mpasi/category_mpasi/category_list.php", $data);
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
        $this->load->view("mpasi/category_mpasi/add_category.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function act_category()
    {
        $file = $this->input->post('upload');
        $category_name = $this->input->post('category_name');
        $description = $this->input->post('description');
        $namafiles = str_replace(' ', '', $category_name);

        //upload config => upload ke root server (subdomain)
        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/category_mpasi";
        $config = array(
            'upload_path' => $target_path,
            'allowed_types' => "jpg|png|jpeg",
            'max_size' => '0',
            'overwrite'=> true,
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
                'description' => $this->input->post('description'),
                'category_image' => $config['file_name'].'.'.$tipegambar,
            );

            $input_category = $this->General_model->insert('m_category_mpasi', $data);

            if ($input_category) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan data kategori mpasi'); window.location.href='".base_url('admin/listkategori')."';</script>");
            }
            else
            {
                unlink("./upload/".$config['file_name'].'.'.$tipegambar);

                echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data kategori mpasi!!'); window.location.href='".base_url('admin/addcategory')."';</script>");
            }
        // }
                
    }

    public function editkategori($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin']      = $this->Admin_model->data_admin($email);
        $data['row']        =  $this->General_model->get_where_one('m_category_mpasi', 'category_mpasi_id', $id);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        $this->load->view("template/header.php", $data);
        $this->load->view("mpasi/category_mpasi/edit_category.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function updatecategory($kode)
    {
        $file = $this->input->post('upload');

        $category_name = $this->input->post('category_name');
        $namafiles = str_replace(' ', '', $category_name);

        //upload config => upload ke root server (subdomain)
        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/category_mpasi";
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
                    'category_name' => $this->input->post('category_name'),
                    'description' => $this->input->post('description'),
                    'category_image' => $config['file_name'].'.'.$tipegambar,
                    'is_active' => $this->input->post('status'),
                );

                $update_category = $this->General_model->update('m_category_mpasi', $data, 'category_mpasi_id', $kode);

                if ($update_category) {
                    echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan data kategori'); window.location.href='".base_url('mpasi/categorympasi_list')."';</script>");
                }
                else
                {
                    echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data kategori!!'); window.location.href='".base_url('mpasi/categorympasi_list/editkategori/'.$kode)."';</script>");
                }
            }
    }

    public function listmpasi()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_mpasi'] = $this->Mpasi_model->m_mpasi_join();
        $data['datarecipestatus'] = $this->General_model->get('m_recipe_status');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        $filter = $this->input->post('filter');

        if ($filter) {
            $recipe_status = $this->input->post('recipe_status');
            $data['filter'] = $recipe_status;
            if ($recipe_status == 'all') {
                $data['list_mpasi'] = $this->Mpasi_model->m_mpasi_all();
            }
            else
            {
                $data['list_mpasi'] = $this->Mpasi_model->m_mpasi_join_filter($recipe_status);
            }
        }

        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("mpasi/list_mpasi.php", $data);
        $this->load->view("template/footer.php", $data);
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
        $this->load->view("mpasi/pilihpelanggan.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function gantipelanggan()
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
        $this->load->view("mpasi/pilihpelanggan.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addmpasi($idd)
    {
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);

        $data['customer'] = $this->General_model->get_where_one('m_customer','customer_id', $idd);

        $customer_id = $data['customer']->customer_id;
        // die($customer_id);

        if (!$customer_id) {
            echo ("<script LANGUAGE='JavaScript'>; window.location.href='".base_url('mpasi/listmpasi')."';</script>");
        }

        if ($idd) {
            $data['datarecipestatus'] = $this->General_model->get('m_recipe_status');
            $data['datakategorimpasi'] = $this->General_model->get('m_category_mpasi');
            $data['customer'] = $this->General_model->get_where_one('m_customer','customer_id', $idd);
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>; window.location.href='".base_url('mpasi/listmpasi')."';</script>");
        }
        
        $this->load->view("template/header.php", $data);
        $this->load->view("mpasi/add_mpasi.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function actrecipes_mpasi()
    {

        $customer_id = $this->input->post('customer_id');
        $nama_resep = $this->input->post('nama_resep');
        $deskripsiresep = $this->input->post('deskripsiresep');
        $kategori = $this->input->post('kategori');
        $porsi = $this->input->post('porsi');
        $waktupersiapanbahan = $this->input->post('waktupersiapanbahan');
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
            
            'cooking_time' => $waktupersiapanmasak,
            'difficulties' => $difficult,
            'category_mpasi_id' => $kategori,
            'customer_id' => $customer_id,
            'recipe_status_id' => $recipe_status,
            // 'ingredients' => $data_ingridients,
        );



        $input_recipe = $this->General_model->insert('m_mpasi', $saveresep);
        if ($input_recipe) {
            //die('as');
            $getmpasi = $this->General_model->get_orderby_one('m_mpasi', 'mpasi_id');
            $mpasi_id = $getmpasi->mpasi_id;

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
                    $target_path = $root_path."filestocks/mpasi/".$customer_id;
                    $links = 'https://filestocks.maumasak.id/mpasi/'.$customer_id;

                    if (!is_dir($target_path)) 
                    {
                          mkdir($target_path, 0777, TRUE);
                    }

                    $config['upload_path'] = $target_path;
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size']      = '0';
                    $config['overwrite']     = FALSE;
                    $config['file_name']     = $customer_id.'_mpasi_step_'.date('YmdHis')."_".time();
                    
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


                $updaterecipes = $this->General_model->update('m_mpasi', $updaterecipe, 'mpasi_id', $mpasi_id);

                if ($updaterecipes) {
                    echo ("<script LANGUAGE='JavaScript'>;window.location.href='".base_url('mpasi/addmpasi_images/'.$mpasi_id)."';</script>");
                }
                else
                {
                    $delete_mpasi = $this->General_model->delete('mpasi', 'mpasi_id', $mpasi_id);
                    echo ("<script LANGUAGE='JavaScript'>;window.location.href='".base_url('mpasi/addmpasi/')."';</script>");
                }

            }
    }


    public function addmpasi_images($mpasi_id)
    {
        $email = $this->session->userdata('email');
        $data['admin'] = $this->Admin_model->data_admin($email);

        $data['recipe'] = $this->General_model->get_where_one('m_mpasi','mpasi_id',$mpasi_id);

        $this->load->view("template/header.php", $data);
        $this->load->view("mpasi/addmpasi_images.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function act_mpasi_images($mpasi_id)
    {
        $file = $this->input->post('cover_image');
        $customer_id = $this->input->post('customer_id');

        //upload config => upload ke root server (subdomain)
        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/mpasi/".$customer_id;
        $config = array(
            'upload_path' => $target_path,
            'allowed_types' => "jpg|png|jpeg",
            'max_size' => '0',
            'overwrite'=>true,
            'file_name' => $customer_id.'_mpasi_cover_'.date('YmdHis')."_".time(),
          );

          //if it's not available, create directory first
          if (!is_dir($target_path)) {
              mkdir($target_path, 0777, TRUE);
          }

        
        $this->load->library('upload', $config);
 
        if ( ! $this->upload->do_upload('cover_image')){
            $error = array('error' => $this->upload->display_errors());
            //echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url('dashboard')."';</script>");

            echo ("<script LANGUAGE='JavaScript'>window.alert('Cek File Gambar Anda');window.location.href='".base_url('mpasi/addmpasi_images/'.$mpasi_id)."';</script>");

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

            
            $updaterecipe_mpasi = $this->General_model->update('m_mpasi', $dataku,'mpasi_id', $mpasi_id);

            if ($updaterecipe_mpasi) {
                echo ("<script LANGUAGE='JavaScript'>;window.location.href='".base_url('mpasi/createhastag/'.$mpasi_id)."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data Mpasi!!'); window.location.href='".base_url('mpasi/addmpasi_images/'.$mpasi_id)."';</script>");
            }

        }

                
    }


    public function createhastag($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_tag'] = $this->Master_model->m_tags_sort();
        $data['row']            =  $this->General_model->get_where_one('m_mpasi', 'mpasi_id', $id);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("mpasi/hastag_mpasi.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function actindexing_mpasi()
    {
        $tags_check = $this->input->post('tags_check');
        $mpasi_id = $this->input->post('mpasi_id');

        $getresep = $this->General_model->get_where_one('m_mpasi', 'mpasi_id', $mpasi_id);
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
                
                        $jumlah_tags = $this->General_model->get_count_mpasitags($mpasi_id);
                        if ($jumlah_tags > 0) {
                            $delete_byrecipe_id = $this->General_model->delete('m_mpasi_tags', 'mpasi_id', $mpasi_id);
                            if ($delete_byrecipe_id) {
                                foreach ($tags_check as $tagging) {
                                    $tagListing = explode("_", $tagging);
                                    $tag_id = $tagListing[0];
                                    $tag_name = $tagListing[1];
                                    $indexing_key_tags .= metaphone($tag_name)." "; 

                                    //INSERT TO RECIPES TAGS
                                    $data= array(
                                        'tag_id'    => $tag_id,
                                        'mpasi_id' => $mpasi_id,
                                    );

                                        $insert_recipe_tags = $this->General_model->insert('m_mpasi_tags', $data);
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
                                        'mpasi_id' => $mpasi_id,
                                    );

                                        $insert_recipe_tags = $this->General_model->insert('m_mpasi_tags', $data);
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
                                        'mpasi_id' => $mpasi_id,
                                    );

                                        $insert_recipe_tags = $this->General_model->insert('m_mpasi_tags', $data);
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

                $datakuu = array(
                    'indexing' => $indexing_key
                );

                    $update_indexing = $this->General_model->update('m_mpasi', $datakuu, 'mpasi_id', $mpasi_id);

                    if ($update_indexing) {
                        echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyisipkan data Tag'); window.location.href='".base_url('mpasi/listmpasi')."';</script>");
                    }
                    else
                    {
                        echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyisipkan data Tag!!'); window.location.href='".base_url('mpasi/listmpasi/'.$kode)."';</script>");
                    }
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Silahkan pilih tag untuk resep');window.location.href='".base_url('mpasi/createhastag/'.$mpasi_id)."';</script>");
        }
        //die();

    //CLOSE INDEXING
    }

     public function mpasichoice()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_choice'] = $this->General_model->get_join('m_mpasi_choice', 'm_mpasi', 'm_mpasi_choice.source_id = m_mpasi.mpasi_id');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("mpasi/list_choice.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function choosempasi()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_mpasi'] = $this->General_model->get_join('m_mpasi', 'm_customer', 'm_mpasi.customer_id = m_customer.customer_id');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("mpasi/choosempasi.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function addchoice($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['row_recipes'] = $this->General_model->get_where_one('m_mpasi', 'mpasi_id', $id);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("mpasi/addchoice.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function act_choice($kode)
    {
        $id_admin = $this->session->userdata('id_admin');

        $get_choice = $this->General_model->get_where_one('m_mpasi_choice', 'source_id', $kode);

        $source_id = $get_choice['source_id'];

        if ($source_id == '') 
        {
            $data= array(
                'source' => 'mpasi',
                'source_id' => $kode,
                'sorting' => $this->input->post('sorting'),
                'is_commerce' => $this->input->post('sale'),
                'created_by' => $id_admin,
            );

            $insert_choice = $this->General_model->insert('m_mpasi_choice', $data);

            if ($insert_choice) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menambah resep mpasi pilihan'); window.location.href='".base_url('mpasi/mpasichoice')."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal menambah resep mpasi pilihan!!'); window.location.href='".base_url('mpasi/addchoice/'.$kode)."';</script>");
            }
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Data Mpasi Pilihan Tidak Boleh Sama!!'); window.location.href='".base_url('mpasi/addchoice/'.$kode)."';</script>");
        }
    }

    public function editchoice($mpasi_id, $choice_id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['row_recipes'] = $this->General_model->get_where_one('m_mpasi', 'mpasi_id', $mpasi_id);
        $data['row_rekomen'] = $this->General_model->get_where_one('m_editor_choice', 'editor_choice_id', $choice_id);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("mpasi/editchoice.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function choose_mpasi()
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
        $this->load->view("mpasi/choose_mpasi.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function update_choice($mpasi_id, $choice_id)
    {
        $id_admin = $this->session->userdata('id_admin');

        $data= array(
            'source' => 'mpasi',
            'source_id' => $mpasi_id,
            'sorting' => $this->input->post('sorting'),
            'is_commerce' => $this->input->post('sale'),
            'created_by' => $id_admin,
        );

        $updatechoice = $this->General_model->update('m_mpasi_choice', $data, 'editor_choice_id', $choice_id);

        if ($updatechoice) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengubah data resep mpasi pilihan'); window.location.href='".base_url('mpasi/mpasichoice')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengubah data resep mpasi pilihan!!'); window.location.href='".base_url('mpasi/editchoice/'.$mpasi_id.'/'.$choice_id)."';</script>");
        }
            
    }

    public function deletechoice($id)
    {
        $delete = $this->General_model->delete('m_mpasi_choice', 'editor_choice_id', $id);

        if ($delete) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data resep mpasi pilihan'); window.location.href='".base_url('mpasi/mpasichoice')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data resep mpasi pilihan!!'); window.location.href='".base_url('mpasi/mpasichoice/')."';</script>");
        }

    }

    public function detailmpasi($id)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin']                      = $this->Admin_model->data_admin($email);
        $data['row']                        = $this->Mpasi_model->get_recipes_one($id);
        $data['row_comment']                = $this->Mpasi_model->get_recipekomen_one($id);
        $data['row_rating']                 = $this->Mpasi_model->get_reciperating_one($id);
        $data['row_trycook']                = $this->Mpasi_model->get_recipe_trycook_one($id);
        $data['resep_approval']             = $this->Master_model->count_resep_approval();
        $data['reseptag']                   = $this->Mpasi_model->m_recipe_join_tag($id);
    
        $this->load->view("template/header.php", $data);
        $this->load->view("mpasi/detail_mpasi.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function delete_mpasitrycook($id)
    {
        $delete = $this->General_model->delete('m_mpasi_trycook', 'mpasi_trycook_id', $id);
        $delete_comment_try = $this->General_model->delete('m_mpasi_trycook_comment', 'mpasi_trycook_id', $id);

        if ($delete and $delete_comment_try) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data trycook mpasi'); window.location.href='".base_url('mpasi/listmpasi')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data trycook mpasi!!'); window.location.href='".base_url('mpasi/listmpasi/')."';</script>");
        }

    }

    public function deletetry_comment($id)
    {
        $delete = $this->General_model->delete('m_mpasi_trycook_comment', 'mpasi_trycook_comment_id', $id);

        if ($delete) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus komentar trycook mpasi'); window.location.href='".base_url('mpasi/listmpasi')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus komentar trycook mpasi!!'); window.location.href='".base_url('mpasi/listmpasi/')."';</script>");
        }

    }

    public function approval($category, $customer_id, $mpasi_id)
    {
        $catatan = $this->input->post('catatan');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        $getcustomerdetail = $this->Mpasi_model->get_customer_detail($customer_id);

        $getcustomer = $this->General_model->get_where_one('m_customer', 'customer_id', $customer_id);
        $fullname = $getcustomer->fullname;

        if ($category == 'approved') {
            $status = 2;
            $data= array(
                'recipe_status_id' => $status,
            );

            $updates = $this->General_model->update('m_mpasi', $data, 'mpasi_id', $mpasi_id);

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
                            "type"=>'NOTIF_MPASI_PUBLISHED',
                            "target_id" => $mpasi_id,
                            "title" => 'Maumasak.id',
                            "body" => 'Hore, resep mpasi anda berhasil ditayangkan'
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
                    'type'                  => 'NOTIF_MPASI_PUBLISHED',
                    'sender_customer_id'    => 0,
                    'target_id'             => $mpasi_id,
                    'receiver_customer_id'  => $customer_id,
                    'message'               => 'Hore, resep mpasi anda berhasil ditayangkan',
                );

                    $insert_notification_approval = $this->Master_model->insert_notification_approval($data_notification);
                    if ($insert_notification_approval) {
                    	$data_notification = array(
                            'customer_id'   => $customer_id,
                            'point'         => 1,
                            'source'        => 'mpasi',
                        );

                            $insert_point = $this->General_model->insert('m_customer_point', $data_notification);
                            if ($insert_point) {
                                echo ("<script LANGUAGE='JavaScript'>alert('Resep mpasi berhasil disetujui '); window.location.href='".base_url('mpasi/approvalmpasi')."';</script>");
                            }

                            else
                            {
                                echo ("<script LANGUAGE='JavaScript'>alert('Notifikasi gagal!!'); window.location.href='".base_url('mpasi/approvaldetail/'.$mpasi_id)."';</script>");

                            }
                    }

                    else
                    {
                        echo ("<script LANGUAGE='JavaScript'>alert('Notifikasi gagal!!'); window.location.href='".base_url('mpasi/approvaldetail/'.$mpasi_id)."';</script>");

                    }

            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal memberikan approval!!'); window.location.href='".base_url('mpasi/approvaldetail/'.$mpasi_id)."';</script>");
            }
        }
        elseif ($category == 'rejected') {
            $status = 4;
            $data= array(
                'recipe_status_id' => $status,
            );

            $updates = $this->General_model->update('m_mpasi', $data, 'mpasi_id', $mpasi_id);

            if ($updates) {
                echo ("<script LANGUAGE='JavaScript'>alert('Resep Mpasi ditolak!!'); window.location.href='".base_url('mpasi/approvalmpasi')."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal memberikan approval!!'); window.location.href='".base_url('mpasi/approvaldetail/'.$mpasi_id)."';</script>");
            }
        }
        elseif ($category == 'revision') {
            $status = 3;
            $data= array(
                'notes' => $catatan,
                'recipe_status_id' => $status,
            );

            $updates = $this->General_model->update('m_mpasi', $data, 'mpasi_id', $$mpasi_id);

            if ($updates) {

                $url = "https://fcm.googleapis.com/fcm/send";  

                $serverKey = "AAAA0q3-9sg:APA91bEEPK68CqlCgPOxj4kyd779ias5bf26Z-paqLGT87XDS1qNVoFdd-UNJSCd16B7bLYctCLQCNsDGPX3W0eNLMqLvfErQ-Ox9zgjMe4IurpKxbow4h9GyYo1TGT846yvyCYf3rc_";          
                
                $tokenArray = [];
                foreach ($getcustomerdetail as $usertoken) {
                    $tokenArray = $usertoken['firebase_token'];
                }

                $fields = array (
                    'registration_ids' => array($tokenArray),
                    'data' => array (
                            "date" => date('Y-m-d H:i:s'),
                            "type"=>'NOTIF_MPASI_REVISION',
                            "target_id" => $mpasi_id,
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
                    'type'                  => 'NOTIF_MPASI_REVISION',
                    'sender_customer_id'    => 0,
                    'target_id'             => $mpasi_id,
                    'receiver_customer_id'  => $customer_id,
                    'message'               => 'Resep anda perlu direvisi',
                );

                    $insert_notification_approvals = $this->Master_model->insert_notification_approval($data_notifications);
                    if ($insert_notification_approval) {
                        echo ("<script LANGUAGE='JavaScript'>alert('Resep masih ada yang di revisi.. '); window.location.href='".base_url('mpasi/approvalmpasi')."';</script>");
                    }

                    else
                    {
                        echo ("<script LANGUAGE='JavaScript'>alert('Notifikasi gagal!!'); window.location.href='".base_url('mpasi/approvaldetail/'.$mpasi_id)."';</script>");

                    }
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal memberikan approval!!'); window.location.href='".base_url('mpasi/approvaldetail/'.$mpasi_id)."';</script>");
            }
        }
        else
        {
                echo ("<script LANGUAGE='JavaScript'>alert('Silahkan pilih approval anda!!'); window.location.href='".base_url('mpasi/approvaldetail/'.$mpasi_id)."';</script>");
        }

    }


    public function approvalmpasi()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_mpasi'] = $this->Mpasi_model->m_mpasi_join_approval();
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("mpasi/approval_mpasi.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function approvaldetail($id)
    {

        $email = $this->session->userdata('email');
        //die($email);
        $data['admin']                      = $this->Admin_model->data_admin($email);
        $data['row']                        = $this->Mpasi_model->get_recipes_one($id);
        $data['row_comment']                = $this->Mpasi_model->get_recipekomen_one($id);
        $data['row_rating']                 = $this->Mpasi_model->get_reciperating_one($id);
        $data['row_trycook']                = $this->Mpasi_model->get_recipe_trycook_one($id);
        $data['resep_approval']             = $this->Master_model->count_resep_approval();
        $data['reseptag']                   = $this->Mpasi_model->m_recipe_join_tag($id);

        $this->load->view("template/header.php", $data);
        $this->load->view("mpasi/approval_detail.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function updatecover($mpasi_id)
    {
        $file = $this->input->post('cover_image');
        $customer_id = $this->input->post('customer_id');

        //upload config => upload ke root server (subdomain)
        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/mpasi/".$customer_id;
        $config = array(
            'upload_path' => $target_path,
            'allowed_types' => "jpg|png|jpeg",
            'max_size' => '0',
            'overwrite'=>true,
            'file_name' => $customer_id.'_mpasiicover_'.date('YmdHis')."_".time(),
          );

          //if it's not available, create directory first
          if (!is_dir($target_path)) {
              mkdir($target_path, 0777, TRUE);
          }

        
        $this->load->library('upload', $config);
 
        if ( ! $this->upload->do_upload('cover_image')){
            $error = array('error' => $this->upload->display_errors());
            //echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url('dashboard')."';</script>");

            echo ("<script LANGUAGE='JavaScript'>window.alert('Cek File Gambar Anda');window.location.href='".base_url('mpasi/detailmpasi/'.$mpasi_id)."';</script>");

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
            
            $updaterecipes = $this->General_model->update('m_mpasi', $dataku, 'mpasi_id', $mpasi_id);
        
            if ($updaterecipes) {
                echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengubah cover..'); window.location.href='".base_url('mpasi/detailmpasi/'.$mpasi_id)."';</script>");
            }
            else
            {
                echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengubah cover!!'); window.location.href='".base_url('mpasi/detailmpasi/'.$mpasi_id)."';</script>");
            }

        }

                
    }

    public function editmpasi($customer_id, $mpasi_id)
    {
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);

        $data['customer'] = $this->General_model->get_where_one('m_customer', 'customer_id', $customer_id);

        $data['recipes'] = $this->Mpasi_model->get_recipes_one($mpasi_id);

        $customer_id = $data['customer']->customer_id;
        // die($customer_id);

        if (!$customer_id) {
            echo ("<script LANGUAGE='JavaScript'>; window.location.href='".base_url('mpasi/listmpasi')."';</script>");
        }

        if ($customer_id) {
            $data['datacategory'] = $this->General_model->get('m_category_mpasi');
            $data['datasetmenu'] = $this->General_model->get('m_set_menu');
            $data['datarecipestatus'] = $this->Master_model->m_recipe_status();
            $data['customer'] = $this->General_model->get_where_one('m_customer', 'customer_id', $customer_id);
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>; window.location.href='".base_url('mpasi/listmpasi')."';</script>");
        }
        

        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("mpasi/edit_mpasi.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function updatempasi()
    {
	$customer_id = $this->input->post('customer_id');
        $mpasi_id = $this->input->post('mpasi_id');
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

        $updaterecipezz = $this->General_model->update('m_mpasi', $updatempasii, 'mpasi_id', $mpasi_id);
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
                    $target_path = $root_path."filestocks/mpasi/".$customer_id;
                    $links = 'https://filestocks.maumasak.id/mpasi/'.$customer_id;

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


                $updaterecipes = $this->General_model->update('m_mpasi', $updaterecipe, 'mpasi_id', $mpasi_id);

                if ($updaterecipes) {
                    echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengubah resep mpasi..'); window.location.href='".base_url('mpasi/listmpasi/')."';</script>");
                }
                else
                {
                    echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengubah resep mpasi!!'); window.location.href='".base_url('mpasi/editmpasi/'.$mpasi_id)."';</script>");
                }
            }
    }

    public function deleterecipempasi($id)
    {
        $delete = $this->General_model->delete('m_mpasi', 'mpasi_id', $id);

        if ($delete) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengahapus data resep mpasi'); window.location.href='".base_url('mpasi/listmpasi')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengahapus data resep mpasi!!'); window.location.href='".base_url('mpasi/listmpasi/')."';</script>");
        }

    }

    public function listmpasisale()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_mpasi'] = $this->Mpasi_model->m_mpasi_join_sale();
        $data['datarecipestatus'] = $this->General_model->get('m_recipe_status');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        $filter = $this->input->post('filter');

        if ($filter) {
            $recipe_status = $this->input->post('recipe_status');
            $data['filter'] = $recipe_status;
            if ($recipe_status == 'all') {
                $data['list_mpasi'] = $this->Mpasi_model->m_mpasi_all();
            }
            else
            {
                $data['list_mpasi'] = $this->Mpasi_model->m_mpasi_join_filter($recipe_status);
            }
        }

        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("mpasi/list_mpasi_sale.php", $data);
        $this->load->view("template/footer.php", $data);
    }
    
    public function mpasirecomen()
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_mpasi_rekomen'] = $this->General_model->get_join('m_mpasi_recommendation', 'm_mpasi', 'm_mpasi_recommendation.mpasi_id = m_mpasi.mpasi_id');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();

        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("mpasi/list_mpasi_recommendation.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function editrekomen($mpasi_id, $id_rekomen)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['row_mpasi'] = $this->General_model->get_where_one('m_mpasi', 'mpasi_id', $mpasi_id);
        $data['row_rekomen'] = $this->General_model->get_where_one('m_mpasi_recommendation', 'mpasi_recommendation_id', $id_rekomen);
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("mpasi/editrecommendation.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function chooses_mpasi($mpasi_id, $id_rekomen)
    {
        $email = $this->session->userdata('email');
        //die($email);
        $data['admin'] = $this->Admin_model->data_admin($email);
        $data['list_mpasii'] = $this->General_model->get_join_wheres('m_mpasi', 'm_customer', 'm_mpasi.customer_id = m_customer.customer_id', 'm_mpasi.recipe_status_id = 2');
        $data['resep_approval'] = $this->Master_model->count_resep_approval();
        // var_dump($data['admin']);
        // die();
        // tampilkan halaman login
        $this->load->view("template/header.php", $data);
        $this->load->view("mpasi/chooses_mpasi.php", $data);
        $this->load->view("template/footer.php", $data);
    }

    public function update_rekomen($mpasi_id, $id_rekomen)
    {
        
        $data= array(
            'mpasi_id' => $mpasi_id,
            'sorting' => $this->input->post('sorting'),
        );

        $updaterekomen = $this->General_model->update('m_mpasi_recommendation', $data, 'mpasi_recommendation_id', $id_rekomen);

        if ($updaterekomen) {
            echo ("<script LANGUAGE='JavaScript'>alert('Berhasil mengubah data rekomendasi mpasi'); window.location.href='".base_url('admin/reciperecomen')."';</script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>alert('Gagal mengubah data rekomendasi mpasi!!'); window.location.href='".base_url('admin/editrekomen/'.$mpasi_id.'/'.$id_rekomen)."';</script>");
        }
            
    }
    
    public function updatecategory2($kode)
    {
        $file = $this->input->post('upload');


        //upload config => upload ke root server (subdomain)
        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/category_mpasi";
        $config = array(
            'upload_path' => $target_path,
            'allowed_types' => "jpg|png|jpeg",
            'max_size' => '0',
            'overwrite'=>true,
            'file_name' => 'category_mpasi_'.date('YmdHis')."_".time(),
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

                echo ("<script LANGUAGE='JavaScript'>window.alert('Cek File Gambar Anda');window.location.href='".base_url('mpasi/categorympasi_list')."';</script>");

            }else{

                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['file_name'];

                // $data = array('upload_data' => $this->upload->data());
                $image = $_FILES['upload']['name'];
                $tipee = $_FILES['upload']['type']; // image/jpeg
                $pecah = explode('/', $tipee);
                $tipegambar = $pecah[1];
                
                $data= array(
                    'category_image2' => $config['file_name'].'.'.$tipegambar,
                );
                
                $update_category = $this->General_model->update('m_category_mpasi', $data, 'category_mpasi_id', $kode);

                if ($update_category) {
                    echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan data kategori'); window.location.href='".base_url('mpasi/categorympasi_list')."';</script>");
                }
                else
                {
                    echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data kategori!!'); window.location.href='".base_url('mpasi/categorympasi_list/editkategori/'.$kode)."';</script>");
                }
            }
    }

    public function updatecategory1($kode)
    {
        $file = $this->input->post('upload');

        //upload config => upload ke root server (subdomain)
        $root_path = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR;
        $target_path = $root_path."filestocks/category_mpasi";
        $config = array(
            'upload_path' => $target_path,
            'allowed_types' => "jpg|png|jpeg",
            'max_size' => '0',
            'overwrite'=>true,
            'file_name' => 'category_mpasi_'.date('YmdHis')."_".time(),
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

                echo ("<script LANGUAGE='JavaScript'>window.alert('Cek File Gambar Anda');window.location.href='".base_url('mpasi/categorympasi_list')."';</script>");

            }else{

                $data = array('upload_data' => $this->upload->data());
                $path = $data['upload_data']['file_name'];

                // $data = array('upload_data' => $this->upload->data());
                $image = $_FILES['upload']['name'];
                $tipee = $_FILES['upload']['type']; // image/jpeg
                $pecah = explode('/', $tipee);
                $tipegambar = $pecah[1];
                
                $data= array(
                    'category_image' => $config['file_name'].'.'.$tipegambar,
                );

                $update_category = $this->General_model->update('m_category_mpasi', $data, 'category_mpasi_id', $kode);

                if ($update_category) {
                    echo ("<script LANGUAGE='JavaScript'>alert('Berhasil menyimpan data kategori'); window.location.href='".base_url('mpasi/categorympasi_list')."';</script>");
                }
                else
                {
                    echo ("<script LANGUAGE='JavaScript'>alert('Gagal menyimpan data kategori!!'); window.location.href='".base_url('mpasi/categorympasi_list/editkategori/'.$kode)."';</script>");
                }
            }
    }






}

?>