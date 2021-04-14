<!DOCTYPE html>
<html lang="en">
<head>
   <?php $this->load->view("includes/head"); ?>
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">
<!--============= start main area -->

<!-- APP NAVBAR ==========-->
<?php $this->load->view("includes/navbar"); ?>
<!--========== END app navbar -->

<!-- APP ASIDE ==========-->
<?php $this->load->view("includes/aside"); ?>
<!--========== END app aside -->
<?php $this->load->view("includes/navbar_search"); ?>
<!-- navbar search -->


<!-- APP MAIN ==========-->
<main id="app-main" class="app-main">
    <div class="wrap">
        <section class="app-content">
            <?php $this->load->view("dashboard_v/content"); ?>
        </section><!-- #dash-content -->
    </div><!-- .wrap -->


<!--========== END app main -->

<!-- APP FOOTER -->
<?php $this->load->view("includes/footer"); ?>
<!-- /#app-footer -->
</main>
<!-- SIDE PANEL -->
<?php $this->load->view("includes/right-aside"); ?>


<?php $this->load->view("includes/include_script"); ?>
</body>
</html>