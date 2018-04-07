<?php

class Product_model extends CI_Model{

    function add_product($image){

        $data=array(
            'name'=>filter_var($this->input->post('name'),FILTER_SANITIZE_STRING),
            'description'=>filter_var($this->input->post('description'),FILTER_SANITIZE_STRING),
            'price'=>filter_var($this->input->post('price'),FILTER_SANITIZE_NUMBER_INT),
            'image'=>$image
        );
        $this->db->insert('products',$data);
    }

    function get_products($limit=false,$offset=false){
        //pagination
        if($limit) {
            $this->db->limit($limit, $offset);
        }
        $query=$this->db->get('products');
        return $query->result_array();
    }
    function num_of_rows(){
        $query=$this->db->get('products');
        return $query->num_rows();
    }
    function products(){
        $this->db->order_by('id','desc');
        $this->db->limit(4);
        $query=$this->db->get('products');
        return $query->result_array();
    }
    function view_product($id){
        $this->db->where('id',$id);
        $query= $this->db->get('products');
        return $query->result_array();
        if($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }
    function update_product($id,$data){
        $this->db->where('id',$id);
        $this->db->update('products',$data);
        if($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }

    }
    function delete_product($id){
        $this->db->where('id',$id);
        $this->db->delete('products');
        if($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }
}