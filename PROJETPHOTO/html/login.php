<?php require '../helper/head.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    
    <div id="entier">
    </div>

    <div>
        <div class="container">
            <?php if(isset($_SESSION['logon']) && $_SESSION['logon'] === true): ?> 
                <p id="taille"> 
                    Bienvenue sur Quizz R&T :<br> <br> <br>
                    Votre nom d'utilisateur est  <?php echo '<span style="color: red;"> <big> <big> <big> <big>'.$_SESSION['username'].'</big> </big> </big> </big> </span>' ?>. <br>  <br>
                    A vous de jouez pour devenir le plus fort :) <br>  <br>
                    Bonne chance !! 
                </p>
            <?php else: ?>

            <div class="form-container sign-in-container">
		        <form action="/login.php" method="post">
			        <h1>Connexion</h1>
			        <input type="text" name="username" placeholder="Nom d'utilisateur" />
			        <input type="password" name="password"placeholder="Mot de passe" />
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" name="connexion">Connexion</button>
                        </div>
                        <div class="col-6" class="descendre">
                            <button type="rien"> <a style="color : #FFFFFF;" href="/inscription.php"> Inscription </a></button>
                        </div>  
                    </div>
                    
                    <?php 
                        if(isset($_POST['connexion'])){
                            if(isset($_POST['username']) && isset($_POST['password'])) {
                                include('../helper/connection.php');
								$mdp=md5($_POST['password']);
                                $query = $pdo->prepare('SELECT password FROM users WHERE username=:username');
                                $success = $query->execute([
                                    "username" => $_POST['username']
                                    ]);
                                $user = $query->fetch(PDO::FETCH_ASSOC);
                                if($user){
                                    if($mdp === $user['password']){
                                        $_SESSION['logon'] = true;
                                        $_SESSION['username']=$_POST['username'];
                                        sleep(1);
                                        header('Location: /login.php');   
                                    } else {
                                        echo "username/password erroné"; 
                                    }
                                } else {
                                    echo "username/password erroné"; 
                                } 
                    
                            } else {
                                echo "Veuillez saisir tous les champs !";
                            }
                        }
                    ?>

                </form>
                <?php endif ?>
            </div>
        </div>
    </div>
</body>
</html>

<style>

body {
    background-color: #390380;
}

form {
	box-sizing: border-box;
}

body {
	flex-direction: column;
	font-family: Arial, monospace;
	height: 100vh;
	margin: -20px 0 50px;
}

h1 {
	font-weight: bold;
	margin: 0;
}

h2 {
	text-align: center;
}

p {
	font-size: 14px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}

span {
	font-size: 12px;
}

a {
	color: #333;
	font-size: 14px;
	text-decoration: none;
	margin: 15px 0;
}

button {
	border-radius: 20px;
	border: 1px solid #2667f3;
	background-color: #2667f3;
	color: #FFFFFF;
	font-size: 15px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

button:active {
	transform: scale(0.95);
}

button:focus {
	outline: none;
}

button.ghost {
	background-color: transparent;
	border-color: #FFFFFF;
}

form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}

.container {
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 550px;
	max-width: 100%;
	min-height: 400px;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
	transition: all 0.6s ease-in-out;
}

.sign-in-container {
	left: 0;
	width: 100%;
	z-index: 2;
}



.sign-up-container {
	left: 0;
	width: 100%;
	z-index: 1;
}

.container.right-panel-active .sign-up-container {
	transform: translateX(100%);
	opacity: 1;
	z-index: 5;
	animation: show 0.6s;
}

#entier {
	width: 100%;
	height: 140px;
}

div {
	text-align: center;
}

ul {
    background-color:  #04c4c1;
	border : solid 2px white;
}

#taille {
	font-size : 150%;
}
</style>