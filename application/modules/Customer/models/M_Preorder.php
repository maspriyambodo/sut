<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_Preorder
 *
 * @author casug
 */
class M_Preorder extends CI_Model {

    function Detail($no_po, $id_customer) {
        $exec = $this->db->select('preorder.status_po,preorder.no_po,preorder.tgl_po,customers.nama,customers.perusahaan,customers.alamat_perusahaan,customers.telepon,customers.mail,product.`name` AS nama_barang,product.partnumber,preorder.qty,product.price,( SELECT SUM( preorder.qty * product.price ) FROM preorder LEFT JOIN product ON preorder.nama_barang = product.id WHERE preorder.no_po = ' . $no_po . ') AS total ')
                ->from('customers')
                ->join('preorder', 'customers.id_customer = preorder.id_customer', 'left')
                ->join('product', 'preorder.nama_barang = product.id', 'left')
                ->where(['preorder.no_po' => $no_po, 'preorder.id_customer' => $id_customer])
                ->get()
                ->result();
        return $exec;
    }

    function Message($no_po) {
        $exec = $this->db->select('preorder.no_po,preorder.tgl_po,customers.nama,customers.perusahaan,customers.alamat_perusahaan,customers.telepon,customers.mail,product.`name` AS nama_barang,product.partnumber,preorder.qty,product.price,( SELECT SUM( preorder.qty * product.price ) FROM preorder LEFT JOIN product ON preorder.nama_barang = product.id ) AS total ')
                ->from('customers')
                ->join('preorder', 'customers.id_customer = preorder.id_customer', 'left')
                ->join('product', 'preorder.nama_barang = product.id', 'left')
                ->where('preorder.no_po', $no_po)
                ->get()
                ->result();
        return $exec;
    }

    function Kirim($data) {
        $this->db->trans_begin();
        $this->db->set(['no_po' => $data['no_po'], 'pesan' => $data['pesan'], 'syscreateuser' => $data['id'], 'syscreatedate' => date("Y-m-d H:i:s")])
                ->insert('msg_po');
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    function Cetak($no_po) {
        $exec = $this->db->select('preorder.no_po,preorder.tgl_po,customers.nama,customers.perusahaan,customers.alamat_perusahaan,customers.telepon,customers.mail,product.`name` AS nama_barang,product.partnumber,preorder.qty,product.price,( SELECT SUM( preorder.qty * product.price ) FROM preorder LEFT JOIN product ON preorder.nama_barang = product.id ) AS total ')
                ->from('customers')
                ->join('preorder', 'customers.id_customer = preorder.id_customer', 'left')
                ->join('product', 'preorder.nama_barang = product.id', 'left')
                ->where('preorder.no_po', $no_po)
                ->get()
                ->result();
        return $exec;
    }

}
