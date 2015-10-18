<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Authorization extends MX_Controller{

    public function authAction(){

        $data = array('userId'=>'', 'submit'=>'', 'email'=>'', 'password'=>'');

        if(isset($_POST['submit'])){    //Провереям пришли ли данные из формы, если да то присваиваем переменным соответствующие элементы $_POST
            $data['submit'] = 'submit';
            if(isset($_POST['email'])){
                $data['email'] = $_POST['email'];
            }
            if(isset($_POST['password'])){
                $data['password'] = $_POST['password'];
            }
        }

        $data['errors'] = false;

        $this->load->model('modelAuthorization');    //проверяем данные на наличие в БД и если они есть возвращаем true
        $data['userId'] = $this->modelAuthorization->checkUser($data['email'], $data['password']);
        if($data['userId'] == false){
            $data['errors'][] = 'Проверьте учетные данные';
        }else{
            $this->load->model('modelAuthorization');
            $this->modelAuthorization->authUser($data['userId']);
            header("Location: /dialogs");
        }

        $this->load->view('viewAuthorization', $data);
    }
}