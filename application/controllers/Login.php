<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin_model");
        $this->load->library('form_validation');
        $this->load->library('user_agent');
    }

    public function index()
    {
        if($this->session->userdata('status') != "login"){
            $this->load->view("login_page.php");
        }
        else
        {
            redirect(base_url("admin"));
        }

        // tampilkan halaman login
        //$this->load->view("login_page.php");
    }

    public function validasi()
    {
        
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('pass_id', 'Password', 'required');

        // jika form login disubmit
        if($this->form_validation->run() == FALSE) {
            //$this->load->view("admin/login_page.php");
            $email = $this->input->post('email');
            $pass_id = $this->input->post('pass_id');
            
            //redirect(base_url("login"));
        }
        else {
            $email = $this->input->post('email');
            $pass_id = $this->input->post('pass_id');
            
            $where = array(
                        'email' => $email,
                        'password' => md5($pass_id)
                    );

            $cek = $this->admin_model->data_login("m_admin", $where)->num_rows();

            if ($cek > 0) {
            	$data_logins = $this->admin_model->data_login("m_admin", $where)->row();
            	$id_admin = $data_logins->admin_id;

            	//mengetahui browser, os dan ip address

            	$browser = $this->agent->browser();

            	$browser_version = $this->agent->version();

            	$os = $this->agent->platform();

            	$ip_address = $this->input->ip_address();

            	date_default_timezone_set('Asia/Jakarta');

                $data_session = array(
                        'email' => $email, 
                        'id_admin' => $id_admin, 
                        'status' => 'login', 
                );

                $data = array(
                        'last_login' => date('Y-m-d H:i:sa'), 
                        'ip_address' => $ip_address, 
                        'browser' => $browser.' '.$browser_version, 
                );

                $update_admin = $this->admin_model->updateadmins($data, $id_admin);

                $this->session->set_userdata($data_session);
                redirect(base_url("admin"));
            }
            else {
                $this->session->set_flashdata('Pesan', 'Email atau Password salah!');
                redirect(base_url("login"));
            }
        }
    }

    

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(base_url(''));
    }
}