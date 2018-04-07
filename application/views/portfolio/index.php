<div class="container-fluid">
<a href="<?php echo base_url('portfolio/add_portfolio') ?>" class="btn btn-success pull-right add_portfolio"><i class="fa fa-plus"></i> Add Portfolio</a>
</div>
<h1 class="post_header text-center"><i class="fa fa-arrow-circle-down fa-lg"></i>  <?php echo $title; ?></h1>

<?php foreach($portfolios as $portfolio): ?>

    <div class="post">
        <div class="row">
            <div class="col-md-3">
                <img class="img-responsive" src="<?php echo base_url(); ?>assets/portfolio_image/<?php echo $portfolio['image']; ?>">
            </div>
            <div class="col-md-9">
                <h2 class="post_title portfolio_title"> <?php  echo $portfolio['name'] ?> </h2> <small>Posted In Cateogery <strong class="cateogery_name"> <?php echo $portfolio['cateogery_name']; ?></strong> </small>
                <h4>
                    <?php echo word_limiter( $portfolio['description'],50);?>
                </h4>

                    <div class="post_buts">
                        <a href="<?php echo base_url('portfolio/edit_portfolio/'.$portfolio['id'].''); ?>"> <span class="btn btn-info"><i class="fa fa-edit"></i>Edit</span> </a>
                        <a onclick="return confirm('aru you sure you wnat to delete')" href="<?php echo base_url('portfolio/delete_portfolio/'.$portfolio['id'].''); ?>"<?php echo $portfolio['id']?><span class="btn btn-danger"><i class="fa fa-close"></i>Delete</span> </a>
                    </div>
                <a href="<?php echo site_url('portfolio/view_portfolio/'.$portfolio['id'].' '); ?> ">Read More</a>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<div class="text-center pagination_link">
    <?php echo $this->pagination->create_links(); ?>
</div>