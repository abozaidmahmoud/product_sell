
<a href="<?php echo base_url('portfolio'); ?>"><span class="btn btn-default pull-right">Back </span></a>
<?php foreach($portfolio as $portfolio): ?>

    <div class="post">
        <div class="row">
            <div class="col-md-3">
                <img class="img-responsive" src="<?php echo base_url(); ?>assets/portfolio_image/<?php echo $portfolio['image']; ?>">
            </div>
            <div class="col-md-9">
                <h2 class="post_title  portfolio_title"> <?php  echo $portfolio['name'] ?> </h2>
                <h4>
                    <?php echo $portfolio['description'];?>
                </h4>

                <div class="post_buts">
                    <a href="<?php echo base_url('portfolio/edit_portfolio/'.$portfolio['id']); ?>"><span class="btn btn-info"><i class="fa fa-edit" ></i>Edit</span> </a>
                    <a  onclick="return confirm('aru you sure you wnat to delete')" href="<?php echo base_url('portfolio/delete_portfolio/'.$portfolio['id']); ?>"><span class="btn btn-danger "><i class="fa fa-close"></i>Delete</span> </a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
