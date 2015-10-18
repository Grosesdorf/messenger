<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dialogs extends MX_Controller {

    function index(){

        $data['userId'] ='';
        $this->load->model('authorization/modelAuthorization');
        $data['userId'] = $this->modelAuthorization->checkLogged();

        if(!isset($_POST['sort'])){
            $_POST['sort'] = "ASC";
        }

        if(isset($data['userId'])) {
            $this->load->model('modelDialogs');
            $data['rows'] = $this->modelDialogs->getDialogs($data['userId'], $_POST['sort']);
        }

            $this->load->model('modelDialogs');
            $data['userName'] = $this->modelDialogs->getNameById($data['userId']);


        $this->load->view('viewDialogs', $data);
    }
}