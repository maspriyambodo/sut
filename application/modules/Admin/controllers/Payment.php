<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Payment
 *
 * @author casug
 */
class Payment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Payment');
        $this->result = $this->M_User->Auth();
    }

    function index() {
        $data = [
            'title' => 'Payment | PT SUT',
            'formtitle' => 'Payment administrator',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->username,
            'hak_akses' => $this->result[0]->level
        ];
        $data['content'] = $this->load->view('V_Payment', $data, true);
        $this->load->view('template', $data);
    }

}
