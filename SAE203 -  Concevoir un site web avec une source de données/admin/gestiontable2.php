<?php
// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=sae203Base;charset=utf8', 'sae203User', 'Also2003$');

// Vérification de la soumission du formulaire
if(isset($_POST['action'])) {
    // Vérification de l'action à effectuer
    if($_POST['action'] == 'delete') {
        // Vérification de l'existence de l'identifiant du personnage à supprimer
        if(isset($_POST['id'])) {
            // Récupération de l'identifiant du personnage à supprimer
            $id_personnage = $_POST['id'];

            // Requête de suppression du personnage de la base de données
            $query = "DELETE FROM personnages WHERE perso_id = ?";
            $stmt = $bdd->prepare($query);
            $stmt->execute([$id_personnage]);

            // Redirection vers la page de confirmation de suppression
            header("Location: ../admin/valid_suppr_table2.php");
            exit(); // Assure que le script se termine après la redirection
        }
    } elseif($_POST['action'] == 'update') {
        // Vérification de l'existence des données de modification
        if(isset($_POST['id'])) {
            // Récupération des valeurs du formulaire de modification
            $id_personnage = $_POST['id'];
            $nom = $_POST['nom']; // Ajout du champ nom
            $ville = $_POST['ville'];
            $type = $_POST['type'];
            $couleur = $_POST['couleur'];
            $nationalite = $_POST['nationalite'];
            $film_id = $_POST['film_id']; // Ajout de la récupération de l'ID du film

            // Vérification si une nouvelle image a été téléchargée
            if(isset($_FILES['photo']) && $_FILES['photo']['size'] > 0) {
                // Vérification du format de l'image téléchargée
                $imageType = $_FILES["photo"]["type"];
                if (!in_array($imageType, ['image/png', 'image/jpg', 'image/jpeg'])) {
                    echo '<p>Désolé, le type d\'image n\'est pas reconnu ! Seuls les formats PNG et JPEG sont autorisés.</p>' . "\n";
                    exit(); // Arrête le script si le type d'image n'est pas pris en charge
                }

                // Création d'un nouveau nom pour l'image téléchargée pour éviter les doublons
                $nouvelleImage = date("Y_m_d_H_i_s") . "---" . $_FILES["photo"]["name"];

                // Chemin où les images seront téléchargées
                $upload_directory = "../images/uploads/";

                // Chemin complet du fichier téléversé avec le nouveau nom
                $cheminImage = $upload_directory . $nouvelleImage;

                // Dépôt du fichier téléchargé dans le dossier uploads
                if (!move_uploaded_file($_FILES["photo"]["tmp_name"], $cheminImage)) {
                    echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>' . "\n";
                    exit(); // Arrête le script si le téléchargement de l'image a échoué
                }

                // Requête de mise à jour des données dans la base de données avec la nouvelle image
                $query = "UPDATE personnages SET perso_photo = ?, perso_nom = ?, perso_ville = ?, perso_type = ?, perso_couleur = ?, perso_nat = ?, _film_id = ? WHERE perso_id = ?";
                $stmt = $bdd->prepare($query);
                $stmt->execute([$cheminImage, $nom, $ville, $type, $couleur, $nationalite, $film_id, $id_personnage]);
            } else {
                // Requête de mise à jour des données dans la base de données sans changer l'image
                $query = "UPDATE personnages SET perso_nom = ?, perso_ville = ?, perso_type = ?, perso_couleur = ?, perso_nat = ?, _film_id = ? WHERE perso_id = ?";
                $stmt = $bdd->prepare($query);
                $stmt->execute([$nom, $ville, $type, $couleur, $nationalite, $film_id, $id_personnage]);
            }

            // Redirection vers la page valid_modif.php après la modification
            header("Location: ../admin/valid_modif_table2.php");
            exit(); // Assure que le script se termine après la redirection
        }
    }
}

// Récupération des données depuis la base de données
$result = $bdd->query("SELECT * FROM personnages");
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
                <strong>Gestion Table 2</strong><br>
                <p>Gestion de la Base de Données 2</p>
            </div>
        </div>
    </div>
</div>

<h1>Gestion des données Table 2</h1>
<div style="text-align: center;">
    <div id="bouton-recherche">
        <input type="submit" value="Ajouter" onclick="location.href='ajout_table2.php'">
        <input type="submit" value="Retour" onclick="location.href='admin.php'">
    </div>  
</div>

<section class="catalogue-section">
    <div class="vehicle-grid">
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="vehicle-card" id="<?php echo $row['perso_nom']; ?>">
            <img src="../<?php echo $row['perso_photo']; ?>" alt="Photo du personnage <?php echo $row['perso_nom']; ?>">
            <h2><?php echo $row['perso_nom']; ?></h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <!-- Champ pour le nom du personnage -->
                <input type="text" name="nom" value="<?php echo $row['perso_nom']; ?>" placeholder="Nom" maxlength="25" required>
                <input type="text" name="ville" value="<?php echo $row['perso_ville']; ?>" placeholder="Ville" maxlength="25" required>
                <input type="text" name="type" value="<?php echo $row['perso_type']; ?>" placeholder="Type" maxlength="25" required>
                <input type="text" name="couleur" value="<?php echo $row['perso_couleur']; ?>" placeholder="Couleur" maxlength="25" required>
                <input type="text" name="nationalite" value="<?php echo $row['perso_nat']; ?>" placeholder="Nationalité" maxlength="2" required>

                <!-- Champ pour modifier l'image -->
                <input type="file" name="photo" id="photo">

                <!-- Ajout de la liste déroulante pour sélectionner le film -->
                <select name="film_id">
                    <?php
                    // Récupération des données des films depuis la base de données
                    $films = $bdd->query("SELECT * FROM films");

                    // Boucle pour afficher chaque film dans le menu déroulant
                    while ($film = $films->fetch(PDO::FETCH_ASSOC)) {
                        // Vérifie si le film est celui associé au personnage
                        $selected = ($film['film_id'] == $row['_film_id']) ? "selected" : "";
                        echo "<option value=\"" . $film['film_id'] . "\" $selected>" . $film['film_nom'] . "</option>";
                    }
                    ?>
                </select>
                <div style="text-align: center;">
                    <button type="submit" name="action" value="update">Modifier</button>
                    <button type="submit" name="action" value="delete">Supprimer</button>
                </div>
                <input type="hidden" name="id" value="<?php echo $row['perso_id']; ?>">
            </form>
        </div>
        <?php } ?>
    </div>
</section>

<?php include('../footer.php'); ?>

</body>
</html>
