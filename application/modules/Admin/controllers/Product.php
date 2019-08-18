<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product
 *
 * @author casug
 */
class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Product');
        $this->result = $this->M_User->Auth();
    }

    function index() {
        $data = [
            'title' => 'Product | PT SUT',
            'formtitle' => 'Product administrator',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->username,
            'hak_akses' => $this->result[0]->level,
            'value' => $this->M_Product->index()
        ];
        $data['content'] = $this->load->view('V_Product', $data, true);
        $this->load->view('template', $data);
    }

    function Simpan() {
        $data = [
            'name' => $this->input->post('name'),
            'partnumber' => $this->input->post('partnumber'),
            'stock' => $this->input->post('stock'),
            'price' => $this->input->post('price'),
            'stat' => 1,
            'syscreateuser' => $this->session->userdata('id'),
            'syscreatedate' => date("Y-m-d H:i:s")
        ];
        $exec = $this->M_Product->Simpan($data);
        if ($exec == true) {
            echo '<script>alert("Success, data added successfully !");window.location.href="' . base_url('Admin/Product/index') . '";</script>';
        } else {
            echo '<script>alert("Error, data failed to add !");window.location.href="' . base_url('Admin/Product/index') . '";</script>';
        }
    }

    function Getdata($idproduct) {
        $exec = $this->M_Product->Getdata($idproduct);
        if ($exec == true) {
            $response = $exec;
        } else {
            $response = array('textStatus' => 'Error, system error while load data !');
        }
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    function Update() {
        $data = [
            'id' => $this->input->post('idproduct', true),
            'name' => $this->input->post('nameproduct', true),
            'partnumber' => $this->input->post('partnumb', true),
            'stock' => $this->input->post('stockb', true),
            'price' => $this->input->post('priceb', true)
        ];
        $exec = $this->M_Product->Update($data);
        if ($exec == true) {
            echo '<script>alert("Success, data saved successfully !");window.location.href="' . base_url('Admin/Product/index') . '";</script>';
        } else {
            echo '<script>alert("Error, data failed to save !");window.location.href="' . base_url('Admin/Product/index') . '";</script>';
        }
    }

    function Delete() {
        $idproduct = $this->input->post('idc', true);
        $exec = $this->M_Product->Delete($idproduct);
        if ($exec == true) {
            echo '<script>alert("Success, data deleted successfully !");window.location.href="' . base_url('Admin/Product/index') . '";</script>';
        } else {
            echo '<script>alert("Error, data failed to delete !");window.location.href="' . base_url('Admin/Product/index') . '";</script>';
        }
    }

}
