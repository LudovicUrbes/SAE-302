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
		<?php
			include ("transfert.php");
			if ( isset($_FILES['fic']) )
			{
				transfert();
			}
		?>
		<form method="post" enctype="multipart/form-data">
			<div>
				<label for="fic">Choose images to upload (PNG, JPG)</label>
				<input type="file" id="fic" name="fic" accept=".jpg, .jpeg, .png" multiple="" style="opacity: 0;">
				<input type="hidden" name="MAX_FILE_SIZE" value="250000" />
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


<?php
    function transfert(){
        $ret        = false;
        $img_blob   = '';
        $img_taille = 0;
        $img_type   = '';
        $img_nom    = '';
        $taille_max = 250000;
        $ret        = is_uploaded_file($_FILES['fic']['tmp_name']);
        
        if (!$ret) {
            echo "Problème de transfert";
            return false;
        } else {
            // Le fichier a bien été reçu
            $img_taille = $_FILES['fic']['size'];
            
            if ($img_taille > $taille_max) {
                echo "Trop gros !";
                return false;
            }

            $img_type = $_FILES['fic']['type'];
            $img_nom  = $_FILES['fic']['name'];
        }
		$img_type = $_FILES['fic']['type'];
        $img_nom = $_FILES['fic']['name'];
        include ("connexion.php");
        $img_blob = file_get_contents ($_FILES['fic']['tmp_name']);
        $req = "INSERT INTO images (" .
                            "img_nom, img_taille, img_type, img_blob " .
                            ") VALUES (" .
                            "'" . $img_nom . "', " .
                            "'" . $img_taille . "', " .
                            "'" . $img_type . "', " .
                            "'" . addslashes ($img_blob) . "') "; // N'oublions pas d'échapper le contenu binaire
        $ret = mysql_query ($req) or die (mysql_error ());
        return true;
    }
?>



    </article>

    <article>
		<img src="./Images/Guitares/Corvin/3170066.JPG" width="350" height="525" alt="">
	</article>




</section>
</body>




</html>

