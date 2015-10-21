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

    function addMessage($dialogId, $userId, $message){
        $data = [
            'id_dialog' => $dialogId,
            'id_user' => $userId,
            'message' => $message
        ];

        $addMessageResult = $this->db->insert('Messages', $data);
        return $addMessageResult;
    }
}