<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Add new E-mail
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("emailsettings/save"); ?>" method="post">

                    <div class="form-group">
                        <label>Protocol</label>
                        <input class="form-control" placeholder="Protocol" name="protocol" value="<?php echo isset($form_error) ? set_value("protocol") : ""; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("protocol"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>E-Mail Host</label>
                        <input class="form-control" placeholder="Hostname" name="host" value="<?php echo isset($form_error) ? set_value("host") : ""; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("host"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Port Number</label>
                        <input class="form-control" type="text" placeholder="Port" name="port" value="<?php echo isset($form_error) ? set_value("port") : ""; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("port"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>E-Mail (User)</label>
                        <input class="form-control" type="email" placeholder="User" name="user" value="<?php echo isset($form_error) ? set_value("user") : ""; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("user"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>E-posta Password</label>
                        <input class="form-control" type="password" placeholder="Şifre" name="password">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("password"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>From</label>
                        <input class="form-control" type="email" placeholder="From" name="from" value="<?php echo isset($form_error) ? set_value("from") : ""; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("from"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>To</label>
                        <input class="form-control" type="email" placeholder="to" name="to" value="<?php echo isset($form_error) ? set_value("to") : ""; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("to"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>E-posta Title</label>
                        <input class="form-control" type="text" placeholder="E-posta başlık" name="user_name" value="<?php echo isset($form_error) ? set_value("user_name") : ""; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("user_name"); ?></small>
                        <?php } ?>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Save</button>
                    <a href="<?php echo base_url("emailsettings"); ?>" class="btn btn-md btn-danger btn-outline">Cancel</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>