<?php
// Récupération des données du formulaire
$perso_nom = $_POST['nom'];
$perso_type = $_POST['type'];
$perso_couleur = $_POST['couleur'];
$perso_nat = $_POST['nationalite'];
$perso_ville = $_POST['ville'];
$film_id = $_POST['film_id'];
$id_personnage = $_POST['id'];

// Vérification du format de l'image téléchargée
$imageType = $_FILES["photo"]["type"];
if (!in_array($imageType, ['image/png', 'image/jpg', 'image/jpeg'])) {
    echo '<p>Désolé, le type d\'image n\'est pas reconnu ! Seuls les formats PNG et JPEG sont autorisés.</p>' . "\n";
    die();
}

// Création d'un nouveau nom pour l'image téléchargée pour éviter les doublons
$nouveauNomImage = date("Y_m_d_H_i_s") . "---" . $_FILES["photo"]["name"];

// Chemin où les images seront téléchargées
$upload_directory = "../images/uploads/";
// Chemin complet du fichier téléversé avec le nouveau nom
$cheminImage = $upload_directory . $nouveauNomImage;

// Dépôt du fichier téléchargé dans le dossier uploads
if (!move_uploaded_file($_FILES["photo"]["tmp_name"], $cheminImage)) {
    echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>' . "\n";
    die();
}

// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=sae203Base;charset=utf8', 'sae203User', 'Also2003$');

// Requête de mise à jour des données dans la base de données
$query = 'UPDATE personnages SET perso_photo = ? WHERE perso_id = ?';
$stmt = $bdd->prepare($query);
$stmt->execute([$cheminImage, $id_personnage]);
?>
