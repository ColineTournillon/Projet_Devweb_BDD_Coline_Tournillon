<?php 
    include ("../include/config.php");
    EstConnecte();
    $id_compte=$_SESSION['id_compte'];
    if (isset($_POST["nom"])) 
    {
        $nom = QuoteStr($_POST["nom"]);
        $_SESSION['nom']=$nom;
        $same_grid=GetSQLValue("select count(*) from `grille` where nom=$nom");

        if($same_grid==0)
        {
            $sql = "insert into `grille` (`id_compte`,`nom`) values ('$id_compte',$nom)";
            ExecuteSQL($sql);
            htmlspecialchars(header("location: grille.php"));
        }
        else 
        {
            echo'grille déjà existante';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix de la grille</title>
</head>
<link href="../css/mise_en_forme.css" rel="stylesheet">
<body> 
    <h1>Grilles existantes</h1>
    <?php 
    $sql="select id_compte,nom,date_creation from `grille`";
    $grilles =[];
    GetSQL($sql,$grilles);
    ?>
    <ul>
        <?php
            if (count($grilles) > 0)
            {
                foreach($grilles as $grille)
                {
                    echo '<form method ="POST" action= "../php/grille.php">';
                    echo '<button type="submit" name="grille">' . htmlspecialchars($grille['id_compte']) . ' - ' . htmlspecialchars($grille['nom']) . ' - ' . htmlspecialchars($grille['date_creation']) . '</button>';
                    echo '</form>';
                }
        
            }
            else
            {
                echo 'Aucune grille existantes';
            }
        ?>
    </ul>
    <h1>Créer une nouvelle grille</h1>
    <div>  
        <form method="POST">
            <input type="text" name="nom" placeholder="Nom de la grille">
            <br>
            <input type="submit" value="Créer grille">
            <br>
            <br>
        </form>
    </div> 
</body>
</html>
<?php mysqli_close($link) ?>