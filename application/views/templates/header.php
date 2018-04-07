
<html>
    <head>
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/design.css">
        <script src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.css">
    </head>
    <body>
    <nav class="navbar navbar-inverse ">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('Home/home_page'); ?>">My Website</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav  ">
                    <li class=""><a href="<?php echo base_url('Home/home_page'); ?>">Home</a></li>
                    <li><a href="<?php echo base_url('dashbord'); ?>">Dashbord</a></li>
                    <li><a href="<?php echo base_url()."portfolio/index"; ?>">portfolio</a></li>
                    <li><a href="<?php echo base_url()."products/index"; ?>">Products</a></li>
                    <li><a href="<?php echo base_url()."cateogery"; ?>">cateogery</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(!isset($this->session->userdata['username'])): ?>
                        <li><a href="<?php echo base_url('Admin/login'); ?>">Login</a></li>
                    <?php endif; ?>
                    <?php if(isset($this->session->userdata['username'])): ?>
                        <li><a href="<?php echo base_url('admin/logout'); ?>">Logout</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container">

      <!-- check for flashdata session ti display message -->
        <?php if($this->session->flashdata('add_portfolio')): ?>
            <p class="alert alert-success"> <?php echo $this->session->flashdata('add_portfolio') ; ?> </p>
        <?php endif; ?>
        <?php if($this->session->flashdata('update_portfolio')): ?>
            <p class="alert alert-success"> <?php echo $this->session->flashdata('update_portfolio') ; ?> </p>
        <?php endif; ?>
        <?php if($this->session->flashdata('delete_portfolio')): ?>
            <p class="alert alert-success"> <?php echo $this->session->flashdata('delete_portfolio') ; ?> </p>
        <?php endif; ?>
        <?php if($this->session->flashdata('update_product')): ?>
            <p class="alert alert-success"> <?php echo $this->session->flashdata('update_product') ; ?> </p>
        <?php endif; ?>
        <?php if($this->session->flashdata('add_product')): ?>
            <p class="alert alert-success"> <?php echo $this->session->flashdata('add_product') ; ?> </p>
        <?php endif; ?>
        <?php if($this->session->flashdata('delete_product')): ?>
            <p class="alert alert-success"> <?php echo $this->session->flashdata('delete_product') ; ?> </p>
        <?php endif; ?>
        <?php if($this->session->flashdata('add_contact')): ?>
            <p class="alert alert-success"> <?php echo $this->session->flashdata('add_contact') ; ?> </p>
        <?php endif; ?>
        <?php if($this->session->flashdata('invalid_login')): ?>
            <p class="alert alert-danger"> <?php echo $this->session->flashdata('invalid_login') ; ?> </p>
        <?php endif; ?>
        <?php if($this->session->flashdata('add_cateogery')): ?>
            <p class="alert alert-success"> <?php echo $this->session->flashdata('add_cateogery') ; ?> </p>
        <?php endif; ?>
        <?php if($this->session->flashdata('cateogery_deleted')): ?>
            <p class="alert alert-success"> <?php echo $this->session->flashdata('cateogery_deleted') ; ?> </p>
        <?php endif; ?>
        <?php if($this->session->flashdata('id_not_exist')): ?>
            <p class="alert alert-danger"> <?php echo $this->session->flashdata('id_not_exist') ; ?> </p>
        <?php endif; ?>


