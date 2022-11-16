<?php session_start(); 
if($_SERVER['REQUEST_URI'] === "/login.php"){
    #l'utilisateur souhaite accéder à la page de login, on le laisse faire

//else if(isset($_SESSION['logout']) &&  $_SESSION['logon'] === true){
    # l'utilisateur demande une page différente de /login.php et il est authentifié
    # on le laisse passer
//else {
    # sinon on le redirige vers /login.php et ON ARRÊTE l'exécution du script
    //header('Location: /login.php');
    //die();
} ?>
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
</head>
<body>
	<header>
			<div id="nom_site">
				<h1><i><b>Votez !</b></i></h1>
			</div>
	</header>

<section>
    <article id="img_inssert">
		<form method="post" enctype="multipart/form-data">
			<div>
				<label for="image_uploads">Choose images to upload (PNG, JPG)</label>
				<input type="file" id="image_uploads" name="image_uploads" accept=".jpg, .jpeg, .png" multiple="" style="opacity: 0;">
			</div>
			<div class="preview">
				<p>No files currently selected for upload</p>
			</div>
			<div>
				<button>Submit</button>
			</div>
	</form>


		<script>
                const input = document.querySelector('input');
const preview = document.querySelector('.preview');

input.style.opacity = 0;

input.addEventListener('change', updateImageDisplay);

function updateImageDisplay() {
  while(preview.firstChild) {
    preview.removeChild(preview.firstChild);
  }

  const curFiles = input.files;
  if (curFiles.length === 0) {
    const para = document.createElement('p');
    para.textContent = 'No files currently selected for upload';
    preview.appendChild(para);
  } else {
    const list = document.createElement('ol');
    preview.appendChild(list);

    for (const file of curFiles) {
      const listItem = document.createElement('li');
      const para = document.createElement('p');
      if (validFileType(file)) {
        para.textContent = `File name ${file.name}, file size ${returnFileSize(file.size)}.`;
        const image = document.createElement('img');
        image.src = URL.createObjectURL(file);

        listItem.appendChild(image);
        listItem.appendChild(para);
      } else {
        para.textContent = `File name ${file.name}: Not a valid file type. Update your selection.`;
        listItem.appendChild(para);
      }

      list.appendChild(listItem);
    }
  }
}

// https://developer.mozilla.org/en-US/docs/Web/Media/Formats/Image_types
const fileTypes = [
  "image/apng",
  "image/bmp",
  "image/gif",
  "image/jpeg",
  "image/pjpeg",
  "image/png",
  "image/svg+xml",
  "image/tiff",
  "image/webp",
  "image/x-icon"
];

function validFileType(file) {
  return fileTypes.includes(file.type);
}

function returnFileSize(number) {
  if (number < 1024) {
    return `${number} bytes`;
  } else if (number >= 1024 && number < 1048576) {
    return `${(number / 1024).toFixed(1)} KB`;
  } else if (number >= 1048576) {
    return `${(number / 1048576).toFixed(1)} MB`;
  }
}

            </script>


    </article>

    <article>
	<div id="image1">
		<span id="votre_id1" class="target">
	</span>
	<span id="votre_id2" class="target">
	</span>
	<span id="votre_id3" class="target">
	</span>
	<span id="votre_id4" class="target">
	</span>
	
	<div class="cadre_diapo">
	<div class="interieur_diapo">
	<div class=description>
		<span>
		Corvin1
		</span>
		<img src="./Images/Guitares/Corvin/3170066.JPG" width="350" height="525" alt="">
	</div>
	<div class=description>
		<span>
		Corvin2
		</span>
		<img src="./Images/Guitares/Corvin/GMP01.jpg" width="350" height="525" alt="">
	</div>
	<div class=description>
		<span>
		Corvin3
		</span>
		<img src="./Images/Guitares/Corvin/P3170071.JPG" width="350" height="525" alt="">
	</div>
	<div class=description>
		<span>
		Corvin3
		</span>
		<img src="./Images/Guitares/Corvin/P3170071.JPG" width="350" height="525" alt="">
	</div>
	<div class=description>
		<span>
		Corvin3
		</span>
		<img src="./Images/Guitares/Corvin/P3170071.JPG" width="350" height="525" alt="">
	</div>
	</div>
		<ul class="navigation_diapo">
			<li>
				<a href="#votre_id1">
				<img src="./Images/Guitares/Corvin/3170066.JPG" width="100" height="150" alt="">
				</a>
			</li>
			<li>
				<a href="#votre_id2">
				<img src="./Images/Guitares/Corvin/GMP01.jpg" width="100" height="150" alt="">
				</a>
			</li>
			<li>
				<a href="#votre_id3">
				<img src="./Images/Guitares/Corvin/P3170071.JPG" width="100" height="150" alt="">
				</a>
			</li>
		</ul>
	</div>

	</div>
	
	<div id="txt_corvin">
	<h2>Corvin</p></h2><hr style="width: 400px">
		
		<br>
		<br>
		<br>
		<b>blabla</b></p>
		</div>
		</article>

</section>
</body>




</html>

