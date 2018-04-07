
<a href="<?php echo base_url('products'); ?>"><span class="btn btn-default pull-right">Back </span></a>
<?php foreach($product as $product): ?>

    <div class="post">
        <div class="row">
            <div class="col-md-3">
                <img class="img-responsive" src="<?php echo base_url(); ?>assets/product_image/<?php echo $product['image']; ?>">
            </div>
            <div class="col-md-9">
                <h2 class="post_title"> <?php  echo $product['name'] ?> </h2>
                 <span class="product_price"> Price :  <?php  echo $product['price']."$"; ?></span>
                <h4>
                    <?php echo $product['description'];?>
                </h4>
                <div class="post_buts">
                    <a href="<?php echo base_url('products/edit_product/'.$product['id']); ?>"><span class="btn btn-info"><i class="fa fa-edit"></i>Edit</span> </a>
                    <a  onclick="return confirm('aru you sure you wnat to delete')" href="<?php echo base_url('products/delete_product/'.$product['id']); ?>"><span class="btn btn-danger "><i class="fa fa-close"></i>Delete</span> </a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
