<?php require '../helper/head.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <header>
        <h1 id="titre">Scores des utilisateurs</h1>
    </header>
    <br>
    <br>
    <br>
    <?php
        include('../helper/connection.php');
        $reponse = $pdo->query("SELECT username, score FROM users WHERE is_published= 1 ORDER BY score DESC");
        while ($donnees = $reponse->fetch())
        {
        echo '<span style="color:#FFFFFF; margin-left : 38%;"> <big> <big> <big> <big> Utilisateur : '.$donnees['username'] . ' </big> </big> </big> </big> </span> <br/>';
        echo '<span style="color:#FFFFFF;  margin-left : 43%;"> <big> <big> <big> Score : <span style="color: red;">'.$donnees['score'] . ' </span> </big> </big> </big> </span> <br/> <br/>';
        }
    $reponse->closeCursor();
    ?>
</body>
</html>

<style>

body {
    background-color: #390380;
    font-family: Arial, monospace;
}

big {
    margin-left: 20px;
}

ul {
    background-color : #04c4c1;
    border : solid 2px white;
}

#titre {
    color: black;
    font-size: 300%;
    margin-bottom : 1%;
    margin-top : 2%;
} 

header{
    width: 50%;
    float : center;
    text-align : center;
    height: 100px;
    background-color: #cc41aa;
    border : solid 2px white;
    border-radius: 30px;
    margin-top : 2%;
    margin-left : 25%;
}

</style>