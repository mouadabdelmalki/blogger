<?php

require_once 'configuration/config.php';


$active_act = "active";



$galerie= mysqli_query($connect,"select * from galerie");

$i=1;


?>

<!doctype html>

<html lang="en" class="no-js">
<head>
	<title>Cvbuilder</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<link rel="stylesheet" href="css-front/cvbuilder-assets.min.css">
	<link rel="stylesheet" type="text/css" href="css-front/style.css">

</head>
<body>

	<!-- Container -->
	<div id="container">
		<!-- Header
		    ================================================== -->
		<?php include 'header.php' ?>
		<!-- End Header -->

		<!-- portfolio-section 
			================================================== -->
		<section class="portfolio-section">
			<div class="container">
				<div class="title-section">
					<span>Welcome You People</span>
					<p>We work with people that are as dedicated to their work as we are to ours. And, we do everything with hard work and our core values of honesty.</p>
				</div>

				<div class="portfolio-box iso-call">
				<?php
                        $index = 0;
                        foreach($galerie as $R){
                        $images_gal = mysqli_query($connect,"SELECT * FROM img_galerie WHERE id_galerie IN (".$R["id_galerie"].")"); 
                        $img_g = "upload/galerie/".($R["image"]);
                        $src = "upload/galerie/".($R["image"] ? $R["image"] : "gal.jpg");
                        if(!file_exists($src)) $src = "upload/galerie/gal.jpg" ;
						echo '
					<div class="project-post">
						<img src="'.$src.'" alt="" />
						<div class="hover-box">
							<div class="inner-hover">
								<h2><a href="single-project.html">Over Thinking</a></h2>
								<span>Photography</span>
							</div>
						</div>
					</div>
					';
					    }  ?>
				</div>
				<div class="center-button">
					<a href="#" class="button-one">Load More</a>
				</div>
			</div>
		</section>
		<!-- End portfolio section -->

		<!-- footer 
			================================================== -->
		<footer>
			<ul class="social-icons">
				<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
				<li><a class="github" href="#"><i class="fa fa-github-alt"></i></a></li>
			</ul>
			<p>
				<span>587 Str. Norman Crook, New York, USA</span>
				<span>(414) 757-885</span>
				<span>info@yourdomain.com</span>
			</p>
			<p class="copyright-line">2018 CVbuilder. &copy; All Rights Reserved Nunforest</p>
			<a href="#" class="go-top">
				<i class="fa fa-chevron-up" aria-hidden="true"></i>
			</a>
		</footer>
		<!-- End footer -->

	</div>
	<!-- End Container -->
	
	<script src="js/cvbuilder-plugins.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCiqrIen8rWQrvJsu-7f4rOta0fmI5r2SI&amp;sensor=false&amp;language=en" type="text/javascript"></script>
	<script src="js/gmap3.min.js"></script>
	<script src="js/script.js"></script>

	
</body>
</html>