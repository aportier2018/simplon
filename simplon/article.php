<?php
include("include/connectbddlocal.php")//include("connectbdd.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Article</title>
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
<?php $idpage="accueil"; ?>
	<div class="super_container">

		<!-- Header2 -->
		<?php include("include/header2.php") ?>
		<!-- Header2-->
		<?php
		$idarticle =$_GET["id"];

		// $detail = 'SELECT * FROM article WHERE id_art="'.$idarticle.'"';
		// $reponse = $dbh->query($detail);
		// // // Execution de la requête
		// // $reponse->execute();
		// $row = $reponse->fetch(PDO::FETCH_ASSOC);

		// $detail = 'SELECT * FROM article WHERE id_art="'.$idarticle.'"';
		// $reponse = $dbh->prepare($detail);
		// // Execution de la requête
		// $reponse->execute();
		//
		// // On affiche chaque entrée une à une
		// $row = $reponse->fetch(PDO::FETCH_ASSOC);

		// Requête SQL qui va retourner toutes les entrées de la table "auteuredeacteur"
		$reqaut = 'SELECT * FROM auteuredacteur NATURAL JOIN publie NATURAL JOIN article WHERE id_art="'.$idarticle.'"';
		$auteur = $dbh->query($reqaut);

		//requête pour recupérer les dates de publication en lien avec auteur
		$reqdate = 'SELECT date_publicat FROM publie NATURAL JOIN article';
		$datep = $dbh->query($reqdate);
		$publication = $datep->fetch(PDO::FETCH_ASSOC);

		//requête pour récupérer l'image
		$source ='SELECT id_img, source FROM image NATURAL JOIN integrer NATURAL JOIN article';
		$image = $dbh->query($source);
		$images = $image->fetch(PDO::FETCH_ASSOC);

		//req pour récupérer  le texte
		$reqtexte = 'SELECT texte FROM article';
		$texte= $dbh->query($reqtexte);
		$textes = $texte->fetch(PDO::FETCH_ASSOC);

		$reqtitre = 'SELECT titre_art FROM article';
		$titre= $dbh->query($reqtitre);
		$titres = $titre->fetch(PDO::FETCH_ASSOC);


		// On affiche chaque entrée une à une
		while ($auteurs = $auteur->fetch(PDO::FETCH_ASSOC))
		{
		?>
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
								<li><?php echo $titres['titre_art'];?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- <article >

	</article>-->

	<div class="blog">
		<div class="container">
			<div class="row">

				<!-- Blog Content -->
				<div class="col-lg-8">
					<div class="blog_content">
						<div class="blog_title"><?php echo $titres['titre_art'];?></div>
						<div class="blog_post_meta">


							<div class="blog_post_image">
							<img  alt="<?php echo $images['titre_img']; ?>" src="<?php echo $images['source']; ?>" class="resize" />
							</a>
							</div>
							<ul>
								<li>écrit par <?php echo $auteurs['n_auteur']." ".$auteurs['p_auteur'];?></li>
								<li>posté le <?php echo date("d/m/Y", strtotime($publication['date_publicat'])); ?></a>
							</ul>
						</div>

						<div class="blog_post_text">
							<p><?php echo $textes['texte']; ?></a></p>
						</div>


					<div class="blog_extra d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
						<div class="blog_tags">
							<span>Mot clé : </span>
			 <?php
			 	$idarticle = $_GET["id"];
				$motcle ='SELECT mc_motcle FROM motcle NATURAL JOIN possede NATURAL JOIN article WHERE id_art="'.$idarticle.'"';
				$mc = $dbh->query($motcle);

				while($mcs = $mc->fetch(PDO::FETCH_ASSOC))
				{
		 		?>
						<ul>
							<li> <?php echo $mcs['mc_motcle'];?></li>
							<li> </li>
						</ul>
						</div>
				<?php
				}
				$mc->closeCursor(); // Termine le traitement de la requête
				?>
			<?php
	}
	$auteur->closeCursor(); // Termine le traitement de la requête
	?>
						<!-- <div class="blog_social ml-lg-auto">
							<span>Share: </span>
							<ul>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div> -->

						<!-- <div class="add_comment_container">
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
				</div> -->

					</div>
				</div>
			</div>
		</div>
	</div>


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
