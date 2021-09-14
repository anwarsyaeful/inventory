<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
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
        $this->load->model('M_Barang', 'barang');

        $this->admin = $this->barokah->getOne($this->session->userdata('admin_login')['id']);
    }

    public function index()
    {
        if ($this->u3 == 'tambah') {
            $data = [
                "id_kategori"       => $this->input->post('kategori'),
                "nama"              => $this->input->post('nama'),
                "tanggal"           => $this->input->post('tanggal')
            ];

            $insert = $this->barokah->insertBarang($data, 'barang');

            if ($insert) {
                $this->session->set_flashdata('flash-sukses', 'Data berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('flash-error', 'Data gagal ditambahkan');
            }
            redirect('admin/barang');
        } elseif ($this->u3 == 'edit') {
            $id = $this->input->post('id');

            $data = [
                "id_kategori"       => $this->input->post('kategori'),
                "nama"              => $this->input->post('nama'),
                "tanggal"           => $this->input->post('tanggal')
            ];

            $update = $this->barokah->updateBarang($data, $id);

            if ($update) {
                $this->session->set_flashdata('flash-sukses', 'Data berhasil diupdate');
            } else {
                $this->session->set_flashdata('flash-error', 'Data gagal diupdate');
            }
            redirect('admin/barang');
        } elseif ($this->u3 == 'delete') {
            $id = $this->u4;

            $delete = $this->barokah->deleteBarang($id);

            if ($delete) {
                $this->session->set_flashdata('flash-sukses', 'Data berhasil dihapus');
            }
            redirect('admin/barang', 'resfresh');
        } else {
            $data = [
                'title'         => 'Master Barang',
                'page'          => 'backend/barang',
                'barang'        => $this->barang->getBarang(),
                'kategori'      => $this->barokah->getKategori()
            ];
            $this->load->view('backend/index', $data);
        }
    }
}

/* End of file Barang.php */