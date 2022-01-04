<?php
$iden=($_GET['id']) ?? "";
require 'configuration/config.php';


$active_act = "active";
//commentaire//
$commentaire= mysqli_query($connect,"select * from commentaire where actif=1");
$commentaireNbr = mysqli_query($connect,"select COUNT(*) from commentaire where actif=1");

$cmnt = mysqli_num_rows($commentaireNbr) ;

//articles//
$article= mysqli_query($connect,"select * from actualites where url='".$iden."'");
$art=mysqli_fetch_array($article);
$src = "upload/blog/".($art["image_contenu"] ? $art["image_contenu"] : "default-header.jpg");
?>
<?php
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
         $url = "https://";
    else
         $url = "http://";
    // Append the host(domain name, ip) to the URL.
    $url.= $_SERVER['HTTP_HOST'];
    // Append the requested resource location to the URL
    $url.= $_SERVER['REQUEST_URI'];

	var_dump($src);
?>

<!doctype html>


<html lang="en" class="no-js">
<head>
	<title>BLOG | details post</title>

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

		<!-- blog-section 
			================================================== -->
		<section class="blog-section">
			<div class="container">
				<div class="blog-box single-post">
				<?php 
				if(!file_exists($src)) $src =  "upload/blog/default-header.jpg";
				echo '

					<div class="blog-post">
						<img src="'.$src.'" alt="">
						<div class="post-content">
							<div class="title-post">
							
								<h1>'.$art["titre"].'</h1>
								<span>'.$art["auteur"].' •</span><span>'.$art["date_pub"].'</span>
								
							</div>
							<p class="quote">'.$art["contenu"].'</p>
							<!-- <div class="row">
								<div class="col-md-6">
									<div class="video-popup">
										<img src="upload/blog/single2.jpg" alt="">
										<div class="hover-box">
											<a href="https://vimeo.com/185928744" class="zoom">Play</a>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<img src="upload/blog/single3.jpg" alt="">
								</div>
							</div> -->

							<div class="share-tags-box">
								<div class="row">
									<div class="col-lg-4 col-md-3">
										<p>Posted by '.$art["auteur"].'</p>
									</div>
									<div class="col-lg-8 col-md-9">
										<ul class="share-list">
											<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
											<li><a class="github" href="#"><i class="fa fa-github-alt"></i></a></li>
										</ul>
										<ul class="tags-list">
											<li><a href="#">interior,</a></li>
											<li><a href="#">design,</a></li>
											<li><a href="#">archicture,</a></li>
											<li><a href="#">buildings</a></li>
										</ul>
									</div>
								</div>
							</div>

						</div>
					</div>
					'; ?>



					<div class="comment-area-box">
					  <?php echo ' <h2>  '. $cmnt .' commentaire </h2>  '; ?>

					    <?php

                        while ($coms=mysqli_fetch_array($commentaire)){

                        ?>
						<ul class="comment-tree">
							<li>
								<div class="comment-box">
									<img alt="" src="images/logo.png" />
									<div class="comment-content">
									<?php	echo ' <h4> '.$coms["nom"].'  </h4>  '; ?>
								   <!-- echo 	<span>19.06.2018  |  2 hours ago  |  <a href="#">REPLY</a></span>   -->
									<?php	echo '	<p> '.$coms['coms'].' </p> '; ?>
									</div>
								</div>
								<!-- <ul class="depth">
									<li>
										<div class="comment-box">
											<img alt="" src="upload/others/test2.jpg">
											<div class="comment-content">
												<h4>Johny Bravo</h4>
												<span>19.06.2018  |  1 hours ago  |  <a href="#">REPLY</a></span>
												<p>Work and pleasure, and relies on her experiences with different cultures to gain unique perspectives. This drives Dean to go a step further than mere design.</p>
											</div>
										</div>
									</li>
								</ul> -->
							</li>

						</ul>
						<?php }; ?>
					</div>



					<div class="contact-form-box">
						<h2>Leave a Comment</h2>
						<form id="comment-form">
							<div class="row">
								<div class="col-md-5">
									<input name="name" id="name" type="text" placeholder="Name">
									<input name="website" id="website" type="text" placeholder="Subject">
									<input name="mail" id="mail" type="text" placeholder="Email">
								</div>
								<div class="col-md-7">
									<textarea name="comment" id="comment" placeholder="Message"></textarea>
									<input type="submit" id="submit-contact" value="Submit">
								</div>
							</div>
						</form>
					</div>
					<!-- End contact form box -->
				</div>
			</div>
		</section>
		<!-- End blog section -->

		<!-- footer 
			================================================== -->
		<?php include 'footer.php' ?>
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