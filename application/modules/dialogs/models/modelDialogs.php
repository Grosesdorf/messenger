<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ModelDialogs extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function getDialogs($sort){

        if($sort == "ASC"){
            $sort = 'ORDER BY date_add';
        }else {
            $sort = 'ORDER BY date_add DESC';
        }

        $sql = "SELECT Dialogs.id, Users.name AS name_own, name_comp, Messages.message, Messages.date_add
                FROM Dialogs
                LEFT JOIN Users ON Users.id = Dialogs.id_owner_dialog
                LEFT JOIN ((SELECT Users.id, Users.name as name_comp FROM Users) AS Users_tmp) ON Users_tmp.id = Dialogs.id_companion_dialog
                JOIN Messages ON Messages.id_dialog = Dialogs.id " . $sort;
        $result = $this->db->query($sql);
        return $result;
    }
}