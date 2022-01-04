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
	<title>BLOG | Accueil</title>

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
				<div class="title-section">
					<span>I'm an Entrepreneur & Writer</span>
					<p>This is a sample text block, you can describe services in short words, or fill up with some nice and niche informations about your company.</p>
				</div>
				<div class="blog-box">
					<div class="row">

					<?php
					foreach($dataArticles as $R){

					$index = 0 ;

					$catName = array_key_exists("_categorie", $R) ?  $R["_categorie"]["libelle"] : "Santé";

					$src = "upload/blog/".($R["image_contenu"] ? $R["image_contenu"] : "default-header.jpg");

					if(!file_exists($src)) $src =  "upload/blog/default-header.jpg";


					echo'
						<div class="col-lg-4 col-md-6" style="display:-webkit-box;">
							<div class="blog-post">
							    <div  class="blog-post-img">
								<a href="article?id='.$R["url"].'"><img src="'.$src.'" alt=""></a>
								</div>
								<div class="blog-post-infos">
								<ul class="post-tags">
									<li><a href="#">Interior</a></li>
									<li><a href="#">Architecture</a></li>
								</ul>
								<h2><a href="article?id='.$R["url"].'">'.$R["titre"].'</a></h2>
								<span>'.$R["auteur"]. '  </span><span> • '.$R["date_pub"].'</span>
								<p class="blog-post-resume" >'.$R["resume"].'</p>
								</div>
							</div>
						</div>
					    ';

					}
						?>
					</div>
					<!-- <div class="row">
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
					</div> -->
					<!-- <div class="pagination-list-box">
						<ul class="pages-list">
							<li><a href="#" class="prev"><i class="fa fa-long-arrow-left"></i>Prev</a></li>
							<li><a class="active" href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#" class="next">Next<i class="fa fa-long-arrow-right"></i></a></li>
						</ul>
					</div> -->
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
	
	<script src="js/cvbuilder-plugins.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCiqrIen8rWQrvJsu-7f4rOta0fmI5r2SI&amp;sensor=false&amp;language=en" type="text/javascript"></script>
	<script src="js/gmap3.min.js"></script>
	<script src="js/script.js"></script>

	
</body>
</html>