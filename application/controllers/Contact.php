<?php

class Contact extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Contact_model');
    }

    //submit data to DB that user put in contact form
    function index(){

        $data=array(
            'name'=>filter_var($this->input->post('name'),FILTER_SANITIZE_STRING),
            'email'=>filter_var($this->input->post('email'),FILTER_SANITIZE_EMAIL),
            'subject'=>filter_var($this->input->post('subject'),FILTER_SANITIZE_STRING),
            'message'=>filter_var($this->input->post('message'),FILTER_SANITIZE_STRING),

        );
        $query=$this->Contact_model->add_contact($data);
        if($query==true) {
            $this->session->set_flashdata('contact_added','messgae sent successfully we will message soon');
            redirect('Home/home_page','refresh');
        }
        else{
            echo'sorry try again';
        }
    }
}