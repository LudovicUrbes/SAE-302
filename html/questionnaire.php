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
        <br>
        <ul id="href">
            <l>
                <a style="color:#000000;" href="#Q1"> | Question 1 |</a>
            </l>
            <l>
                <a style="color:#000000;" href="#Q2"> | Question 2 |</a>
            </l>
            <l>
                <a style="color:#000000;" href="#Q3"> | Question 3 |</a>
            </l>
            <l>
                <a style="color:#000000;" href="#Q4"> | Question 4 |</a>
            </l>
            <l>
                <a style="color:#000000;" href="#Q5">| Question 5 |</a>
            </l>
            <l>
                <a style="color:#000000;" href="#Q6">| Question 6 |</a>
            </l>
            <l>
                <a style="color:#000000;" href="#Q7">| Question 7 |</a>
            </l>
            <l>
                <a style="color:#000000;" href="#Q8">| Question 8 |</a>
            </l>
            <l>
                <a style="color:#000000;" href="#Q9">| Question 9 |</a>
            </l>
            <l>
                <a style="color:#000000;" href="#Q10">| Question 10 |</a>
            </l> 
            <l>
                <a style="color:#000000;" href="#Q11">| Question 11 |</a>
            </l> <br/>
            <l>
                <a style="color:#000000;" href="#Q12">| Question 12 |</a>
            </l>
            <l>
                <a style="color:#000000;" href="#Q13">| Question 13 |</a>
            </l>
            <l>
                <a style="color:#000000;" href="#Q14">| Question 14 |</a>
            </l>
            <l>
                <a style="color:#000000;" href="#Q15">| Question 15 |</a>
            </l>
            <l>
                <a style="color:#000000;" href="#Q16">| Question 16 |</a>
            </l>
            <l>
                <a style="color:#000000;" href="#Q17">| Question 17 |</a>
            </l>
            <l>
                <a style="color:#000000;" href="#Q18">| Question 18 |</a>
            </l>
            <l>
                <a style="color:#000000;" href="#Q19">| Question 19 |</a>
            </l>
            <l>
                <a style="color:#000000;" href="#Q20">| Question 20 |</a>
            </l>
        </ul>
        <p id="Q1">______________________________________________________________________________________________________________________________________________________________________________________________________________________</p>

        <form method="post" action="questionnaire.php">
            <?php 
                include('../helper/connection.php');
                $reponse = $pdo->query('SELECT question, prop1, prop2, prop3, prop4  FROM questions where id=1');
                while ($donnees = $reponse->fetch())
                {
                    echo '<span style="color:#000000;"> <big> <big> Question n°1 : '.$donnees['question']. '</big> </big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°1 --> '.$donnees['prop1']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°2 --> '.$donnees['prop2']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°3 --> '.$donnees['prop3']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°4 --> '.$donnees['prop4']. '</big> </span> <br/> <br/>';
                }
            ?>
                <p> <big> <big> Choisissez la bonne réponse : </big> </big> </p>
                <div>
                    <input type="radio" id="proposition1" name="choix_Q1" value="prop1_Q1"> 
                    <label for="proposition1">Proposition 1</label> 

                    <input type="radio" id="proposition2" name="choix_Q1" value="prop2_Q1">
                    <label for="proposition2">Proposition n°2</label> 

                    <input type="radio" id="proposition3" name="choix_Q1" value="prop3_Q1">
                    <label for="proposition3">Proposition n°3</label> 
        
                    <input type="radio" id="proposition4" name="choix_Q1" value="prop4_Q1">
                    <label for="proposition4">Proposition n°4</label> 
                    <button name="submit" type="submit">Vérifier votre réponse</button>
                </div>
            <?php
                if (isset($_POST['choix_Q1'])){
                    if (($_POST['choix_Q1']) === "prop2_Q1"){
                        include('../helper/connection.php');
                        $name = $_SESSION['username'];
                        $pdo->exec("UPDATE users SET score= score +10 WHERE username ='$name'");
                        echo '<span style="color:#000000;"> <big> Bravo, la bonne réponse était bien la proposition n°2 </big> </span> <br/> <br/>';
                        echo '<span style="color:#000000;"> <big> Petit détail --> Le terme Internet désigne l\'ensemble des réseaux connectés dans le monde. Un intranet 
                        est une connexion privée à des LAN et à des WAN appartenant à une entreprise. Il offre un accès aux membres de l\'entreprise, 
                        à ses employés ou à d\'autres personnes sous réserve d\'une autorisation. Les extranets offrent un accès sûr et sécurisé aux 
                        fournisseurs, aux clients et aux collaborateurs. L\'extendednet n\'est pas un type de réseau.</big> </span> <br/>'; 
                    } else {
                        echo '<span style="color:#000000;"> <big> Votre réponse est mauvaise, veuillez retenter votre chance ! </big> </span>';
                    }

                } else {
                    echo '<span style="color:#000000;"> <big> Sélectionner une réponse </big> </span>';
                }
            ?>
        
        </form>

        <br>
        <p id="Q2">______________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
        <br>

        <form method="post" action="questionnaire.php">
            <?php 
                include('../helper/connection.php');
                $reponse = $pdo->query('SELECT question, prop1, prop2, prop3, prop4  FROM questions where id=2');
                while ($donnees = $reponse->fetch())
                {
                    echo '<span style="color:#000000;"> <big> <big> Question n°2 : '.$donnees['question']. '</big> </big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°1 --> '.$donnees['prop1']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°2 --> '.$donnees['prop2']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°3 --> '.$donnees['prop3']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°4 --> '.$donnees['prop4']. '</big> </span> <br/> <br/>';
                }
            ?>
                <p> <big> <big> Choisissez la bonne réponse : </big> </big> </p>
                <div>
                    <input type="radio" id="proposition1" name="choix_Q2" value="prop1_Q2"> 
                    <label for="proposition1">Proposition 1</label> 

                    <input type="radio" id="proposition2" name="choix_Q2" value="prop2_Q2">
                    <label for="proposition2">Proposition n°2</label> 

                    <input type="radio" id="proposition3" name="choix_Q2" value="prop3_Q2">
                    <label for="proposition3">Proposition n°3</label> 
        
                    <input type="radio" id="proposition4" name="choix_Q2" value="prop4_Q2">
                    <label for="proposition4">Proposition n°4</label> 
                    <button name="submit" type="submit">Vérifier votre réponse</button>
                </div>
            <?php
                if (isset($_POST['choix_Q2'])){
                    if (($_POST['choix_Q2']) === "prop1_Q2"){
                        include('../helper/connection.php');
                        $name = $_SESSION['username'];
                        $pdo->exec("UPDATE users SET score= score +10 WHERE username ='$name'");
                        echo '<span style="color:#000000;"> <big> Bravo, la bonne réponse était bien la proposition n°1 </big> </span> <br/> <br/>';
                        echo '<span style="color:#000000;"> <big> Petit détail --> Les commutateurs de couche 2 utilisent des interfaces virtuelles
                         de commutation (SVIS) pour fournir un moyen d\'accès à distance sur IP. Le SVI par défaut sur un commutateur Cisco est
                          VLAN1.</big> </span> <br/> <br/>'; 
                    } else {
                        echo '<span style="color:#000000;"> <big> Votre réponse est mauvaise, veuillez retenter votre chance ! </big> </span> <br/> <br/>';
                    }

                } else {
                    echo '<span style="color:#000000;"> <big> Sélectionner une réponse </big> </span> <br/>';
                }
            ?>
        
        </form>

        <br>
        <p id="Q3">______________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
        <br>

        <form method="post" action="questionnaire.php">
            <?php 
                include('../helper/connection.php');
                $reponse = $pdo->query('SELECT question, prop1, prop2, prop3, prop4  FROM questions where id=3');
                while ($donnees = $reponse->fetch())
                {
                    echo '<span style="color:#000000;"> <big> <big> Question n°3 : '.$donnees['question']. '</big> </big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°1 --> '.$donnees['prop1']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°2 --> '.$donnees['prop2']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°3 --> '.$donnees['prop3']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°4 --> '.$donnees['prop4']. '</big> </span> <br/> <br/>';
                }
            ?>
                <p> <big> <big> Choisissez la bonne réponse : </big> </big> </p>
                <div>
                    <input type="radio" id="proposition1" name="choix_Q3" value="prop1_Q3"> 
                    <label for="proposition1">Proposition 1</label> 

                    <input type="radio" id="proposition2" name="choix_Q3" value="prop2_Q3">
                    <label for="proposition2">Proposition n°2</label> 

                    <input type="radio" id="proposition3" name="choix_Q3" value="prop3_Q3">
                    <label for="proposition3">Proposition n°3</label> 
        
                    <input type="radio" id="proposition4" name="choix_Q3" value="prop4_Q3">
                    <label for="proposition4">Proposition n°4</label> 
                    <button name="submit" type="submit">Vérifier votre réponse</button>
                </div>
            <?php
                if (isset($_POST['choix_Q3'])){
                    if (($_POST['choix_Q3']) === "prop1_Q3"){
                        include('../helper/connection.php');
                        $name = $_SESSION['username'];
                        $pdo->exec("UPDATE users SET score= score +10 WHERE username ='$name'");
                        echo '<span style="color:#000000;"> <big> Bravo, la bonne réponse était bien la proposition n°1 </big> </span> <br/> <br/>';
                        echo '<span style="color:#000000;"> <big> Petit détail --> Le fichier de configuration de démarrage d\'un routeur ou d\'un 
                        commutateur Cisco est stocké dans NVRAM, qui est de la mémoire non volatile. </big> </span> <br/> <br/>'; 
                    } else {
                        echo '<span style="color:#000000;"> <big> Votre réponse est mauvaise, veuillez retenter votre chance ! </big> </span> <br/> <br/>';
                    }

                } else {
                    echo '<span style="color:#000000;"> <big> Sélectionner une réponse </big> </span> <br/>';
                }
            ?>
        
        </form>

        <br>
        <p id="Q4">______________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
        <br>

        <form method="post" action="questionnaire.php">
            <?php 
                include('../helper/connection.php');
                $reponse = $pdo->query('SELECT question, prop1, prop2, prop3, prop4  FROM questions where id=4');
                while ($donnees = $reponse->fetch())
                {
                    echo '<span style="color:#000000;"> <big> <big> Question n°4 : '.$donnees['question']. '</big> </big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°1 --> '.$donnees['prop1']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°2 --> '.$donnees['prop2']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°3 --> '.$donnees['prop3']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°4 --> '.$donnees['prop4']. '</big> </span> <br/> <br/>';
                }
            ?>
                <p> <big> <big> Choisissez la bonne réponse : </big> </big> </p>
                <div>
                    <input type="radio" id="proposition1" name="choix_Q4" value="prop1_Q4"> 
                    <label for="proposition1">Proposition 1</label> 

                    <input type="radio" id="proposition2" name="choix_Q4" value="prop2_Q4">
                    <label for="proposition2">Proposition n°2</label> 

                    <input type="radio" id="proposition3" name="choix_Q4" value="prop3_Q4">
                    <label for="proposition3">Proposition n°3</label> 
        
                    <input type="radio" id="proposition4" name="choix_Q4" value="prop4_Q4">
                    <label for="proposition4">Proposition n°4</label> 
                    <button name="submit" type="submit">Vérifier votre réponse</button>
                </div>
            <?php
                if (isset($_POST['choix_Q4'])){
                    if (($_POST['choix_Q4']) === "prop4_Q4"){
                        include('../helper/connection.php');
                        $name = $_SESSION['username'];
                        $pdo->exec("UPDATE users SET score= score +10 WHERE username ='$name'");
                        echo '<span style="color:#000000;"> <big> Bravo, la bonne réponse était bien la proposition n°4 </big> </span> <br/> <br/>';
                        echo '<span style="color:#000000;"> <big> Petit détail --> Un pare-feu est l\'un des outils de sécurité les plus efficaces 
                        pour protéger les utilisateurs internes du réseau contre les menaces venant de l\'extérieur. Un pare-feu se trouve entre 
                        deux réseaux, ou plus, contrôle le trafic entre eux et contribue à éviter les accès non autorisés. Un système de prévention 
                        des intrusions peut contribuer à empêcher l\'infiltration d\'intrus et doit être utilisé sur tous les systèmes.</big> </span> <br/> <br/>'; 
                    } else {
                        echo '<span style="color:#000000;"> <big> Votre réponse est mauvaise, veuillez retenter votre chance ! </big> </span> <br/> <br/>';
                    }

                } else {
                    echo '<span style="color:#000000;"> <big> Sélectionner une réponse </big> </span> <br/>';
                }
            ?>
        
        </form>

        <br>
        <p id="Q5">______________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
        <br>

        <form method="post" action="questionnaire.php">
            <?php 
                include('../helper/connection.php');
                $reponse = $pdo->query('SELECT question, prop1, prop2, prop3, prop4  FROM questions where id=5');
                while ($donnees = $reponse->fetch())
                {
                    echo '<span style="color:#000000;"> <big> <big> Question n°5 : '.$donnees['question']. '</big> </big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°1 --> '.$donnees['prop1']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°2 --> '.$donnees['prop2']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°3 --> '.$donnees['prop3']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°4 --> '.$donnees['prop4']. '</big> </span> <br/> <br/>';
                }
            ?>
                <p> <big> <big> Choisissez la bonne réponse : </big> </big> </p>
                <div>
                    <input type="radio" id="proposition1" name="choix_Q5" value="prop1_Q5"> 
                    <label for="proposition1">Proposition 1</label> 

                    <input type="radio" id="proposition2" name="choix_Q5" value="prop2_Q5">
                    <label for="proposition2">Proposition n°2</label> 

                    <input type="radio" id="proposition3" name="choix_Q5" value="prop3_Q5">
                    <label for="proposition3">Proposition n°3</label> 
        
                    <input type="radio" id="proposition4" name="choix_Q5" value="prop4_Q5">
                    <label for="proposition4">Proposition n°4</label> 
                    <button name="submit" type="submit">Vérifier votre réponse</button>
                </div>
            <?php
                if (isset($_POST['choix_Q5'])){
                    if (($_POST['choix_Q5']) === "prop2_Q5"){
                        include('../helper/connection.php');
                        $name = $_SESSION['username'];
                        $pdo->exec("UPDATE users SET score= score +10 WHERE username ='$name'");
                        echo '<span style="color:#000000;"> <big> Bravo, la bonne réponse était bien la proposition n°2 </big> </span> <br/> <br/>';
                        echo '<span style="color:#000000;"> <big> Petit détail --> Un ver est un programme informatique qui est auto-répliqué 
                        dans l\'intention d\'attaquer un système et d\'essayer d\'exploiter une vulnérabilité spécifique dans la cible. Les 
                        virus et les chevaux de Troie comptent sur un mécanisme de distribution pour les transporter d\'un hôte à l\'autre. 
                        L\'ingénierie sociale n\'est pas un type d\'attaque de code malveillant.</big> </span> <br/> <br/>'; 
                    } else {
                        echo '<span style="color:#000000;"> <big> Votre réponse est mauvaise, veuillez retenter votre chance ! </big> </span> <br/> <br/>';
                    }

                } else {
                    echo '<span style="color:#000000;"> <big> Sélectionner une réponse </big> </span> <br/>';
                }
            ?>
        
        </form>

        <br>
        <p id="Q6">______________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
        <br>

        <form method="post" action="questionnaire.php">
            <?php 
                include('../helper/connection.php');
                $reponse = $pdo->query('SELECT question, prop1, prop2, prop3, prop4  FROM questions where id=6');
                while ($donnees = $reponse->fetch())
                {
                    echo '<span style="color:#000000;"> <big> <big> Question n°6 : '.$donnees['question']. '</big> </big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°1 --> '.$donnees['prop1']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°2 --> '.$donnees['prop2']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°3 --> '.$donnees['prop3']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°4 --> '.$donnees['prop4']. '</big> </span> <br/> <br/>';
                }
            ?>
                <p> <big> <big> Choisissez la bonne réponse : </big> </big> </p>
                <div>
                    <input type="radio" id="proposition1" name="choix_Q6" value="prop1_Q6"> 
                    <label for="proposition1">Proposition 1</label> 

                    <input type="radio" id="proposition2" name="choix_Q6" value="prop2_Q6">
                    <label for="proposition2">Proposition n°2</label> 

                    <input type="radio" id="proposition3" name="choix_Q6" value="prop3_Q6">
                    <label for="proposition3">Proposition n°3</label> 
        
                    <input type="radio" id="proposition4" name="choix_Q6" value="prop4_Q6">
                    <label for="proposition4">Proposition n°4</label> 
                    <button name="submit" type="submit">Vérifier votre réponse</button>
                </div>
            <?php
                if (isset($_POST['choix_Q6'])){
                    if (($_POST['choix_Q6']) === "prop1_Q6"){
                        include('../helper/connection.php');
                        $name = $_SESSION['username'];
                        $pdo->exec("UPDATE users SET score= score +10 WHERE username ='$name'");
                        echo '<span style="color:#000000;"> <big> Bravo, la bonne réponse était bien la proposition n°1 </big> </span> <br/> <br/>';
                        echo '<span style="color:#000000;"> <big> Petit détail --> Le terme vulnérabilité ne signifie pas que le réseau est 
                        menacé, mais qu\'il est affaibli et qu\'un ordinateur ou un logiciel pourrait être la cible d\'attaques. </big> </span> <br/> <br/>'; 
                    } else {
                        echo '<span style="color:#000000;"> <big> Votre réponse est mauvaise, veuillez retenter votre chance ! </big> </span> <br/> <br/>';
                    }

                } else {
                    echo '<span style="color:#000000;"> <big> Sélectionner une réponse </big> </span> <br/>';
                }
            ?>
        
        </form>

        <br>
        <p id="Q7">______________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
        <br>

        <form method="post" action="questionnaire.php">
            <?php 
                include('../helper/connection.php');
                $reponse = $pdo->query('SELECT question, prop1, prop2, prop3, prop4  FROM questions where id=7');
                while ($donnees = $reponse->fetch())
                {
                    echo '<span style="color:#000000;"> <big> <big> Question n°7 : '.$donnees['question']. '</big> </big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°1 --> '.$donnees['prop1']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°2 --> '.$donnees['prop2']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°3 --> '.$donnees['prop3']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°4 --> '.$donnees['prop4']. '</big> </span> <br/> <br/>';
                }
            ?>
                <p> <big> <big> Choisissez la bonne réponse : </big> </big> </p>
                <div>
                    <input type="radio" id="proposition1" name="choix_Q7" value="prop1_Q7"> 
                    <label for="proposition1">Proposition 1</label> 

                    <input type="radio" id="proposition2" name="choix_Q7" value="prop2_Q7">
                    <label for="proposition2">Proposition n°2</label> 

                    <input type="radio" id="proposition3" name="choix_Q7" value="prop3_Q7">
                    <label for="proposition3">Proposition n°3</label> 
        
                    <input type="radio" id="proposition4" name="choix_Q7" value="prop4_Q7">
                    <label for="proposition4">Proposition n°4</label> 
                    <button name="submit" type="submit">Vérifier votre réponse</button>
                </div>
            <?php
                if (isset($_POST['choix_Q7'])){
                    if (($_POST['choix_Q7']) === "prop3_Q7"){
                        include('../helper/connection.php');
                        $name = $_SESSION['username'];
                        $pdo->exec("UPDATE users SET score= score +10 WHERE username ='$name'");
                        echo '<span style="color:#000000;"> <big> Bravo, la bonne réponse était bien la proposition n°3 </big> </span> <br/> <br/>';
                        echo '<span style="color:#000000;"> <big> Petit détail --> Accès à distance à un commutateur où les données sont chiffrées pendant la session", 
                        "SSH fournit une connexion à distance sécurisée via une interface virtuelle. SSH fournit une authentification par mot de passe plus forte 
                        que Telnet. SSH crypte également les données pendant la session. </big> </span> <br/> <br/>'; 
                    } else {
                        echo '<span style="color:#000000;"> <big> Votre réponse est mauvaise, veuillez retenter votre chance ! </big> </span> <br/> <br/>';
                    }

                } else {
                    echo '<span style="color:#000000;"> <big> Sélectionner une réponse </big> </span> <br/>';
                }
            ?>
        
        </form>

        <br>
        <p id="Q8">______________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
        <br>

        <form method="post" action="questionnaire.php">
            <?php 
                include('../helper/connection.php');
                $reponse = $pdo->query('SELECT question, prop1, prop2, prop3, prop4  FROM questions where id=8');
                while ($donnees = $reponse->fetch())
                {
                    echo '<span style="color:#000000;"> <big> <big> Question n°8 : '.$donnees['question']. '</big> </big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°1 --> '.$donnees['prop1']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°2 --> '.$donnees['prop2']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°3 --> '.$donnees['prop3']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°4 --> '.$donnees['prop4']. '</big> </span> <br/> <br/>';
                }
            ?>
                <p> <big> <big> Choisissez la bonne réponse : </big> </big> </p>
                <div>
                    <input type="radio" id="proposition1" name="choix_Q8" value="prop1_Q8"> 
                    <label for="proposition1">Proposition 1</label> 

                    <input type="radio" id="proposition2" name="choix_Q8" value="prop2_Q8">
                    <label for="proposition2">Proposition n°2</label> 

                    <input type="radio" id="proposition3" name="choix_Q8" value="prop3_Q8">
                    <label for="proposition3">Proposition n°3</label> 
        
                    <input type="radio" id="proposition4" name="choix_Q8" value="prop4_Q8">
                    <label for="proposition4">Proposition n°4</label> 
                    <button name="submit" type="submit">Vérifier votre réponse</button>
                </div>
            <?php
                if (isset($_POST['choix_Q8'])){
                    if (($_POST['choix_Q8']) === "prop2_Q8"){
                        include('../helper/connection.php');
                        $name = $_SESSION['username'];
                        $pdo->exec("UPDATE users SET score= score +10 WHERE username ='$name'");
                        echo '<span style="color:#000000;"> <big> Bravo, la bonne réponse était bien la proposition n°2 </big> </span> <br/> <br/>';
                        echo '<span style="color:#000000;"> <big> Petit détail --> CP utilise des fenêtres pour tenter de gérer le débit de 
                        transmission au maximum que le réseau et le dispositif de destination peuvent supporter tout en minimisant les pertes 
                        et les retransmissions. Si elle est saturée de données, la destination peut envoyer une demande pour réduire la taille 
                        de fenêtre. Le glissement de fenêtre est le mécanisme utilisé pour empêcher l\'encombrement des réseaux. </big> </span> <br/> <br/>'; 
                    } else {
                        echo '<span style="color:#000000;"> <big> Votre réponse est mauvaise, veuillez retenter votre chance ! </big> </span> <br/> <br/>';
                    }

                } else {
                    echo '<span style="color:#000000;"> <big> Sélectionner une réponse </big> </span> <br/>';
                }
            ?>
        
        </form>

        <br>
        <p id="Q9">______________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
        <br>

        <form method="post" action="questionnaire.php">
            <?php 
                include('../helper/connection.php');
                $reponse = $pdo->query('SELECT question, prop1, prop2, prop3, prop4  FROM questions where id=9');
                while ($donnees = $reponse->fetch())
                {
                    echo '<span style="color:#000000;"> <big> <big> Question n°9 : '.$donnees['question']. '</big> </big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°1 --> '.$donnees['prop1']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°2 --> '.$donnees['prop2']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°3 --> '.$donnees['prop3']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°4 --> '.$donnees['prop4']. '</big> </span> <br/> <br/>';
                }
            ?>
                <p> <big> <big> Choisissez la bonne réponse : </big> </big> </p>
                <div>
                    <input type="radio" id="proposition1" name="choix_Q9" value="prop1_Q9"> 
                    <label for="proposition1">Proposition 1</label> 

                    <input type="radio" id="proposition2" name="choix_Q9" value="prop2_Q9">
                    <label for="proposition2">Proposition n°2</label> 

                    <input type="radio" id="proposition3" name="choix_Q9" value="prop3_Q9">
                    <label for="proposition3">Proposition n°3</label> 
        
                    <input type="radio" id="proposition4" name="choix_Q9" value="prop4_Q9">
                    <label for="proposition4">Proposition n°4</label> 
                    <button name="submit" type="submit">Vérifier votre réponse</button>
                </div>
            <?php
                if (isset($_POST['choix_Q9'])){
                    if (($_POST['choix_Q9']) === "prop2_Q9"){
                        include('../helper/connection.php');
                        $name = $_SESSION['username'];
                        $pdo->exec("UPDATE users SET score= score +10 WHERE username ='$name'");
                        echo '<span style="color:#000000;"> <big> Bravo, la bonne réponse était bien la proposition n°2 </big> </span> <br/> <br/>';
                        echo '<span style="color:#000000;"> <big> Petit détail --> Une socket est défini par la combinaison d\'une adresse IP
                         et d\'un numéro de port, et identifie de manière unique une communication particulière. </big> </span> <br/> <br/>'; 
                    } else {
                        echo '<span style="color:#000000;"> <big> Votre réponse est mauvaise, veuillez retenter votre chance ! </big> </span> <br/> <br/>';
                    }

                } else {
                    echo '<span style="color:#000000;"> <big> Sélectionner une réponse </big> </span> <br/>';
                }
            ?>
        
        </form>

        <br>
        <p id="Q10">______________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
        <br>

        <form method="post" action="questionnaire.php">
            <?php 
                include('../helper/connection.php');
                $reponse = $pdo->query('SELECT question, prop1, prop2, prop3, prop4  FROM questions where id=10');
                while ($donnees = $reponse->fetch())
                {
                    echo '<span style="color:#000000;"> <big> <big> Question n°10 : '.$donnees['question']. '</big> </big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°1 --> '.$donnees['prop1']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°2 --> '.$donnees['prop2']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°3 --> '.$donnees['prop3']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°4 --> '.$donnees['prop4']. '</big> </span> <br/> <br/>';
                }
            ?>
                <p> <big> <big> Choisissez la bonne réponse : </big> </big> </p>
                <div>
                    <input type="radio" id="proposition1" name="choix_Q10" value="prop1_Q10"> 
                    <label for="proposition1">Proposition 1</label> 

                    <input type="radio" id="proposition2" name="choix_Q10" value="prop2_Q10">
                    <label for="proposition2">Proposition n°2</label> 

                    <input type="radio" id="proposition3" name="choix_Q10" value="prop3_Q10">
                    <label for="proposition3">Proposition n°3</label> 
        
                    <input type="radio" id="proposition4" name="choix_Q10" value="prop4_Q10">
                    <label for="proposition4">Proposition n°4</label> 
                    <button name="submit" type="submit">Vérifier votre réponse</button>
                </div>
            <?php
                if (isset($_POST['choix_Q10'])){
                    if (($_POST['choix_Q10']) === "prop1_Q10"){
                        include('../helper/connection.php');
                        $name = $_SESSION['username'];
                        $pdo->exec("UPDATE users SET score= score +10 WHERE username ='$name'");
                        echo '<span style="color:#000000;"> <big> Bravo, la bonne réponse était bien la proposition n°1 </big> </span> <br/> <br/>';
                        echo '<span style="color:#000000;"> <big> Petit détail --> UDP n\'est pas un protocole orienté connexion et ne fournit
                         pas de mécanismes de retransmission, de séquencement ou de contrôle de flux. Il offre les fonctions de base de 
                         la couche transport avec beaucoup moins de surcharge que le protocole TCP. Grâce à sa faible surcharge, le protocole
                          UDP est mieux adapté aux applications sensibles au temps de propagation . </big> </span> <br/> <br/>'; 
                    } else {
                        echo '<span style="color:#000000;"> <big> Votre réponse est mauvaise, veuillez retenter votre chance ! </big> </span> <br/> <br/>';
                    }

                } else {
                    echo '<span style="color:#000000;"> <big> Sélectionner une réponse </big> </span> <br/>';
                }
            ?>
        
        </form>

        <br>
        <p id="Q11">______________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
        <br>

        <form method="post" action="questionnaire.php">
            <?php 
                include('../helper/connection.php');
                $reponse = $pdo->query('SELECT question, prop1, prop2, prop3, prop4  FROM questions where id=11');
                while ($donnees = $reponse->fetch())
                {
                    echo '<span style="color:#000000;"> <big> <big> Question n°11 : '.$donnees['question']. '</big> </big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°1 --> '.$donnees['prop1']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°2 --> '.$donnees['prop2']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°3 --> '.$donnees['prop3']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°4 --> '.$donnees['prop4']. '</big> </span> <br/> <br/>';
                }
            ?>
                <p> <big> <big> Choisissez la bonne réponse : </big> </big> </p>
                <div>
                    <input type="radio" id="proposition1" name="choix_Q11" value="prop1_Q11"> 
                    <label for="proposition1">Proposition 1</label> 

                    <input type="radio" id="proposition2" name="choix_Q11" value="prop2_Q11">
                    <label for="proposition2">Proposition n°2</label> 

                    <input type="radio" id="proposition3" name="choix_Q11" value="prop3_Q11">
                    <label for="proposition3">Proposition n°3</label> 
        
                    <input type="radio" id="proposition4" name="choix_Q11" value="prop4_Q11">
                    <label for="proposition4">Proposition n°4</label> 
                    <button name="submit" type="submit">Vérifier votre réponse</button>
                </div>
            <?php
                if (isset($_POST['choix_Q11'])){
                    if (($_POST['choix_Q11']) === "prop1_Q11"){
                        include('../helper/connection.php');
                        $name = $_SESSION['username'];
                        $pdo->exec("UPDATE users SET score= score +10 WHERE username ='$name'");
                        echo '<span style="color:#000000;"> <big> Bravo, la bonne réponse était bien la proposition n°1 </big> </span> <br/> <br/>';
                        echo '<span style="color:#000000;"> <big> Petit détail --> La commande tracert envoie trois pings à chaque saut 
                        (routeur) dans le chemin vers la destination et affiche le nom de domaine et l\'adresse IP des sauts à partir
                         de leurs réponses. Parce qu\'elle tracert utilise la commande ping , le temps de déplacement est le même qu\'une 
                         ping commande autonome. La fonction principale d\'une commande ping autonome est de tester la connectivité entre 
                         deux hôtes. </big> </span> <br/> <br/>'; 
                    } else {
                        echo '<span style="color:#000000;"> <big> Votre réponse est mauvaise, veuillez retenter votre chance ! </big> </span> <br/> <br/>';
                    }

                } else {
                    echo '<span style="color:#000000;"> <big> Sélectionner une réponse </big> </span> <br/>';
                }
            ?>
        
        </form>

        <br>
        <p id="Q12">______________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
        <br>

        <form method="post" action="questionnaire.php">
            <?php 
                include('../helper/connection.php');
                $reponse = $pdo->query('SELECT question, prop1, prop2, prop3, prop4  FROM questions where id=12');
                while ($donnees = $reponse->fetch())
                {
                    echo '<span style="color:#000000;"> <big> <big> Question n°12 : '.$donnees['question']. '</big> </big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°1 --> '.$donnees['prop1']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°2 --> '.$donnees['prop2']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°3 --> '.$donnees['prop3']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°4 --> '.$donnees['prop4']. '</big> </span> <br/> <br/>';
                }
            ?>
                <p> <big> <big> Choisissez la bonne réponse : </big> </big> </p>
                <div>
                    <input type="radio" id="proposition1" name="choix_Q12" value="prop1_Q12"> 
                    <label for="proposition1">Proposition 1</label> 

                    <input type="radio" id="proposition2" name="choix_Q12" value="prop2_Q12">
                    <label for="proposition2">Proposition n°2</label> 

                    <input type="radio" id="proposition3" name="choix_Q12" value="prop3_Q12">
                    <label for="proposition3">Proposition n°3</label> 
        
                    <input type="radio" id="proposition4" name="choix_Q12" value="prop4_Q12">
                    <label for="proposition4">Proposition n°4</label> 
                    <button name="submit" type="submit">Vérifier votre réponse</button>
                </div>
            <?php
                if (isset($_POST['choix_Q12'])){
                    if (($_POST['choix_Q12']) === "prop3_Q12"){
                        include('../helper/connection.php');
                        $name = $_SESSION['username'];
                        $pdo->exec("UPDATE users SET score= score +10 WHERE username ='$name'");
                        echo '<span style="color:#000000;"> <big> Bravo, la bonne réponse était bien la proposition n°3 </big> </span> <br/> <br/>';
                        echo '<span style="color:#000000;"> <big> Petit détail --> ICMP est utilisé par les périphériquea réseau pour envoyer 
                        des messages d\'erreur. </big> </span> <br/> <br/>'; 
                    } else {
                        echo '<span style="color:#000000;"> <big> Votre réponse est mauvaise, veuillez retenter votre chance ! </big> </span> <br/> <br/>';
                    }

                } else {
                    echo '<span style="color:#000000;"> <big> Sélectionner une réponse </big> </span> <br/>';
                }
            ?>
        
        </form>

        <br>
        <p id="Q13">______________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
        <br>

        <form method="post" action="questionnaire.php">
            <?php 
                include('../helper/connection.php');
                $reponse = $pdo->query('SELECT question, prop1, prop2, prop3, prop4  FROM questions where id=13');
                while ($donnees = $reponse->fetch())
                {
                    echo '<span style="color:#000000;"> <big> <big> Question n°13 : '.$donnees['question']. '</big> </big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°1 --> '.$donnees['prop1']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°2 --> '.$donnees['prop2']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°3 --> '.$donnees['prop3']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°4 --> '.$donnees['prop4']. '</big> </span> <br/> <br/>';
                }
            ?>
                <p> <big> <big> Choisissez la bonne réponse : </big> </big> </p>
                <div>
                    <input type="radio" id="proposition1" name="choix_Q13" value="prop1_Q13"> 
                    <label for="proposition1">Proposition 1</label> 

                    <input type="radio" id="proposition2" name="choix_Q13" value="prop2_Q13">
                    <label for="proposition2">Proposition n°2</label> 

                    <input type="radio" id="proposition3" name="choix_Q13" value="prop3_Q13">
                    <label for="proposition3">Proposition n°3</label> 
        
                    <input type="radio" id="proposition4" name="choix_Q13" value="prop4_Q13">
                    <label for="proposition4">Proposition n°4</label> 
                    <button name="submit" type="submit">Vérifier votre réponse</button>
                </div>
            <?php
                if (isset($_POST['choix_Q13'])){
                    if (($_POST['choix_Q13']) === "prop1_Q13"){
                        include('../helper/connection.php');
                        $name = $_SESSION['username'];
                        $pdo->exec("UPDATE users SET score= score +10 WHERE username ='$name'");
                        echo '<span style="color:#000000;"> <big> Bravo, la bonne réponse était bien la proposition n°1 </big> </span> <br/> <br/>';
                        echo '<span style="color:#000000;"> <big> Petit détail --> ICMPv6 envoie un message de délai dépassé si le routeur ne
                         peut pas transmettre un paquet IPv6 parce que le paquet a expiré. Le routeur utilise un champ de limite de saut 
                         pour déterminer si le paquet a expiré, et ne dispose pas d\'un champ TTL. </big> </span> <br/> <br/>'; 
                    } else {
                        echo '<span style="color:#000000;"> <big> Votre réponse est mauvaise, veuillez retenter votre chance ! </big> </span> <br/> <br/>';
                    }

                } else {
                    echo '<span style="color:#000000;"> <big> Sélectionner une réponse </big> </span> <br/>';
                }
            ?>
        
        </form>

        <br>
        <p id="Q14">______________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
        <br>

        <form method="post" action="questionnaire.php">
            <?php 
                include('../helper/connection.php');
                $reponse = $pdo->query('SELECT question, prop1, prop2, prop3, prop4  FROM questions where id=14');
                while ($donnees = $reponse->fetch())
                {
                    echo '<span style="color:#000000;"> <big> <big> Question n°14 : '.$donnees['question']. '</big> </big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°1 --> '.$donnees['prop1']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°2 --> '.$donnees['prop2']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°3 --> '.$donnees['prop3']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°4 --> '.$donnees['prop4']. '</big> </span> <br/> <br/>';
                }
            ?>
                <p> <big> <big> Choisissez la bonne réponse : </big> </big> </p>
                <div>
                    <input type="radio" id="proposition1" name="choix_Q14" value="prop1_Q14"> 
                    <label for="proposition1">Proposition 1</label> 

                    <input type="radio" id="proposition2" name="choix_Q14" value="prop2_Q14">
                    <label for="proposition2">Proposition n°2</label> 

                    <input type="radio" id="proposition3" name="choix_Q14" value="prop3_Q14">
                    <label for="proposition3">Proposition n°3</label> 
        
                    <input type="radio" id="proposition4" name="choix_Q14" value="prop4_Q14">
                    <label for="proposition4">Proposition n°4</label> 
                    <button name="submit" type="submit">Vérifier votre réponse</button>
                </div>
            <?php
                if (isset($_POST['choix_Q14'])){
                    if (($_POST['choix_Q14']) === "prop3_Q14"){
                        include('../helper/connection.php');
                        $name = $_SESSION['username'];
                        $pdo->exec("UPDATE users SET score= score +10 WHERE username ='$name'");
                        echo '<span style="color:#000000;"> <big> Bravo, la bonne réponse était bien la proposition n°3 </big> </span> <br/> <br/>';
                        echo '<span style="color:#000000;"> <big> Petit détail --> Avec l\'adresse IPv4 , un masque de sous-réseau est également 
                        nécessaire. Un masque de sous-réseau est un type spécial d\'adresse IPv4 qui, conjugué à l\'adresse IP, détermine à 
                        quel sous-réseau le terminal appartient. </big> </span> <br/> <br/>'; 
                    } else {
                        echo '<span style="color:#000000;"> <big> Votre réponse est mauvaise, veuillez retenter votre chance ! </big> </span> <br/> <br/>';
                    }

                } else {
                    echo '<span style="color:#000000;"> <big> Sélectionner une réponse </big> </span> <br/>';
                }
            ?>
        
        </form>

        <br>
        <p id="Q15">______________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
        <br>

        <form method="post" action="questionnaire.php">
            <?php 
                include('../helper/connection.php');
                $reponse = $pdo->query('SELECT question, prop1, prop2, prop3, prop4  FROM questions where id=15');
                while ($donnees = $reponse->fetch())
                {
                    echo '<span style="color:#000000;"> <big> <big> Question n°15 : '.$donnees['question']. '</big> </big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°1 --> '.$donnees['prop1']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°2 --> '.$donnees['prop2']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°3 --> '.$donnees['prop3']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°4 --> '.$donnees['prop4']. '</big> </span> <br/> <br/>';
                }
            ?>
                <p> <big> <big> Choisissez la bonne réponse : </big> </big> </p>
                <div>
                    <input type="radio" id="proposition1" name="choix_Q15" value="prop1_Q15"> 
                    <label for="proposition1">Proposition 1</label> 

                    <input type="radio" id="proposition2" name="choix_Q15" value="prop2_Q15">
                    <label for="proposition2">Proposition n°2</label> 

                    <input type="radio" id="proposition3" name="choix_Q15" value="prop3_Q15">
                    <label for="proposition3">Proposition n°3</label> 
        
                    <input type="radio" id="proposition4" name="choix_Q15" value="prop4_Q15">
                    <label for="proposition4">Proposition n°4</label> 
                    <button name="submit" type="submit">Vérifier votre réponse</button>
                </div>
            <?php
                if (isset($_POST['choix_Q15'])){
                    if (($_POST['choix_Q15']) === "prop4_Q15"){
                        include('../helper/connection.php');
                        $name = $_SESSION['username'];
                        $pdo->exec("UPDATE users SET score= score +10 WHERE username ='$name'");
                        echo '<span style="color:#000000;"> <big> Bravo, la bonne réponse était bien la proposition n°4 </big> </span> <br/> <br/>';
                        echo '<span style="color:#000000;"> <big> Petit détail --> Le format binaire pour 255.255.255.224 est 11111111.1111111111.111111.111111.11100000. 
                        La longueur du préfixe est le nombre de bits mis à 1 dans le masque de sous-réseau. Par conséquent, la longueur du préfixe est /27. </big> </span> <br/> <br/>'; 
                    } else {
                        echo '<span style="color:#000000;"> <big> Votre réponse est mauvaise, veuillez retenter votre chance ! </big> </span> <br/> <br/>';
                    }

                } else {
                    echo '<span style="color:#000000;"> <big> Sélectionner une réponse </big> </span> <br/>';
                }
            ?>
        
        </form>

        <br>
        <p id="Q16">______________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
        <br>

        <form method="post" action="questionnaire.php">
            <?php 
                include('../helper/connection.php');
                $reponse = $pdo->query('SELECT question, prop1, prop2, prop3, prop4  FROM questions where id=16');
                while ($donnees = $reponse->fetch())
                {
                    echo '<span style="color:#000000;"> <big> <big> Question n°16 : '.$donnees['question']. '</big> </big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°1 --> '.$donnees['prop1']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°2 --> '.$donnees['prop2']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°3 --> '.$donnees['prop3']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°4 --> '.$donnees['prop4']. '</big> </span> <br/> <br/>';
                }
            ?>
                <p> <big> <big> Choisissez la bonne réponse : </big> </big> </p>
                <div>
                    <input type="radio" id="proposition1" name="choix_Q16" value="prop1_Q16"> 
                    <label for="proposition1">Proposition 1</label> 

                    <input type="radio" id="proposition2" name="choix_Q16" value="prop2_Q16">
                    <label for="proposition2">Proposition n°2</label> 

                    <input type="radio" id="proposition3" name="choix_Q16" value="prop3_Q16">
                    <label for="proposition3">Proposition n°3</label> 
        
                    <input type="radio" id="proposition4" name="choix_Q16" value="prop4_Q16">
                    <label for="proposition4">Proposition n°4</label> 
                    <button name="submit" type="submit">Vérifier votre réponse</button>
                </div>
            <?php
                if (isset($_POST['choix_Q16'])){
                    if (($_POST['choix_Q16']) === "prop1_Q16"){
                        include('../helper/connection.php');
                        $name = $_SESSION['username'];
                        $pdo->exec("UPDATE users SET score= score +10 WHERE username ='$name'");
                        echo '<span style="color:#000000;"> <big> Bravo, la bonne réponse était bien la proposition n°1 </big> </span> <br/> <br/>';
                        echo '<span style="color:#000000;"> <big> Petit détail --> Lorsqu\'un routeur reçoit un paquet, il examine l\'adresse 
                        de destination du paquet et utilise la table de routage pour rechercher le meilleur chemin vers ce réseau. </big> </span> <br/> <br/>'; 
                    } else {
                        echo '<span style="color:#000000;"> <big> Votre réponse est mauvaise, veuillez retenter votre chance ! </big> </span> <br/> <br/>';
                    }

                } else {
                    echo '<span style="color:#000000;"> <big> Sélectionner une réponse </big> </span> <br/>';
                }
            ?>
        
        </form>

        <br>
        <p id="Q17">______________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
        <br>

        <form method="post" action="questionnaire.php">
            <?php 
                include('../helper/connection.php');
                $reponse = $pdo->query('SELECT question, prop1, prop2, prop3, prop4  FROM questions where id=17');
                while ($donnees = $reponse->fetch())
                {
                    echo '<span style="color:#000000;"> <big> <big> Question n°17 : '.$donnees['question']. '</big> </big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°1 --> '.$donnees['prop1']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°2 --> '.$donnees['prop2']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°3 --> '.$donnees['prop3']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°4 --> '.$donnees['prop4']. '</big> </span> <br/> <br/>';
                }
            ?>
                <p> <big> <big> Choisissez la bonne réponse : </big> </big> </p>
                <div>
                    <input type="radio" id="proposition1" name="choix_Q17" value="prop1_Q17"> 
                    <label for="proposition1">Proposition 1</label> 

                    <input type="radio" id="proposition2" name="choix_Q17" value="prop2_Q17">
                    <label for="proposition2">Proposition n°2</label> 

                    <input type="radio" id="proposition3" name="choix_Q17" value="prop3_Q17">
                    <label for="proposition3">Proposition n°3</label> 
        
                    <input type="radio" id="proposition4" name="choix_Q17" value="prop4_Q17">
                    <label for="proposition4">Proposition n°4</label> 
                    <button name="submit" type="submit">Vérifier votre réponse</button>
                </div>
            <?php
                if (isset($_POST['choix_Q17'])){
                    if (($_POST['choix_Q17']) === "prop1_Q17"){
                        include('../helper/connection.php');
                        $name = $_SESSION['username'];
                        $pdo->exec("UPDATE users SET score= score +10 WHERE username ='$name'");
                        echo '<span style="color:#000000;"> <big> Bravo, la bonne réponse était bien la proposition n°1 </big> </span> <br/> <br/>';
                        echo '<span style="color:#000000;"> <big> Petit détail --> ICMPv6, comme IPv4, envoie un message de dépassement de temps
                         si le routeur ne peut pas transférer un paquet IPv6 parce que le paquet a expiré. Cependant, le paquet IPv6 n\'a pas
                          de champ TTL. Il utilise plutôt le champ Hop Limit pour déterminer si le paquet a expiré. </big> </span> <br/> <br/>'; 
                    } else {
                        echo '<span style="color:#000000;"> <big> Votre réponse est mauvaise, veuillez retenter votre chance ! </big> </span> <br/> <br/>';
                    }

                } else {
                    echo '<span style="color:#000000;"> <big> Sélectionner une réponse </big> </span> <br/>';
                }
            ?>
        
        </form>

        <br>
        <p id="Q18">______________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
        <br>

        <form method="post" action="questionnaire.php">
            <?php 
                include('../helper/connection.php');
                $reponse = $pdo->query('SELECT question, prop1, prop2, prop3, prop4  FROM questions where id=18');
                while ($donnees = $reponse->fetch())
                {
                    echo '<span style="color:#000000;"> <big> <big> Question n°18 : '.$donnees['question']. '</big> </big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°1 --> '.$donnees['prop1']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°2 --> '.$donnees['prop2']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°3 --> '.$donnees['prop3']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°4 --> '.$donnees['prop4']. '</big> </span> <br/> <br/>';
                }
            ?>
                <p> <big> <big> Choisissez la bonne réponse : </big> </big> </p>
                <div>
                    <input type="radio" id="proposition1" name="choix_Q18" value="prop1_Q18"> 
                    <label for="proposition1">Proposition 1</label> 

                    <input type="radio" id="proposition2" name="choix_Q18" value="prop2_Q18">
                    <label for="proposition2">Proposition n°2</label> 

                    <input type="radio" id="proposition3" name="choix_Q18" value="prop3_Q18">
                    <label for="proposition3">Proposition n°3</label> 
        
                    <input type="radio" id="proposition4" name="choix_Q18" value="prop4_Q18">
                    <label for="proposition4">Proposition n°4</label> 
                    <button name="submit" type="submit">Vérifier votre réponse</button>
                </div>
            <?php
                if (isset($_POST['choix_Q18'])){
                    if (($_POST['choix_Q18']) === "prop4_Q18"){
                        include('../helper/connection.php');
                        $name = $_SESSION['username'];
                        $pdo->exec("UPDATE users SET score= score +10 WHERE username ='$name'");
                        echo '<span style="color:#000000;"> <big> Bravo, la bonne réponse était bien la proposition n°4 </big> </span> <br/> <br/>';
                        echo '<span style="color:#000000;"> <big> Petit détail --> L\'IP est un protocole de couche 3. Les périphériques de la
                        couche 3 peuvent ouvrir l\'en-tête de la couche 3 pour l\'inspecter et identifier les informations d\'adressage IP, 
                        notamment les adresses IP source et de destination. </big> </span> <br/> <br/>'; 
                    } else {
                        echo '<span style="color:#000000;"> <big> Votre réponse est mauvaise, veuillez retenter votre chance ! </big> </span> <br/> <br/>';
                    }

                } else {
                    echo '<span style="color:#000000;"> <big> Sélectionner une réponse </big> </span> <br/>';
                }
            ?>
        
        </form>

        <br>
        <p id="Q19">______________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
        <br>

        <form method="post" action="questionnaire.php">
            <?php 
                include('../helper/connection.php');
                $reponse = $pdo->query('SELECT question, prop1, prop2, prop3, prop4  FROM questions where id=19');
                while ($donnees = $reponse->fetch())
                {
                    echo '<span style="color:#000000;"> <big> <big> Question n°19 : '.$donnees['question']. '</big> </big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°1 --> '.$donnees['prop1']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°2 --> '.$donnees['prop2']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°3 --> '.$donnees['prop3']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°4 --> '.$donnees['prop4']. '</big> </span> <br/> <br/>';
                }
            ?>
                <p> <big> <big> Choisissez la bonne réponse : </big> </big> </p>
                <div>
                    <input type="radio" id="proposition1" name="choix_Q19" value="prop1_Q19"> 
                    <label for="proposition1">Proposition 1</label> 

                    <input type="radio" id="proposition2" name="choix_Q19" value="prop2_Q19">
                    <label for="proposition2">Proposition n°2</label> 

                    <input type="radio" id="proposition3" name="choix_Q19" value="prop3_Q19">
                    <label for="proposition3">Proposition n°3</label> 
        
                    <input type="radio" id="proposition4" name="choix_Q19" value="prop4_Q19">
                    <label for="proposition4">Proposition n°4</label> 
                    <button name="submit" type="submit">Vérifier votre réponse</button>
                </div>
            <?php
                if (isset($_POST['choix_Q19'])){
                    if (($_POST['choix_Q19']) === "prop4_Q19"){
                        include('../helper/connection.php');
                        $name = $_SESSION['username'];
                        $pdo->exec("UPDATE users SET score= score +10 WHERE username ='$name'");
                        echo '<span style="color:#000000;"> <big> Bravo, la bonne réponse était bien la proposition n°4 </big> </span> <br/> <br/>';
                        echo '<span style="color:#000000;"> <big> Petit détail --> Les logiciels espions sont des logiciels installés sur 
                        un périphérique réseau et qui collectent des informations. </big> </span> <br/> <br/>'; 
                    } else {
                        echo '<span style="color:#000000;"> <big> Votre réponse est mauvaise, veuillez retenter votre chance ! </big> </span> <br/> <br/>';
                    }

                } else {
                    echo '<span style="color:#000000;"> <big> Sélectionner une réponse </big> </span> <br/>';
                }
            ?>
        
        </form>

        <br>
        <p id="Q20">______________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
        <br>

        <form method="post" action="questionnaire.php">
            <?php 
                include('../helper/connection.php');
                $reponse = $pdo->query('SELECT question, prop1, prop2, prop3, prop4  FROM questions where id=20');
                while ($donnees = $reponse->fetch())
                {
                    echo '<span style="color:#000000;"> <big> <big> Question n°20 : '.$donnees['question']. '</big> </big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°1 --> '.$donnees['prop1']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°2 --> '.$donnees['prop2']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°3 --> '.$donnees['prop3']. '</big> </span> <br/> <br/>';
                    echo '<span style="color:#FFFFFF;"> <big> Proposition n°4 --> '.$donnees['prop4']. '</big> </span> <br/> <br/>';
                }
            ?>
                <p> <big> <big> Choisissez la bonne réponse : </big> </big> </p>
                <div>
                    <input type="radio" id="proposition1" name="choix_Q20" value="prop1_Q20"> 
                    <label for="proposition1">Proposition 1</label> 

                    <input type="radio" id="proposition2" name="choix_Q20" value="prop2_Q20">
                    <label for="proposition2">Proposition n°2</label> 

                    <input type="radio" id="proposition3" name="choix_Q20" value="prop3_Q20">
                    <label for="proposition3">Proposition n°3</label> 
        
                    <input type="radio" id="proposition4" name="choix_Q20" value="prop4_Q20">
                    <label for="proposition4">Proposition n°4</label> 
                    <button name="submit" type="submit">Vérifier votre réponse</button>
                </div>
            <?php
                if (isset($_POST['choix_Q20'])){
                    if (($_POST['choix_Q20']) === "prop2_Q20"){
                        include('../helper/connection.php');
                        $name = $_SESSION['username'];
                        $pdo->exec("UPDATE users SET score= score +10 WHERE username ='$name'");
                        echo '<span style="color:#000000;"> <big> Bravo, la bonne réponse était bien la proposition n°2 </big> </span> <br/> <br/>';
                        echo '<span style="color:#000000;"> <big> Petit détail --> Les réseaux privés virtuels (VPN) sont utilisés pour fournir
                         un accès sécurisé aux travailleurs à distance. </big> </span> <br/> <br/>'; 
                    } else {
                        echo '<span style="color:#000000;"> <big> Votre réponse est mauvaise, veuillez retenter votre chance ! </big> </span> <br/> <br/>';
                    }

                } else {
                    echo '<span style="color:#000000;"> <big> Sélectionner une réponse </big> </span> <br/>';
                }
            ?>
        
        </form>
</body>
</html>

<style>

body {
    background-color: #390380;
    font-family: Arial, monospace;
}

div:first-of-type {
    display: flex;
    align-items: flex-start;
    margin-bottom: 5px;
}
  
label {
    margin-right: 15px;
    line-height: 32px;
    color: white;
}
  
input {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
  
    border-radius: 50%;
    width: 22px;
    height: 22px;
  
    border: 2px solid #999;
    transition: 0.2s all linear;
    margin-right: 5px;
  
    position: relative;
    top: 4px;
}
  
input:checked {
    border: 6px solid black;
}
  
button,
legend {
    color: white;
    background-color: black;
    padding: 5px 10px;
    border-radius: 0;
    border: 0;
    font-size: 14px;
}
  
button:hover,
button:focus {
    color: #999;
}
  
button:active {
    background-color: white;
    color: black;
    outline: 1px solid black;
}

label, p {
    color :white;
}

form>p {
    color :black;
}

button {
    margin-bottom: 18px;
}

#noir {
    color: black;
    margin-left: 20px;
}

ul>l {
    font-size: x-large;
}

input {
    margin-bottom: 2%;
}

#href {
    text-align: center;
    background-color : lightgray;
    border : solid 2px black;
    border-radius: 30px;
    width : 95%;
    padding-left : 2%;
    padding-bottom : 1%;
    padding-top : 1%;
    margin-left: 2%;
}

form {
    margin-left: 2%;
    background-color: #cb4596;
    border-radius: 30px;
    width : 95%;
    height : 625px;
    padding-left : 2%;
    padding-top : 2%;
    border : solid 2px white;
}

ul {
    background-color : #04c4c1;
    border : solid 2px white;
}

</style>

