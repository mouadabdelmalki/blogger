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
			<?php include 'header.php';?>
		<!-- End Header -->

		<!-- blog-section 
			================================================== -->
		<section class="blog-section">
			<div class="container">
				<div class="title-section">
					<span>blog posts</span>
					<p>This is a sample text block, you can describe services in short words, or fill up with some nice and niche informations about your company.</p>
				</div>
				<div class="blog-box">
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="blog-post">
								<a href="single-post.html"><img src="upload/blog/1.jpg" alt=""></a>
								<span>Jan-05-18</span>
								<h2><a href="single-post.html">5 Things you should know before starting coding</a></h2>
								<ul class="post-tags">
									<li><a href="#">Interior</a></li>
									<li><a href="#">Architecture</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="blog-post">
								<a href="single-post.html"><img src="upload/blog/2.jpg" alt=""></a>
								<span>Apr-11-18</span>
								<h2><a href="single-post.html">Benefits from letuce, the good and the bad</a></h2>
								<ul class="post-tags">
									<li><a href="#">Food</a></li>
									<li><a href="#">Health</a></li>
								</ul>
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="blog-post">
								<a href="single-post.html"><img src="upload/blog/4.jpg" alt=""></a>
								<span>June-05-18</span>
								<h2><a href="single-post.html">Working as a Team</a></h2>
								<ul class="post-tags">
									<li><a href="#">Social</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="blog-post">
								<a href="single-post.html"><img src="upload/blog/5.jpg" alt=""></a>
								<span>Apr-11-18</span>
								<h2><a href="single-post.html">Free time in Office</a></h2>
								<ul class="post-tags">
									<li><a href="#">Games</a></li>
									<li><a href="#">Free Time</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="pagination-list-box">
						<ul class="pages-list">
							<li><a href="#" class="prev"><i class="fa fa-long-arrow-left"></i>Prev</a></li>
							<li><a class="active" href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#" class="next">Next<i class="fa fa-long-arrow-right"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!-- End blog section -->

		<!-- footer 
			================================================== -->
			<?php include 'footer.php';?>
		<!-- End footer -->

	</div>
	<!-- End Container -->
	
	<!--javascript link front-->
	<?php include 'javascript.php' ?>
    <!-- End javascript link front -->
	
</body>
</html>