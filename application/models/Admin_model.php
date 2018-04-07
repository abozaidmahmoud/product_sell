<?php

class Admin_model extends CI_Model{

    function login($data){
        $query=$this->db->get_where('admin',$data);
        if($query->num_rows()==1){
            return true;
        }
        else{
            return false;
        }


    }
}