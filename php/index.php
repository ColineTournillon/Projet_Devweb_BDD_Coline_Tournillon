
<?php 
    include ("../include/config.php");
    $_SESSION['isConnected']=false;
    if (isset($_POST["email"])) 
    {
        $email = QuoteStr($_POST["email"]);
        $password = QuoteStr($_POST["password"]);
        $hash=hash('sha256', $_POST["password"]);
        $pseudo = QuoteStr($_POST["pseudo"]);

        $same_pseudo=GetSQLValue("select count(*) from `compte` where pseudo=$pseudo");
        $same_email=GetSQLValue("select count(*) from `compte` where pseudo=$email");

        if($same_pseudo==0 && $same_email==0)
        {
            $sql="insert into `compte` (`email`, `mdp`, `pseudo`) values ($email, '$hash',$pseudo)";
            ExecuteSQL($sql);
        }
        elseif ($same_pseudo!=0 && $same_email!=0)
        {
            echo'pseudo déjà existant et adresse mail déjà utilisée';
        }
        elseif($same_pseudo!=0)
        {
            echo'pseudo déjà existant';
        }
        else 
        {
            echo'adresse mail déjà utilisée';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<link href="../css/mise_en_forme.css" rel="stylesheet">
<body>
    <h1>
        Créer un compte
    </h1>
    <form method="POST">
        <input type="text" name="email" placeholder="adresse mail">
        <br>
        <br>
        <input type="password" name="password" placeholder = "mot de passe">
        <br>
        <br>
        <input type="text" name="pseudo"placeholder = "pseudo">
        <br>
        <br>
        <input type="submit" value="Créer compte">
        <a href="../php/connexion.php">connexion</a>
    </form>
</body>
</html>
<?php mysqli_close($link) ?>
