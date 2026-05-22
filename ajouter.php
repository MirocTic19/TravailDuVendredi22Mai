<?php
include_once 'json_heper.php';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['nom']) && isset($_POST['identite']) && isset($_POST['ville']) && isset($_POST['power']))
    {
        $data = [
            'id' => null,
            'nom' => $_POST['nom'],
            'identite' => $_POST['identite'],
            'ville' => $_POST['ville'],
            'power' => $_POST['power']
        ];
        json_add($data);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un super-héros</title>
</head>
    <body>
        <form action="" method="post">
            <input type="text" name="nom" placeholder="Nom super-héros">
            <input type="text" name="identite" placeholder="Identité">
            <input type="text" name="ville" placeholder="Ville">
            <input type="text" name="power" placeholder="Pouvoir">
            <input type="submit" value="Ajouter">
        </form>

        <?php if(isset($_POST['nom'])): ?>
            <p>Nom: <?php echo $_POST['nom']; ?></p>
            <p>Identité: <?php echo $_POST['identite']; ?></p>
            <p>Ville: <?php echo $_POST['ville']; ?></p>
            <p>Pouvoir: <?php echo $_POST['power']; ?></p>
        <?php endif; ?>
    </body>
</html>