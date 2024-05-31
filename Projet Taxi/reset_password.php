<?php
// Vérifier si une session est déjà démarrée
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Vérifier si l'utilisateur est connecté et s'il a le bon type d'utilisateur
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["user_type"] !== "Admin") {
    // Rediriger vers une page d'erreur d'accès
    header("location: erreur_acces_admin.php");
    exit;
}

// Connexion à la base de données
include 'base.php'; // Assurez-vous que ce fichier contient vos informations de connexion

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["ID_UTILISATEUR"];
    $new_password = password_hash("nouveau_mdp_par_defaut", PASSWORD_DEFAULT); // Vous pouvez générer un mot de passe aléatoire

    // Préparer et exécuter la requête de mise à jour
    $sql = "UPDATE utilisateur SET MDP_USER='$new_password' WHERE ID_UTILISATEUR=$user_id";

    if ($conn->query($sql) === TRUE) {
        echo "Le mot de passe a été réinitialisé.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
}
?>
