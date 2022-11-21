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
    
    <!--COMMENTEZ LA DIV ET LA BALISE SCRIPT POUR RETROUVER LA PAGE INITIALE !!!
    Actuellement lorsque le popup est rempli il renvoie vers l'index avec les arguments php "email" et "psw" mais cette page n'existant pas on tombe sur une erreur 404 -->
    <div id="popup">
      <form action="/index.php" class="form-container">
        <h2>Entrez vos donn&eacutees personnelles</h2>
        <label for="nom">
          <strong>Nom</strong>
        </label>
        <input type="text" id="nom" placeholder="Votre Nom" name="nom" required />
        <label for="prenom">
          <strong>Pr&eacutenom</strong>
        </label>
        <input type="text" id="prenom" placeholder="Votre Prenom" name="prenom" required />
        <label for="dep">
          <strong>D&eacutepartement</strong>
        </label>
        <input type="text" id="dep" placeholder="Votre Departement" name="dep" required />
        <label for="email">
          <strong>E-mail</strong>
        </label>
        <input type="text" id="email" placeholder="Votre Email" name="email" required />
        <button type="submit" class="btn">Acc&eacuteder aux concours</button>
      </form>
    </div>
    <script type="text/javascript" src="./Javascript/popup.js"></script>

  </body> 
</html>