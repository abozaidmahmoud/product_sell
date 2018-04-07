<?php echo validation_errors(); ?>

<?php echo form_open_multipart('portfolio/add_portfolio') ?>
<div class="container">
    <div class="form-group">
        <label>Portfolio Name</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea  id="editor1" class="form-control" name="description"></textarea>
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
    <input type="file" name="userfile">
    </div>
    <button type="submit" class="btn btn-primary btn-lg">Add</button>
</div>
<?php echo form_close(); ?>
