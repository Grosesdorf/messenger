<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dialog extends MX_Controller {

    function showDialog($id){

        $this->load->model('authorization/modelAuthorization');
        $data['userId'] = $this->modelAuthorization->checkLogged();

        $data['idDialog'] = $id;

        $this->load->model('modelDialog');
        $data['rows'] = $this->modelDialog->getDialog($data['idDialog']);

        $this->load->view('viewDialog', $data);
    }

    function addMessage(){

        if(isset($_POST['submit'])) {

            $userId = $_POST['userId'];
            $message = $_POST['message'];
            $dialogId = $_POST['dialogId'];

            $this->load->model('modelDialog');
            $this->modelDialog->addMessage($dialogId, $userId, $message);

            header("Location: /dialog/showDialog/" . $dialogId);
        }
    }
}