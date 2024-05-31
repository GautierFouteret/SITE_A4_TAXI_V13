<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'base.php'; // ce fichier contient nos informations de connexion

    $id_taxi = $_POST['ID_TAXI'];
    $libelle_statut = $_POST['LIBELLE_STATUT'];

    $sql = "UPDATE taxi SET LIBELLE_STATUT='$libelle_statut' WHERE ID_TAXI='$id_taxi'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Le libelle_utilisateur a été mis à jour.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<p> 
<br>
-> <a href="statut_reservation.php">Retourner aux statut réservation</a><br>
</p>