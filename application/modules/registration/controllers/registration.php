<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends MX_Controller{

    public function regAction(){

        $data = array('addUser'=>0, 'submit'=>'', 'name'=>'', 'email'=>'', 'password'=>'');

        if(isset($_POST['submit'])){    //Провереям пришли ли данные из формы, если да то присваиваем переменным соответствующие элементы $_POST
            $data['submit'] = 'submit';
            if(isset($_POST['name'])){
                $data['name'] = $_POST['name'];
            }
            if(isset($_POST['email'])){
                $data['email'] = $_POST['email'];
            }
            if(isset($_POST['password'])){
                $data['password'] = $_POST['password'];
            }
        }

        $data['errors'] = false;

        if(!$this->checkName($data['name'])){    // вызываем по очереди 3 фун-и для проверки данных из формы, если есть ошибки пишем их в массив error
            $data['errors'][] = 'Имя не должно быть короче 2-х символов';
        }

        if(!$this->checkEmail($data['email'])){
            $data['errors'][] = 'Не корректный Email';
        }

        if(!$this->checkPassword($data['password'])){
            $data['errors'][] = 'Пароль должен быть длинее';
        }

        $this->load->model('modelRegistration');    //проверяем на наличие email в БД, если есть ошибку пишем в массив error
        $emailExists = $this->modelRegistration->emailExists($data['email']);
        if($emailExists){
            $data['errors'][] = 'Такой Email уже используется';
        }

        if($data['errors'] == false){
            $this->load->model('modelRegistration');    //проверяем на наличие email в БД, если есть ошибку пишем в массив error
            $data['addUser'] = $this->modelRegistration->addUser($data['name'], $data['email'], $data['password']);
        }

        $this->load->view('viewRegistration', $data);
    }

    function checkName($name){
        if(strlen($name) >= 2){
            return true;
        }
        return false;
    }

    function checkEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    function checkPassword($password){
        if(strlen($password) >= 6){
            return true;
        }
        return false;
    }
}