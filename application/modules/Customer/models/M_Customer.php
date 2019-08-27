<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_Customer
 *
 * @author casug
 */
class M_Customer extends CI_Model {

    function index() {
        return $this->db->select('product.id,product.`name`,product.partnumber,product.stock,product.price,product.stat')
                        ->from('product')
                        ->where('product.stat', 1)
                        ->get()
                        ->result();
    }

    function Simpan($data) {
        $idcust = $this->db->select('MAX(customers.id_customer) + 1 AS idcust')->from('customers')->get()->result();
        $this->db->trans_begin();
        $this->db->set(['customers.nama' => $data['nama'], 'customers.perusahaan' => $data['perusahaan'], 'customers.alamat_perusahaan' => $data['alamat_perusahaan'], 'customers.telepon' => $data['telepon'], 'customers.mail' => $data['mail']])
                ->insert('customers');
        $this->db->set(['user_login.username' => $data['mail'], 'user_login.password' => sha1($data['telepon']), 'user_login.level' => 2])->insert('user_login');
        $i = 0;
        for ($i = 0; $i < sizeof($data['nama_barang']); $i++) {
            $this->db->set(['preorder.id_customer' => $idcust[0]->idcust, 'preorder.no_po' => $data['no_po'], 'preorder.tgl_po' => $data['tgl_po'], 'preorder.nama_barang' => $data['nama_barang'][$i], 'preorder.qty' => $data['qty'][$i], 'preorder.status_po' => 1])->insert('preorder');
        }
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            $session = array('nama' => $data['mail'], 'hakakses' => 2, 'pwd' => sha1($data['telepon']));
            $this->session->set_userdata($session);
            return true;
        }
    }

}
