<?php

class Cateogery extends CI_Controller{

    function __construct(){
        parent::__construct();
    }



    function index(){
        //check if admin is login or not
        if(!isset($this->session->userdata['username'])){
            redirect('Home/home_page');
        }
        $data['title']='cateogeries';
        $data['cateogeries']=$this->Cateogery_model->get_cateogeries();
        $this->load->view('templates/header',$data);
        $this->load->view('cateogery/index',$data);
        $this->load->view('templates/footer');
    }

    function add_cateogery(){
        //check if admin is login or not
        if(!($this->session->userdata('username'))){
            redirect('Home/home_page');
        }
        $data['title']='cateogery';
        $this->form_validation->set_rules('cateogery_name','Cateogery_Name','required');

        if($this->form_validation->run()==false){
            $this->load->view('templates/header',$data);
            $this->load->view('cateogery/add_cateogery');
            $this->load->view('templates/footer');
        }
        else{

            $data['cateogery']=array(
                //filter cateogery to be string before inserted it in DB
                'cateogery_name'=>filter_var($this->input->post('cateogery_name'),FILTER_SANITIZE_STRING)
            );
            $this->Cateogery_model-> add_cateogery($data['cateogery']);
            $this->session->set_flashdata('add_cateogery','cateogery is added successfully');
            redirect('cateogery/index');

        }
    }

    function get_cateogeries(){
        //check if admin is login or not
        if(!($this->session->userdata('username'))){
            redirect('Home/home_page');
        }
       $this->Cateogery_model->get_cateogeries();
    }

    public function delete($id){
        //check if admin is login or not
        if(!($this->session->userdata('username'))){
            redirect('Home/home_page');
        }
        $data['title']='dashbord';
        //check if id exists in DB
        if($this->Cateogery_model->delete($id) ==false){
            $this->session->set_flashdata('id_not_exist','sorry this id not  exists');
            redirect(base_url('dashbord'));

        }
        else {
            $this->Cateogery_model->delete($id);
            $this->session->set_flashdata('cateogery_deleted', 'cateogery deleted successfully');
            redirect('cateogery');
        }
    }

    public function portfolio($id){
        //get portfolio in cateogery
        //check if user is login or not
        if(!isset($this->session->userdata['username'])){
            redirect('Home/home_page');
        }
        $data['title']=$this->Cateogery_model->getcateogery($id)->cateogery_name;
        $data['portfolios']=$this->Portfolio_model->get_portfolio_by_cateogery($id);
        $this->load->view('templates/header');
        $this->load->view('portfolio/index',$data);
        $this->load->view('templates/footer');

    }

}