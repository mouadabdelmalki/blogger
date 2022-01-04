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
					<div id="map"></div>
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
					<p>Thank you for choosing our website. <br>
					Please give us a ring for an informal chat to find out more about what we can offer your needs.<br>
					Our phone number is: +44 (0)7882452461.<br>
					And the address: Kim Young 39082, New Yersey, USA</p>
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
	<script src="js/cvbuilder-plugins.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCiqrIen8rWQrvJsu-7f4rOta0fmI5r2SI&amp;sensor=false&amp;language=en" type="text/javascript"></script>
	<script src="js/gmap3.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>