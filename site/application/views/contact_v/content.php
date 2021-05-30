<?php $settings = get_settings(); ?>

<!-- banner start -->
<!-- ================ -->
<div class="banner dark-translucent-bg" style="background-image:url('<?php echo base_url("assets/images");?>/img_back2.jpg'); background-position: 50% 30%;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 text-center col-md-offset-2 pv-20">
                <h1 class="page-title text-center">Contact Us</h1>
                <div class="separator"></div>
                <p class="lead text-center">
                    It would be great to hear from you! Just drop us a line and ask for anything with which you think we could be helpful. We are looking forward to hearing from you!
                </p>
                <ul class="list-inline mb-20 text-center">
                    <li><i class="text-default fa fa-map-marker pr-5"></i><?php echo strip_tags("Cinnah Caddesi No:15"); ?></li>
                    <li><a href="#" class="link-dark"><i class="text-default fa fa-phone pl-10 pr-5"></i><?php echo $settings->phone_1; ?></a></li>
                    <li><a href="milto:<?php echo $settings->email;?>" class="link-dark"><i class="text-default fa fa-envelope-o pl-10 pr-5"></i><?php echo $settings->email;?></a></li>
                </ul>
                <div class="separator"></div>
                <ul class="social-links circle animated-effect-1 margin-clear text-center space-bottom">
                    <?php if($settings->facebook) { ?>
                        <li class="facebook"><a target="_blank" href="<?php echo $settings->facebook; ?>"><i class="fa fa-facebook"></i></a></li>
                    <?php } ?>

                    <?php if($settings->twitter) { ?>
                        <li class="twitter"><a target="_blank" href="<?php echo $settings->twitter; ?>"><i class="fa fa-twitter"></i></a></li>
                    <?php } ?>
                    <?php if($settings->instagram) { ?>
                        <li class="instagram"><a target="_blank" href="<?php echo $settings->instagram; ?>"><i class="fa fa-instagram"></i></a></li>
                    <?php } ?>
                    <?php if($settings->linkedin) { ?>
                        <li class="linkedin"><a target="_blank" href="<?php echo $settings->linkedin; ?>"><i class="fa fa-linkedin"></i></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- banner end -->

<!-- main-container start -->
<!-- ================ -->
<section class="main-container">

    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-md-12 space-bottom">
                <h2 class="title">Drop Us a Line</h2>
                <div class="row">
                    <div class="col-md-6">
                        <p>You can use this form to send us message</p>
                        <div class="alert alert-success hidden" id="MessageSent">
                            We have received your message, we will contact you very soon.
                        </div>
                        <div class="alert alert-danger hidden" id="MessageNotSent">
                            Oops! Something went wrong, please verify that you are not a robot or refresh the page and try again.
                        </div>
                        <div class="contact-form">
                            <form id="" class="margin-clear" role="form" id="captcha" method="post" action="<?php echo base_url("send-message"); ?>">
                                <div class="form-group has-feedback">
                                    <label for="name">Name*</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="">
                                    <i class="fa fa-user form-control-feedback"></i>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="email">Email*</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="">
                                    <i class="fa fa-envelope form-control-feedback"></i>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="subject">Subject*</label>
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="">
                                    <i class="fa fa-navicon form-control-feedback"></i>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="message">Message*</label>
                                    <textarea class="form-control" rows="6" id="message" name="message" placeholder=""></textarea>
                                    <i class="fa fa-pencil form-control-feedback"></i>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <?php echo $captcha["image"]; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group has-feedback">
                                            <input type="text" class="form-control" name="captcha" placeholder="I'm not a robot">
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                <div class="g-recaptcha" data-sitekey="your_site_key"></div>
                                <input type="submit" value="Submit" class="submit-button btn btn-default">
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="map-canvas"></div>
                    </div>
                </div>
            </div>
            <!-- main end -->
        </div>
    </div>
</section>
<!-- main-container end -->

<!-- section start -->
<!-- ================ -->
<section class="section pv-40 parallax background-img-1 dark-translucent-bg" style="background-position:50% 60%;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="call-to-action text-center">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <h2 class="title">Subscribe to Our Newsletter</h2>
                            <p>Subscribe us to get the latest information and hear about the upcoming events.</p>
                            <div class="separator"></div>
                            <form class="form-inline margin-clear" action="<?php echo base_url("become-member"); ?>" method="post">
                                <div class="form-group has-feedback">
                                    <label class="sr-only" for="subscribe2">E-mail address</label>
                                    <input type="email" class="form-control" id="subscribe2" placeholder="Enter email" name="subscribe_email" required="">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <i class="fa fa-envelope form-control-feedback"></i>
                                </div>
                                <button type="submit" class="btn btn-gray-transparent btn-animated margin-clear">Subscribe <i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>