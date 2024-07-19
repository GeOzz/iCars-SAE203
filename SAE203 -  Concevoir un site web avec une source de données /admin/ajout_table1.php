<?php
// Bloc PHP pour le traitement de la soumission du formulaire
if(isset($_POST['submit'])) {
    $film_nom = $_POST['film_nom'];
    $film_realisateur = $_POST['film_realisateur'];
    $film_annee = $_POST['film_annee'];

    // Connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=sae203Base;charset=utf8', 'sae203User', 'Also2003$');
    
    // Préparation de la requête d'insertion des données
    $query = "INSERT INTO films (film_nom, film_realisateur, film_annee) VALUES (?, ?, ?)";
    $stmt = $bdd->prepare($query);
    
    // Exécution de la requête avec les valeurs des champs du formulaire
    $stmt->execute([$film_nom, $film_realisateur, $film_annee]);

    // Redirection vers valid_ajout_table1.php après l'ajout
    header("Location: ../admin/valid_ajout_table1.php");
    exit(); // Assure que le script se termine après la redirection
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter des informations</title>
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
                <strong>AJOUT</strong><br>
                <p>Veuillez remplir ce formulaire afin d'ajouter une nouvelle voiture !</p>
            </div>
        </div>
    </div>
</div>

<h1>Formulaire d'Ajout</h1>
<div style="text-align: center;">
    <div id="bouton-recherche">
        <input type="submit" value="Retour" onclick="location.href='../admin/gestiontable1.php'">
    </div>
</div>

<section class="catalogue-section">
<div class="vehicle-grid">
<div class="vehicle-card">
<form method="POST" action="../admin/valid_ajout_table1.php" enctype="multipart/form-data">
    <label for="film_nom">Nom du film :</label><br>
    <input type="text" name="film_nom" maxlength="25" required><br>
    <label for="film_realisateur">Réalisateur :</label><br>
    <input type="text" name="film_realisateur" maxlength="25" required><br>
    <label for="film_annee">Année :</label><br>
    <input type="text" name="film_annee" maxlength="4" required><br><br>
    <div id="bouton-recherche">
        <input type="submit" name="submit" value="Ajouter">
    </div>
</form>
</section>

<?php include('../footer.php'); ?>

</body>
</html>
