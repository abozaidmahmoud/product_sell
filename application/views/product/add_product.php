<?php echo validation_errors(); ?>
<?php echo form_open_multipart('products/add_product') ?>
<div class="container">
    <div class="form-group">
        <label>Product Name</label>
        <input type="text" class="form-control" name="name" placeholder="enter name of product ">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea  id="editor1" class="form-control" name="description"  placeholder="enter description of item "></textarea>
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="text" class="form-control" name="price" autocomplete="off" placeholder="enter price in dollar">
    </div>
    <div class="form-group">
        <input type="file"  name="userfile">
    </div>
    <button type="submit" class="btn btn-primary">Add Product</button>
</div>
<?php echo form_close(); ?>
