<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Concours Photos</title>
    <link href="./CSS/app.css" rel="stylesheet" type="text/css">
  </head>
  <body>

    <ul class="nav justify-content-end" style="font-size: larger;">
      <li class="nav-item gauche">
        <a class="nav-link active" aria-current="page" style="color:#000000;">Concours Photo</a>
      </li>
      <li class="nav-item">
        <?php if ($_SERVER['REQUEST_URI'] == "index.php" && $_SESSION['logon'] === true && $_SESSION['condition'] === 1): ?>
          <a class="nav-link active" aria-current="page" href="admin.php" style="color:#000000;"> Admin</a>
        <?php endif ?>
      </li>
    </ul>

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
      include("envoi_image.php");
    ?>
    
    <!--COMMENTEZ LA DIV ET LA BALISE SCRIPT POUR RETROUVER LA PAGE INITIALE  efefefef!!!
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
        <select nid="dep" name="departement" plaehrequired>
            <option value="">Choisis ton d&eacutepartement</option>
            <option value="R&T">R&eacuteseaux et T&eacutel&eacutecommunications</option>
            <option value="TC">Techniques de Commercialisation</option>
            <option value="MP">Mesures Physiques</option>
        </select> 
        <label for="email">
          <strong>E-mail</strong>
        </label>
        <input type="text" id="email" placeholder="Votre Email" name="email" required />
        <div class="password-icon">
          <label for="mdp" id="mdp">
            <strong>Mot de passe</strong>
          </label>
          <input type="password" id="mdp" placeholder="Votre mot de passe" name="mdp" required />
          <i data-feather="eye"></i>
          <i data-feather="eye-off"></i>

          <script src="https://unpkg.com/feather-icons"></script>
          <script>
            feather.replace();
            const eye = document.querySelector(".feather-eye");
            const eyeoff = document.querySelector(".feather-eye-off");
            const passwordField = document.querySelector("input[type=password]");
            eye.addEventListener("click", () => {
            eye.style.display = "none";
            eyeoff.style.display = "block";
            passwordField.type = "text";
            });

            eyeoff.addEventListener("click", () => {
            eyeoff.style.display = "none";
            eye.style.display = "block";
            passwordField.type = "password";
            });
          </script>
        </div>
        <input type="checkbox" id="condition" required />
        <label for="condition">
          <strong>Conditions g&eacuten&eacuterales</strong>
        </label> <br> <br>
        <button type="submit" name="connexion" class="btn">Acc&eacuteder aux concours</button>
      </form>
      <?php
  
          if (isset($_POST['connexion']))
          {
              if(isset($_POST['email']) && isset($_POST['mdp']))
              {
                  include('connexion_base.php');
                  $query = $pdo->prepare('SELECT email, mdp FROM utilisateur WHERE email=:email AND mdp=:mdp');
                  $success = $query->execute([
                        "email" => $_POST['email'],
                        "mdp" => $_POST['mdp']
                        ]);
                  $user = $query->fetch(PDO::FETCH_ASSOC);
                  
                  if($user){
                      $_SESSION['logon'] = true;
                      sleep(1);
                      header("index.php");
                  }                
              }
            else echo '<span style="color:#000000;"> <big> Veuillez saisir tous les champs ! </big> </span>';
           }
      ?>
    <script type="text/javascript" src="./Javascript/popup.js"></script>
    </div>

    <?php endif ?>

    <h1> Photographie concours </h1>

    <div id="blur">
      <?php   
        $table = '<table align="center" cellspacing="10" width="1080"><tr>'."\n";  
        $liste = array(); 
        $dir="../data/img/";
        if ($dossier = opendir($dir)) {  
            while (($item = readdir($dossier)) !== false) {  
                if ($item[0] == '.') { continue; }  
                if (!in_array(end(explode('.', $item)), array('jpg','jpeg','png','gif'))) { continue; }  
                $liste[] = $item;  
            }  
            closedir($dossier);  
            rsort($liste); 
            foreach ($liste as $val) { 
                $table .= '<td><img src="'.$dir.'/'.$val.'" alt="" max-width=80% max-height=auto/><input type="radio" name="vote" > </td>'."\n"; 
            } 
        }  
        $table .= '</tr></table>';  
        echo $table;  
      ?>

      <button type="submit" name="photo" class="btn">Validé votre vote</button>

    </div>



  </body> 
</html>