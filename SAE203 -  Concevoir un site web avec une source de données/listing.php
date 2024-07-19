<?php
$mabd = new PDO('mysql:host=localhost;dbname=sae203Base;charset=UTF8;', 'sae203User', 'Also2003$');
$mabd->query('SET NAMES utf8;');

// Sélection des personnages
$req_personnages = "SELECT personnages.perso_id, personnages.perso_photo, personnages.perso_nom, personnages.perso_type, personnages.perso_couleur, personnages.perso_nat, personnages.perso_ville, films.film_nom
                    FROM personnages
                    INNER JOIN films ON personnages._film_id = films.film_id";

$resultat_personnages = $mabd->query($req_personnages);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>iCars | Garage</title>
  <link rel="stylesheet" href="styles/styles.css">
  <link rel="icon" type="image/png" href="../images/favicon/FavCars.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Graduate&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Lemon&display=swap" rel="stylesheet">
</head>
<body>

<?php
    $pageActive = "garage";
    include('header.php');
?>
<main>

<div class="garage-page">
    <div id="accueil-garage">
        <div class="banner-garage">
            <div class="banner-content-garage">
                <strong>GARAGE</strong><br>
                <p>Retrouvez vos personnages préférés dans ce film incontournable !</p>
            </div>
        </div>
    </div>
</div>

<section class="catalogue-section">
    <h1>Garage des Véhicules</h1>   
    <div class="vehicle-grid">
        <?php foreach ($resultat_personnages as $personnage) { ?>
        <div class="vehicle-card">
            <img src="<?php echo $personnage['perso_photo']; ?>" alt="Photo du véhicule <?php echo $personnage['perso_nom']; ?>">
            <h2><?php echo $personnage['perso_nom']; ?></h2>
            <p><?php echo $personnage['perso_ville']; ?></p>
            <p>Type : <?php echo $personnage['perso_type']; ?></p>
            <p>Couleur : <?php echo $personnage['perso_couleur']; ?></p>
            <p>Nationalité : <?php echo $personnage['perso_nat']; ?></p>
            <div class="text-en-gras">
            <p>Film : <?php echo $personnage['film_nom']; ?></p>
            </div>
        </div>
        <?php } ?>
    </div>
</section>

<?php include('footer.php'); ?>
  
</main>

</body>
</html>
