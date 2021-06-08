<aside class="col-lg-4 col-xl-3 ml-xl-auto">
    <div class="sidebar">
        <div class="block clearfix">
            <nav>
                <ul class="nav flex-column">

                    <li class="nav-item"><a class="nav-link active" href="<?php echo base_url(); ?>">Main Page</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url("brand-list"); ?>">Teachers</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url("about-us"); ?>">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url("contact"); ?>">Contact</a></li>

                </ul>

            </nav>
        </div>
        <div class="block clearfix">
            <h3 class="title">Latest News</h3>
            <div class="separator-2"></div>

            <div class="row">
                <?php foreach($recent_news_list as $recent_news) { ?>

                    <div class="col-md-12 mb-20">
                        <div class="media margin-clear">
                            <div class="d-flex pr-2">

                                <?php if($recent_news->news_type == "image") { ?>

                                    <div class="overlay-container">
                                        <img class="media-object" src="<?php echo base_url("panel/uploads/news_v/$recent_news->img_url"); ?>" alt="<?php echo $recent_news->url; ?>">
                                        <a href="<?php echo base_url("haber/$recent_news->url"); ?>" class="overlay-link small"><i class="fa fa-link"></i></a>
                                    </div>

                                <?php } else { ?>

                                    <div>
                                        <iframe style="width: 100px; height: 50px;" src="//www.youtube.com/embed/<?php echo $recent_news->video_url; ?>"></iframe>
                                    </div>

                                <?php  } ?>

                            </div>
                            <div class="media-body">
                                <h6 class="media-heading"><a href="blog-post.html">Lorem ipsum dolor sit amet...</a></h6>
                                <p class="small margin-clear"><i class="fa fa-calendar pr-2"></i>Mar 23, 2017</p>
                            </div>
                        </div>
                    </div>


                <?php } ?>

                <div class="text-right space-top">
                    <a href="<?php echo base_url("news"); ?>" class="link-dark"><i class="fa fa-plus-circle pl-5 pr-5"></i>More</a>
                </div>


            </div>


        </div>
    </div>
</aside>