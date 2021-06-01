<?php $settings = get_settings() ; ?>

<meta charset="utf-8">
<title><?php echo $settings->company_name; ?> HighSchool</title>
<meta name="description" content="Denge">
<meta name="author" content="https://www.dengeegitim.k12.tr/">

<!-- Mobile Meta -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php if(isset($opengraph)){ ?>

    <meta property="og:title" content="<?php echo $news->title; ?>" />
    <meta property="og:description" content="<?php echo character_limiter(strip_tags($news->desciption),200); ?>" />
    <?php if($news->news_type == "image") { ?>
        <meta property="og:image" content="<?php echo base_url("panel/uploads/news_v/$news->img_url"); ?>" />
    <?php } else { ?>
        <meta property="og:video" content="<?php echo base_url("https://www.yputube.com/v/$news->video_url"); ?>" />
    <?php } ?>


<?php  } ?>

<?php $this->load->view("includes/include_style"); ?>