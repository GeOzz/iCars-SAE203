<?php
$perso_nom = $_POST['perso_nom'];
$perso_type = $_POST['perso_type'];
$perso_couleur = $_POST['perso_couleur'];
$perso_nat = $_POST['perso_nat'];
$perso_ville = $_POST['perso_ville'];
$film_id = $_POST['_film_id'];

// Vérification du format de l'image téléchargée
$imageType = $_FILES["photo"]["type"];
if (!in_array($imageType, ['image/png', 'image/jpg', 'image/jpeg'])) {
    echo '<p>Désolé, le type d\'image n\'est pas reconnu ! Seuls les formats PNG et JPEG sont autorisés.</p>' . "\n";
    die();
}

// Création d'un nouveau nom pour l'image téléchargée pour éviter les doublons
$nouvelleImage = date("Y_m_d_H_i_s") . "---" . $_FILES["photo"]["name"];

// Dépôt du fichier téléchargé dans le dossier /var/www/sae203/images/uploads
if (is_uploaded_file($_FILES["photo"]["tmp_name"])) {
    if (!move_uploaded_file($_FILES["photo"]["tmp_name"], "../images/uploads/" . $nouvelleImage)) {
        echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>' . "\n";
        die();
    }
} else {
    echo '<p>Problème : image non chargée...</p>' . "\n";
    die();
}

// Chemin complet de l'image
$cheminImage = "images/uploads/" . $nouvelleImage;

// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=sae203Base;charset=utf8', 'sae203User', 'Also2003$');

// Requête d'insertion des données dans la base de données
$query = 'INSERT INTO personnages (perso_photo, perso_nom, perso_type, perso_couleur, perso_nat, perso_ville, _film_id) VALUES (?, ?, ?, ?, ?, ?, ?)';
$stmt = $bdd->prepare($query);
$stmt->execute([$cheminImage, $perso_nom, $perso_type, $perso_couleur, $perso_nat, $perso_ville, $film_id]);
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
