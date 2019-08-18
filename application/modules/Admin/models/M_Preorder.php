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
        $exec = $this->db->select('msg_po.pesan,customers.nama,customers.perusahaan,customers.telepon,customers.mail,preorder.no_po')
                ->from('customers')
                ->join('preorder', 'customers.id_customer = preorder.id_customer', 'inner')
                ->join('msg_po', 'preorder.no_po = msg_po.no_po', 'left')
                ->group_by('preorder.no_po')
                ->get()
                ->result();
        return $exec;
    }

    function Detail($no_po) {
        $exec = $this->db->select('preorder.no_po,preorder.tgl_po,customers.nama,customers.perusahaan,customers.alamat_perusahaan,customers.telepon,customers.mail,product.`name` AS nama_barang,product.partnumber,preorder.qty,product.price,( SELECT SUM( preorder.qty * product.price ) FROM preorder LEFT JOIN product ON preorder.nama_barang = product.id ) AS total ')
                ->from('customers')
                ->join('preorder', 'customers.id_customer = preorder.id_customer', 'left')
                ->join('product', 'preorder.nama_barang = product.id', 'left')
                ->where('preorder.no_po', $no_po)
                ->get()
                ->result();
        return $exec;
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
        $this->db->set(['no_po' => $data['no_po'], 'pesan' => $data['pesan'], 'syscreateuser' => $this->session->userdata('id'), 'syscreatedate' => date("Y-m-d H:i:s")])
                ->insert('msg_po');
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    function Messagedetail($no_po) {
        $exec = $this->db->select('msg_po.pesan,msg_po.no_po')
                ->from('msg_po')
                ->where('msg_po.no_po', $no_po)
                ->get()
                ->result();
        return $exec;
    }

    function Proses($no_po) {
        $count = $this->db->select('id_penawaran')->from('penawaran')->get()->num_rows();
        $no_penawaran = date('Ymd') . $count + 1;
        $this->db->trans_begin();
        $this->db->set(['preorder.no_penawaran' => $no_penawaran, 'preorder.status_po' => 2,])
                ->where('no_po', $no_po)->update('preorder');
        $this->db->set(['penawaran.no_penawaran' => $no_penawaran, 'penawaran.no_po' => $no_po, 'penawaran.tgl' => date('Y-m-d H:i:s')])
                ->insert('penawaran');
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            echo '<script>alert("Success, Preorder has been success processed !");window.location.href="' . base_url('Admin/Quotation/Detail/' . $no_penawaran . '') . '";</script>';
        }
    }

}
