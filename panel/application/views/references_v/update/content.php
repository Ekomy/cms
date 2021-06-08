<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Updating <?php echo "<b>$item->title</b> "; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("references/update/$item->id"); ?>" method="post" enctype=multipart/form-data>
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" placeholder="Title" name="title" value="<?php echo $item->title; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->description; ?></textarea>
                    </div>

                       <div class="row">

                           <div class="col-md-1 image_upload_container">
                               <img src="<?php echo get_picture($viewFolder, $item->img_url, "80x80"); ?>" alt=""
                               class="img-responsive">
                           </div>

                           <div class="col-md-9 form-group image_upload_container">
                               <label>Image input</label>
                               <input type="file" name="img_url" class="form-control">
                           </div>
                       </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Update </button>
                    <a href="<?php echo base_url("references"); ?>" class="btn btn-md btn-danger btn-outline">Cancel</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>