<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Customer
 *
 * @author casug
 */
class Customer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Customer');
    }

    function index() {
        $data = [
            'title' => 'PT SANINDO UTAMA TRAKTOR',
            'formtitle' => 'PT SANINDO UTAMA TRAKTOR',
            'uname' => '',
            'hak_akses' => '',
            'value' => $this->M_Customer->index()
        ];
        $data['content'] = $this->load->view('V_Customer', $data, true);
        $this->load->view('template', $data);
    }

    function Simpan() {
        $data = [
            'nama' => $this->input->post('namacust'), 'perusahaan' => $this->input->post('perusahaan'), 'alamat_perusahaan' => $this->input->post('alamat'), 'telepon' => $this->input->post('telepon'), 'mail' => $this->input->post('mail'),
            'id_customer', 'no_po' => date('Ymd') . rand(10, 100), 'tgl_po' => date("Y-m-d"), 'nama_barang' => $this->input->post('idproduct'), 'qty' => $this->input->post('qty'), 'status_po' => 1
        ];
        $exec = $this->M_Customer->Simpan($data);
        if ($exec == true) {
            echo '<script>window.location.href="' . base_url('Customer/Dashboard/index/') . '";</script>';
        } else {
            echo '<script>window.location.href="' . base_url('Customer/Customer/index/') . '";</script>';
        }
    }

}
