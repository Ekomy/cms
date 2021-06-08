<div role="tabpanel" class="tab-pane fade" id="tab-7">

    <div class="row">

        <div class="col-md-3">

            <img
                    src="<?php echo get_picture($viewFolder, $item->logo, "150x35"); ?>"
                    alt="<?php echo $item->company_name; ?>"
                    class="img-responsive">

        </div>

        <div class="form-group col-md-6">
            <label>Görsel Seçiniz</label>
            <input type="file" name="logo" class="form-control">
        </div>

    </div>

</div><!-- .tab-pane  -->