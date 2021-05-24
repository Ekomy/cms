<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Site Settings
            <a href="<?php echo base_url("settings/new_form"); ?>" class="btn btn-outline btn-primary btn-xs pull-right"> <i class="fa fa-plus"></i> Add New</a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>There is no information. If you can to add please click <a href="<?php echo base_url("settings/new_form"); ?>">this</a></p>
                </div>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>