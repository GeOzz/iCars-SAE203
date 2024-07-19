<?php
// Vérification de l'existence des données GET
if(isset($_GET['id'])) {
    // Récupération de l'identifiant de la personne à supprimer depuis l'URL
    $personne_id = $_GET['id'];

    // Connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=sae203Base;charset=utf8', 'sae203User', 'Also2003$');

    // Requête de suppression de la personne de la base de données
    $query = "DELETE FROM personnages WHERE perso_id = ?";
    $stmt = $bdd->prepare($query);
    $stmt->execute([$personne_id]);

    // Redirection vers la page de gestion après la suppression
    header("Location: ../admin/gestiontable2.php");
    exit(); // Assure que le script se termine après la redirection
} else {
    // Si aucune donnée GET n'est reçue, rediriger vers une autre page ou afficher un message d'erreur
    header("Location: gestiontable2.php?error=true");
    exit();
}
?>
