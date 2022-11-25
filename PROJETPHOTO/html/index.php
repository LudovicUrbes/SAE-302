<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Concours Photos</title>
    <link href="./CSS/app.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="container" id="blur">
      <header>
        <div id="nom_site">
          <h1><i><b>Votez !</b></i></h1>
        </div>
      </header>
      <article id="img_insert">
        <form method="post" enctype="multipart/form-data">
          <div>
            <label for="fic">Choisissez l'image &agrave d&eacuteposer (PNG, JPG).</label>
            <input type="file" id="fic" name="fic" accept=".jpg, .jpeg, .png" multiple="" style="opacity: 0;" />
            <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
          </div>
          <div class="preview">
            <p>Aucun fichier n'est actuellement s&eacutelectionn&eacute pour le d&eacutep&ocirct</p>
          </div>
          <div>
            <button>Soumettre</button>
          </div>
        </form>
        <script type="text/javascript" src="./Javascript/photo_uploader.js"></script>
      </article>
    </div>

    <?php
    if (isset($_FILES['fic']['tmp_name'])) {
        $origine = $_FILES['fic']['tmp_name'];
        $destination = '../data/img/'.$_FILES['fic']['name'];
        $retour = copy($origine, $destination);
        if($retour) {
            echo '<p>La photo a bien été envoyée.</p>';
            echo '<img src="' . $_FILES['fic']['name'] . '">';
        }
    }
    ?>
    
    <!--COMMENTEZ LA DIV ET LA BALISE SCRIPT POUR RETROUVER LA PAGE INITIALE !!!
    Actuellement lorsque le popup est rempli il renvoie vers l'index avec les arguments php "email" et "psw" mais cette page n'existant pas on tombe sur une erreur 404 -->

    <?php if ($_SESSION['logon'] == false): ?>
    
    <div id="popup">
      <form method="post" action="index.php" class="form-container">
        <h2>Entrez vos donn&eacutees personnelles</h2>
        <label for="prenom">
          <strong>Pr&eacutenom</strong>
        </label>
        <input type="text" id="prenom" placeholder="Votre Prenom" name="prenom" required />
        <label for="nom">
          <strong>Nom</strong>
        </label>
        <input type="text" id="nom" placeholder="Votre Nom" name="nom" required />
        <label for="dep"><strong>D&eacutepartement</strong></label>
        <select nid="dep" name="departement" required>
            <option value="">Choisis ton d&eacutepartement</option>
            <option value="R&T">R&eacuteseaux et T&eacutel&eacutecommunications</option>
            <option value="TC">Technico-Commercial</option>
            <option value="MP">Mesures Physiques</option>
        </select> <br> <br>
        <label for="email">
          <strong>E-mail</strong>
        </label>
        <input type="text" id="email" placeholder="Votre Email" name="email" required />
        <input type="checkbox" id="condition" required />
        <label for="condition">
          <strong>Conditions g&eacuten&eacuterales</strong>
        </label> <br> <br>
        <button type="submit" name="submit" class="btn">Acc&eacuteder aux concours</button>
      </form>
      <?php
  
          if (isset($_POST['submit']))
          {
              if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['departement']) && !empty($_POST['email']))
              {
                  include('./connexion_base.php');
                  $query = $pdo->prepare("INSERT INTO utilisateur (prenom, nom, departement, email) VALUES (:prenom, :nom, :departement, :email)");
                  $success = $query->execute([
                        'prenom' => $_POST['prenom'],
                        'nom' => $_POST['nom'],
                        'departement' => $_POST['departement'],
                        'email' => $_POST['email']
                        ]);
                  if($success){
                      echo "Vous pouvez acc&eacuteder au site \n";
                  } 
                  mysqli_close($pdo);
                  sleep(2);
                  header('Location: index.php');
                  die();                 
              }
            else echo '<span style="color:#000000;"> <big> Veuillez saisir tous les champs ! </big> </span>';
           }
      ?>
    <script type="text/javascript" src="./Javascript/popup.js"></script>
    </div>

    <?php endif ?>

  </body> 
</html>