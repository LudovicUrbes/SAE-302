<?php session_start(); 
if($_SERVER['REQUEST_URI'] === "/login.php"){
    #l'utilisateur souhaite accéder à la page de login, on le laisse faire
} else if($_SERVER['REQUEST_URI'] === "/inscription.php"){
  #l'utilisateur souhaite accéder à la page d'inscription, on le laisse faire
} else if($_SERVER['REQUEST_URI'] === "/index.php"){
  #l'utilisateur souhaite accéder à la page index, on le laisse faire
} else if(isset($_SESSION['logon']) &&  $_SESSION['logon'] === true){
    # l'utilisateur demande une page différente de /login.php et il est authentifié
    # on le laisse passer
} else {
  # sinon on le redirige vers /login.php et ON ARRÊTE l'exécution du script
  header('Location: /index.php');
  die();
}  ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz R&T</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.1.0/build/pure-min.css" integrity="sha384-yHIFVG6ClnONEA5yB5DJXfW2/KC173DIQrYoZMEtBvGzmf0PKiGyNEqe9N6BNDBH" crossorigin="anonymous">
    <script src="assets/autoip.js"></script>
</head>

<style>
  
ul {
  font-size: large;
}

.gauche {
    left : 0;
    position : absolute;
}

</style>
<body>
<ul class="nav justify-content-end" style="font-size: larger;">
  <li class="nav-item gauche">
    <a class="nav-link active" aria-current="page" style="color:#000000;">Quizz R&T</a>
  </li>
  <li class="nav-item">
    <?php if ($_SERVER['REQUEST_URI'] == "/login.php"): ?>
    <a class="nav-link active" aria-current="page" href="/index.php" style="color:#000000;">Accueil</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/inscription.php"): ?>
    <a class="nav-link active" aria-current="page" href="/index.php " style="color:#000000;">Accueil</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/score.php" && $_SESSION['logon'] === true): ?>
    <a class="nav-link active" aria-current="page" href="/index.php" style="color:#000000;">Accueil</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/questionnaire.php" && $_SESSION['logon'] === true): ?>
    <a class="nav-link active" aria-current="page" href="/index.php" style="color:#000000;">Accueil</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/admin.php" && $_SESSION['logon'] === true): ?>
    <a class="nav-link active" aria-current="page" href="/index.php" style="color:#000000;">Accueil</a>
    <?php endif ?>
  </li>
  <li>
    <?php if ($_SERVER['REQUEST_URI'] == "/basedonnees.php" && $_SESSION['logon'] === true && $_SESSION['username'] === 'root'): ?>
    <a class="nav-link active" aria-current="page" href="/admin.php" style="color:#000000;"> Administration</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/login.php" && $_SESSION['logon'] === true && $_SESSION['username'] === 'root'): ?>
    <a class="nav-link active" aria-current="page" href="/admin.php" style="color:#000000;">Administration</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/questionnaire.php" && $_SESSION['logon'] === true && $_SESSION['username'] === 'root'): ?>
    <a class="nav-link active" aria-current="page" href="/admin.php" style="color:#000000;">Administration</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/score.php" && $_SESSION['logon'] === true && $_SESSION['username'] === 'root'): ?>
    <a class="nav-link active" aria-current="page" href="/admin.php" style="color:#000000;">Administration</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/index.php" && $_SESSION['logon'] === true && $_SESSION['username'] === 'root'): ?>
    <a class="nav-link active" aria-current="page" href="/admin.php" style="color:#000000;">Administration</a>
    <?php endif ?>
  </li>
  <li>
  <?php if ($_SERVER['REQUEST_URI'] == "/admin.php" && $_SESSION['logon'] === true && $_SESSION['username'] === 'root'): ?>
    <a class="nav-link active" aria-current="page" href="/basedonnees.php" style="color:#000000;"> Liste DB</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/login.php" && $_SESSION['logon'] === true && $_SESSION['username'] === 'root'): ?>
    <a class="nav-link active" aria-current="page" href="/basedonnees.php" style="color:#000000;">Liste DB</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/questionnaire.php" && $_SESSION['logon'] === true && $_SESSION['username'] === 'root'): ?>
    <a class="nav-link active" aria-current="page" href="/basedonnees.php" style="color:#000000;">Liste DB</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/score.php" && $_SESSION['logon'] === true && $_SESSION['username'] === 'root'): ?>
    <a class="nav-link active" aria-current="page" href="/basedonnees.php" style="color:#000000;">Liste DB</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/index.php" && $_SESSION['logon'] === true && $_SESSION['username'] === 'root'): ?>
    <a class="nav-link active" aria-current="page" href="/basedonnees.php" style="color:#000000;">Liste DB</a>
    <?php endif ?>
  </li>
  <li class="nav-item">
    <?php if ($_SERVER['REQUEST_URI'] == "/basedonnees.php" && $_SESSION['logon'] === true && $_SESSION['username'] === 'root'): ?>
    <a class="nav-link active" aria-current="page" href="/login.php" style="color:#000000;"> Mon compte</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/index.php" && $_SESSION['logon'] === false): ?>
    <a class="nav-link active" aria-current="page" href="/login.php" style="color:#000000;">Se connecter</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/index.php" && $_SESSION['logon'] === true): ?>
    <a class="nav-link active" aria-current="page" href="/login.php" style="color:#000000;">Mon compte</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/inscription.php"): ?>
    <a class="nav-link active" aria-current="page" href="/login.php" style="color:#000000;">Se connecter</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/questionnaire.php" && $_SESSION['logon'] === true): ?>
    <a class="nav-link active" aria-current="page" href="/login.php" style="color:#000000;">Mon compte</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/score.php" && $_SESSION['logon'] === true): ?>
    <a class="nav-link active" aria-current="page" href="/login.php" style="color:#000000;">Mon compte</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/admin.php" && $_SESSION['logon'] === true): ?>
    <a class="nav-link active" aria-current="page" href="/login.php" style="color:#000000;">Mon compte</a>
    <?php endif ?>
  </li>
  <li class="nav-item">
    <?php if ($_SERVER['REQUEST_URI'] == "/basedonnees.php" && $_SESSION['logon'] === true && $_SESSION['username'] === 'root'): ?>
    <a class="nav-link active" aria-current="page" href="/questionnaire.php" style="color:#000000;"> Questionnaire</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/login.php" && $_SESSION['logon'] === true): ?>
    <a class="nav-link active" aria-current="page" href="/questionnaire.php" style="color:#000000;">Questionnaire</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/admin.php" && $_SESSION['logon'] === true): ?>
    <a class="nav-link active" aria-current="page" href="/questionnaire.php" style="color:#000000;">Questionnaire</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/score.php" && $_SESSION['logon'] === true): ?>
    <a class="nav-link active" aria-current="page" href="/questionnaire.php" style="color:#000000;">Questionnaire</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/index.php" && $_SESSION['logon'] === true): ?>
    <a class="nav-link active" aria-current="page" href="/questionnaire.php" style="color:#000000;">Questionnaire</a>
    <?php endif ?>
  </li>
  <li class="nav-item">
    <?php if ($_SERVER['REQUEST_URI'] == "/basedonnees.php" && $_SESSION['logon'] === true && $_SESSION['username'] === 'root'): ?>
    <a class="nav-link active" aria-current="page" href="/score.php" style="color:#000000;"> Score</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/login.php" && $_SESSION['logon'] === true): ?>
    <a class="nav-link active" aria-current="page" href="/score.php" style="color:#000000;">Score</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/admin.php" && $_SESSION['logon'] === true): ?>
    <a class="nav-link active" aria-current="page" href="/score.php" style="color:#000000;">Score</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/questionnaire.php" && $_SESSION['logon'] === true): ?>
    <a class="nav-link active" aria-current="page" href="/score.php" style="color:#000000;">Score</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/index.php" && $_SESSION['logon'] === true): ?>
    <a class="nav-link active" aria-current="page" href="/score.php" style="color:#000000;">Score</a>
    <?php endif ?>
  </li>
  <li class="nav-item">
    <?php if ($_SERVER['REQUEST_URI'] == "/basedonnees.php" && $_SESSION['logon'] === true && $_SESSION['username'] === 'root'): ?>
    <a class="nav-link active" aria-current="page" href="/logout.php" style="color:#000000;"> Se déconnecter</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/login.php" && $_SESSION['logon'] === true): ?>
    <a class="nav-link active" aria-current="page" href="/logout.php" style="color:#000000;">Se déconnecter</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/admin.php" && $_SESSION['logon'] === true): ?>
    <a class="nav-link active" aria-current="page" href="/logout.php" style="color:#000000;">Se déconnecter</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/score.php" && $_SESSION['logon'] === true): ?>
    <a class="nav-link active" aria-current="page" href="/logout.php" style="color:#000000;">Se déconnecter</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/questionnaire.php" && $_SESSION['logon'] === true): ?>
    <a class="nav-link active" aria-current="page" href="/logout.php" style="color:#000000;">Se déconnecter</a>
    <?php endif ?>
    <?php if ($_SERVER['REQUEST_URI'] == "/index.php" && $_SESSION['logon'] === true): ?>
    <a class="nav-link active" aria-current="page" href="/logout.php" style="color:#000000;">Se déconnecter</a>
    <?php endif ?>
  </li>
</ul>
</body>


