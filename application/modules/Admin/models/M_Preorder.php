<?php

defined('BASEPATH') OR exit('No direct script access allowed');
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

    function index() {
        $exec = $this->db->select('preorder.no_po,customers.nama,customers.perusahaan,customers.telepon,customers.mail')
                ->from('preorder')
                ->join('customers', 'preorder.no_po = customers.no_po', 'LEFT')
                ->group_by('preorder.no_po')
                ->get()
                ->result();
        return $exec;
    }

    function Detail($no_po) {
        $exec = $this->db->select('preorder.no_po,preorder.tgl_po,preorder.nama_barang,preorder.qty,preorder.harga,(SELECT SUM(qty * harga) FROM preorder WHERE preorder.no_po=' . $no_po . ') AS total,customers.nama,customers.perusahaan,customers.alamat_perusahaan,customers.telepon,customers.mail')
                ->from('preorder')
                ->join('customers', 'preorder.no_po = customers.no_po', 'LEFT')
                ->where('preorder.no_po', $no_po)
                ->get()
                ->result();
        return $exec;
    }

    function Cetak($no_po) {
        $exec = $this->db->select('preorder.no_po,preorder.tgl_po,preorder.nama_barang,preorder.qty,preorder.harga,(SELECT SUM(qty * harga) FROM preorder WHERE preorder.no_po=' . $no_po . ') AS total,customers.nama,customers.perusahaan,customers.alamat_perusahaan,customers.telepon,customers.mail')
                ->from('preorder')
                ->join('customers', 'preorder.no_po = customers.no_po', 'LEFT')
                ->where('preorder.no_po', $no_po)
                ->get()
                ->result();
        return $exec;
    }

    function Quotation($no_po) {
        $exec = $this->db->select('preorder.no_po,preorder.tgl_po,preorder.nama_barang,preorder.qty,preorder.harga,(SELECT SUM(qty * harga) FROM preorder WHERE preorder.no_po=' . $no_po . ') AS total,customers.nama,customers.perusahaan,customers.alamat_perusahaan,customers.telepon,customers.mail')
                ->from('preorder')
                ->join('customers', 'preorder.no_po = customers.no_po', 'LEFT')
                ->where('preorder.no_po', $no_po)
                ->get()
                ->result();
        return $exec;
    }

    function Message($no_po) {
        
    }

}
