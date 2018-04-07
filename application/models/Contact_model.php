<?php

class Contact_model extends CI_Model{

    function add_contact($data){
       $query= $this->db->insert('contact',$data);
       if($query){
           return true;
       }
       else{
           return false;
       }
    }
}