@@ -1,38 +1,95 @@
<?php $settings = get_settings() ; ?>
<!-- header-container start -->
<?php $settings = get_settings(); ?>

<div class="header-container">
    <!-- header-top start -->
    <!-- classes:  -->
    <!-- "dark": dark version of header top e.g. class="header-top dark" -->
    <!-- "colored": colored version of header top e.g. class="header-top colored" -->
    <!-- ================ -->
    <div class="header-top colored">
        <div class="container">
            <div class="row">
                <div class="col-2 col-md-5">
                    <!-- header-top-first start -->
                    <!-- ================ -->
                    <div class="header-top-first clearfix">
                        <ul class="social-links circle small clearfix hidden-sm-down">
                            <li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                            <li class="skype"><a target="_blank" href="http://www.skype.com"><i class="fa fa-skype"></i></a></li>
                            <li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
                            <li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                            <li class="youtube"><a target="_blank" href="http://www.youtube.com"><i class="fa fa-youtube-play"></i></a></li>
                            <li class="flickr"><a target="_blank" href="http://www.flickr.com"><i class="fa fa-flickr"></i></a></li>
                            <li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                            <li class="pinterest"><a target="_blank" href="http://www.pinterest.com"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                        <div class="social-links hidden-md-up circle small">
                            <div class="btn-group dropdown">
                                <button id="header-top-drop-1" type="button" class="btn dropdown-toggle dropdown-toggle--no-caret" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-share-alt"></i></button>
                                <ul class="dropdown-menu dropdown-animation" aria-labelledby="header-top-drop-1">
                                    <li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                                    <li class="skype"><a target="_blank" href="http://www.skype.com"><i class="fa fa-skype"></i></a></li>
                                    <li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                                    <li class="youtube"><a target="_blank" href="http://www.youtube.com"><i class="fa fa-youtube-play"></i></a></li>
                                    <li class="flickr"><a target="_blank" href="http://www.flickr.com"><i class="fa fa-flickr"></i></a></li>
                                    <li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                                    <li class="pinterest"><a target="_blank" href="http://www.pinterest.com"><i class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- header-top-first end -->
                </div>
                <div class="col-10 col-md-7">

                    <!-- header-top-second start -->
                    <!-- ================ -->
                    <div id="header-top-second"  class="clearfix text-right">
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-phone pr-1 pl-10"></i>+12 123 123 123</li>
                            <li class="list-inline-item"><i class="fa fa-envelope-o pr-1 pl-10"></i> theproject@mail.com</li>
                        </ul>
                    </div>
                    <!-- header-top-second end -->

                </div>
            </div>
        </div>
    </div>
    <!-- header-top end -->

    <!-- header start -->
    <!-- classes:  -->
    <!-- "fixed": enables fixed navigation mode (sticky menu) e.g. class="header fixed clearfix" -->
    <!-- "fixed-desktop": enables fixed navigation only for desktop devices e.g. class="header fixed fixed-desktop clearfix" -->
    <!-- "fixed-all": enables fixed navigation only for all devices desktop and mobile e.g. class="header fixed fixed-desktop clearfix" -->
    <!-- "dark": dark version of header e.g. class="header dark clearfix" -->
    <!-- "full-width": mandatory class for the full-width menu layout -->
    <!-- "centered": mandatory class for the centered logo layout -->
    <!-- ================ -->
    <header class="header  fixed   dark clearfix">

        <header class="header fixed fixed-desktop clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 ">
                        <div class="col-md-auto hidden-md-down pl-3">
                            <!-- header-first start -->
                            <!-- ================ -->
                            <div class="header-first clearfix">

                                <!-- logo -->
                                <div id="logo" class="logo">
                                    <a href="index.html"><img id="logo_img" src="<?php echo base_url("assets/images");?>/logo.png" alt="The Project"></a>
                                    <a href="<?php echo base_url(); ?>"><img id="logo_img" src="<?php echo base_url("assets/images");?>/" alt="Denge"></a>
                                </div>

                                <!-- name-and-slogan -->
                                <div class="site-slogan" style="font-size: x-small">
                                    <b>Learn as if you were to live forever</b>
                                    <div class="site-slogan">
                                        <?php echo $settings->slogan; ?>
                                    </div>

                                </div>
                                <!-- header-first end -->

                            </div>
                            <div class="col-md-10">
                                <div class="col-lg-8 ml-lg-auto">

                                    <!-- header-second start -->
                                    <!-- ================ -->
                                    @ -42,74 +99,88 @@
                                    <!-- classes: -->
                                    <!-- "onclick": Makes the dropdowns open on click, this the default bootstrap behavior e.g. class="main-navigation onclick" -->
                                    <!-- "animated": Enables animations on dropdowns opening e.g. class="main-navigation animated" -->
                                    <!-- "with-dropdown-buttons": Mandatory class that adds extra space, to the main navigation, for the search and cart dropdowns -->
                                    <!-- ================ -->
                                    <div class="main-navigation  animated with-dropdown-buttons">

                                        <!-- navbar start -->
                                        <!-- ================ -->
                                        <nav class="navbar navbar-default" role="navigation">
                                            <div class="container-fluid">

                                                <!-- Toggle get grouped for better mobile display -->
                                                <div class="navbar-header">
                                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                                                        <span class="sr-only">Toggle navigation</span>
                                                        <span class="icon-bar"></span>
                                                        <span class="icon-bar"></span>
                                                        <span class="icon-bar"></span>
                                                    </button>
                                                    <div class="main-navigation main-navigation--mega-menu  animated">
                                                        <nav class="navbar navbar-expand-lg navbar-light p-0">
                                                            <div class="navbar-brand clearfix hidden-lg-up">

                                                                <!-- logo -->
                                                                <div id="logo-mobile" class="logo">
                                                                    <a href="<?php echo base_url(); ?>"><img id="logo-img-mobile" src="<?php echo base_url("assets/images");?>/logo_blue.png" alt="<?php echo $settings->company_name; ?>"></a>
                                                                </div>

                                                                <!-- Collect the nav links, forms, and other content for toggling -->
                                                                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                                                                    <!-- main-menu -->
                                                                    <ul class="nav navbar-nav ">


                                                                        <li class="active"><a href="index.html">Main Page</a></li>
                                                                        <li class="dropdown ">
                                                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">About Us</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a href="<?php echo base_url("about-us"); ?>">About Us</a></li>
                                                                                <li ><a href="<?php echo base_url("news"); ?>">News</a></li>
                                                                                <li><a href="<?php echo base_url("reference-list"); ?>">References</a></li>
                                                                                <li><a href="<?php echo base_url("service-list"); ?>">Social Responsibility Projects</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="dropdown ">
                                                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Galleries</a>
                                                                            <ul class="dropdown-menu">
                                                                                <li ><a href="features-dark-page.html">Image Gallery</a></li>
                                                                                <li ><a href="features-typography.html">Video Gallery</a></li>
                                                                                <li ><a href="features-backgrounds.html">File Gallery</a></li>
                                                                            </ul>
                                                                        </li>
                                                                        <li><a href="<?php echo base_url("product-list"); ?>">Products</a></li>
                                                                        <li><a href="<?php echo base_url("course-list"); ?>">Courses</a></li>
                                                                        <li><a href="<?php echo base_url("brand-list"); ?>">Teachers</a></li>
                                                                        <li><a href="<?php echo base_url("contact_us"); ?>">Connect Us</a></li>

                                                                    </ul>
                                                                    <!-- main-menu end -->

                                                                    <!-- name-and-slogan -->
                                                                    <div class="site-slogan">
                                                                        <?php echo $settings->slogan; ?>
                                                                    </div>

                                                                </div>
                                                        </nav>
                                                        <!-- navbar end -->

                                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-1" aria-controls="navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                                                            <span class="navbar-toggler-icon"></span>
                                                        </button>

                                                        <div class="collapse navbar-collapse" id="navbar-collapse-1">
                                                            <!-- main-menu -->

                                                            <ul class="navbar-nav ml-xl-auto">

                                                                <li class="nav-item ">
                                                                    <a href="<?php echo base_url(); ?>" class="nav-link">Main Page</a>
                                                                </li>

                                                                <li class="nav-item dropdown ">
                                                                    <a href="#" class="nav-link dropdown-toggle" id="third-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hakkımızda</a>
                                                                    <ul class="dropdown-menu" aria-labelledby="third-dropdown">
                                                                        <li ><a href="<?php echo base_url("about_us"); ?>">About Us</a></li>
                                                                        <li ><a href="<?php echo base_url("news"); ?>">News</a></li>
                                                                        <li ><a href="<?php echo base_url("reference-list"); ?>">References</a></li>
                                                                        <li ><a href="<?php echo base_url("service-list"); ?>">Services</a></li>
                                                                    </ul>
                                                                </li>

                                                                <li class="nav-item dropdown ">
                                                                    <a href="#" class="nav-link dropdown-toggle" id="third-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Galeriler</a>
                                                                    <ul class="dropdown-menu" aria-labelledby="third-dropdown">
                                                                        <li ><a href="<?php echo base_url(); ?>">Image Gallery</a></li>
                                                                        <li ><a href="<?php echo base_url(); ?>">Video Gallery</a></li>
                                                                        <li ><a href="<?php echo base_url(); ?>">File Gallery</a></li>
                                                                    </ul>
                                                                </li>


                                                                <li class="nav-item ">
                                                                    <a href="<?php echo base_url("product-list"); ?>" class="nav-link">Products</a>
                                                                </li>

                                                                <li class="nav-item ">
                                                                    <a href="<?php echo base_url("brand-list"); ?>" class="nav-link">Courses</a>
                                                                </li>

                                                                <li class="nav-item ">
                                                                    <a href="<?php echo base_url("teachers"); ?>" class="nav-link">Teachers</a>
                                                                </li>

                                                            </ul>
                                                            <!-- main-menu end -->
                                                        </div>
                                        </nav>
                                    </div>
                                    <!-- main-navigation end -->
                                </div>
                                <!-- header-second end -->

                            </div>
                            <div class="col-auto hidden-md-down pl-0 pl-md-1">
                                <!-- header dropdown buttons -->
                                <div class="header-dropdown-buttons">
                                    <a href="<?php echo base_url("about_us"); ?>" class="btn btn-sm btn-default">İletişim <i class="fa fa-envelope-o pl-1"></i></a>
                                </div>
                                <!-- header dropdown buttons end-->
                            </div>
                        </div>
                    </div>

        </header>
        <!-- header end -->
</div>
<!-- header-container end -->
