<!DOCTYPE html>
<!--[if IE 9]> <html lang="tr" class="ie9"> <![endif]-->
<!--[if gt IE 9]> <html lang="tr" class="ie"> <![endif]-->
<!--[if !IE]><!-->
<html dir="ltr" lang="tr">
<!--<![endif]-->
<head>
	<?php $this->load->view("includes/head"); ?>
</head>
<body class="no-trans front-page transparent-header  page-loader-5">
<!-- scrollToTop -->
<!-- ================ -->
<div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>

<div class="page-wrapper">
	<?php $this->load->view("includes/header"); ?>

	<!-- section start -->
	<!-- ================ -->
	<section class="pv-40 clearfix">
		<div class="container">
			<h3 class="title space-top logo-font text-center text-default">The Beauty</h3>
			<div class="separator"></div>
			<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea aut voluptates quia <br> eveniet velit inventore, corporis, rem laboriosam. Ex ipsam nihil, quos dicta atque alias vel sunt. Libero, molestiae quidem?</p>
			<br>
			<div class="row grid-space-10">
				<div class="col-sm-6 col-md-3">
					<div class="pv-30 ph-20 white-bg feature-box bordered text-center">
						<span class="icon default-bg circle"><i class="fa fa-plus-square"></i></span>
						<h3>Since 1930</h3>
						<div class="separator clearfix"></div>
						<p>Voluptatem ad provident non repudiandae beatae cupiditate amet reiciendis lorem ipsum dolor sit amet, consectetur.</p>
						<a href="#" class="btn btn-default btn-animated">Read More <i class="fa fa-angle-double-right"></i></a>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="pv-30 ph-20 white-bg feature-box bordered text-center">
						<span class="icon default-bg circle"><i class="fa fa-hospital-o"></i></span>
						<h3>Apointments</h3>
						<div class="separator clearfix"></div>
						<p>Iure sequi unde hic. Sapiente quaerat sequi inventore veritatis cumque lorem ipsum dolor sit amet, consectetur.</p>
						<a href="#" class="btn btn-default btn-animated">Make An Apointment <i class="pl-5 fa fa-calendar"></i></a>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="pv-30 ph-20 default-bg feature-box bordered text-center">
						<span class="icon dark-bg circle"><i class="fa fa-hand-peace-o"></i></span>
						<h3>Special Deals</h3>
						<div class="separator clearfix"></div>
						<p>Inventore dolores aut laboriosam cum consequuntur delectus sequi lorem ipsum dolor sit amet, consectetur.</p>
						<a href="#" class="btn btn-default btn-animated">Call Us <i class="pl-5 fa fa-phone"></i></a>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="pv-30 ph-20 white-bg feature-box bordered text-center">
						<span class="icon default-bg circle"><i class="glyphicon glyphicon-time"></i></span>
						<h3>Opening Hours</h3>
						<div class="separator-2 mt-20 clearfix"></div>
						<ul class="list-unstyled small list-icons text-left">
							<li><strong class="text-default">Monday - Friday</strong> <span class="pull-right">8.00 - 18.00</span></li>
							<li><strong class="text-default">Saturday</strong> <span class="pull-right">9.00 - 16.30</span></li>
							<li><strong class="text-default">Sunday</strong> <span class="pull-right">9.30 - 16.00</span></li>
						</ul>
						<div class="separator-3 mt-20 clearfix"></div>
						<p class="small text-default">Lorem ipsum dolor sit amet, consectetur.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="call-to-action pv-40 text-center">
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2">
								<h2 class="title">Join Us Now</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus error pariatur deserunt laudantium nam, mollitia quas nihil inventore, quibusdam?</p>
								<div class="separator"></div>
								<form class="form-inline margin-clear">
									<div class="form-group has-feedback">
										<label class="sr-only" for="subscribe2">Email address</label>
										<input type="email" class="form-control" id="subscribe2" placeholder="Enter email" name="subscribe2" required="">
										<i class="fa fa-envelope form-control-feedback"></i>
									</div>
									<button type="submit" class="btn btn-gray-transparent btn-animated margin-clear">Submit <i class="fa fa-send"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- section end -->

	<?php $this->load->view("includes/footer"); ?>

</div>

<?php $this->load->view("includes/include_script"); ?>

</body>
</html>