<?php
require_once 'connexion.php';

// 1) Si le formulaire a été envoyé : on met à jour la ligne
if (isset($_POST['id']))
{
    $req = $bdd->prepare('UPDATE exercice SET titre = ?, auteur = ?, date_creation = ? WHERE id = ?');
    $req->execute(array($_POST['titre'], $_POST['auteur'], $_POST['date_creation'], $_POST['id']));

    header('Location: exercice.php');
    exit();
}

// 2) Sinon : on lit l'exercice à modifier pour remplir le formulaire
$req = $bdd->prepare('SELECT id, titre, auteur, date_creation FROM exercice WHERE id = ?');
$req->execute(array($_GET['id']));
$exo = $req->fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier un exercice</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<form action="modif_exe.php" method="post">
    <fieldset>
        <legend>Modifier un exercice</legend>
        <input type="hidden" name="id" value="<?php echo $exo['id']; ?>">

        <label for="titre">Titre de l'exercice</label>
        <input type="text" name="titre" id="titre" value="<?php echo htmlspecialchars($exo['titre']); ?>" required><br>

        <label for="auteur">Auteur de l'exercice</label>
        <input type="text" name="auteur" id="auteur" value="<?php echo htmlspecialchars($exo['auteur']); ?>" required><br>

        <label for="date_creation">Date creation</label>
        <input type="date" name="date_creation" id="date_creation" value="<?php echo $exo['date_creation']; ?>" required><br>

        <input type="submit" value="Modifier">
    </fieldset>
</form>

</body>
</html>