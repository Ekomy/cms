<div class="banner dark-translucent-bg" style="background-image:url('<?php echo base_url("panel/uploads/courses_v/$course->img_url");?>'); background-position: 50% 21%;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center col-md-offset-2 pv-20">
                <h2 class="title object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100"><strong><?php echo $course->title; ?></strong> </h2>
                <div class="separator object-non-visible mt-10" data-animation-effect="fadeIn" data-effect-delay="100"></div>
                <p class="text-center object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100"><?php echo character_limiter(strip_tags($course->description),200); ?></p>
                <div class="separator object-non-visible mt-10" data-animation-effect="fadeIn" data-effect-delay="100"></div>
                <h3 class="text-center object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100"><i class="fa fa-calendar"></i> <?php echo get_readable_date($course->event_date); ?></h3>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section class="main-container padding-ver-clear">
                    <div class="container pv-40">
                        <div class="row">

                            <!-- main start -->
                            <!-- ================ -->
                            <div class="main col-md-12">
                                <h1 class="title"><?php echo $course->title; ?></h1>
                                <div class="separator-2"></div>
                                <p><?php echo strip_tags($course->description); ?></p>
                            </div>
                            <!-- main end -->
                        </div>
                    </div>
                </section>
                <!-- main-container end -->

                <!-- section start -->
                <!-- ================ -->
                <section class="section pv-40 clearfix">
                    <div class="container">
                        <h3>Other <strong>Courses</strong></h3>
                        <div class="row grid-space-10">
                            <?php foreach($other_courses as $course) { ?>

                                <div class="col-sm-4">
                                    <div class="image-box style-2 mb-20 bordered light-gray-bg">
                                        <div class="overlay-container overlay-visible">


                                            <img src="<?php echo base_url("panel/uploads/courses_v/$course->img_url"); ?>" alt="">
                                            <div class="overlay-bottom text-left">
                                                <p class="lead margin-clear"><?php echo $course->title; ?></p>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <p><?php echo character_limiter(strip_tags($course->description), 30); ?></p>
                                            <a href="<?php echo base_url("course-detail/$course->url"); ?>" class="btn btn-default btn-sm btn-hvr hvr-sweep-to-right margin-clear">Open<i class="fa fa-arrow-right pl-10"></i></a>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                </section>
                <!-- section end -->
            </div>
        </div>
    </div>
</div>