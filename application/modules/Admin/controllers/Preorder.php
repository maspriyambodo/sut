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

    private function Qrpo() {
        $exec = $this->M_Preorder->Cetak($this->uri->segment(4));
        $this->load->library('ciqrcode');
        $config['cacheable'] = true; //boolean, the default is true
        $config['cachedir'] = './assets/images/qrpo'; //string, the default is application/cache/
        $config['errorlog'] = './assets/'; //string, the default is application/logs/
        $config['imagedir'] = './assets/images/qrpo/'; //direktori penyimpanan qr code
        $config['quality'] = true; //boolean, the default is true
        $config['size'] = '1024'; //interger, the default is 1024
        $config['black'] = array(0, 145, 234); // array, default is array(255,255,255)
        $config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
        $image_name = $this->uri->segment(4) . '.png'; //buat name dari qr code sesuai dengan nim
        $params['data'] = $this->uri->segment(4); //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = $config['imagedir'] . $exec[0]->perusahaan . '_' . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params);
    }

    function Cetak($no_po) {
        $this->Qrpo();
        $this->load->helper("terbilang");
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
        $this->load->view('V_Quotationpo', $data);
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

    function Kirim($param) {
        $data = [
            'no_po' => $param,
            'pesan' => $this->input->post('pesan', false)
        ];
        $exec = $this->M_Preorder->Kirim($data);
        if ($exec == true) {
            $response = array('textStatus' => 'Success, Message has been send !');
        } else {
            $response = array('textStatus' => 'Error');
        }
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    function Messagedetail($no_po) {
        $data = [
            'title' => 'Message Preorder | PT SUT',
            'formtitle' => 'Message Preorder',
            'id' => $this->result[0]->id,
            'uname' => $this->result[0]->username,
            'hak_akses' => $this->result[0]->level,
            'value' => $this->M_Preorder->Messagedetail($no_po)
        ];
        $data['content'] = $this->load->view('Messagedetail', $data, true);
        $this->load->view('template', $data);
    }

    function Proses($no_po) {
        $exec = $this->M_Preorder->Proses($no_po);
        if ($exec == false) {
            echo '<script>alert("Error, Preorder has been fail processed !");window.location.href="' . base_url('Admin/Preorder/index/') . '";</script>';
        }
    }

}
