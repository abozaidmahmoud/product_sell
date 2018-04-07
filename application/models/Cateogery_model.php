<?php
class Cateogery_model extends CI_Model{

    function get_cateogeries(){
        $query=$this->db->get('cateogery');
        return $query->result_array();
    }

    function add_cateogery($data){
        $this->db->insert('cateogery',$data);
    }

    function delete($id){
        $this->db->where('id_cateogery',$id);
        $this->db->delete('cateogery');
       if($this->db->affected_rows()>0 ){
           return true;
       }
       else{
           return false;
       }

    }
    function num_of_rows(){
        $query=$this->db->get('cateogery');
        return $query->num_rows();
    }
    public function getcateogery($id){

        $query=$this->db->get_where('cateogery',array('id_cateogery'=>$id));
        return $query->row();

    }


}
