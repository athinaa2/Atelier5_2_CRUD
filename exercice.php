<?php require_once 'connexion.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion des exercices</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<form action="ajout_exe.php" method="post">
    <fieldset>
        <legend>Ajouter un exercice</legend>
        <label for="titre">Titre de l'exercice</label>
        <input type="text" name="titre" id="titre" required><br>

        <label for="auteur">Auteur de l'exercice</label>
        <input type="text" name="auteur" id="auteur" required><br>

        <label for="date_creation">Date creation</label>
        <input type="date" name="date_creation" id="date_creation" required><br>

        <input type="submit" value="Envoyer">
    </fieldset>
</form>

<table>
    <tr>
        <th>id</th><th>titre</th><th>auteur</th><th>date_creation</th><th colspan="2">Actions</th>
    </tr>
<?php
// Lecture de tous les exercices
$reponse = $bdd->query('SELECT id, titre, auteur, date_creation FROM exercice ORDER BY id');

while ($donnees = $reponse->fetch())
{
    echo '<tr>';
    echo '<td>' . $donnees['id'] . '</td>';
    echo '<td>' . htmlspecialchars($donnees['titre']) . '</td>';
    echo '<td>' . htmlspecialchars($donnees['auteur']) . '</td>';
    echo '<td>' . $donnees['date_creation'] . '</td>';
    echo '<td><a href="modif_exe.php?id=' . $donnees['id'] . '">Modifier</a></td>';
    echo '<td><a href="supp_exe.php?id=' . $donnees['id'] . '" onclick="return confirm(\'Supprimer cet exercice ?\');">Supprimer</a></td>';
    echo '</tr>';
}

$reponse->closeCursor();
?>
</table>

</body>
</html>