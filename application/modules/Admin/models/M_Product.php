<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_Product
 *
 * @author casug
 */
class M_Product extends CI_Model {

    function index() {
        $exec = $this->db->select()
                ->from('product')
                ->where('stat', 1)
                ->get()
                ->result();
        return $exec;
    }

    function Simpan($data) {
        $this->db->trans_begin();
        $this->db->set($data)->insert('product');
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    function Getdata($idproduct) {
        $exec = $this->db->select()
                ->from('product')
                ->where('id', $idproduct)
                ->get()
                ->result();
        return $exec;
    }

    function Update($data) {
        $this->db->trans_begin();
        $this->db->set([
                    'name' => $data['name'],
                    'partnumber' => $data['partnumber'],
                    'stock' => $data['stock'] + false,
                    'price' => $data['price'] + false,
                    'sysupdateuser' => $this->session->userdata('id'),
                    'sysupdatedate' => date("Y-m-d H:i:s")
                ])
                ->where('product.id', $data['id'], false)
                ->update('product');
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    function Delete($idproduct) {
        $this->db->trans_begin();
        $this->db->set(['stat' => 2, 'sysdeleteuser' => $this->session->userdata('id'), 'sysdeletedate' => date("Y-m-d H:i:s")])
                ->where('product.id', $idproduct, false)
                ->update('product');
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

}
