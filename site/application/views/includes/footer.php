<?php $settings = get_settings(); ?>

<footer id="footer" class="clearfix dark">

    <!-- .footer start -->
    <!-- ================ -->
    <div class="footer">
        <div class="container">
            <div class="footer-inner">
                <div class="row">
                    <div class="col-md-3">
                        <div class="footer-content">
                            <div class="logo-footer"><img id="logo-footer" src="<?php echo base_url("assets/images");?>/logo.png" alt=""></div>

                            <p><?php echo character_limiter(strip_tags($settings->about_us),150) ?>
                            <a href="<?php echo base_url("about-us"); ?>"><br>Learn More <i class="fa fa-long-arrow-right pl-5"></i></a></p></a> <br>
                            </a>
                            <div class="separator-2"></div>
                            <nav>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a target="_blank" href="http://htmlcoder.me/support">Support</a></li>
                                    <li><a href="#">Privacy</a></li>
                                    <li><a href="#">Terms</a></li>
                                    <li><a href="page-about.html">About</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-content">
                            <h2 class="title">Latest From Blog</h2>
                            <div class="separator-2"></div>
                            <div class="media margin-clear">
                                <div class="media-left">
                                    <div class="overlay-container">
                                        <img class="media-object" src="<?php echo base_url("assets/images");?>/blog-thumb-1.jpg" alt="blog-thumb">
                                        <a href="blog-post.html" class="overlay-link small"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading"><a href="blog-post.html">Lorem ipsum dolor sit amet...</a></h6>
                                    <p class="small margin-clear"><i class="fa fa-calendar pr-10"></i>Mar 23, 2017</p>
                                </div>
                                <hr>
                            </div>
                            <div class="media margin-clear">
                                <div class="media-left">
                                    <div class="overlay-container">
                                        <img class="media-object" src="<?php echo base_url("assets/images");?>/blog-thumb-2.jpg" alt="blog-thumb">
                                        <a href="blog-post.html" class="overlay-link small"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading"><a href="blog-post.html">Lorem ipsum dolor sit amet...</a></h6>
                                    <p class="small margin-clear"><i class="fa fa-calendar pr-10"></i>Mar 22, 2017</p>
                                </div>
                                <hr>
                            </div>
                            <div class="media margin-clear">
                                <div class="media-left">
                                    <div class="overlay-container">
                                        <img class="media-object" src="<?php echo base_url("assets/images");?>/blog-thumb-3.jpg" alt="blog-thumb">
                                        <a href="blog-post.html" class="overlay-link small"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading"><a href="blog-post.html">Lorem ipsum dolor sit amet...</a></h6>
                                    <p class="small margin-clear"><i class="fa fa-calendar pr-10"></i>Mar 21, 2017</p>
                                </div>
                                <hr>
                            </div>
                            <div class="media margin-clear">
                                <div class="media-left">
                                    <div class="overlay-container">
                                        <img class="media-object" src="<?php echo base_url("assets/images");?>/blog-thumb-4.jpg" alt="blog-thumb">
                                        <a href="blog-post.html" class="overlay-link small"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading"><a href="blog-post.html">Lorem ipsum dolor sit amet...</a></h6>
                                    <p class="small margin-clear"><i class="fa fa-calendar pr-10"></i>Mar 21, 2017</p>
                                </div>
                            </div>
                            <div class="text-right space-top">
                                <a href="blog-large-image-right-sidebar.html" class="link-dark"><i class="fa fa-plus-circle pl-5 pr-5"></i>More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-content">
                            <h2 class="title">Portfolio Gallery</h2>
                            <div class="separator-2"></div>
                            <div class="row grid-space-10">
                                <div class="col-xs-4 col-md-6">
                                    <div class="overlay-container mb-10">
                                        <img src="<?php echo base_url("assets/images");?>/gallery-1.jpg" alt="">
                                        <a href="portfolio-item.html" class="overlay-link small">
                                            <i class="fa fa-link"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-md-6">
                                    <div class="overlay-container mb-10">
                                        <img src="<?php echo base_url("assets/images");?>/gallery-2.jpg" alt="">
                                        <a href="portfolio-item.html" class="overlay-link small">
                                            <i class="fa fa-link"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-md-6">
                                    <div class="overlay-container mb-10">
                                        <img src="<?php echo base_url("assets/images");?>/gallery-3.jpg" alt="">
                                        <a href="portfolio-item.html" class="overlay-link small">
                                            <i class="fa fa-link"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-md-6">
                                    <div class="overlay-container mb-10">
                                        <img src="<?php echo base_url("assets/images");?>/gallery-4.jpg" alt="">
                                        <a href="portfolio-item.html" class="overlay-link small">
                                            <i class="fa fa-link"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-md-6">
                                    <div class="overlay-container mb-10">
                                        <img src="<?php echo base_url("assets/images");?>/gallery-5.jpg" alt="">
                                        <a href="portfolio-item.html" class="overlay-link small">
                                            <i class="fa fa-link"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-md-6">
                                    <div class="overlay-container mb-10">
                                        <img src="<?php echo base_url("assets/images");?>/gallery-6.jpg" alt="">
                                        <a href="portfolio-item.html" class="overlay-link small">
                                            <i class="fa fa-link"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right space-top">
                                <a href="portfolio-grid-2-3-col.html" class="link-dark"><i class="fa fa-plus-circle pl-5 pr-5"></i>More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-content">
                            <h2 class="title">Social Media</h2>
                            <div class="separator-2"></div>
                            <p>Follow us from social media.Keep up with the latest news and updates.</p>
                            <ul class="social-links circle animated-effect-1">

                                <?php if($settings->facebook) { ?>
                                    <li class="facebook"><a target="_blank" href="<?php echo $settings->facebook; ?>"><i class="fa fa-facebook"></i></a></li>
                                <?php }  ?>
                                <?php if($settings->instagram) { ?>
                                    <li class="instagram"><a target="_blank" href="<?php echo $settings->facebook; ?>"><i class="fa fa-instagram"></i></a></li>
                                <?php }  ?>
                                <?php if($settings->twitter) { ?>
                                    <li class="twitter"><a target="_blank" href="<?php echo $settings->facebook; ?>"><i class="fa fa-twitter"></i></a></li>
                                <?php }  ?>
                                    <li class="googleplus"><a target="_blank" href="https://www.youtube.com/channel/UCQwL7mEtmrdXe_Uk012MQhA"><i class="fa fa-youtube"></i></a></li>
                                <?php if($settings->linkedin) { ?>
                                    <li class="linkedin"><a target="_blank" href="<?php echo $settings->facebook; ?>"><i class="fa fa-linkedin"></i></a></li>
                                <?php }  ?>
                            </ul>
                            <div class="separator-2"></div>
                            <ul class="list-icons">
                                <li><i class="fa fa-map-marker pr-10 text-default"></i><?php echo $settings->address; ?></li>
                                <li><i class="fa fa-phone pr-10 text-default"></i><?php echo $settings->phone_1; ?></li>
                                <li><a href="denge:info@dengeeducation.com"><i class="fa fa-envelope-o pr-10"></i><?php echo $settings->email; ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .footer end -->

    <!-- .subfooter start -->
    <!-- ================ -->
    <div class="subfooter">
        <div class="container">
            <div class="subfooter-inner">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center">Copyright © 2017 The  <a target="_blank" href="https://www.dengeegitim.k12.tr/"><?php echo $settings->company_name; ?> HighSchool</a>. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .subfooter end -->

</footer>