<?php
require_once 'connexion.php';

// Insertion avec une requête préparée
$req = $bdd->prepare('INSERT INTO exercice (titre, auteur, date_creation) VALUES(?, ?, ?)');
$req->execute(array($_POST['titre'], $_POST['auteur'], $_POST['date_creation']));

// Retour à la page principale
header('Location: exercice.php');
?>