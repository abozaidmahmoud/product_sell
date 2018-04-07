<div class="container-fluid">
    <a href="<?php echo base_url('products/add_product');  ?>" class="btn btn-success pull-right add_portfolio"> <i class="fa fa-plus fa-lg"></i> Add product</a>
</div>
<h1 class="post_header text-center"><i class="fa fa-arrow-circle-down fa-lg"></i> <?php echo $title; ?></h1>

<?php foreach($products as $product): ?>

    <div class="post">
        <div class="row">
            <div class="col-md-3">
                <img class="img-responsive" src="<?php echo base_url(); ?>assets/product_image/<?php echo $product['image']; ?>">
            </div>
            <div class="col-md-9">
                <h2 class="post_title"> <?php  echo $product['name'] ?> </h2>
                <span class="product_price"> Price :  <?php  echo $product['price']."$"; ?></span>
                <h4>
                    <?php echo word_limiter( $product['description'],50);?>
                </h4>

                <div class="post_buts">
                    <a href="<?php echo base_url('products/edit_product/'.$product['id'].''); ?>"> <span class="btn btn-info"><i class="fa fa-edit"></i>Edit</span> </a>
                    <a  onclick="return confirm('aru you sure you wnat to delete')" href="<?php echo base_url('products/delete_product/'.$product['id'].''); ?>"<?php echo $product['id']?><span class="btn btn-danger"><i class="fa fa-close"></i>Delete</span> </a>
                </div>
                <a href="<?php echo site_url('products/view_product/'.$product['id'].' '); ?> ">Read More</a>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<div class="text-center pagination_link">
    <?php echo $this->pagination->create_links(); ?>
</div>
