<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->title</b> kaydını düzenliyorsunuz"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("popups/update/$item->id"); ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Destination Page</label>
                        <select name="page" class="form-control">
                            <?php foreach(get_page_list() as $page => $value) { ?>
                                <?php $page_value =  isset($form_error) ? set_value("page") : $item->page; ?>
                                <option
                                    <?php echo ($page == $page_value) ? "selected" : ""; ?>
                                        value="<?php echo $page; ?>"><?php echo $value; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("page"); ?></small>
                        <?php } ?>

                    </div>

                    <div class="form-group">
                        <label>Title</label>
                        <input
                                class="form-control"
                                placeholder="Title"
                                name="title"
                                value="<?php echo isset($form_error) ? set_value("title") : $item->title; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo isset($form_error) ? set_value("description") : $item->description; ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("popups"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>