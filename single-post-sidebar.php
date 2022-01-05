<?php

require_once 'configuration/config.php';



$active_act = "active";





$getArticleCategory = function ($idArticle) use ($connect) {

    $categories= mysqli_query($connect,"select * from categories where id_cat = ".$idArticle);

    return mysqli_fetch_row($categories);

};



$getCategoryArticles = function ($idCat) use ($connect) {

    $result = [];

    $categories= mysqli_query($connect,"select * from actualites where archive!='1' AND id_categorie = ".$idCat." order by date_pub desc ");



    if($categories){

        while($r=mysqli_fetch_array($categories)){

            array_push($result, $r);

        }

    }



    return $result;

};









$categories= mysqli_query($connect,"select * from categories");





$dataArticles = [];

$articles= mysqli_query($connect,"select * from actualites where archive!='1' order by date_pub desc ");

while ($R=mysqli_fetch_array($articles))

{

    $R['_category'] = $getArticleCategory($R['id_article']);

    array_push($dataArticles, $R);

}



$dataCategories = [];

$categories= mysqli_query($connect,"select * from categories");

while ($R=mysqli_fetch_array($categories))

{



    $R['_articles'] = $getCategoryArticles($R['id_cat']);

    array_push($dataCategories, $R);

}





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

		<!-- blog-section 
			================================================== -->
		<section class="blog-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-9">
						<div class="blog-box single-post with-sidebar">
							<div class="blog-post">
								<img src="upload/blog/single.jpg" alt="">
								<div class="post-content">
									<div class="title-post">
										<span>Apr-11-18</span>
										<h1>We Asked Interior Designers: What Small Changes <br> Make the Biggest Difference?</h1>
										<ul class="post-tags">
											<li><a href="#">Architecture</a></li>
											<li><a href="#">Exterior</a></li>
										</ul>
									</div>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker.</p>
									<p class="quote">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>
									<div class="row">
										<div class="col-md-6">
											<div class="video-popup">
												<img src="upload/blog/single2.jpg" alt="">
												<div class="hover-box">
													<a href="https://vimeo.com/185928744" class="zoom">Play</a>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
										</div>
									</div>
									<div class="share-tags-box">
										<div class="row">
											<div class="col-lg-4 col-md-3">
												<p>Posted by John Levo</p>
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
							
							<div class="comment-area-box">
								<h2>Comments (2)</h2>
								<ul class="comment-tree">
									<li>
										<div class="comment-box">
											<img alt="" src="upload/others/test1.jpg">
											<div class="comment-content">
												<h4>Hansom Rob</h4>
												<span>19.06.2018  |  2 hours ago  |  <a href="#">REPLY</a></span>
												<p>As an architect and interior designer, Dean creates warm and inviting environments that deliver the comfort of energy efficient, naturally lit spaces. he spends a lot of time traveling, for work and pleasure, and relies on her experiences with different cultures to gain unique perspectives. </p>
											</div>
										</div>
										<ul class="depth">
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
										</ul>
									</li>

								</ul>
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
					<div class="col-lg-3">
						<div class="sidebar">
							<div class="search-widget widget">
								<form>
									<input type="search" placeholder="Search..."/>
									<button type="submit">
										<i class="fa fa-search"></i>
									</button>
								</form>
							</div>
							<div class="text-widget widget">
								<h2>About me</h2>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining esentially unchanged.</p>
							</div>
  							<div class="popular-widget widget">
								<h2>Recent Posts</h2>
								<ul class="popular-list">
									<li>
										<img alt="" src="upload/blog/t1.jpg">
										<div class="side-content">
											<h2><a href="single-post.html">Aliquam tincidunt mauris eu risus.</a></h2>
											<span>Jan-10-18</span>
										</div>
									</li>
									<li>
										<img alt="" src="upload/blog/t2.jpg">
										<div class="side-content">
											<h2><a href="single-post.html">Donec quis dui at dolor tempor interdum.</a></h2>
											<span>Apr-23-18</span>
										</div>
									</li>
									<li>
										<img alt="" src="upload/blog/t3.jpg">
										<div class="side-content">
											<h2><a href="single-post.html">Vivamus molestie gravida turpis.</a></h2>
											<span>July-08-18</span>
										</div>
									</li>
								</ul>
							</div>
  							<div class="social-widget widget">
								<h2>Social Networks</h2>
								<ul class="social-list">
									<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
									<li><a class="github" href="#"><i class="fa fa-github-alt"></i></a></li>
									<li><a class="vimeo" href="#"><i class="fa fa-vimeo"></i></a></li>
									<li><a class="youtube" href="#"><i class="fa fa-youtube-play"></i></a></li>
								</ul>
							</div>
  							<div class="tags-widget widget">
								<h2>Tags</h2>
								<ul class="tags-list">
									<li><a href="#">design</a></li>
									<li><a href="#">development</a></li>
									<li><a href="#">travelling</a></li>
									<li><a href="#">nature</a></li>
									<li><a href="#">web design</a></li>
									<li><a href="#">multimedia</a></li>
									<li><a href="#">graphics</a></li>
								</ul>
							</div>
  							<div class="google-ads widget">
								<a href="#"><img src="upload/blog/adv.jpg" alt=""></a>
							</div>
							<div class="subscribe-widget widget">
								<h2>Newsletter</h2>
								<p>Subscribe to our newsletter and stay up to date with coming events straight in your mailbox:</p>
								<form>
									<input type="text" name="sub-email" id="sub-email" placeholder="youremail@mail.com..."/>
									<button type="submit">
										<i class="fa fa-check"></i>
									</button>
								</form>
							</div>
  							<div class="category-widget widget">
								<h2>Categories</h2>
								<ul class="category-list">
									<li><a href="#">Blogging <span>(9)</span></a></li>
									<li><a href="#">Web Design <span>(20)</span></a></li>
									<li><a href="#">Graphics <span>(13)</span></a></li>
									<li><a href="#">Development <span>(7)</span></a></li>
									<li><a href="#">News <span>(44)</span></a></li>
									<li><a href="#">WordPress <span>(22)</span></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End blog section -->

		<!-- footer 
			================================================== -->
		<?php  include 'footer.php' ?>
		<!-- End footer -->

	</div>
	<!-- End Container -->
	
	<!--javascript link front-->
	<?php include 'javascript.php' ?>
    <!-- End javascript link front -->
	
</body>
</html>