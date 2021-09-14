<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->u1        = $this->uri->segment(1);
        $this->u2        = $this->uri->segment(2);

        if (!empty($this->session->userdata('admin_login'))) {
            if ($this->u1 != 'logout') {
                $this->session->set_flashdata('flash-error', 'Anda Sudah Login');
                redirect('admin');
            }
        } elseif (!empty($this->session->userdata('user_login'))) {
            if ($this->u1 != 'logout') {
                $this->session->set_flashdata('flash-error', 'Anda Sudah Login');
                redirect('dashboard');
            }
        }

        $this->load->model('M_Login', 'login');
    }

    public function index()
    {
        $data['title']  = 'Halaman Login';
        $data['page']   = 'login/login';
        $this->load->view('login/index', $data);
    }

    public function login_proses()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]', [
            'required' => 'Username tidak boleh kosong !',
            'min_length' => 'Username kurang dari 3 digit !'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'required' => 'Password harap di isi !',
            'min_length' => 'Password kurang dari 3'
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-error', validation_errors());
            redirect('login', 'refresh');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $cek = $this->login->cek_login($username, $password);

            if ($cek == 'admin') {
                $this->session->set_flashdata('flash-sukses', 'Login sukses');
                redirect('admin', 'refresh');
            } elseif ($cek == 'user') {
                $this->session->set_flashdata('flash-sukses', 'Login sukses');
                redirect('dashboard', 'refresh');
            } else {
                $this->session->set_flashdata('flash-error', $cek);
                redirect('login', 'refresh');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }
}

/* End of file Login.php */
