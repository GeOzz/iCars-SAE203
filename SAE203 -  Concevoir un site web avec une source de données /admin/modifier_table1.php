<?php
// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=sae203Base;charset=utf8', 'sae203User', 'Also2003$');

// Vérification de l'existence des données POST
if(isset($_POST['submit'])) {
    // Récupération des valeurs du formulaire
    $film_id = $_POST['film_id']; // Nouvelle ligne ajoutée pour récupérer l'ID du film
    $film_nom = $_POST['film_nom'];
    $film_realisateur = $_POST['film_realisateur'];
    $film_annee = $_POST['film_annee'];

    // Requête d'insertion des données dans la base de données
    $query = "INSERT INTO films (film_id, film_nom, film_realisateur, film_annee) VALUES (?, ?, ?, ?)";
    $stmt = $bdd->prepare($query);
    $stmt->execute([$film_id, $film_nom, $film_realisateur, $film_annee]);

    // Redirection vers la page de confirmation d'ajout avec un message de succès
    header("Location: valid_ajout_table1.php?success=true");
    exit(); // Assure que le script se termine après la redirection
} else {
    // Si aucune donnée POST n'est reçue, rediriger vers admin.php
    header("Location: admin.php");
    exit();
}
?>
