
<h2 class="text-center"><i class="fa fa-diamond fa-lg"></i> Dashbord</h2>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="statist member ">
                <i class="fa fa-users"></i>
                <div class="info">
                    Total Portfolios
                    <span>
								<a href="<?php echo base_url('portfolio'); ?>">
                                    <?php
                                        $rows=$this->Portfolio_model->num_of_rows();
                                        echo $rows;
                                    ?>
								</a>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="statist pending">
                <i class="fa fa-product-hunt"></i>
                <div class="info">
                    Total Products
                    <span>
							<a href="<?php echo base_url('products'); ?>">
                                <?php
                                     $rows=$this->Product_model->num_of_rows();
                                     echo $rows;
                                 ?>
							 </a>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="statist items">
                <i class="fa fa-tag"></i>
                <div class="info">
                    All Cateogery
                    <span>
							<a href="<?php echo base_url('cateogery'); ?>">
                                <?php
                                $rows=$this->Cateogery_model->num_of_rows();
                                echo $rows;
                                ?>
							 </a>
                    </span>
        </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="statist comments">
                <i class="fa fa-comments"></i>
                <div class="info">
                    Total comments
                    <span>0</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
        <div class="row">
                <!-- start latest added portfolios -->
                <div class="col-md-6 latest">
                        <div class="panel">
                            <div class="panel-heading">
                                <i class="fa fa-users fa-lg"></i> Latest  Added  Portfolios
                                <span class="plus-toggle pull-right">
                                        <i class="fa fa-plus  fa-lg "></i>
                                </span>
                             </div>
                            <div class="panel-body">
                                    <ul class='latest_ul list-unstyled'>

                                        <?php $rows=$this->Portfolio_model->portfolios(); ?>
                                        <?php foreach ($rows as $row): ?>
                                            <li>
                                               <a href="<?php echo base_url('portfolio/view_portfolio/'.$row['id']); ?> "> <?php echo $row['name'];?></a>
                                                <span class='btn btn-default pull-right'>
                                                 <a href='<?php echo base_url('portfolio/edit_portfolio/'.$row['id'])?>'> <i class='fa fa-edit '>Edit </i></a>
                                               </span>
                                                <span class='btn btn-default pull-right'>
                                                    <a  onclick="return confirm('aru you sure you wnat to delete')" href='<?php echo base_url('portfolio/delete_portfolio/'.$row['id'])?>'> <i class='fa fa-close '>DELETE </i></a>
                                                </span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                            </div>
                        </div>
                </div><!-- end latest added portfolios -->

            <!-- start latest added products -->
            <div class="col-md-6 latest">
                <div class="panel">
                    <div class="panel-heading">
                        <i class="fa fa-product-hunt fa-lg"></i> Latest  Added products
                        <span class="plus-toggle pull-right">
                                        <i class="fa fa-plus  fa-lg "></i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <ul class='latest_ul list-unstyled'>
                            <?php $rows=$this->Product_model->products(); ?>
                            <?php foreach ($rows as $row): ?>
                                <li>
                                    <a href="<?php echo base_url('products/view_product/'.$row['id']); ?> "> <?php echo $row['name'];?></a>
                                    <span class='btn btn-default pull-right'>
                                                 <a href='<?php echo base_url('products/edit_product/'.$row['id'])?>'  > <i class='fa fa-edit'>Edit </i></a>
                                               </span>
                                    <span class='btn btn-default pull-right'>
                                                    <a  onclick="return confirm('aru you sure you wnat to delete')" href='<?php echo base_url('products/delete_product/'.$row['id'])?>'> <i class='fa fa-close'>DELETE </i></a>
                                                </span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div><!-- end latest added products -->
        </div>
</div>





