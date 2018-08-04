
<?php
include("include/connectbddlocal.php")//include("connectbdd.php")
?>

<!DOCTYPE html>
<html lang="fr">
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
	<?php $idpage = "ajout"; ?>
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
									<ul
										<li><a href="../index.php">Accueil ></a></li>
										<li>Formulaire pour l'ajout d'un article</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

				<!-- formulaire d'ajout d'article -->

			<div class="contact_info_container">
					<div class="container">
						<div class="row justify-content-md-center">

							<!-- Contact Form -->
							<div class="col-lg-9 ">
								<div class="contact_form">
									<div class="contact_info_title">Formulaire d'ajout d'un article</div>
										<form action="validation_ajout.php" method="POST" class="comment_form">
												<div>
													<div class="form_title">Nom de l'auteur</div>
													<input type="text" name="nom" class="comment_input" required="required">
												</div>

												<div>
													<div class="form_title">Prénom de l'auteur</div>
													<input type="text" name="prenom" class="comment_input" required="required">
												</div>

												<div>
													<div class="form_title">Email</div>
													<input type="email" name="email" class="comment_input" required="required">
												</div>

												<div>
													<div class="form_title">Titre</div>
													<input type="text" name="titre" class="comment_input" required="required">
												</div>

												<div>
													<div class="form_title">texte de l'article</div>
													<textarea name="texte" class="comment_input comment_textarea" required="required"></textarea>
												</div>

												<div>
													<div class="form_title">Resumé (250 mots maximum)</div>
													<textarea name="resume" class="comment_input comment_textarea" required="required"></textarea>
												</div>

												<div>
													<div class="form_title">Thème en 1 mot</div>
													<input type="text" name="theme" class="comment_input" required="required">
												</div>

												<div>
													<select name="motcle">
															 <?php
																	$reqmc = 'SELECT * FROM motcle';
																	$mc = $dbh->prepare($reqmc);
																	// Execution de la requÃªte
																	$mc->execute();
																	// On affiche chaque entrée une à  une
																	while ($mcs = $mc->fetch(PDO::FETCH_ASSOC))
																		{
																?>
													 		<option value="<?php $mcs['id_motcle'];?>"><?php echo $mcs['mc_motcle'];?></option>
																 <?php
																		}
																			 $mc->closeCursor(); // Termine le traitement de la requÃªte
																 ?>
													</select>
												</div>

													<button type="submit" class="comment_button trans_200">Ajouter l'article</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Footer2-->
				<?php include("include/footer2.php"); ?>
				<!-- Footer2 -->
		</div>


	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/parallax-js-master/parallax.min.js"></script>

	<script src="plugins/marker_with_label/marker_with_label.js"></script>
	<script src="js/contact.js"></script>
	</body>
</html>
