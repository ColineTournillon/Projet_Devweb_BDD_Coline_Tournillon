<?php
    include("../include/config.php");
    $id_grille=$_SESSION['id_grille'];

    // Récupère les données JSON envoyées par le client
    $data = json_decode(file_get_contents('php://input'), true);

    // Vérifie que les données ont bien été reçues
    if ($data && isset($data['x']) && isset($data['y']) && isset($data['couleur'])) 
    {
        $x = $data['x'];
        $y = $data['y'];
        $couleur = $data['couleur'];
    /*$data = json_decode(file_get_contents('php://input'), true);
    $x = intval($data['x']);
    $y = intval($data['y']);
    $couleur = mysqli_real_escape_string($link, $data['couleur']);*/
        $id_compte = $_SESSION['id_compte'];

        $sql="insert into `pixel` (`x`,`id_grille`,`y`,`couleur`,`id_compte`) values ($x,$id_grille,$y,$couleur,$id_compte)";
        ExecuteSQL($sql);

        $sql = "select * from `pixel` where id_grille = $id_grille and x=$x and y=$y";
        $result = mysqli_query($link, $sql);
        if ($result && mysqli_num_rows($result)>0)
        {
            $sql = "update `pixel` set couleur = $couleur, id_compte = $id_compte where id_grille=$id_grille and x=$x and y=$y";
        }
        else
        {
            $sql = "insert into `pixel` (`x`,`id_grille`,`y`,`couleur`,`id_compte`) values ($x,$id_grille,$y,$couleur,$id_compte)";
        }
        mysqli_query($link,$sql);
    }
?>