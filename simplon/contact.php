<!DOCTYPE html>
<html lang="en">
<head>
<title>Contact</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Unicat project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/contact.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
</head>
<body>
<?php $idpage = "contact"; ?>
<div class="super_container">

	<!-- Header2 -->
	<?php include("include/header2.php"); ?>
	<!-- Header2-->

	<!-- Home -->

	<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="../index.php">Accueil</a></li>
								<li>Contact</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact -->

	<div class="contact">

		<!-- Contact Map -->

		<div class="contact_map">

			<!-- Google Map -->

			<div class="map">
				<div id="google_map" class="google_map">
					<div class="map_container">
						<div id="map"></div>
					</div>
				</div>
			</div>

		</div>

		<!-- Contact Info -->

		<div class="contact_info_container">
			<div class="container">
				<div class="row">

					<!-- Contact Form -->
					<div class="col-lg-6">
						<div class="contact_form">
							<div class="contact_info_title">Formulaire de contact</div>
							<form action="validation_contact.php" method="POST" class="comment_form">
								<div>
									<div class="form_title">Nom</div>
									<input type="text" name="nom" class="comment_input" required="required">
								</div>
								<div>
									<div class="form_title">Prénom</div>
									<input type="text" name="prenom" class="comment_input" required="required">
								</div>
								<div>
									<div class="form_title">Adresse</div>
									<input type="text" name="adresse" class="comment_input" required="required">
								</div>
								<div>
									<div class="form_title">Email</div>
									<input type="email" name="email" class="comment_input" required="required">
								</div>
								<div>
									<div class="form_title">Message</div>
									<textarea name="commentaire" class="comment_input comment_textarea" required="required"></textarea>
								</div>
								<div>
									<button type="submit" class="comment_button trans_200">Envoyer</button>
								</div>
							</form>
						</div>
					</div>

					<!-- Contact Info -->
					<div class="col-lg-6">
						<div class="contact_info">
							<div class="contact_info_title">Info Contact</div>
							<div class="contact_info_text">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo .</p>
							</div>
							<div class="contact_info_location">
								<div class="contact_info_location_title">Fabrique Charleville-Mèzières</div>
								<ul class="location_list">
									<li>Site : https://simplon.co/charleville/</li>
									<li>Tél :  (00 33) (0)3 24 56 62 62</li>
									<li>18 avenue corneau, 08000 Charleville-mézières, France</li>
								</ul>
							</div>
							<div class="contact_info_location">
								<div class="contact_info_location_title">Fabrique Paris</div>
								<ul class="location_list">
									<li>https://simplon.co</li>
									<li>1111111111</li>
									<li>info.xxxxxxxx@gmail.com</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<!-- <div class="newsletter">
		<div class="newsletter_background" style="background-image:url(images/newsletter_background.jpg)"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-start">

						<! Newsletter Content -->
						<div class="newsletter_content text-lg-left text-center">
							<div class="newsletter_title">sign up for news and offers</div>
							<div class="newsletter_subtitle">Subcribe to lastest smartphones news & great deals we offer</div>
						</div>

						<!-- Newsletter Form -->
						<div class="newsletter_form_container ml-lg-auto">
							<form action="#" id="newsletter_form" class="newsletter_form d-flex flex-row align-items-center justify-content-center">
								<input type="email" class="newsletter_input" placeholder="Your Email" required="required">
								<button type="submit" class="newsletter_button">subscribe</button>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div> -->

	<!-- Footer2-->
	<?php include("include/footer2.php"); ?>
	<!-- Footer2 -->

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyD7OX1A6FxNtbYLT_7fCUGXU0k7ePnXlY4"></script>
<script src="plugins/marker_with_label/marker_with_label.js"></script>
<script src="js/contact.js"></script>
</body>
</html>
