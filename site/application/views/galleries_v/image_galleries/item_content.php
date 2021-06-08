<section class="main-container">
    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-md-12">
                <h1 class="page-title"><?php echo $gallery->title; ?></h1>
                <div class="separator-2"></div>

                <div class="row grid-space-20">


                    <?php foreach ($images as $image) { ?>

                        <div class="col-3 mb-20">
                            <div class="overlay-container">
                                <img src="<?php echo base_url("assets/images");?>/portfolio-1.jpg" alt="">
                                <a href="<?php echo base_url("assets/images");?>/portfolio-1.jpg" class="overlay-link small popup-img" title="<?php echo $gallery->title; ?>">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>

                    <?php } ?>

                </div>

            </div>
        </div>
    </div>
</section>


