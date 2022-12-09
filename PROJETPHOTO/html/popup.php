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