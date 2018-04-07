<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }


    //this function send the products and portfolios to home_page to display to users
    function home_page(){
        $data['rows']=$this->Portfolio_model->get_portfolios();
        $data['products']=$this->Product_model->get_products();
        $this->load->view('include/header');
        $this->load->view('include/home_view',$data);
        $this->load->view('include/footer');

    }
}
