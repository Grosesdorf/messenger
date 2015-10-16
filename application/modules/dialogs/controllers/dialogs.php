<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dialogs extends MX_Controller {
    function index(){

        $this->load->model('modelDialogs');
        $data['result'] = $this->modelDialogs->getDialogs($_POST['sort']);

        $this->load->view('viewDialogs', $data);
    }
}