<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Updating <?php echo "<b>$item->user_name</b> "; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("users/update/$item->id"); ?>" method="post">
                    <div class="form-group">
                        <label>User Name</label>
                        <input class="form-control" placeholder="User Name" name="user_name"  value="<?php echo isset($form_error) ? set_value("user_name") : $item->user_name ; ?>"  >
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("user_name"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Name Surname</label>
                        <input class="form-control" placeholder="Name | Surname" name="full_name" value="<?php echo isset($form_error) ? set_value("full_name") : $item->full_name ; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("full_name"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input class="form-control" type="email" placeholder="E-mail" name="email" value="<?php echo isset($form_error) ? set_value("email") : $item->email ; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("email"); ?></small>
                        <?php } ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Update </button>
                    <a href="<?php echo base_url("users"); ?>" class="btn btn-md btn-danger btn-outline">Cancel</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>