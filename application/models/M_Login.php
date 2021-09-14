<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Login extends CI_Model
{

    public function cek_login($u, $p)
    {
        $this->db->where('username', $u);
        $data = $this->db->get('admin')->result_array();

        if (count($data) === 1) {
            if (password_verify($p, $data[0]['password'])) {
                $login        =    array(
                    'is_logged_in'    => true,
                    'username'        => $u,
                    'id'              => $data[0]['id'],
                    'role'            => 'admin'
                );
                if ($login) {
                    $this->session->set_userdata('admin_login', $login);
                    return 'admin';
                }
            } else {
                return 'Password Salah';
            }
        } else {
            return 'Username tidak terdaftar';
        }
    }
}

/* End of file M_Login.php */
