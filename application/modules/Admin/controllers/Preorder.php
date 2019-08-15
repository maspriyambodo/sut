<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Preorder
 *
 * @author casug
 */
class Preorder extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Preorder');
        $this->result = $this->M_User->Auth();
    }

    function index() {
        $data = [
            'title' => 'Preorder | PT SUT',
            'formtitle' => 'Preorder administrator',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->username,
            'hak_akses' => $this->result[0]->level,
            'value' => $this->M_Preorder->index()
        ];
        $data['content'] = $this->load->view('V_Preorder', $data, true);
        $this->load->view('template', $data);
    }

    function Detail($no_po) {
        $data = [
            'title' => 'Preorder | PT SUT',
            'formtitle' => 'Preorder administrator',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->username,
            'hak_akses' => $this->result[0]->level,
            'value' => $this->M_Preorder->Detail($no_po)
        ];
        $data['content'] = $this->load->view('V_Preorderdetail', $data, true);
        $this->load->view('template', $data);
    }

    function Cetak($no_po) {
        $data = [
            'title' => 'Preorder | PT SUT',
            'formtitle' => 'print Preorder',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->username,
            'hak_akses' => $this->result[0]->level,
            'value' => $this->M_Preorder->Cetak($no_po)
        ];
        $this->load->view('V_preorderprint', $data);
    }

    function Quotation($no_po) {
        $data = [
            'title' => 'Quotation Preorder | PT SUT',
            'formtitle' => 'Quotation Preorder',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->username,
            'hak_akses' => $this->result[0]->level,
            'value' => $this->M_Preorder->Quotation($no_po)
        ];
        $this->load->view('V_Quotation', $data);
    }

    function Message($no_po) {
        $data = [
            'title' => 'Message Preorder | PT SUT',
            'formtitle' => 'Message Preorder',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->username,
            'hak_akses' => $this->result[0]->level,
            'value' => $this->M_Preorder->Message($no_po)
        ];
        $data['content'] = $this->load->view('V_Message', $data, true);
        $this->load->view('template', $data);
    }

}
