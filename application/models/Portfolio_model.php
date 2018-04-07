<?php

class Portfolio_model extends CI_Model{

    function add_portfolio($image){

        $data=array(
            'name'=>filter_var($this->input->post('name'),FILTER_SANITIZE_STRING),
            'description'=>filter_var($this->input->post('description'),FILTER_SANITIZE_STRING),
            'image'=>$image,
            'cateogery_id'=>filter_var($this->input->post('select'),FILTER_SANITIZE_NUMBER_INT)
        );
        $this->db->insert('portfolio',$data);
    }

    function get_portfolios($limit=false,$offset=false){
        //pagination
        if($limit) {
            $this->db->limit($limit, $offset);
        }
        $this->db->join('cateogery','portfolio.cateogery_id=cateogery.id_cateogery');
        $query=$this->db->get('portfolio');
        return $query->result_array();
    }
    function portfolios(){
        $this->db->order_by('id','desc');
        $this->db->limit(4);
        $query=$this->db->get('portfolio');
        return $query->result_array();
    }
    function num_of_rows(){
        $query=$this->db->get('portfolio');
        return $query->num_rows();
    }

    function view_portfolio($id){
        $this->db->where('id',$id);
       $query= $this->db->get('portfolio');
       return $query->result_array();
       //check of id of portfolio exist or not
        if($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }
    function update_portfolio($id,$data){
        $this->db->where('id',$id);
        $this->db->update('portfolio',$data);
        //check of id of portfolio exist or not
        if($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }

    }
    function delete_portfolio($id){
        $this->db->where('id',$id);
        $this->db->delete('portfolio');
        if($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }
    function get_portfolio_by_cateogery($id){
        $this->db->join('cateogery','cateogery.id_cateogery=portfolio.cateogery_id');
        $query=$this->db->get_where('portfolio',array('cateogery_id'=>$id));
        return $query->result_array();
    }
}