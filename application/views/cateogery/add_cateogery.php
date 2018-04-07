<?php echo validation_errors(); ?>

<?php echo form_open('cateogery/add_cateogery') ?>
<div class="container">
    <div class="form-group">
        <label>Cateogery Name</label>
        <input type="text" class="form-control" name="cateogery_name">
    </div>

    <button type="submit" class="btn btn-primary btn-lg">Add_Cateogery</button>
</div>
<?php echo form_close(); ?>
