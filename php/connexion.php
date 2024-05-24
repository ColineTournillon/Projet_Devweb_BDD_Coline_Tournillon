<?php 
    include ("../include/config.php");
    $bMauvaisMotDePasse=$bMauvaisCompte=false;

    // si je POSTE le champ, c'est que j'essaie de me connecter
    if (isset($_POST["login"]))
    {
        $sql2= "select id_compte from `compte` where pseudo =".QuoteStr($_POST["login"]);
        $id=GetSQLValue($sql2);
        $sql="select mdp from `compte` where pseudo =".QuoteStr($_POST["login"]);
        $hash=GetSQLValue($sql);
                
        // la variable $hash correspond au sha256 du password

        if (isset($hash))
        {
            $password_poste= $_POST["password_connec"];
            $hash_poste=hash('sha256', $_POST["password_connec"]);
            //si le hash que je poste est égale à celui qui est dans la bdd, c'est que le couple Login/password est correct
            if($hash==$hash_poste)
                {
                    $_SESSION['isConnected']=true;
                    $_SESSION['login']=$_POST["login"];
                    $_SESSION['id_compte']=$id;
                    // je vais à la page liste.php
                    htmlspecialchars(header("location: liste_grille.php")); 
                }
            else
                {
                    $bMauvaisMotDePasse=true;
                }

        }
        else
            { 
                $bMauvaisCompte=true;
            }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<link href="../css/mise_en_forme.css" rel="stylesheet">
<body>
    <h1>Connexion</h1>
    <form method="POST">
        <input type="text" name="login" placeholder="pseudo">
        <br>
        <br>
        <input type="password" name="password_connec" placeholder = "mot de passe">
        <br>
        <br>
        <input type="submit" value="Se connecter">
    </form>
    <?php if ($bMauvaisMotDePasse) { ?>
        <div>
            <strong>Attention!</strong> Vous avez saisi un mauvais mot de passe.
        </div>
    <?php } ?>

    <?php if ($bMauvaisCompte) { ?>
        <div>
            <strong>Attention!</strong> Le compte n'existe pas ...
        </div>
    <?php } ?>

</body>
</html>
<?php mysqli_close($link) ?>