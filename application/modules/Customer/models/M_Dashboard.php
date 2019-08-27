<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_Dashboard
 *
 * @author casug
 */
class M_Dashboard extends CI_Model {

    function index($idcust) {
        $exec = $this->db->select('msg_po.pesan,customers.nama,customers.perusahaan,customers.telepon,customers.mail,preorder.no_po')
                ->from('customers')
                ->join('preorder', 'customers.id_customer = preorder.id_customer', 'inner')
                ->join('msg_po', 'preorder.no_po = msg_po.no_po', 'left')
                ->where('preorder.id_customer', $idcust)
                ->group_by('preorder.no_po')
                ->get()
                ->result();
        return $exec;
    }

}
