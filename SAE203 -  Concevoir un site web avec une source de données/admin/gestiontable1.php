<?php
// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=sae203Base;charset=utf8', 'sae203User', 'Also2003$');

// Vérification de la soumission du formulaire
if(isset($_POST['action'])) {
    // Vérification de l'action à effectuer
    if($_POST['action'] == 'delete') {
        // Vérification de l'existence de l'identifiant du film à supprimer
        if(isset($_POST['id'])) {
            // Récupération de l'identifiant du film à supprimer
            $id_film = $_POST['id'];

            // Requête de suppression du film de la base de données
            $query = "DELETE FROM films WHERE film_id = ?";
            $stmt = $bdd->prepare($query);
            $stmt->execute([$id_film]);

            // Redirection vers la page de confirmation de suppression
            header("Location: ../admin/valid_suppr_table1.php");
            exit(); // Assure que le script se termine après la redirection
        }   
    } elseif($_POST['action'] == 'update') {
        // Vérification de l'existence des données de modification
        if(isset($_POST['id'])) {
            // Récupération des valeurs du formulaire de modification
            $id_film = $_POST['id'];
            $nom = $_POST['nom'];
            $realisateur = $_POST['realisateur'];
            $annee = $_POST['annee'];

            // Requête de mise à jour des données dans la base de données
            $query = "UPDATE films SET film_nom = ?, film_realisateur = ?, film_annee = ? WHERE film_id = ?";
            $stmt = $bdd->prepare($query);
            $stmt->execute([$nom, $realisateur, $annee, $id_film]);

            // Redirection vers la page valid_modif.php après la modification
            header("Location: ../admin/valid_modif_table1.php");
            exit(); // Assure que le script se termine après la redirection
        }
    }
}

// Récupération des données depuis la base de données
$result = $bdd->query("SELECT * FROM films");
?>

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

<body>
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

<div class="admin-page">
    <div id="accueil-admin">
        <div class="banner-admin">
            <div class="banner-content-admin">
                <strong>Gestion Table 1</strong><br>
                <p>Gestion de la Base de Données 1</p>
            </div>
        </div>
    </div>
</div>

<h1>Gestion des données Table 1</h1>
<div style="text-align: center;">
    <div id="bouton-recherche">
    <input type="submit" value="Ajouter" onclick="location.href='ajout_table1.php'">
        <input type="submit" value="Retour" onclick="location.href='admin.php'">
    </div>  
</div>

<section class="catalogue-section">
    <div class="vehicle-grid">
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="vehicle-card" id="<?php echo $row['film_nom']; ?>">
            <h2><?php echo $row['film_nom']; ?></h2>
            <form action="" method="POST">
                <input type="text" name="nom" value="<?php echo $row['film_nom']; ?>" placeholder="Nom du film" maxlength="25" required>
                <input type="text" name="realisateur" value="<?php echo $row['film_realisateur']; ?>" placeholder="Réalisateur" maxlength="25" required>
                <input type="text" name="annee" value="<?php echo $row['film_annee']; ?>" placeholder="Année" maxlength="4" required>
                <div style="text-align: center;">
                <button type="submit" name="action" value="update">Modifier</button>
                <button type="submit" name="action" value="delete">Supprimer</button>
                </div>
                <input type="hidden" name="id" value="<?php echo $row['film_id']; ?>">
            </form>
        </div>
        <?php } ?>
    </div>
</section>

<?php include('../footer.php'); ?>

</body>
</html>
