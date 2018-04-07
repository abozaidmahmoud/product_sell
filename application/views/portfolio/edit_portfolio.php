<?php echo validation_errors(); ?>
<?php echo form_open_multipart('portfolio/update_portfolio') ?>
<div class="container">
    <?php foreach ($portfolio as $portfolio): ?>
    <div class="form-group">
        <label>Portfolio Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo $portfolio['name']; ?>">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea type="text" id="editor1" class="form-control" name="description" ><?php echo $portfolio['description']; ?></textarea>
    </div>
        <div class="form-group">
            <label>Cateogery</label>
            <!-- get all cateogeries from cateogery table and display in select -->
            <?php
            $cateogeries=$this->Cateogery_model->get_cateogeries();
            ?>
            <select name="select">
                <?php foreach ($cateogeries as $cateogery): ?>
                    <option value=<?php echo $cateogery['id_cateogery']; ?> ><?php echo $cateogery['cateogery_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    <div class="form-group">
        <input  type="file"  name="userfile" value="<?php echo $portfolio['image']; ?>" >
        <input type="hidden" name="id" value="<?php echo $portfolio['id']; ?>">
    </div>
    <?php endforeach; ?>

    <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-save fa-lg"></i> Save</button>
</div>
<?php echo form_close(); ?>
