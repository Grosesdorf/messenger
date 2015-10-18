<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAuthorization extends CI_Model{

    public function checkUser($email, $password){
        $sql = "SELECT id FROM Users WHERE email = ? AND password = ?";
        $result = ($this->db->query($sql, array($email, $password)));
        $row = $result->row_array();
        if($row['id']){
            return $row['id'];
        }
        return false;
    }

    public function authUser($userId){
        session_start();
        $_SESSION['userId'] = $userId;
    }

    public function checkLogged(){

        session_start();
        if(isset($_SESSION['userId'])){
            return $_SESSION['userId'];
        }

        header("Location: /auth");
    }

}