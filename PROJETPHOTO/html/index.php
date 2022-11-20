<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
	<title></title>
	<meta name="generator" content="Bluefish 2.2.12" >
	<meta name="author" content="Eliott" >
	<meta name="date" content="2022-02-16T13:38:09+0100" >
	<meta name="copyright" content="">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
	<meta http-equiv="content-style-type" content="text/css">
	<meta http-equiv="expires" content="0">
	<link href="./CSS/app.css" rel="stylesheet" type="text/css">
	<link href="./CSS/popup.css" rel="stylesheet" type="text/css">
	</head>
		<header>
				<div id="nom_site">
					<h1><i><b>Votez !</b></i></h1>
				</div>
		</header>
	<body>
		<section>
		  <article id="img_inssert">
				<form method="post" enctype="multipart/form-data">
					<div>
						<label for="fic">Choisissez l'image à déposer (PNG, JPG).</label>
						<input type="file" id="fic" name="fic" accept=".jpg, .jpeg, .png" multiple="" style="opacity: 0;" />
						<input type="hidden" name="MAX_FILE_SIZE" value="250000" />
					</div>
					<div class="preview">
						<p>Aucun fichier n'est actuellement sélectionné pour le dépôt</p>
					</div>
					<div>
						<button>Soumettre</button>
					</div>
				</form>
				<script type="text/javascript" src="./Javascript/photo_uploader.js"></script>
			</article>
		</section>

		<!-- COMMENTEZ LA DIV ET LA BALISE SCRIPT POUR RETROUVER LA PAGE INITIALE !!!
		Actuellement lorsque le popup est rempli il renvoie vers l'index avec les arguments php "email" et "psw" mais cette page n'existant pas on tombe sur une erreur 404 -->
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