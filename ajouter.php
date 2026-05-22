<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['nom']) && isset($_POST['identite']) && isset($_POST['ville']) && isset($_POST['power']))
    {
        $nom = $_POST['nom'];
        $identite = $_POST['identite'];
        $ville = $_POST['ville'];
        $power = $_POST['power'];
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

        <?php if(isset($nom)): ?>
            <p>Nom: <?php echo $nom; ?></p>
            <p>Identité: <?php echo $identite; ?></p>
            <p>Ville: <?php echo $ville; ?></p>
            <p>Pouvoir: <?php echo $power; ?></p>
        <?php endif; ?>
    </body>
</html>