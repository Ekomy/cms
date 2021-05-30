<?php $settings = get_settings() ; ?>
<!-- header-container start -->
<div class="header-container">

    <!-- header start -->
    <!-- classes:  -->
    <!-- "fixed": enables fixed navigation mode (sticky menu) e.g. class="header fixed clearfix" -->
    <!-- "dark": dark version of header e.g. class="header dark clearfix" -->
    <!-- "full-width": mandatory class for the full-width menu layout -->
    <!-- "centered": mandatory class for the centered logo layout -->
    <!-- ================ -->
    <header class="header  fixed   dark clearfix">

        <div class="container">
            <div class="row">
                <div class="col-md-2 ">
                    <!-- header-first start -->
                    <!-- ================ -->
                    <div class="header-first clearfix">

                        <!-- logo -->
                        <div id="logo" class="logo">
                            <a href="index.html"><img id="logo_img" src="<?php echo base_url("assets/images");?>/logo.png" alt="The Project"></a>
                        </div>

                        <!-- name-and-slogan -->
                        <div class="site-slogan" style="font-size: x-small">
                            <b>Learn as if you were to live forever</b>
                        </div>

                    </div>
                    <!-- header-first end -->

                </div>
                <div class="col-md-10">

                    <!-- header-second start -->
                    <!-- ================ -->
                    <div class="header-second clearfix">

                        <!-- main-navigation start -->
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
                                                    <li ><a href="features-backgrounds.html">News</a></li>
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

                                    </div>

                                </div>
                            </nav>
                            <!-- navbar end -->

                        </div>
                        <!-- main-navigation end -->
                    </div>
                    <!-- header-second end -->

                </div>
            </div>
        </div>

    </header>
    <!-- header end -->
</div>
<!-- header-container end -->
