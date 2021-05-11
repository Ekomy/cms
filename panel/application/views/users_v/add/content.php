<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Add New User
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("users/save"); ?>" method="post">
                    <div class="form-group">
                        <label>User Name</label>
                        <input class="form-control" placeholder="User Name" name="user_name"  value="<?php echo isset($form_error) ? set_value("user_name") : "" ; ?>"  >
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("user_name"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Name Surname</label>
                        <input class="form-control" placeholder="Name | Surname" name="full_name" value="<?php echo isset($form_error) ? set_value("full_name") : "" ; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("full_name"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input class="form-control" type="email" placeholder="E-mail" name="email" value="<?php echo isset($form_error) ? set_value("email") : "" ; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("email"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" placeholder="Password" name="password" >
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("password"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Re_Password</label>
                        <input class="form-control" type="password" placeholder="Re Password" name="re_password">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("re_password"); ?></small>
                        <?php } ?>
                    </div>


                    <button type="submit" class="btn btn-primary btn-md btn-outline">Save</button>
                    <a href="<?php echo base_url("users"); ?>" class="btn btn-md btn-danger btn-outline">Cancel</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>