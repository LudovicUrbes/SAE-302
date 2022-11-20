<!-- PAGE DE TEST POUR LE POPUP -->

<!DOCTYPE html>
<html>
  <head>
    <title>Titre du document</title>
    <link href="./CSS/popup.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <h2>Forme Popup</h2>
    <p>Cliquez sur le bouton "Ouvrir la forme" pour ouvrir la forme Popup.</p>
    <!-- <div class="open-btn">
      <button class="open-button" onclick="openform()"><strong>Ouvrir la forme</strong></button>
    </div> -->
    <div class="login-popup">
      <div class="form-popup" id="popupForm">
        <form action="/index.php" class="form-container">
          <h2>Veuillez vous connecter</h2>
          <label for="email">
            <strong>E-mail</strong>
          </label>
          <input type="text" id="email" placeholder="Votre Email" name="email" required />
          <label for="psw">
            <strong>Mot de passe</strong>
          </label>
          <input type="password" id="psw" placeholder="Votre Mot de passe" name="psw" required />
          <button type="submit" class="btn">Connecter</button>
          <!-- <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button> -->
        </form>
      </div>
    </div>
    <script type="text/javascript" src="./Javascript/popup.js"></script>
  </body>
</html>