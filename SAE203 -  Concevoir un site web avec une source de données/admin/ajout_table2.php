<?php
if(isset($_POST['submit'])) {
    $perso_photo = $_POST['perso_photo'];
    $perso_nom = $_POST['perso_nom'];
    $perso_type = $_POST['perso_type'];
    $perso_couleur = $_POST['perso_couleur'];
    $perso_nat = $_POST['perso_nat'];
    $perso_ville = $_POST['perso_ville'];
    $_film_id = $_POST['_film_id'];

    $bdd = new PDO('mysql:host=localhost;dbname=sae203Base;charset=utf8', 'sae203User', 'Also2003$');
    
    $query = "INSERT INTO personnages (perso_photo, perso_nom, perso_type, perso_couleur, perso_nat, perso_ville, _film_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $bdd->prepare($query);
    $stmt->execute([$perso_photo, $perso_nom, $perso_type, $perso_couleur, $perso_nat, $perso_ville, $_film_id]);
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

<!-- Votre formulaire d'ajout -->
<h1>Formulaire d'Ajout</h1>
<div style="text-align: center;">
    <div id="bouton-recherche">
<input type="submit" value="Retour" onclick="location.href='../admin/gestiontable2.php'">
</div>
</div>
<section class="catalogue-section">
<div class="vehicle-grid">
<div class="vehicle-card">
<form method="POST" action="../admin/valid_ajout_table2.php" enctype="multipart/form-data">
    <label for="perso_photo">Photo :</label><br>
    <input type="file" name="photo" placeholder="Photo" required><br>
    <label for="perso_nom">Nom :</label><br>
    <input type="text" name="perso_nom" maxlength="25" required><br>
    <label for="perso_type">Type :</label><br>
    <input type="text" name="perso_type" maxlength="25" required><br>
    <label for="perso_couleur">Couleur :</label><br>
    <input type="text" name="perso_couleur" maxlength="25" required><br>
    <label for="perso_nat">Nationalité :</label><br>
    <input type="text" name="perso_nat" maxlength="2" required><br>
    <label for="perso_ville">Ville :</label><br>
    <input type="text" name="perso_ville" maxlength="25" required><br>
    <label for="_film_id">Film ID :</label><br>
    <select name="_film_id" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select><br><br>
    <div id="bouton-recherche">
    <input type="submit" name="submit" value="Ajouter">
</div>
</div>
</form>
</section>

<?php include('../footer.php'); ?>

</body>
</html>
