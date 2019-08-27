<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_User
 *
 * @author X45LDB
 */
class M_User extends CI_Model {

    function Auth($level = null) {
        if ($this->uri->segment(1, 0) == 'Admin') {
            $level = 1;
        } elseif ($this->uri->segment(1, 0) == 'Direktur') {
            $level = 3;
        } else {
            $level = 0;
        }
        $this->db->cache_on();
        $exec = $this->db->select()
                ->from('user_login')
                ->where(['user_login.id' => $this->session->userdata('id'), 'user_login.username' => $this->session->userdata('nama'), 'user_login.level' => $level])
                ->get()
                ->result();
        if ($exec == []) {
            echo '<script>alert("You do not have permission to access");</script>';
            $this->session->sess_destroy();
            redirect('Auth/Login', 'refresh');
        } else {
            return $exec;
        }
    }

    function Customer() {
        $exec = $this->db->select('user_login.`level`,user_login.username,customers.id_customer,customers.nama,customers.perusahaan')
                ->from('user_login')
                ->join('customers', 'user_login.username = customers.mail', 'inner')
                ->where(['user_login.username' => $this->session->userdata('nama'), 'user_login.level' => $this->session->userdata('hakakses') + false, 'password' => $this->session->userdata('pwd')])
                ->get()
                ->result();
        if ($exec == []) {
            echo '<script>alert("You do not have permission to access");</script>';
            $this->session->sess_destroy();
            redirect('Auth/Login', 'refresh');
        } else {
            return $exec;
        }
    }

}
