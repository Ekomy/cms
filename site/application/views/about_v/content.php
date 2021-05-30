
<!-- banner start -->
<!-- ================ -->
<div class="banner dark-translucent-bg" style="background-image:url('<?php echo base_url("assets/images");?>/img_back1.JPG'); background-position: 50% 27%;">
    <!-- breadcrumb start -->
    <!-- ================ -->
    <!--    <div class="breadcrumb-container">-->
    <!--        <div class="container">-->
    <!--            <ol class="breadcrumb">-->
    <!--                <li><i class="fa fa-home pr-10"></i><a class="link-dark" href="index.html">Home</a></li>-->
    <!--                <li class="active">Page About</li>-->
    <!--            </ol>-->
    <!--        </div>-->
    <!--    </div>-->
    <!-- breadcrumb end -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 text-center col-md-offset-2 pv-20">
                <h3 class="title logo-font object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100"><?php echo $settings->company_name; ?></h3>
                <div class="separator object-non-visible mt-10" data-animation-effect="fadeIn" data-effect-delay="100"></div>
                <p class="text-center object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100">
                    <?php echo word_limiter(strip_tags($settings->about_us), 25); ?>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- banner end -->

<!-- main-container start -->
<!-- ================ -->
<section class="main-container padding-bottom-clear">

    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-md-12">
                <h3 class="title">Who <strong>We Are</strong></h3>
                <div class="separator-2"></div>
                <div class="row">
                    <div class="col-md-12">
                       <p>
                           <?php echo $settings->about_us; ?>
                       </p>
                        <ul class="list-icons">
                            <li><i class="icon-check-1"></i> We are here for you</li>
                            <li><i class="icon-check-1"></i> Qualified Staff of Teachers</li>
                            <li><i class="icon-check-1"></i> 1 to 1 private lectures</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- main end -->

        </div>
    </div>

    <!-- section start -->
    <!-- ================ -->
    <div class="section light-gray-bg">
        <div class="container">
            <h3><strong>Mission</strong> and <strong>Vision</strong></h3>
            <div class="separator-2"></div>
            <div class="row">
                <!-- accordion start -->
                <!-- ================ -->
                <div class="col-md-12">
                    <div class="panel-group collapse-style-1" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        <i class="fa fa-rocket pr-10"></i>Mission
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <?php echo strip_tags($settings->mission); ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed">
                                        <i class="fa fa-leaf pr-10"></i>Vision
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?php echo strip_tags($settings->vision); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- accordion end -->
            </div>

        </div>
    </div>
    <!-- section end -->

</section>
<!-- main-container end -->

