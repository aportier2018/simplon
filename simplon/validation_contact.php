<!DOCTYPE html>
<html lang="fr">

  <head>
  	<meta charset="utf-8">
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<title> formulaire de contact - Simplonsolo</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Unicat project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/courses.css">
    <link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
    </head>
    <body>
  </head>
  <body>
    <?php include("header2.php") ?>
    <main class='v_inscription'>

     <?php

          $name = $_POST['nom'];
          $fname = $_POST['prenom'];
          $mail = $_POST['email'];
          $message = $_POST['commentaire'];


          echo "Bonjour ". $name." ". $fname."<br/> Votre mail est : ".$mail."<br/>Votre message est ".$message;



       $insertion ="INSERT INTO user(n_user, p_user, email_user, message_user) VALUES('$name','$fname','$mail','$message')";

       $dbh->exec($insertion);

       echo "<br/>Votre inscription est enregistrée.";
         }
         else
         {
           echo"<p>Les mots de passe dont différents, veuillez recommencer <a href='f_inscription.php'>votre inscription</a></p>";
         };
     ?>


    </main>
    <?php include("footer2.php") ?>
  </body>
</html>
