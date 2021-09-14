<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('admin_login'))) {
            $this->session->set_flashdata('flash-error', 'Anda Belum Login');
            redirect('login', 'refresh');
        }

        $this->u2        = $this->uri->segment(2);
        $this->u3        = $this->uri->segment(3);
        $this->u4        = $this->uri->segment(4);
        $this->u5        = $this->uri->segment(5);
        $this->u6        = $this->uri->segment(6);

        $this->load->model('M_Barokah', 'barokah');

        $this->admin = $this->barokah->getOne($this->session->userdata('admin_login')['id']);
    }

    public function index()
    {
        if ($this->u2 == 'profile') {
            $data = [
                'title'     => 'Profil Admin',
                'page'      => 'backend/profile'
            ];

            $this->load->view('backend/index', $data);
        } elseif ($this->u2 == 'update') {
            $id = $this->input->post('id');

            $password = $this->input->post('password');

            if ($password) {
                $data = [
                    "username"  => str_replace(' ', '', $this->input->post('username')),
                    "nama"      => $this->input->post('nama'),
                    "email"     => $this->input->post('email'),
                    "password"  => password_hash($password, PASSWORD_BCRYPT)
                ];
            } else {
                $data = [
                    "username"  => str_replace(' ', '', $this->input->post('username')),
                    "nama"      => $this->input->post('nama'),
                    "email"     => $this->input->post('email')
                ];
            }

            $this->barokah->updateAdmin($data, $id);

            $this->session->set_flashdata('flash-sukses', 'Profil berhasil diupdate');

            redirect('admin/profile', 'refresh');
        } else {
            $data = [
                'title'     => 'Dashboard Admin',
                'page'      => 'backend/dashboard',
                'admin'     => $this->barokah->getCountAdmin(),
                'barang'    => $this->barokah->getCountBarang()
            ];
            $this->load->view('backend/index', $data);
        }
    }

    public function list_admin()
    {
        if ($this->admin->role != 1) {
            redirect('admin', 'refresh');
        }
        if ($this->u3 == 'tambah') {
            $data = [
                "username"          => htmlspecialchars($this->input->post('username')),
                "password"          => password_hash('admin', PASSWORD_BCRYPT),
                "nama"              => htmlspecialchars($this->input->post('nama')),
                "email"             => htmlspecialchars($this->input->post('email')),
                "role"              => htmlspecialchars($this->input->post('level')),
                "foto"              => 'default.jpg'
            ];

            $insert = $this->barokah->insertAdmin($data);

            if ($insert) {
                $this->session->set_flashdata('flash-sukses', 'Data berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('flash-error', 'Data gagal ditambahkan');
            }
            redirect('admin/list_admin');
        } elseif ($this->u3 == 'edit') {
            $id = ($this->input->post('id'));

            $data = [
                "username"          => htmlspecialchars($this->input->post('username')),
                "nama"              => htmlspecialchars($this->input->post('nama')),
                "email"             => htmlspecialchars($this->input->post('email')),
                "role"              => htmlspecialchars($this->input->post('level')),
                "foto"              => 'default.jpg'
            ];

            $update = $this->barokah->updateAdmin($data, $id);

            if ($update) {
                $this->session->set_flashdata('flash-sukses', 'Data berhasil diupdate');
            } else {
                $this->session->set_flashdata('flash-error', 'Data gagal diupdate');
            }
            redirect('admin/list_admin');
        } elseif ($this->u3 == 'resetPassword') {
            $id = ($this->input->post('id'));

            $data = [
                "password"          => password_hash('admin', PASSWORD_BCRYPT)
            ];

            $update = $this->barokah->updateAdmin($data, $id);

            if ($update) {
                $this->session->set_flashdata('flash-sukses', 'Password berhasil direset');
            } else {
                $this->session->set_flashdata('flash-error', 'Password gagal direset');
            }
            redirect('admin/list_admin');
        } elseif ($this->u3 == 'delete') {
            $id = $this->u4;

            $delete = $this->barokah->deleteAdmin($id);

            if ($delete) {
                $this->session->set_flashdata('flash-sukses', 'Data berhasil dihapus');
            }
            redirect('admin/list_admin', 'resfresh');
        } else {
            $data = [
                'title'     => 'List Admin',
                'page'      => 'backend/list_admin',
                'admin'     => $this->barokah->getAdmin()
            ];

            $this->load->view('backend/index', $data);
        }
    }
}

/* End of file Admin.php */
