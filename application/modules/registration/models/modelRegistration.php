<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ModelRegistration extends CI_Model{
    public function addUser($name, $email, $password){
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'status' => 1,
            'role' => 2
        ];
        $addUserResult = $this->db->insert('Users', $data);
        return $addUserResult;
    }

    public function emailExists($email){
        $sql = "SELECT COUNT(*) AS count FROM Users WHERE email = '{$email}'";
        $result = $this->db->query($sql);
        $row = $result->row_array();
        if($row['count']){
            return true;
        }
        return false;
    }
}