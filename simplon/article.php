<?php
include("include/connectbddlocal.php")//include("connectbdd.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Blog Single</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Unicat project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/blog_single.css">
	<link rel="stylesheet" type="text/css" href="styles/blog_single_responsive.css">
</head>
<body>

	<div class="super_container">

		<!-- Header2 -->
		<?php include("include/header3.php") ?>
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
								<li><a href="article.php">Article</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Blog -->
	 	<?php
        $idarticle =$_GET["id"];

        $detail = 'SELECT * FROM article WHERE id_art="'.$idarticle.'"';
        $reponse = $dbh->prepare($detail);
        // Execution de la requête
        $reponse->execute();

        // On affiche chaque entrée une à une
        $row = $reponse->fetch(PDO::FETCH_ASSOC);

      ?>

	<div class="blog">
		<div class="container">
			<div class="row">

				<!-- Blog Content -->
				<div class="col-lg-8">
					<div class="blog_content">
						<div class="blog_title"><?php echo $row['titre_art'];?> </div>
						<div class="blog_post_meta">
										<?php

									// Requête SQL qui va retourner toutes les entrées de la table "auteuredeacteur"
									$reqaut = 'SELECT * FROM auteuredacteur NATURAL JOIN publie NATURAL JOIN article';
									$auteur = $dbh->query($reqaut);
									//requête pour retourner les dates de publication en lien avec auteur
									$reqdate = 'SELECT date_publicat FROM publie NATURAL JOIN article';
									$datep = $dbh->query($reqdate);
									$publication = $datep->fetch(PDO::FETCH_ASSOC);

									$source ='SELECT id_img, source FROM image NATURAL JOIN integrer NATURAL JOIN article';
									$image = $dbh->query($source);
									$images = $image->fetch(PDO::FETCH_ASSOC);
									// Execution de la requête
									//$reponse->execute();
									// On affiche chaque entrée une à une


									// On affiche chaque entrée une à une
									while ($auteurs = $auteur->fetch(PDO::FETCH_ASSOC))
									{
									?>
							<ul>
								<li>écrit par <?php echo $auteurs['n_auteur']." ".$auteurs['p_auteur'];?></li>
									<?php $date = $datep->fetch(PDO::FETCH_ASSOC);?>
								<li>posté le <?php echo date("d/m/Y", strtotime($date['date_publicat'])); ?></a>
							</ul>
						</div>

						</div>
						<div class="blog_image"><img  alt="<?php echo $images['titre_img']; ?>" src="<?php echo $images['source']; ?>" class="resize" /></div>
						<?php
						}
						$articles->closeCursor(); // Termine le traitement de la requête
						?>
						<div class="blog_images">
							<div class="row">
								<div class="col-lg-6 blog_images_col"><div class="blog_image_small"><img src="images/blog_images_1.jpg" alt=""></div></div>
								<div class="col-lg-6 blog_images_col"><div class="blog_image_small"><img src="images/blog_images_2.jpg" alt=""></div></div>
							</div>

					<div class="blog_extra d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
						<div class="blog_tags">
							<span>Tags: </span>
							<ul>
								<li><a href="#">Education</a>, </li>
								<li><a href="#">Math</a>, </li>
								<li><a href="#">Food</a>, </li>
								<li><a href="#">Schools</a>, </li>
								<li><a href="#">Religion</a>, </li>
							</ul>
						</div>


						<div class="blog_social ml-lg-auto">
							<span>Share: </span>
							<ul>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
					<!-- Comments -->
					<!-- <div class="comments_container">
						<div class="comments_title"><span>30</span> Comments</div>
						<ul class="comments_list">
							<li>
								<div class="comment_item d-flex flex-row align-items-start jutify-content-start">
									<div class="comment_image"><div><img src="images/comment_1.jpg" alt=""></div></div>
									<div class="comment_content">
										<div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
											<div class="comment_author"><a href="#">Jennifer Aniston</a></div>
											<div class="comment_rating"><div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div></div>
											<div class="comment_time ml-auto">October 19,2018</div>
										</div>
										<div class="comment_text">
											<p>There are many variations of passages of Lorem Ipsum available, but the majority have alteration in some form, by injected humour.</p>
										</div>
										<div class="comment_extras d-flex flex-row align-items-center justify-content-start">
											<div class="comment_extra comment_likes"><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span>108</span></a></div>
											<div class="comment_extra comment_reply"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span>Reply</span></a></div>
										</div>
									</div>
								</div>
								<ul>
									<li>
										<div class="comment_item d-flex flex-row align-items-start jutify-content-start">
											<div class="comment_image"><div><img src="images/comment_2.jpg" alt=""></div></div>
											<div class="comment_content">
												<div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
													<div class="comment_author"><a href="#">John Smith</a></div>
													<div class="comment_rating"><div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div></div>
													<div class="comment_time ml-auto">October 19,2018</div>
												</div>
												<div class="comment_text">
													<p>There are many variations of passages of Lorem Ipsum available, but the majority have alteration in some form, by injected humour.</p>
												</div>
												<div class="comment_extras d-flex flex-row align-items-center justify-content-start">
													<div class="comment_extra comment_likes"><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span>108</span></a></div>
													<div class="comment_extra comment_reply"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span>Reply</span></a></div>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</li>
							<li>
								<div class="comment_item d-flex flex-row align-items-start jutify-content-start">
									<div class="comment_image"><div><img src="images/comment_3.jpg" alt=""></div></div>
									<div class="comment_content">
										<div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
											<div class="comment_author"><a href="#">Jane Austen</a></div>
											<div class="comment_rating"><div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div></div>
											<div class="comment_time ml-auto">October 19,2018</div>
										</div>
										<div class="comment_text">
											<p>There are many variations of passages of Lorem Ipsum available, but the majority have alteration in some form, by injected humour.</p>
										</div>
										<div class="comment_extras d-flex flex-row align-items-center justify-content-start">
											<div class="comment_extra comment_likes"><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span>108</span></a></div>
											<div class="comment_extra comment_reply"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span>Reply</span></a></div>
										</div>
									</div>
								</div>
							</li>
						</ul> -->


						<div class="add_comment_container">
							<div class="add_comment_title">Write a comment</div>
							<div class="add_comment_text">Your email address will not be published. Required fields are marked *</div>
							<form action="#" class="comment_form">
								<div>
									<div class="form_title">Review*</div>
									<textarea class="comment_input comment_textarea" required="required"></textarea>
								</div>
								<div class="row">
									<div class="col-md-6 input_col">
										<div class="form_title">Name*</div>
										<input type="text" class="comment_input" required="required">
									</div>
									<div class="col-md-6 input_col">
										<div class="form_title">Email*</div>
										<input type="text" class="comment_input" required="required">
									</div>
								</div>
								<div class="comment_notify">
									<input type="checkbox" id="checkbox_notify" name="regular_checkbox" class="regular_checkbox checkbox_account" checked>
									<label for="checkbox_notify"><i class="fa fa-check" aria-hidden="true"></i></label>
									<span>Notify me of new posts by email</span>
								</div>
								<div>
									<button type="submit" class="comment_button trans_200">submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- Blog Sidebar -->
				<!-- <div class="col-lg-4">
					<div class="sidebar"> -->

						<!-- Categories -->
						<!-- <div class="sidebar_section">
							<div class="sidebar_section_title">Categories</div>
							<div class="sidebar_categories">
								<ul class="categories_list">
									<li><a href="#" class="clearfix">Art & Design<span>(25)</span></a></li>
									<li><a href="#" class="clearfix">Business<span>(10)</span></a></li>
									<li><a href="#" class="clearfix">IT & Software<span>(22)</span></a></li>
									<li><a href="#" class="clearfix">Languages<span>(12)</span></a></li>
									<li><a href="#" class="clearfix">Programming<span>(18)</span></a></li>
								</ul>
							</div>
						</div> -->

						<!-- Latest News -->
						<!-- <div class="sidebar_section">
							<div class="sidebar_section_title">Latest Courses</div>
							<div class="sidebar_latest">

								<!- Latest Course -->
								<!-- <div class="latest d-flex flex-row align-items-start justify-content-start">
									<div class="latest_image"><div><img src="images/latest_1.jpg" alt=""></div></div>
									<div class="latest_content">
										<div class="latest_title"><a href="course.html">How to Design a Logo a Beginners Course</a></div>
										<div class="latest_date">november 11, 2017</div>
									</div>
								</div> -->

								<!-- Latest Course -->
								<!-- <div class="latest d-flex flex-row align-items-start justify-content-start">
									<div class="latest_image"><div><img src="images/latest_2.jpg" alt=""></div></div>
									<div class="latest_content">
										<div class="latest_title"><a href="course.html">Photography for Beginners Masterclass</a></div>
										<div class="latest_date">november 11, 2017</div>
									</div>
								</div> -->

								<!-- Latest Course -->
								<!-- <div class="latest d-flex flex-row align-items-start justify-content-start">
									<div class="latest_image"><div><img src="images/latest_3.jpg" alt=""></div></div>
									<div class="latest_content">
										<div class="latest_title"><a href="course.html">The Secrets of Body Language</a></div>
										<div class="latest_date">november 11, 2017</div>
									</div>
								</div>

							</div>
						</div>

						<! Gallery
						<div class="sidebar_section">
							<div class="sidebar_section_title">Instagram</div>
							<div class="sidebar_gallery">
								<ul class="gallery_items d-flex flex-row align-items-start justify-content-between flex-wrap">
									<li class="gallery_item">
										<div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
										<a class="colorbox" href="images/gallery_1_large.jpg">
											<img src="images/gallery_1.jpg" alt="">
										</a>
									</li>
									<li class="gallery_item">
										<div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
										<a class="colorbox" href="images/gallery_2_large.jpg">
											<img src="images/gallery_2.jpg" alt="">
										</a>
									</li>
									<li class="gallery_item">
										<div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
										<a class="colorbox" href="images/gallery_3_large.jpg">
											<img src="images/gallery_3.jpg" alt="">
										</a>
									</li>
									<li class="gallery_item">
										<div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
										<a class="colorbox" href="images/gallery_4_large.jpg">
											<img src="images/gallery_4.jpg" alt="">
										</a>
									</li>
									<li class="gallery_item">
										<div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
										<a class="colorbox" href="images/gallery_5_large.jpg">
											<img src="images/gallery_5.jpg" alt="">
										</a>
									</li>
									<li class="gallery_item">
										<div class="gallery_item_overlay d-flex flex-column align-items-center justify-content-center">+</div>
										<a class="colorbox" href="images/gallery_6_large.jpg">
											<img src="images/gallery_6.jpg" alt="">
										</a>
									</li>
								</ul>
							</div>
						</div> -->

						<!-- Tags -->
						<div class="sidebar_section">
							<div class="sidebar_section_title">Tags</div>
							<div class="sidebar_tags">
								<ul class="tags_list">
									<li><a href="#">creative</a></li>
									<li><a href="#">unique</a></li>
									<li><a href="#">photography</a></li>
									<li><a href="#">ideas</a></li>
									<li><a href="#">wordpress</a></li>
									<li><a href="#">startup</a></li>
								</ul>
							</div>
						</div>

						<!-- Banner -->
						<div class="sidebar_section">
							<div class="sidebar_banner d-flex flex-column align-items-center justify-content-center text-center">
								<div class="sidebar_banner_background" style="background-image:url(images/banner_1.jpg)"></div>
								<div class="sidebar_banner_overlay"></div>
								<div class="sidebar_banner_content">
									<div class="banner_title">Free Book</div>
									<div class="banner_button"><a href="#">download now</a></div>
								</div>
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

						 Newsletter Content
						<div class="newsletter_content text-lg-left text-center">
							<div class="newsletter_title">sign up for news and offers</div>
							<div class="newsletter_subtitle">Subcribe to lastest smartphones news & great deals we offer</div>
						</div>

						<! Newsletter Form
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
	<?php include("include/footer2.php") ?>
	<!-- Footer2 -->


</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="js/blog_single.js"></script>
</body>
</html>
