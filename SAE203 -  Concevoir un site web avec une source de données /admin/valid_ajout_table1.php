<?php
// Bloc PHP pour le traitement de la soumission du formulaire
if(isset($_POST['submit'])) {
    // Récupère les valeurs des champs du formulaire
    $film_nom = $_POST['film_nom'];
    $film_realisateur = $_POST['film_realisateur'];
    $film_annee = $_POST['film_annee'];

    // Connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=sae203Base;charset=utf8', 'sae203User', 'Also2003$');
    
    // Requête d'insertion des données dans la base de données
    $query = "INSERT INTO films (film_nom, film_realisateur, film_annee) VALUES (?, ?, ?)";
    $stmt = $bdd->prepare($query);
    
    // Exécute la requête avec les valeurs des champs du formulaire
    $stmt->execute([$film_nom, $film_realisateur, $film_annee]);

    // Redirection vers une page de confirmation après l'ajout
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
    <title>Ajout effectuée</title>
    <link rel="stylesheet" href="../styles/styles.css"> 
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
                <p>Confirmation de l'Ajout</p>
            </div>
        </div>
    </div>
</div>

<h1>Ajout effectuée</h1>
<div style="text-align: center;">
    <h2>Vous venez d'ajouter les informations avec succès.</h2>
    <div id="bouton-recherche">
        <input type="submit" value="Retour" onclick="location.href='../admin/admin.php'">
    </div>  
</div>

<?php include('../footer.php'); ?>

</body>
</html>
