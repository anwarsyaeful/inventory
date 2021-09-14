<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barang_masuk extends CI_Controller
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
            $id = $this->input->post('barang');
            $jumlah = $this->input->post('jumlah');
            $tanggal = $this->input->post('tanggal');
            $data = [
                "id_barang"         => $id,
                "jumlah"            => $jumlah,
                "tanggal"           => $tanggal
            ];

            $insert = $this->barokah->insertBarangMasuk($data);

            if ($insert) {
                $cek = $this->barokah->getStok($id);

                $data_update = [
                    'stok'  => $cek->stok + $jumlah,
                    'masuk' => $cek->masuk + $jumlah
                ];

                $this->barokah->updateStok($data_update, $id);

                $this->session->set_flashdata('flash-sukses', 'Data berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('flash-error', 'Data gagal ditambahkan');
            }
            redirect('admin/barang_masuk');
        } elseif ($this->u3 == 'delete') {
            $id = $this->u4;

            $delete = $this->barokah->deleteBarangMasuk($id);

            if ($delete) {
                $this->session->set_flashdata('flash-sukses', 'Data berhasil dihapus');
            }
            redirect('admin/barang_masuk', 'resfresh');
        } else {
            $data = [
                'title'         => 'Barang Masuk',
                'page'          => 'backend/barang_masuk',
                'masuk'         => $this->barang->getBarangMasuk(),
                'barang'        => $this->barang->getBarang()
            ];

            $this->load->view('backend/index', $data);
        }
    }
}

/* End of file Barang_masuk.php */