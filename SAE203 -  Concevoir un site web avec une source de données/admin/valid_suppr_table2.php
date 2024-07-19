<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprission effectuée</title>
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
                <strong>SUPPRESSION</strong><br>
                <p>Confirmation de la Suppression</p>
            </div>
        </div>
    </div>
</div>

    <h1>Supression effectuée</h1>
    <div style="text-align: center;">
    <h2>Vous venez de supprimer les informations avec succès.</h2>
    <div id="bouton-recherche">
        <input type="submit" value="Retour" onclick="location.href='../admin/admin.php'">
    </div>  
</div>

<?php include('../footer.php'); ?>

</body>
</html>
