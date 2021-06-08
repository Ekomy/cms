<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Add New Slide
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("slides/save"); ?>" method="post" enctype=multipart/form-data>
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" placeholder="Title" name="title">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                    </div>

                        <div class="form-group image_upload_container">
                            <label>Image input</label>
                            <input type="file" name="img_url" class="form-control">
                        </div>
                    <div class="form-group">
                        <label>Button Usage</label><br>
                        <input
                                class="form-control button_usage_btn"
                                type="checkbox"
                                data-switchery
                                name="allowButton"
                                data-color="#10c469"/>
                    </div>

                    <div class="button-information-container">
                        <div class="form-group">
                            <label>Button Title</label>
                            <input class="form-control" placeholder="Writing on the button" name="button_caption">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("button_caption"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label>URL Info</label>
                            <input class="form-control" placeholder="Url to connect with button" name="button_url">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("button_url"); ?></small>
                            <?php } ?>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary btn-md btn-outline">Save</button>
                    <a href="<?php echo base_url("slides"); ?>" class="btn btn-md btn-danger btn-outline">Cancel</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>