<?php
// Vérification de l'existence des données GET
if(isset($_GET['id'])) {
    // Récupération de l'identifiant du film à supprimer depuis l'URL
    $film_id = $_GET['id'];

    // Connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=sae203Base;charset=utf8', 'sae203User', 'Also2003$');

    // Requête de suppression du film de la base de données
    $query = "DELETE FROM films WHERE film_id = ?";
    $stmt = $bdd->prepare($query);
    $stmt->execute([$film_id]);

    // Redirection vers la page de gestion après la suppression
    header("Location: ../admin/gestiontable1.php");
    exit(); // Assure que le script se termine après la redirection
} else {
    // Si aucune donnée GET n'est reçue, rediriger vers une autre page ou afficher un message d'erreur
    header("Location: gestiontable1.php?error=true");
    exit();
}
?>
