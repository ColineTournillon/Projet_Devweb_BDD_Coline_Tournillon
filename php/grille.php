<?php 
    include ("../include/config.php");
    EstConnecte();
    $id_compte=$_SESSION['id_compte'];
    $nom=$_SESSION['nom'];
    $sendCreator=GetSQLValue("select pseudo from `compte` where id_compte ='$id_compte'");
    ExecuteSQL("update `grille` set `createur` = '$sendCreator' WHERE `nom` = $nom");
    $_SESSION['id_grille']=GetSQLValue("select id_grille from `grille` where nom=$nom");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PixelWar</title>
    <link href="../css/mise_en_forme.css" rel="stylesheet">
</head>

<body>
    <h1>PixelWar</h1>
    <div>
        <?php
            echo 'Grille : '.$nom;
            $creator=GetSQLValue("select createur from `grille` where nom=$nom");
            echo 'grille créée par '.$creator;
            //htmlspecialchars(header("location: sauvegarde_pixel.php"));
        ?>

        <pixelColors>
            <pixelColor id="pixel-black" title="Noir"></pixelColor>
            <pixelColor id="pixel-white" title="Blanc"></pixelColor>
            <pixelColor id="pixel-red" title="Rouge"></pixelColor>
            <pixelColor id="pixel-blue" title="Bleu"></pixelColor>
            <pixelColor id="pixel-green" title="Vert"></pixelColor>
            <pixelColor id="pixel-orange" title="Orange"></pixelColor>
            <pixelColor id="pixel-yellow" title="Jaune"></pixelColor>
            <pixelColor id="pixel-purple" title="Violet"></pixelColor>
            <pixelColor id="pixel-pink" title="Rose"></pixelColor>
        </pixelColors>
        <pixel>
            <pixel-parts></pixel-parts>
        </pixel>
    </div>

    <script src="../js/script.js"></script>
</body>

</html>
<?php mysqli_close($link) ?>
