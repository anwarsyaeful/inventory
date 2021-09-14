<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Barokah extends CI_Model
{
    public function getOne($id)
    {
        $this->db->where('id', $id);

        return $this->db->get('admin')->row();
    }
    public function getAdmin()
    {
        return $this->db->get('admin')->result();
    }
    public function getCountAdmin()
    {
        return $this->db->get('admin')->num_rows();
    }
    public function getCountBarang()
    {
        return $this->db->get('stok_barang')->num_rows();
    }

    public function insertAdmin($data)
    {
        return $this->db->insert('admin', $data);
    }

    public function deleteAdmin($id)
    {
        return $this->db->where('id', $id)->delete('admin');
    }

    public function updateAdmin($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('admin', $data);
    }
    public function getKategori()
    {
        return $this->db->get('kategori')->result();
    }
    public function insertKategori($data)
    {
        return $this->db->insert('kategori', $data);
    }

    public function deleteKategori($id)
    {
        return $this->db->where('id', $id)->delete('kategori');
    }

    public function updateKategori($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('kategori', $data);
    }
    public function insertBarang($data)
    {
        return $this->db->insert('barang', $data);
    }

    public function deleteBarang($id)
    {
        return $this->db->where('id', $id)->delete('barang');
    }

    public function updateBarang($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('barang', $data);
    }
    public function insertStok($data)
    {
        return $this->db->insert('stok_barang', $data);
    }
    public function deleteStok($id)
    {
        return $this->db->where('id', $id)->delete('stok_barang');
    }
    public function insertBarangMasuk($data)
    {
        return $this->db->insert('barang_masuk', $data);
    }
    public function deleteBarangMasuk($id)
    {
        return $this->db->where('id', $id)->delete('barang_masuk');
    }
    public function updateStok($data, $id)
    {
        $this->db->where('id_barang', $id);
        return $this->db->update('stok_barang', $data);
    }

    public function getStok($id)
    {
        $this->db->where('id_barang', $id);

        return $this->db->get('stok_barang')->row();
    }
    public function insertBarangKeluar($data)
    {
        return $this->db->insert('barang_keluar', $data);
    }
    public function deleteBarangKeluar($id)
    {
        return $this->db->where('id', $id)->delete('barang_keluar');
    }
}

/* End of file M_Barokah.php */
