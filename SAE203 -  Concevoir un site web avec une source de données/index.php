<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>iCars | Accueil</title>
  <link rel="stylesheet" href="styles/styles.css">
  <link rel="icon" type="image/png" href="../images/favicon/FavCars.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Graduate&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Lemon&display=swap" rel="stylesheet">
</head>
<body>

<?php
    $pageActive = "accueil";
    include('header.php');
?>

<main>
<div class="fixed-fond">
      <video class="video-absolute" autoplay muted loop src="./images/fond-accueil/Cars.mp4"></video>
    </div>
    <div id="titre">
        <strong id="index-50">LES 50 MEILLEURS PERSONNAGES DE</strong><br>
        <strong id="index-foot">CARS</strong>
        <div id="animated-cars-emoji">🏎️💨</div>
    </div>
<?php
    include('footer.php');
?>

</main>
</body>

</html>
