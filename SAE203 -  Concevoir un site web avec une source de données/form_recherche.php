<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>iCars | Recherche</title>
  <link rel="stylesheet" href="styles/styles.css">
  <link rel="icon" type="image/png" href="../images/favicon/FavCars.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Graduate&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Lemon&display=swap" rel="stylesheet">
</head>
<body>

<?php
    $pageActive = "recherche";
    include('header.php');
?>

<main>

<section>
<div class="recherche-page">
    <div id="accueil">
        <div class="banner">
            <div class="banner-content">
                <strong>RECHERCHE</strong><br>
                <p>Recherchez sur quel film votre personnage préféré a fait son apparition !</p>
            </div>
        </div>
    </div>
</div>

    <form action="reponse_recherche.php" method="get">
        <div id="bloc_recherche">
            <h2>Explorez les différents films et personnages emblématiques de Cars.<h2><p><div id="eclair"> ⚡ Ka-Chow ! ⚡</div></p>
            <div id="label-input-recherche">
                <div><label for="recherche">NOM DU FILM OU DU PERSONNAGE  :</label></div>
                <div><input type="text" name="recherche" id="recherche" placeholder="Cars 1, Sally..." required></div>
            </div>
            <div id="bouton-recherche">
                <input type="submit" value="RENTRER AU CINÉMA">
            </div>
        </div>
    </form>
</section>
</main>
<?php include('footer.php');
?>

</body>
</html>
