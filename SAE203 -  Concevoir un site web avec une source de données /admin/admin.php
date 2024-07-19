<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>iCars | Privé</title>
  <link rel="stylesheet" href="../styles/styles.css">
  <link rel="icon" type="image/png" href="../images/favicon/FavCars.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Graduate&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Lemon&display=swap" rel="stylesheet">
</head>

<header>
    <div id="logo">
        <a href="index.php">iCars</a>
    </div>
    <nav id="pages">
        <ul id="nav">
            <li><a class="<?php echo ($pageActive == 'accueil') ? 'actif' : ''; ?>" href="../index.php">ACCUEIL</a></li>
            <li><a class="<?php echo ($pageActive == 'garage') ? 'actif' : ''; ?>" href="../listing.php">GARAGE</a></li>
            <li><a class="<?php echo ($pageActive == 'recherche') ? 'actif' : ''; ?>" href="../form_recherche.php">RECHERCHE</a></li>
            <li><a class="<?php echo ($pageActive == 'admin') ? 'actif' : ''; ?> actif" href="admin.php">PRIVÉ</a></li>
        </ul>
    </nav>
</header>

<body>

<main>

<div class="admin-page">
    <div id="accueil-admin">
        <div class="banner-admin">
            <div class="banner-content-admin">
                <strong>PRIVÉ</strong><br>
                <p>Bienvenue dans le mode réservé au staff !</p>
            </div>
        </div>
    </div>
</div>

<section class="catalogue-section">
    <h1>Accéder au Menu Gestion</h1>
    <div id="bouton-recherche">
        <input type="submit" value="Gestion Table 1" onclick="location.href='../admin/gestiontable1.php'">
        <input type="submit" value="Gestion Table 2" onclick="location.href='../admin/gestiontable2.php'">

    </div>  
</section>

<?php include('../footer.php'); ?>
  
</main>

</body>
</html>
