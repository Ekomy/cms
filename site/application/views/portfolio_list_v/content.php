<!-- ================ -->
<section class="main-container">

    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-12">

                <!-- page-title start -->
                <!-- ================ -->
                <h1 class="page-title">Portfolyo Listesi</h1>
                <div class="separator-2"></div>
                <!-- page-title end -->
                <p class="lead">Aşağıda sizin için seçtiğimiz çalışmalarımızdan bazılarını bulabilirsiniz.</p>

                <?php foreach($portfolios as $portfolio) { ?>

                    <div class="image-box style-3-b">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="overlay-container">

                                <?php
                                $image = get_portfolio_cover_image($portfolio->id);
                                $image = ($image) ? base_url("panel/uploads/portfolio_v/$image") : base_url("assets/images/portfolio-1.jpg");
                                ?>

                                <img src="<?php echo $image; ?>" alt="<?php echo $portfolio->title; ?>">

                                <div class="overlay-to-top">
                                    <p class="small margin-clear"><em><?php echo $portfolio->title; ?></em></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-8 col-xl-9">
                            <div class="body">
                                <h3 class="title"><a href="portfolio-item.html"><?php echo $portfolio->title ; ?></a></h3>
                                <p class="small mb-10"><i class="icon-calendar"></i> <?php echo get_readable_date($portfolio->finishedAt); ?>
                                    <?php $portfolio_category = get_portfolio_category_title($portfolio->category_id); ?>
                                    <?php if($portfolio_category){ ?>
                                        <i class="pl-10 icon-tag-1"></i> <?php echo $portfolio_category; ?></p>
                                    <?php } ?>
                                <div class="separator-2"></div>
                                <p class="mb-10"><?php echo strip_tags($portfolio->description); ?></p>
                                <a href="<?php echo base_url("portfolyo-detay/$portfolio->url"); ?>" class="btn btn-default btn-hvr hvr-shutter-out-horizontal margin-clear">Görüntüle<i class="fa fa-arrow-right pl-10"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
            <!-- main end -->

        </div>
    </div>
</section>
<!-- main-container end -->
