<?php
include("include/connectbddlocal.php")//include("connectbdd.php")
?>

<!DOCTYPE html>
<html lang="fr">

  <head>
  	<meta charset="utf-8">
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<title> formulaire d'ajout d'un film - Projet VOD AP</title>

  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="description" content="Unicat project">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
  	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  	<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/formulaire.css"><meta charset="utf-8">
  	<link rel="stylesheet" type="text/css" href="styles/blog_single.css">
  	<link rel="stylesheet" type="text/css" href="styles/blog_single_responsive.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  </head>

  <body>
    <?php $idpage="f_insererart"; ?>
          <!--**********- HEADER -->
    <?php include("include/header2.php") ?>
         <!---****** FIN HEADER -->

        <!--*********FORMULAIRE -->
    <main class="f_insererart">
      <section class="marginB">
        <div class="container">
           <form method="post" action="v_listefilm.php">
               <fieldset>
                   <legend>Formulaire pour l'ajout d'un article</legend>

                   <label for='titre'>Titre : </label>
                   <input type="text" name="titre" id="titre"><br>
                   <label for="synopsis">Résumé : </label>
                   <input type="text" name="synopsis" id="synopsis" ><br>
                   <label for="date_publicat">Date de publication : </label>
                   <input type="date" name="date_publicat" id="date_publicat" ><br>
                   <label for="theme">Theme : </label>
                    <select name="genre">
                         <?php
                            $reqtheme = 'SELECT * FROM theme';
                            $reponse = $dbh->prepare($reqtheme);
                            // Execution de la requête
                            $reponse->execute();

                            // On affiche chaque entrée une à une
                            while($row = $reponse->fetch(PDO::FETCH_ASSOC))
                              {
                          ?>

                     <option value="<?php $row['id_theme'];?>"><?php echo $row['theme'];?></option>

                           <?php
                          }
                                 $reponse->closeCursor(); // Termine le traitement de la requête
                            ?>
                      </select><br/>

                   <label for="n_auteur"> nom de l'auteur : </label>
                   <input type="text" name="n_auteur" id="n_auteur" ><br/>
                   <label for="p_auteur">Prénom de l'acteur : </label>
                   <input type="text" name="p_acteur" id="p_auteur" ><br>

                   <label for="texte">texte : </label>
                   <input type="text" name="texte" id="texte" ><br>
                

                   <label for="affiche">Affiche: </label>
                   <input type="text" name="affiche" id="affiche"><br>


                   <input type="submit" value="ENVOYER">
                   <input type="reset" value="RESET">
               </fieldset>
           </form>
           </div>
        </section>
    </main>
    <!--********* FIN FORMULAIRE -->

    <!--*********FOOTER -->
    <?php include("include/footer2.php") ?>
    <!--*********FIN FOOTER -->

    <script src="js/scripts.js"></script>

  </body>
</html>
