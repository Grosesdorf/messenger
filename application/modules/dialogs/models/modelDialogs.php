<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ModelDialogs extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function getDialogs($id, $sort){

        if($sort == "ASC"){
            $sort = 'ORDER BY date_message';
        }else {
            $sort = 'ORDER BY date_message DESC';
        }

        $sql = "SELECT Dialogs.id, Dialogs.id_owner_dialog, Users.name, Dialogs.id_companion_dialog, name_mess, message, Dialogs.date_add AS date_dialog, date_message
                FROM Dialogs
                JOIN (SELECT id_dialog, message, name AS name_mess, Messages.date_add AS date_message
                      FROM Messages
                      JOIN Users
                      ON Messages.id_user = Users.id
                      ORDER BY date_message DESC) AS M
				ON Dialogs.id = M.id_dialog
				JOIN Users ON Dialogs.id_companion_dialog = Users.id
                WHERE id_owner_dialog = {$id} OR id_companion_dialog = {$id}
                GROUP BY Dialogs.id
                {$sort}";
        $result = $this->db->query($sql);
        $rows = $result->result();
        return $rows;
    }

    public function getNameById($id){
        $sql = "SELECT name FROM Users WHERE id = '{$id}'";
        $result = $this->db->query($sql);
        $rows = $result->row_array();
        return $rows['name'];
    }
}