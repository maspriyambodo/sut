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

    function index() {
        $exec = $this->db->select('Count(customers.id_customer) AS total,COUNT(transaksi.id_transaksi) AS totaltransaksi,( SELECT SUM(preorder.qty * product.price) FROM preorder INNER JOIN product ON preorder.nama_barang = product.id WHERE preorder.status_po = 2 ) AS income ')
                ->from('customers')
                ->join('preorder', 'customers.id_customer = preorder.id_customer', 'inner')
                ->join('penawaran', 'preorder.no_penawaran = penawaran.no_penawaran', '')
                ->join('transaksi', 'penawaran.no_penawaran = transaksi.no_penawaran', '')
                ->get()
                ->result();
        return $exec;
    }

}
