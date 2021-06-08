<section class="clearfix pv-40">
    <div class="container">
        <div class="row justify-content-lg-center">

            <h3 class="mt-4">Latest <strong>Courses</strong></h3>
            <div class="separator-2"></div>
            <div class="row grid-space-10">
                <div class="clearfix visible-md-down"></div>

                <?php foreach ($courses as $course) { ?>
                <div class="col-md-6 col-lg-3">
                    <div class="image-box style-2 mb-20 shadow bordered light-gray-bg text-center">
                        <div class="overlay-container">
                            <!--<img src="<?php echo get_picture("courses_v", $course->id, "276x171" ); ?>"
                                 alt="<?php echo $course->title; ?>"> --->
                            <div class="overlay-to-top">
                                <p class="small margin-clear"><em>Web design <br> Lorem ipsum dolor sit</em></p>
                            </div>
                        </div>
                        <div class="body">
                            <h3><?php echo $course->title; ?></h3>
                            <div class="separator"></div>
                            <p><?php echo character_limiter(strip_tags($course->description),25); ?></p>
                            <a href="<?php echo base_url("course-detail/$course->url"); ?>" class="btn btn-default btn-sm btn-hvr hvr-shutter-out-horizontal margin-clear">Read More<i class="fa fa-arrow-right pl-10"></i></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

        </div>
    </div>
</section>