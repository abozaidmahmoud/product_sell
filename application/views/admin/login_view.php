
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1 class="text-center">Login Page</h1>
        <?php echo validation_errors(); ?>
        <?php echo form_open('Admin/login'); ?>
        <div class="form-group">
         <i class="fa fa-user-secret fa-lg"></i>  <label>username</label>
            <input type="text" name="username" class="form-control" autofocus autocomplete="off">
        </div>
        <div class="form-group">
            <i class="fa fa-key fa-lg"></i>  <label>password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-info col-md-4 col-md-offset-4">Login</button>
        <?php echo form_close(); ?>
    </div>
</div>




