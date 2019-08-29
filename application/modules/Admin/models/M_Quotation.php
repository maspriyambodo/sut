<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_Quotation
 *
 * @author casug
 */
class M_Quotation extends CI_Model {

    function index() {
        $exec = $this->db->select('penawaran.no_penawaran,penawaran.tgl AS tgl_penawaran,penawaran.no_po,preorder.tgl_po,customers.nama,customers.perusahaan')
                ->from('penawaran')
                ->join('preorder', 'penawaran.no_po = preorder.no_po', 'left')
                ->join('customers', 'penawaran.no_po = customers.no_po', 'left')
                ->group_by('penawaran.no_penawaran')
                ->get()
                ->result();
        return $exec;
    }

    function Detail($no_po) {
        $exec = $this->db->select('penawaran.status_quotation,customers.nama,customers.perusahaan,customers.alamat_perusahaan,customers.telepon,customers.mail,preorder.no_po,preorder.tgl_po,product.`name` AS nama_barang,preorder.qty,product.price,( SELECT SUM( preorder.qty * product.price ) FROM preorder INNER JOIN product ON preorder.nama_barang = product.id WHERE preorder.no_po = ' . $no_po . ') AS total,penawaran.no_penawaran,penawaran.tgl AS tgl_penawaran')
                ->from('customers')
                ->join('preorder', 'customers.id_customer = preorder.id_customer', 'inner')
                ->join('product', 'preorder.nama_barang = product.id', 'inner')
                ->join('penawaran', 'preorder.no_penawaran = penawaran.no_penawaran', 'inner')
                ->where('preorder.no_po', $no_po, false)
                ->get()
                ->result();
        return $exec;
    }

}
