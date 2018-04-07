<?php

class Dashbord extends CI_Controller{

    public function index(){
        //check if admin is loged in load the index view of dashbord
        $data['title']='dashbord';
        if($this->session->userdata('username')) {
            $this->load->view('templates/header',$data);
            $this->load->view('dashbord/index');
            $this->load->view('templates/footer');
        }
        //else redirect to admin login page
        else{
            redirect('admin/login');
        }
    }


}