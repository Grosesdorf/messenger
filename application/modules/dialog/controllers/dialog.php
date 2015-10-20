<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dialog extends MX_Controller {

    function showDialog(){

        $this->load->model('authorization/modelAuthorization');
        $data['userId'] = $this->modelAuthorization->checkLogged();

        $this->load->model('modelDialog');
        $data['rows'] = $this->modelDialog->getDialog($_POST['id_dialog']);

        $this->load->view('viewDialog', $data);
    }
}