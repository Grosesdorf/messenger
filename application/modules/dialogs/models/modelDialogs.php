<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ModelDialogs extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function getDialogs($orderBy){
        $this->db->order_by($orderBy, 'desc');
        $query = $this->db->get('Dialogs');
        return $query;
    }
}