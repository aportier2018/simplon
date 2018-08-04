<?php
include("include/connectbddlocal.php")//include("connectbdd.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Blog</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Unicat project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="plugins/video-js/video-js.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/blog.css">
<link rel="stylesheet" type="text/css" href="styles/blog_responsive.css">
</head>
<body>
<?php $idpage="blog"; ?>
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
								<li>Blog</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Blog -->

	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_post_container">

						<!-- Blog Post -->
						<div class="blog_post trans_200">
							<?php

						// Requête SQL qui va retourner toutes les entrées de la table "article"
						$article = 'SELECT * FROM article';
						$articles = $dbh->query($article);

						$source ='SELECT id_img, titre_img, source FROM image NATURAL JOIN integrer NATURAL JOIN article';
						$image = $dbh->query($source);
						$images = $image->fetch(PDO::FETCH_ASSOC);
						// Execution de la requête
						//$reponse->execute();
						// On affiche chaque entrée une à une
						while ($row = $articles->fetch(PDO::FETCH_ASSOC))
						{
						?>

							<div class="blog_post_image">
								<a href="article.php?id=<?php echo $row['id_art']; ?>"><img  alt="<?php echo $images['titre_img']; ?>" src="<?php echo $images['source']; ?>" class="resize" />
	            </a>
							</div>

							<div class="blog_post_body">
								<div class="blog_post_title"><?php echo $row['titre_art'];?> <!--***récupere de titre -->

									<!-- <a href="blog_single.html"><?php //echo $row['resume_art']; ?></a></div> -->

									<div class="blog_post_text">
										<p><?php echo $row['resume_art']; ?></a></p>
									</div>
									<!--***récupere de resumé -->
									<?php
							}
									$articles->closeCursor(); // Termine le traitement de la requête
									?>

								<div class="blog_post_meta">
									<?php

								// Requête SQL qui va retourner toutes les entrées de la table "auteuredeacteur"
								$reqaut = 'SELECT * FROM auteuredacteur NATURAL JOIN publie NATURAL JOIN article';
								$auteur = $dbh->query($reqaut);
								//requête pour retourner les dates de publication en lien avec auteur
								$reqdate = 'SELECT date_publicat FROM publie NATURAL JOIN article';
								$datep = $dbh->query($reqdate);

								// Execution de la requête
								//$reponse->execute();

								// On affiche chaque entrée une à une
								while ($auteurs = $auteur->fetch(PDO::FETCH_ASSOC))
								{
								?>
									<ul>
										<li><a href="#"><?php echo $auteurs['n_auteur']." ".$auteurs['p_auteur'];?></a></li>
										<?php $date = $datep->fetch(PDO::FETCH_ASSOC);?>
										<li><a href="#"><?php echo date("d/m/Y", strtotime($date['date_publicat'])); ?></a></li>

									</ul>
								</div>

							</div>

               <?php
               }
               $auteur->closeCursor(); // Termine le traitement de la requête
               ?>


					</div>
				</div>
			</div>
			<div class="row">
				<div class="col text-center">
					<div class="load_more trans_200"><a href="#">load more</a></div>
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
						<!-- <div class="newsletter_content text-lg-left text-center">
							<div class="newsletter_title">sign up for news and offers</div>
							<div class="newsletter_subtitle">Subcribe to lastest smartphones news & great deals we offer</div>
						</div> -->

						<!-- Newsletter Form -->
						<!-- <div class="newsletter_form_container ml-lg-auto">
							<form action="#" id="newsletter_form" class="newsletter_form d-flex flex-row align-items-center justify-content-center">
								<input type="email" class="newsletter_input" placeholder="Your Email" required="required">
								<button type="submit" class="newsletter_button">subscribe</button>
							</form>
						</div> -->

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
<script src="plugins/masonry/masonry.js"></script>
<script src="plugins/video-js/video.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/blog.js"></script>
</body>
</html>
