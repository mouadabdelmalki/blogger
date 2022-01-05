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
					<span>Je suis entrepreneur et écrivain</span>
					<p>This is a sample text block, you can describe services in short words, or fill up with some nice and niche informations about your company.</p>
				</div>
				<div class="blog-box">
					        <div class="row">
						            
                                    <div class="col-lg-9">
										   <div class="row">
										   <?php
                        
										if(isset($_GET['categor'])){
										
										
										$categorchecked = [];
										$categorchecked = $_GET['categor'];
										
										if (is_array($categorchecked) || is_object($categorchecked)){
											foreach($categorchecked as $idCat){
													
													$ctgr = mysqli_query($connect,"SELECT * FROM `actualites` WHERE id_categorie in (".$idCat.")");

													if(mysqli_num_rows($ctgr) > 0 && (is_array($ctgr) || is_object($ctgr)) ){
													
																	foreach($ctgr as $R){
																		$catName = array_key_exists("_categorie", $R) ?  $R["_categorie"]["libelle"] : "Santé";
												
																		$src = "images/blog/".($R["image_contenu"] ? $R["image_contenu"] : "default-header.jpg");
												
																		if(!file_exists($src)) $src =  "images/blog/default-header.jpg";
														
																	echo'
												<div class="col-lg-6 col-md-6" style="display:-webkit-box;">
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
                                   }
                                   
                        
                            }
                        }
                        }
                       else {
						foreach($dataArticles as $R){

							$catName = array_key_exists("_categorie", $R) ?  $R["_categorie"]["libelle"] : "Santé";

							$src = "images/blog/".($R["image_contenu"] ? $R["image_contenu"] : "default-header.jpg");

							if(!file_exists($src)) $src =  "images/blog/default-header.jpg";

							echo'
							<div class="col-lg-6 col-md-6" style="display:-webkit-box;">
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
                            }
                      
                ?>

										   </div>

                                    </div>
									<div class="col-lg-3">
									<div class="sidebar">
								
								<div class="category-widget widget">
									<h2>Categories</h2>
									<ul class="category-list">

									<form action="" method="GET">
											<?php
									
													$checked = [];
													foreach($categories as $B){
														if(isset($_GET['categor']))
														{
															$checked = $_GET['categor'];
														}     
															
												echo'    
												<li><a><label for="'.$B["id_cat"].'">'.  $B["libelle"] .'</label> <span><input type="checkbox" id="'.$B["id_cat"].'" name="categor[]" value="'.$B["id_cat"].'" '.(in_array($B['id_cat'], $checked) ? "checked" :"").'></span></a></li>
												';}?>
											</ul>
											<button type="submit" class="category-btn-filter">Filtrer</button>
									</form>
								</div>
								
								<div class="popular-widget widget">
									<h2>Recent Posts</h2>
									<ul class="popular-list">

									<?php 
                                         
										 foreach(array_slice($dataArticles , 0 , 3) as $R){
										$src = "images/blog/".($R["image_contenu"] ? $R["image_contenu"] : "default-header.jpg");
											
										if(!file_exists($src)) $src =  "images/blog/default-header.jpg";
										
									echo'
									    
										<li>
										
											<img alt="" src="'.$src.'">
											<div class="side-content">
												<h2><a href="article?id='.$R["url"].'">'.$R["titre"].'</a></h2>
												<span>'.$R["date_pub"].'</span>
											</div>
									
										</li>

										'; }
									?>
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
								<!-- <div class="google-ads widget">
									<a href="#"><img src="upload/blog/default-header.jpg" alt=""></a>
								</div> -->
							</div>
									</div>
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