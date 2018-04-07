<?php

class Admin extends CI_Controller{

     public function __construct(){
         parent::__construct();
         $this->load->model('Admin_model');
     }

    function login(){
        if($this->session->userdata('username')){
            redirect('dashbord/index');
        }
        $datas['title']='admin';
        //check form errors
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run()==false){
            $this->load->view('templates/header',$datas);
            $this->load->view('admin/login_view');
            $this->load->view('templates/footer');

        }
        //decrypt password
        else {
            $password = md5($this->input->post('password'));
            $data = array(
                //filter the input and sanitize it before insert it in DB
                'username' => filter_var($this->input->post('username'), FILTER_SANITIZE_STRING),
                'password' => $password,
            );

            $result = $this->Admin_model->login($data);
            if ($result == true) {
                //if admin exist in DB store his username in session
                $this->session->set_userdata(array(
                    'username' => $this->input->post('username')
                ));
                //redirect to admin panel
                redirect('dashbord/index');
            } else {
                //display message if login data not exist in DB
                $this->session->set_flashdata('invalid_login', 'please check username or passeord');
                $this->load->view('templates/header', $datas);
                $this->load->view('admin/login_view');
                $this->load->view('templates/footer');
            }
        }

    }

    function logout(){
        //destroy admin session
        $this->session->unset_userdata('username');
        redirect(base_url());
    }

}