
<?php require '../helper/head.php'; ?>

<?php 
    if ($_SESSION['username'] === 'root') {
    } else {
        header('Location: /login.php');
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <br>

    <div id="entier">
        <h1 id="blanc">Page d'administration</h1>
    </div>

    <div id="gauche"> 
    <h1>Création de compte <h1> 

        <br>
     
        <form class="pure-from pure-from-aligned" method="post" action="admin.php">
                    <input type="text" name="username" placeholder="Nom d'utilisateur">
                <input type="password" name="password" placeholder="Mot de passe">
                <input type="password" name="repeatpassword" placeholder="Répéter le mot de passe">
                <input type="role" name="role" placeholder="users ou admin">
                <input type="submit" class="pure-button pure-button-primary" name="creation" value="Créer">
        </form>

        <?php

            if (isset($_POST['creation']))
            {
                if(!empty($_POST['username']) and !empty($_POST['password']) and !empty($_POST['repeatpassword']) and !empty($_POST['role']))
                {
                    if (strlen($_POST['password'])>=6)
                    {
                        if ($_POST['password']==$_POST['repeatpassword'])
                        {
                            include('../helper/connection.php');
                            $mdp=md5($_POST['password']);
                            $username=$_POST['username'];
                            $query = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (:username, :password, :role)");
                            $success = $query->execute([
                                'username' => $_POST['username'],
                                'password' => $mdp,
                                'role' => $_POST['role']
                            ]);

                            if($success){
                                echo "L'utilisateur $username a été crée \n";
                            } 
                        mysqli_close($pdo);
                        }
                        else echo '<span style="color:#000000;"> Les mots de passe ne sont pas identiques </span>';
                    }
                    else echo '<span style="color:#000000;"> Le mot de passe est trop court ! </span>';
                }
                else echo '<span style="color:#000000;"> Veuillez saisir tous les champs ! </span>';
            }
        ?>
    </div>

    <div id="milieu">
    <h1>Ajout de questions<h1>
    <br>
        <form class="pure-from pure-from-aligned" method="post" action="admin.php">
                <input type="text" name="question" placeholder="Question">    
                <input type="text" name="reponse" placeholder="Réponse"> 
                <input type="text" name="detail"placeholder="Détail de la réponse"> 
                <input type="text" name="prop1" placeholder="Proposition 1"> 
                <input type="text" name="prop2" placeholder="Proposition 2"> 
                <input type="text" name="prop3" placeholder="Proposition 3"> 
                <input type="text" name="prop4" placeholder="Proposition 4"> 
                <input type="text" name="reward" placeholder="Récompense">
                <input class="pure-button pure-button-primary" id="envoyez" type="submit" name="question" value="Valider">
        </form>
    
        <?php
      
            if (isset($_POST['question']))
            {
                if(!empty($_POST['question']) and !empty($_POST['reponse']) and !empty($_POST['detail']) and !empty($_POST['prop1']) 
                and !empty($_POST['prop2']) and !empty($_POST['prop3']) and !empty($_POST['prop4']) and !empty($_POST['reward']))
                {
                    include('../helper/connection.php');
                    $query = $pdo->prepare("INSERT INTO questions (question, reponse, detail, prop1, prop2, prop3, prop4, reward) VALUES 
                    (:question, :reponse, :detail, :prop1, :prop2, :prop3, :prop4, :reward)");
                    $success = $query->execute([
                        'question' => $_POST['question'],
                        'reponse' => $_POST['reponse'],
                        'detail' => $_POST['detail'],
                        'prop1' => $_POST['prop1'],
                        'prop2' => $_POST['prop2'],
                        'prop3' => $_POST['prop3'],
                        'prop4' => $_POST['prop4'],
                        'reward' => $_POST['reward']
                    ]);
                    mysqli_close($pdo);
                    echo "La question a bien été ajouté à la base de donnée\n";
                } else {
                    echo "Veuillez saisir tous les champs !"; 
                }
            }
        ?>
    </div>
        

    <div id="droite">

        <h1 >Supression de compte<h1> 

        <br>
     
        <form class="pure-from pure-from-aligned" method="post" action="admin.php">
                <input type="text" name="nom" placeholder="Nom d'utilisateur"> 
                <input class="pure-button pure-button-primary" type="submit" name="supression" value="Supprimer">
        </form>

        <?php

            if (isset($_POST['supression']))
            {
                if(!empty($_POST['nom']))
                {
                    include('../helper/connection.php');
                    $username=$_POST['nom'];
                    $query = $pdo->prepare("DELETE FROM users WHERE username ='$username' ");
                    $success = $query->execute([
                    "username" => $_POST['nom']
                    ]);

                    if($success){
                        echo "L'utilisateur $username a été supprimé \n";
                    } 
                mysqli_close($pdo);
                } else {
                echo '<span style="color:#000000;"> Veuillez entrez des valeurs tolérés ! </span>';
                }
            } 
        ?>
    </div>

    <div id="droite">
        <h1 >Supression de question<h1> 

        <br>

        <form class="pure-from pure-from-aligned" method="post" action="admin.php">
            <input type="text" name="id" placeholder="ID de la question"> 
            <input class="pure-button pure-button-primary" type="submit" name="supression-question" value="Supprimer">
        </form>

        <?php

            if (isset($_POST['supression-question']))
            {
                if(!empty($_POST['id']))
                {
                include('../helper/connection.php');
                $id=$_POST['id'];
                $query = $pdo->prepare("DELETE FROM questions WHERE id ='$id' ");
                $success = $query->execute([
                "id" => $_POST['id']
                ]);

                if($success){
                    echo "La question $id a été supprimé \n";
                } 
                mysqli_close($pdo);
                } else {
                echo '<span style="color:#000000;"> Veuillez entrez des valeurs tolérés ! </span>';
                }
            } 
        ?>
    </div>
</body>
</html>

<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

body {
    background-color: #390380;;
    font-family: Arial, monospace;
}

#droite{
    width : 30%;
    float: right;
    text-align: center;
    background-color: lightgrey;
    margin-right: 1%;
    font-family: 'Montserrat', sans-serif;
    border : solid 2px white;
}


#gauche{
    width : 30%;
    float: left;
    text-align: center;
    background-color: lightgrey;
    margin-left: 1%;
    font-family: 'Montserrat', sans-serif;
    border : solid 2px white;
}

#milieu{
    width : 32%;
    float: left;
    text-align: center;
    background-color: lightgrey;
    margin-left: 3%;
    margin-right: 3%;
    font-family: 'Montserrat', sans-serif;
    border : solid 2px white;
}

input {
    margin-bottom: 18px;
}

#entier{
    width : 100%;
    text-align: center;
    font-size: x-large;
    font-family: 'Montserrat', sans-serif;
    margin-bottom: 60px;
}

h1{
    font-weight: bold;
    color: black;
}

ul {
    background-color: #04c4c1;
	border : solid 2px white;
}

#blanc {
    color : white;
}
</style>