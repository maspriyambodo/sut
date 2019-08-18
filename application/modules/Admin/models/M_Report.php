<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_Report
 *
 * @author casug
 */
class M_Report extends CI_Model {

    function index($year) {
        $exec = $this->db->select('customers.id_customer,customers.nama,customers.perusahaan,preorder.no_po,(SELECT SUM(preorder.qty * product.price) FROM preorder INNER JOIN product ON preorder.nama_barang = product.id) AS amount')
                ->from('customers')
                ->join('preorder', 'customers.id_customer = preorder.id_customer', 'inner')
                ->join('product', 'preorder.nama_barang = product.id', 'inner')
                ->where('YEAR(preorder.tgl_po) = ', $year)
                ->group_by('customers.id_customer')
                ->get()
                ->result();
        return $exec;
    }

    function year() {
        $exec = $this->db->select('YEAR(preorder.tgl_po) AS tahun')->from('preorder')->group_by('tahun')->order_by('preorder.tgl_po', 'DESC')->get()->result();
        return $exec;
    }

}
