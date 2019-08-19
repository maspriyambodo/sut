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
        $exec = $this->db->select('customers.id_customer,SUM( preorder.qty * product.price ) AS amount,customers.nama,customers.perusahaan,preorder.no_po ')
                ->from('preorder')
                ->join('product', 'preorder.nama_barang = product.id', 'left')
                ->join('customers', 'preorder.id_customer = customers.id_customer ', 'left')
                ->join('transaksi', 'transaksi.no_po = preorder.no_po', 'right')
                ->where('YEAR(preorder.tgl_po) = ', $year, false)
                ->group_by('preorder.no_po')
                ->get()
                ->result();
        return $exec;
    }

    function year() {
        $exec = $this->db->select('YEAR(preorder.tgl_po) AS tahun')->from('preorder')->group_by('tahun')->order_by('preorder.tgl_po', 'DESC')->get()->result();
        return $exec;
    }

}
