<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_Auth
 *
 * @author casug
 */
class M_Auth extends CI_Model {

    function proses($data) {
        $exec = $this->db->select('*')
                ->from('user_login')
                ->where('user_login.username', $data['uname'])
                ->where('user_login.password', sha1($data['pwd']))
                ->get()
                ->result();
        if ($exec == true) {
            return $exec;
        } else {
            $this->session->sess_destroy();
        }
    }

}
