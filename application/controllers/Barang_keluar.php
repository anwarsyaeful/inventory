<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barang_keluar extends CI_Controller
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
            $ket = $this->input->post('ket');
            $data = [
                "id_barang"         => $id,
                "jumlah"            => $jumlah,
                "tanggal"           => $tanggal,
                "ket"               => $ket
            ];

            $cek = $this->barokah->getStok($id);

            if ($cek->stok >= $jumlah) {
                $insert = $this->barokah->insertBarangKeluar($data);

                if ($insert) {

                    $data_update = [
                        'stok'  => $cek->stok - $jumlah,
                        'keluar' => $cek->keluar + $jumlah
                    ];

                    $this->barokah->updateStok($data_update, $id);

                    $this->session->set_flashdata('flash-sukses', 'Data berhasil ditambahkan');
                } else {
                    $this->session->set_flashdata('flash-error', 'Data gagal ditambahkan');
                }
            } else {
                $this->session->set_flashdata('flash-error', 'Maaf jumlah barang keluar tidak boleh lebih dari jumlah stok !!');
            }

            redirect('admin/barang_keluar');
        } elseif ($this->u3 == 'delete') {
            $id = $this->u4;

            $delete = $this->barokah->deleteBarangKeluar($id);

            if ($delete) {
                $this->session->set_flashdata('flash-sukses', 'Data berhasil dihapus');
            }
            redirect('admin/barang_keluar', 'resfresh');
        } else {
            $data = [
                'title'         => 'Barang Keluar',
                'page'          => 'backend/barang_keluar',
                'keluar'        => $this->barang->getBarangKeluar(),
                'barang'        => $this->barang->getStokBarang()
            ];


            $this->load->view('backend/index', $data);
        }
    }
}

/* End of file Barang_keluar.php */