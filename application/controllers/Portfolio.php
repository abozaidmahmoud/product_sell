<?php

class Portfolio extends CI_Controller{

    function __construct(){
        parent::__construct();
    }


    function index($offset=0){
        //check if trying to enter to portfolio/index through url it check if it not admin redirect to home_page
        if(!($this->session->userdata('username'))){
            redirect('Home/home_page');
        }
        $data['title']='portfolio';
        $config['base_url']=base_url().'portfolio/index/';
        $config['total_rows']=$this->db->count_all('portfolio');
        $config['per_page']=3;
        $config['uri_segment']=3;
        $config['attributes']=array('class'=>'pagination_link');
        $this->pagination->initialize($config);
        $data['portfolios']=$this->Portfolio_model->get_portfolios($config['per_page'],$offset);
        $this->load->view('templates/header',$data);
        $this->load->view('portfolio/index',$data);
        $this->load->view('templates/footer');
    }


    function view_portfolio($id){
        if(!($this->session->userdata('username'))){
            redirect('Home/home_page');
        }
        $data['title']='portfolio';
        //check of id of product exist before display it
        if($this->Portfolio_model->view_portfolio($id)==false){
            $this->session->set_flashdata('id_not_exist','sorry this id not  exists');
            redirect(base_url('dashbord'));
        }
        else {
            $data['portfolio'] = $this->Portfolio_model->view_portfolio($id);
            $this->load->view('templates/header', $data);
            $this->load->view('portfolio/view_portfolio', $data);
            $this->load->view('templates/footer');
        }
    }

    function add_portfolio(){
        if(!($this->session->userdata('username'))){
            redirect('Home/home_page');
        }
        $data['title']='portfolio';
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('description','description','required');

        if($this->form_validation->run()==false){
            $this->load->view('templates/header',$data);
            $this->load->view('portfolio/add_portfolio');
            $this->load->view('templates/footer');
        }
        else{
            //upload image configuration
            $config['upload_path']          = './assets/portfolio_image';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 1000;
            $config['max_width']            = 2000;
            $config['max_height']           = 1768;
            $this->load->library('upload', $config);//send config to library upload
            //check if upload successfully
         if($this->upload->do_upload('userfile')){
            $image=$_FILES['userfile']['name'];
         }
         else{
             $image='noimage.jpg';
             print_r($this->upload->display_errors());
         }
            $this->Portfolio_model-> add_portfolio($image);
            $this->session->set_flashdata('add_portfolio','portfolio is added successfully');
            redirect('portfolio/index');

        }
    }

    function edit_portfolio($id){
        if(!($this->session->userdata('username'))){
            redirect('Home/home_page');
        }
        $data['title']='portfolio';
        //check of id of product exist before edit it
        if($this->Portfolio_model->view_portfolio($id)==false){
            $this->session->set_flashdata('id_not_exist','sorry this id not  exists');
            redirect(base_url('dashbord'));
        }
        else {
            $data['portfolio'] = $this->Portfolio_model->view_portfolio($id);
            $this->load->view('templates/header', $data);
            $this->load->view('portfolio/edit_portfolio', $data);
            $this->load->view('templates/footer');
        }
    }

    function update_portfolio(){
        if(!($this->session->userdata('username'))){
            redirect('Home/home_page');
        }
        $data['title']='portfolio';
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('select', 'Cateogery', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header',$data);
            $this->load->view('portfolio/edit_portfolio');
            $this->load->view('templates/footer');
        } else {
            $config['upload_path'] = './assets/portfolio_image';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']             = 1000;
            $config['max_width']            = 2000;
            $config['max_height']           = 1768;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('userfile')) {
                $image = $_FILES['userfile']['name'];

            } else {
                $image='noimage.jpg';
                print_r($this->upload->display_errors());
            }
            $id = $this->input->post('id');
            $data = array(
                'name'=>filter_var($this->input->post('name'),FILTER_SANITIZE_STRING),
                'description'=>filter_var($this->input->post('description'),FILTER_SANITIZE_STRING),
                'image'=>$image,
                'cateogery_id'=>filter_var($this->input->post('select'),FILTER_SANITIZE_NUMBER_INT)
            );
            if( $this->Portfolio_model->update_portfolio($id,$data)==false){
                $this->session->set_flashdata('id_not_exist','sorry this id not  exists');
                redirect(base_url('dashbord'));
            }
            else {
                $this->Portfolio_model->update_portfolio($id, $data);
                $this->session->set_flashdata('update_portfolio', 'portfolio updated successfully');
                redirect('portfolio/index');
            }
        }
    }

    function delete_portfolio($id){
        if(!($this->session->userdata('username'))){
            redirect('Home/home_page');
        }
        $data['title']='dashbord';
        //check if id exists in DB
        if( $this->Portfolio_model->delete_portfolio($id) ==false){
            $this->session->set_flashdata('id_not_exist','sorry this id not  exists');
            redirect(base_url('dashbord'));
        }
        else {
            $this->Portfolio_model->delete_portfolio($id);
            $this->session->set_flashdata('delete_portfolio', 'portfolio successfully  deleted');
            redirect('portfolio/index');
        }

    }

}