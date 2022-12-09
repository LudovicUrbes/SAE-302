<?php
	if (isset($_FILES['fic']['tmp_name'])) {  
        $destination = '../data/img/'.$_FILES['fic']['name'];

		$taille = getimagesize($_FILES['fic']['tmp_name']);
		$largeur = $taille[0];
		$hauteur = $taille[1];
        $format = $taille[2];
		$largeur_miniature = 300;
		$hauteur_miniature = $hauteur / $largeur * $largeur_miniature;

        if ($taille[2]==2) {
            $im = imagecreatefromjpeg($_FILES['fic']['tmp_name']);
        }
        elseif ($taille[2]==3) {
            $im = imagecreatefrompng($_FILES['fic']['tmp_name']);
        }
		
		$im_miniature = imagecreatetruecolor($largeur_miniature, $hauteur_miniature);
		imagecopyresampled($im_miniature, $im, 0, 0, 0, 0, $largeur_miniature, $hauteur_miniature, $largeur, $hauteur);
		imagejpeg($im_miniature, $destination, 90);
		echo '<img src="miniatures/' . $_FILES['fic']['name'] . '">';
	}

    if (!is_dir('vignettes'))
        mkdir('vignettes', 0777);
      
    $fichier = opendir('.');
      
    while ($fichier_courant = readdir($fichier)) {
        $extension = strtolower(strrchr($fichier_courant, '.'));
        if ($extension == '.jpg' || $extension == '.jpeg' || $extension == '.png') {
            $nom_vignette = 'vignettes/' . $fichier_courant;
            $taille = getimagesize($fichier_courant);
            $largeur = $taille[0];
            $hauteur = $taille[1];
      
            if (!file_exists($nom_vignette)) {
                $im = imagecreatefromjpeg($fichier_courant);
                $largeur_vignette = 150;
                $hauteur_vignette = $hauteur / $largeur * 150;
                $im_vignette = imagecreatetruecolor($largeur_vignette, $hauteur_vignette);
                imagecopyresampled($im_vignette, $im, 0, 0, 0, 0, $largeur_vignette, $hauteur_vignette, $largeur, $hauteur);
                imagejpeg($im_vignette, $nom_vignette, 60);
            }    
            else {
                echo 'Nom de l\'image : ' . $fichier_courant . '<br>
                Largeur : ' . $largeur . '<br>
                Hauteur : ' . $hauteur . '<br>
                <a href="' . $fichier_courant . '"><img src="' . $nom_vignette . '" title="Cliquez pour agrandir"></a>
                <hr>';
            }
        }
    }
?>