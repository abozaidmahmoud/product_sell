<?php

class Products extends CI_Controller{

    function __construct(){
        parent::__construct();
    }


    function index($offset=0){
        if(!($this->session->userdata('username'))){
            redirect('Home/home_page');
        }
        $data['title']='product';
        $config['base_url']=base_url().'products/index/';
        $config['total_rows']=$this->db->count_all('products');
        $config['per_page']=3;
        $config['uri_segment']=3;
        $config['attributes']=array('class'=>'pagination_link');


        $this->pagination->initialize($config);
        $data['products']=$this->Product_model->get_products($config['per_page'],$offset);
        if(isset( $data['products'])) {
            $this->load->view('templates/header',$data);
            $this->load->view('product/index', $data);
            $this->load->view('templates/footer');
        }
        else{
            echo"<p class='alert alert-danger'>Sorry there is no product to view</p>";
        }
    }

    function view_product($id){
        if(!($this->session->userdata('username'))){
            redirect('Home/home_page');
        }
        $data['title']='product';
        if($this->Product_model->view_product($id)==false){
            $this->session->set_flashdata('id_not_exist','sorry this id not  exists');
            redirect(base_url('dashbord'));
        }
        else {
            $data['product'] = $this->Product_model->view_product($id);
            $this->load->view('templates/header', $data);
            $this->load->view('product/view_product', $data);
            $this->load->view('templates/footer');
        }
    }

    function add_product(){
        if(!($this->session->userdata('username'))){
            redirect('Home/home_page');
        }
        $data['title']='product';
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('description','description','required');
        $this->form_validation->set_rules('price','Price','required');

        if($this->form_validation->run()==false){
            $this->load->view('templates/header',$data);
            $this->load->view('product/add_product');
            $this->load->view('templates/footer');
        }
        else{
            $config['upload_path']          = './assets/product_image';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 1000;
            $config['max_width']            = 2000;
            $config['max_height']           = 1768;
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('userfile')){
                print_r($this->upload->display_errors());
                $image='noimage.jpg';

            }
            else{
                $image=$_FILES['userfile']['name'];
            }
            $this->Product_model-> add_product($image);
            $this->session->set_flashdata('add_product','product added successfully');
            redirect('products/index');
        }
    }

    function edit_product($id){
        if(!($this->session->userdata('username'))){
            redirect('Home/home_page');
        }
        $data['title']='product';
        if($this->Product_model->view_product($id)==false){
            $this->session->set_flashdata('id_not_exist','sorry this id not  exists');
            redirect(base_url('dashbord'));
        }
        else{
            $data['item'] = $this->Product_model->view_product($id);
            $this->load->view('templates/header', $data);
            $this->load->view('product/edit_product', $data);
            $this->load->view('templates/footer');
        }
    }

    function update_product(){
        if(!($this->session->userdata('username'))){
            redirect('Home/home_page');
        }
        $data['title']='product';
        $id = $this->input->post('id');
        $data['item']=$this->Product_model->view_product($id);
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header',$data);
            $this->load->view('product/edit_product',$data);
            $this->load->view('templates/footer');
        }
        else{
            $config['upload_path'] = './assets/product_image';
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

            $data = array(
                'name'=>filter_var($this->input->post('name'),FILTER_SANITIZE_STRING),
                'description'=>filter_var($this->input->post('description'),FILTER_SANITIZE_STRING),
                'price'=>filter_var($this->input->post('price'),FILTER_SANITIZE_NUMBER_INT),
                'image'=>$image
            );

                $this->Product_model->update_product($id, $data);
                $this->session->set_flashdata('update_product', 'product updated successfully');
                redirect('products/index');

        }
    }

    function delete_product($id)
    {
        if (!($this->session->userdata('username'))) {
            redirect('Home/home_page');
        }
        if ($this->Product_model->delete_product($id) == false) {
            $this->session->set_flashdata('id_not_exist', 'sorry this id not  exists');
            redirect(base_url('dashbord'));
        } else {
            $this->Product_model->delete_product($id);
            $this->session->set_flashdata('delete_product', 'product deleted successfully');
            redirect('products/index');
        }
    }
}