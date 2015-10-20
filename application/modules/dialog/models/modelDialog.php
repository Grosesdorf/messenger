<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ModelDialog extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function getDialog($id){

        $sql = "SELECT *
                FROM
	              (SELECT id_user, message, date_add
	              FROM Messages
	              WHERE id_dialog = ?
	              ORDER BY date_add DESC LIMIT 5) AS LastMessages
                ORDER BY date_add";
        $result = $this->db->query($sql, array($id));
        $rows = $result->result();
        return $rows;
    }

//    public function getNameById($id){
//        $sql = "SELECT name FROM Users WHERE id = '{$id}'";
//        $result = $this->db->query($sql);
//        $rows = $result->row_array();
//        return $rows['name'];
//    }
}