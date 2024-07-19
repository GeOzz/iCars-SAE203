<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>iCars | Réponse</title>
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

    // Connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=sae203Base;charset=utf8', 'sae203User', 'Also2003$');
?>

<main>
<section>
<div class="recherche-page">
    <div id="accueil">
        <div class="banner">
            <div class="banner-content">
                <strong>RÉPONSE</strong><br>
                <p>Vous avez recherché : <span><?php echo isset($_GET['recherche']) ? $_GET['recherche'] : ''; ?></span></p>
            </div>
        </div>
    </div>
</div>

<section class="catalogue-section">
    <h1>Résultats de la recherche</h1>
    <div class="vehicle-grid">
        <?php
            // Récupération du texte à rechercher
            $recherche = isset($_GET['recherche']) ? $_GET['recherche'] : '';

            // Préparation de la requête SQL
            $requete = $bdd->prepare('SELECT personnages.*, films.film_nom FROM personnages INNER JOIN films ON personnages._film_id = films.film_id WHERE perso_nom LIKE :recherche OR film_nom LIKE :recherche');
            $requete->execute(array(':recherche' => '%'.$recherche.'%'));

            // Affichage des résultats s'il y en a
            if ($requete->rowCount() > 0) {
                while ($donnees = $requete->fetch()) {
                    echo '<div class="vehicle-card">';
                    echo '<img src="'.$donnees['perso_photo'].'" alt="Photo du personnage">';
                    echo '<h2>'.$donnees['perso_nom'].'</h2>';
                    echo '<p>Type : '.$donnees['perso_type'].'</p>';
                    echo '<p>Couleur : '.$donnees['perso_couleur'].'</p>';
                    echo '<p>Nationalité : '.$donnees['perso_nat'].'</p>';
                    echo '<p>Ville : '.$donnees['perso_ville'].'</p>';
                    echo '<p>Film : '.$donnees['film_nom'].'</p>';
                    echo '</div>';
                }
            } else {
                echo '<h2>Aucun résultat trouvé.</h2>';
            }

            // Fermeture de la requête
            $requete->closeCursor();
        ?>
    </div>
</section>

<div id="bloc_recherche">
    <form action="./form_recherche.php" method="post">
        <div id="bouton-recherche">
            <input type="submit" value="SORTIR DU CINEMA">
        </div>
    </form>
</div>

<?php include('footer.php'); ?>
  
</section>
</main>

</body>
</html>
