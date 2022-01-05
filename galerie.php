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
                        $src1 = "upload/galerie/".( $R["image"] ? $R["image"] : "gal.jpg");
                        if(!file_exists($src1)) $src1 = "upload/galerie/gal.jpg" ;
						echo '
					<div class="project-post">
						<img src="'.$src1.'" alt="" >
						
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
				<!-- <div class="center-button">
					<a href="#" class="button-one">Load More</a>
				</div> -->
			</div>
		</section>
		<!-- End portfolio section -->

		<!-- footer 
			================================================== -->
		<?php include 'footer.php' ?>
		<!-- End footer -->

	</div>
	<!-- End Container -->
	
	<!--javascript link front-->
	<?php include 'javascript.php' ?>
    <!-- End javascript link front -->

	
</body>
</html>