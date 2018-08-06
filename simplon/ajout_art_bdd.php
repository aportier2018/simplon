
<?php
include("include/connectbddlocal.php")//include("connectbdd.php")
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<title>Validation d'Ajout d'un article</title>
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
	<?php $idpage = "validation"; ?>
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

    <main class='v_art'>

      <?php
        echo  $n_auteur= addslashes($_POST['nom']);
        echo $p_auteur= addslashes($_POST['prenom']);
        echo $mail = addslashes($_POST['email']);

        echo  $titre = addslashes($_POST['titre']);
        echo  $resume = addslashes($_POST['resume']);
        echo  $texte = addslashes($_POST['texte']);
        echo  $theme= addslashes($_POST['theme']);

        echo  $mc= addslashes($_POST['motcle']);

        echo  $nomimg = addslashes($_POST['nomimg']);
        echo  $source= addslashes($_POST['lien']);


//vérifier la prèsence d'une donnée
//	$test = 'SELECT th_theme';
				//Inserer les données dans les tables "theme"
			  $insert_th = "INSERT INTO theme(th_theme) VALUES('$theme')";
			  $dbh->exec($insert_th);

			//	récupérer l'id theme pour implémenter la table article
				$select_id = $dbh->query("SELECT id_theme FROM theme  WHERE th_theme = '$theme'");
				$lire_id = $select_id ->fetch();
				$currentidth = $lire_id['id_theme'];

        //Inserer les données dans les tables "article"
        $insertart = "INSERT INTO article(titre_art, resume_art, texte, id_theme) VALUES('$titre','$resume','$texte','$currentidth')";
        $dbh->exec($insertart);

      //Inserer les données dans les tables "auteur"
      	$insert_auteur = "INSERT INTO auteuredacteur(n_auteur, p_auteur, email) VALUES('$n_auteur','$p_auteur','$mail')";
      	$dbh->exec($insert_auteur);

  //Inserer les données dans les tables "image"
        $insert_img = "INSERT INTO image(titre_img, source) VALUES('$nomimg','$source')";
        $dbh->exec($insert_img);

  //Inserer les données dans les tables "mot clé"
        $insert_mc = "INSERT INTO motcle(mc_motcle) VALUES('$mc')";
        $dbh->exec($insert_mc);

    //récupérer les id_auteur et id_article pour faire l'association dans la table" "PUBLIE"

        $select_id = $dbh->query("SELECT id_auteur FROM auteuredacteur  WHERE n_auteur = '$n_auteur' AND p_auteur = '$p_auteur'");
        $lire_id = $select_id ->fetch();
        $currentidaut = $lire_id['id_auteur'];

        $select_id= $dbh->query('SELECT id_art FROM article WHERE titre_art = "'.$titre.'"');
        $lire_id = $select_id ->fetch();
        $currentidart = $lire_id['id_art'];

        $insert_publie ="INSERT INTO publie(id_art, id_auteur) VALUES ('$currentidart','$currentidaut')";
        $dbh->exec($insert_publie);

        //récupérer les id_image et id_article pour faire l'association dans la table" "integrer"
        $select_id = $dbh->query('SELECT id_img FROM image WHERE titre_img = "'.$nomimg.'"');
        $lire_id = $select_id ->fetch();
        $currentidimg = $lire_id['id_img'];

        $insert_integrer = "INSERT INTO integrer(id_img, id_art) VALUES ('$currentidimg','$currentidart')";
        $dbh->exec($insert_integrer);

//récupérer les id_mot clé et id_article pour faire l'association dans la table" "possede"

        $select_id = $dbh->query('SELECT id_motcle FROM motcle WHERE mc_motcle = "'.$mc.'"');
        $lire_id = $select_id ->fetch();
        $currentidmc = $lire_id['id_motcle'];

        $insert_possede ="INSERT INTO possede(id_art, id_motcle) VALUES ('$currentidart','$currentidmc')";
       $dbh->exec($insert_possede);

      ?>

    </main>

    <!-- FOOTER -->
    <?php include('include/footer2.php')?>
    <!-- FOOTER -->

	   <script src="js/scripts.js"></script>
  </body>

</html>
