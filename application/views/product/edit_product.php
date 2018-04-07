<?php echo validation_errors(); ?>

<?php echo form_open_multipart('products/update_product') ?>
<div class="container">
    <?php foreach($item as $item): ?>
    <div class="form-group">
        <label>Product Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo $item['name']; ?>">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea  id="editor1" class="form-control" name="description"><?php echo $item['description']; ?></textarea>
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="text" class="form-control" name="price" value="<?php echo $item['price']; ?>">
    </div>
        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
    <div class="form-group">
        <input type="file"  name="userfile">
    </div>
<?php endforeach; ?>
    <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-save fa-lg "></i> Save</button>
</div>
<?php echo form_close(); ?>
