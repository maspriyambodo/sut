<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Quotation
 *
 * @author casug
 */
class Quotation extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Quotation');
        $this->result = $this->M_User->Auth();
    }

    function index() {
        $data = [
            'title' => 'Quotation | PT SUT',
            'formtitle' => 'Quotation administrator',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->username,
            'hak_akses' => $this->result[0]->level,
            'value' => $this->M_Quotation->index()
        ];
        $data['content'] = $this->load->view('V_Quotation', $data, true);
        $this->load->view('template', $data);
    }

    function Detail($no_penawaran) {
        $data = [
            'title' => 'Quotation | PT SUT',
            'formtitle' => 'Quotation administrator',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->username,
            'hak_akses' => $this->result[0]->level,
            'value' => $this->M_Quotation->Detail($no_penawaran)
        ];
        $data['content'] = $this->load->view('V_Quotationdetail', $data, true);
        $this->load->view('template', $data);
    }

}
