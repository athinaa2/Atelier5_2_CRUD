<?php
require_once 'connexion.php';

// Suppression de la ligne dont l'id est dans l'adresse
$req = $bdd->prepare('DELETE FROM exercice WHERE id = ?');
$req->execute(array($_GET['id']));

header('Location: exercice.php');
?>