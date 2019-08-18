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

    function Detail($no_penawaran) {
        $exec = $this->db->select('customers.nama,customers.perusahaan,customers.alamat_perusahaan,customers.telepon,customers.mail,penawaran.no_penawaran,penawaran.tgl,preorder.tgl_po')
                ->from('customers')
                ->join('penawaran', 'customers.no_penawaran = penawaran.no_penawaran', 'left')
                ->join('preorder', 'customers.no_po = preorder.no_po', 'left')
                ->where('penawaran.no_penawaran', $no_penawaran)
                ->group_by('penawaran.no_penawaran')
                ->get()
                ->result();
        return $exec;
    }

}
