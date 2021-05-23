<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Add new Site Setting
        </h4>
    </div><!-- END column -->


    <div class="col-md-12">
        <form action="<?php echo base_url("settings/save"); ?>" method="post">
        <div class="widget">
            <div class="m-b-lg nav-tabs-horizontal">
                <!-- tabs list -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab-1" aria-controls="tab-3" role="tab" data-toggle="tab">Site Information</a></li>
                    <li role="presentation"><a href="#tab-2" aria-controls="tab-1" role="tab" data-toggle="tab">About Us</a></li>
                    <li role="presentation"><a href="#tab-3"  aria-controls="tab-2" role="tab" data-toggle="tab">Mission</a></li>
                    <li role="presentation"><a href="#tab-4"  aria-controls="tab-3" role="tab" data-toggle="tab">Vision</a></li>
                    <li role="presentation"><a href="#tab-5"  aria-controls="tab-4" role="tab" data-toggle="tab">Social Media</a></li>

                </ul><!-- .nav-tabs -->

                <!-- Tab panes -->
                <div class="tab-content p-md">
                    <div role="tabpanel" class="tab-pane in active fade" id="tab-1">

                        <div class="row">

                            <div class="form-group col-md-8">
                                <label>School Name</label>
                                <input class="form-control" placeholder="School Name"
                                       name="company_name"
                                       value="<?php echo isset($form_error) ? set_value("company_name") : "" ; ?>"  >
                                <?php if(isset($form_error)){ ?>
                                    <small class="pull-right input-form-error"> <?php echo form_error("company_name"); ?></small>
                                <?php } ?>
                            </div>

                        </div>



                        <div class="row">

                            <div class="form-group col-md-4">
                                <label>Telephone 1</label>
                                <input class="form-control" placeholder="Main Phone Number"
                                       name="phone_1"
                                       value="<?php echo isset($form_error) ? set_value("phone_1") : "" ; ?>"  >
                                <?php if(isset($form_error)){ ?>
                                    <small class="pull-right input-form-error"> <?php echo form_error("phone_1"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Telephone 2</label>
                                <input class="form-control" placeholder="Second Phone Number(Optional)"
                                       name="phone_2"
                                       value="<?php echo isset($form_error) ? set_value("phone_2") : "" ; ?>"  >
                                <?php if(isset($form_error)){ ?>
                                    <small class="pull-right input-form-error"> <?php echo form_error("phone_2"); ?></small>
                                <?php } ?>
                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group col-md-4">
                                <label>Fax 1</label>
                                <input class="form-control" placeholder="Main Fax Number"
                                       name="fax_1"
                                       value="<?php echo isset($form_error) ? set_value("fax_1") : "" ; ?>"  >
                                <?php if(isset($form_error)){ ?>
                                    <small class="pull-right input-form-error"> <?php echo form_error("fax_1"); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Fax 2</label>
                                <input class="form-control" placeholder="Second Fax Number(Optional)"
                                       name="fax_2"
                                       value="<?php echo isset($form_error) ? set_value("fax_2") : "" ; ?>"  >
                                <?php if(isset($form_error)){ ?>
                                    <small class="pull-right input-form-error"> <?php echo form_error("fax_2"); ?></small>
                                <?php } ?>
                            </div>

                        </div>


                    </div><!-- .tab-pane  -->

                    <div role="tabpanel" class="tab-pane fade" id="tab-2">
                        <h4 class="m-b-md">Second Tab Content</h4>
                        <p class="lh-lg">Lorem ipsum dolor sit amet. ipsum dolor sit amet, consectetur adipisicing elit. Officia illo aspernatur facilis, nisi commodi dolor?</p>
                    </div><!-- .tab-pane  -->

                    <div role="tabpanel" class="tab-pane fade" id="tab-3">
                        <h4 class="m-b-md">Third Tab Content</h4>
                        <p class="lh-lg">Lorem ipsum dolor sit amet. ipsum dolor sit amet, consectetur adipisicing elit. Officia illo aspernatur facilis, nisi commodi dolor?</p>
                    </div><!-- .tab-pane  -->

                    <div role="tabpanel" class="tab-pane fade" id="tab-4">
                        <h4 class="m-b-md">Third Tab Content</h4>
                        <p class="lh-lg">Lorem ipsum dolor sit amet. ipsum dolor sit amet, consectetur adipisicing elit. Officia illo aspernatur facilis, nisi commodi dolor?</p>
                    </div><!-- .tab-pane  -->

                    <div role="tabpanel" class="tab-pane fade" id="tab-5">
                        <h4 class="m-b-md">Third Tab Content</h4>
                        <p class="lh-lg">Lorem ipsum dolor sit amet. ipsum dolor sit amet, consectetur adipisicing elit. Officia illo aspernatur facilis, nisi commodi dolor?</p>
                    </div><!-- .tab-pane  -->


                </div><!-- .tab-content  -->
            </div><!-- .nav-tabs-horizontal -->
        </div><!-- .widget -->
    <button type="submit" class="btn btn-primary btn-md ">Update </button>
    <a href="<?php echo base_url("users"); ?>" class="btn btn-md btn-danger ">Cancel</a>
    </div><!-- END column -->
</div>