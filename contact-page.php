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

		<!-- contact-section 
			================================================== -->
		<section class="contact-section">
			<div class="container">
				<div class="contact-box">
				       <h1> Nous contacter </h1>
					   <h3> Vous voulez entrer en contact ?
Nous aimerions recevoir de vos nouvelles. </h3>
					<form id="contact-form">
						<div class="row">
							<div class="col-md-4">
								<input name="name" id="name" type="text" placeholder="Name">
								<input name="tel-number" id="tel-number" type="text" placeholder="Subject">
								<input name="mail" id="mail" type="text" placeholder="Email">
							</div>
							<div class="col-md-8">
								<textarea name="comment" id="comment" placeholder="Your Message*"></textarea>
								<input type="submit" id="submit_contact" value="Submit">
								<div id="msg" class="message"></div>
							</div>
						</div>
					</form>
					<div id="map"></div>
					<p>Merci d'avoir choisi notre site Web.<br>
					Veuillez nous appeler pour une discussion informelle pour en savoir plus sur ce que nous pouvons offrir à vos besoins.<br>
					</p>
				</div>
			</div>
		</section>
		<!-- End contact section -->

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