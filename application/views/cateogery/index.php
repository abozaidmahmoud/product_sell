<div class="container-fluid">
    <a href="<?php echo base_url('cateogery/add_cateogery') ?>" class="btn btn-success pull-right add_portfolio"><i class="fa fa-plus"></i> Add Cateogery</a>
</div>
<div class="row">
        <h1 class="post_header">All Cateogeries</h1>
                <?php foreach ($cateogeries as $cateogery): ?>
                        <div class="col-md-3">
                            <a href="<?php echo base_url();?>cateogery/portfolio/<?php echo $cateogery['id_cateogery']?>">
                                      <div class="cateogery_design">
                                         <?php echo $cateogery['cateogery_name']; ?>
                                                <a href="<?php echo base_url('cateogery/delete/'.$cateogery['id_cateogery']);?> " >
                                                    <span class="cateogery_delete btn-danger"><i class="fa fa-close"></i></span>
                                                </a>

                                      </div>
                             </a>
                        </div>
                <?php endforeach; ?>

     </div>
