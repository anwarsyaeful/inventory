<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Barang extends CI_Model
{

    public function getBarang()
    {
        $this->db->select('barang.*, kategori.kategori');
        $this->db->join('kategori', 'kategori.id = barang.id_kategori', 'inner');

        $this->db->order_by('kategori.kategori, barang.nama', 'asc');

        return $this->db->get('barang')->result();
    }

    public function getStokBarang()
    {
        $this->db->select('stok_barang.*, barang.nama, kategori.kategori');
        $this->db->join('barang', 'barang.id = stok_barang.id_barang', 'inner');
        $this->db->join('kategori', 'kategori.id = barang.id_kategori', 'inner');

        $this->db->order_by('kategori.kategori, barang.nama', 'asc');

        return $this->db->get('stok_barang')->result();
    }

    public function getBarangMasuk()
    {
        $this->db->select('barang_masuk.*, barang.nama, kategori.kategori');
        $this->db->join('barang', 'barang.id = barang_masuk.id_barang', 'inner');
        $this->db->join('kategori', 'kategori.id = barang.id_kategori', 'inner');

        $this->db->order_by('barang_masuk.id', 'desc');

        return $this->db->get('barang_masuk')->result();
    }
    public function getBarangKeluar()
    {
        $this->db->select('barang_keluar.*, barang.nama, kategori.kategori');
        $this->db->join('barang', 'barang.id = barang_keluar.id_barang', 'inner');
        $this->db->join('kategori', 'kategori.id = barang.id_kategori', 'inner');

        $this->db->order_by('barang_keluar.id', 'desc');

        return $this->db->get('barang_keluar')->result();
    }
}

/* End of file M_Barang.php */
