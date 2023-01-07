<?php
require_once '../../config/crud.php';
// Upload de l'image & déplacement dans le dossier 'uploads/' :
session_start();
$email = $_SESSION['user'];
$userId = getUserIdByEmail($email);
$images = getAllImages();
$data = getUserIdByUserImage($userId);

$_SESSION['errorUpload'] = array();
$_SESSION['successUpload'] = '';

$max_size = 62914560;

// Pour ceux que ça intéresse :
// https://www.php.net/manual/en/features.file-upload.errors.php
switch ($_FILES['image']['error']) {
    case UPLOAD_ERR_OK:
        break;
    case UPLOAD_ERR_NO_FILE:
        array_push($_SESSION['errorUpload'], "Pas d'image envoyée.");
        header('Location: /SAE-302/concours/index.php');
        die();
    case UPLOAD_ERR_INI_SIZE:
        array_push($_SESSION['errorUpload'], "La taille de l'image dépasse la limite fixée par le serveur.");
        header('Location: /SAE-302/concours/index.php');
        die();
    case UPLOAD_ERR_FORM_SIZE:
        array_push($_SESSION['errorUpload'], "La taille de l'image dépasse le maximum autorisé.");
        header('Location: /SAE-302/concours/index.php');
        die();
    default:
        array_push($_SESSION['errorUpload'], 'Erreur inconnue.');
        header('Location: /SAE-302/concours/index.php');
        die();
}

// On vérifie la taille max :
if ($_FILES['image']['size'] > $max_size) {
    array_push($_SESSION['errorUpload'], "La taille de l'image dépasse le maximum autorisé.");
    header('Location: /SAE-302/concours/index.php');
    die();
}

$size = $_FILES['image']['size'];
$extension = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));

// On vérifie que l'extension correspond à nos critères :
if (false === array_search(
    $extension,
    array(
        'jpeg',
        'png',
        'jpg',
    ),
    true
)) {
    array_push($_SESSION['errorUpload'], 'Extension non valide.');
    header('Location: /SAE-302/concours/index.php');
    die();
}


$destinationFile = sprintf(
    '../uploads/%s.%s',
    sha1_file($_FILES['image']['tmp_name']),
    $extension
);

// On déplace le fichier temporaire dans notre dossiers uploads :
if (!move_uploaded_file(
    $_FILES['image']['tmp_name'],
    $destinationFile
)) {
    array_push($_SESSION['errorUpload'], "Transfert échoué.");
    header('Location: /SAE-302/concours/index.php');
    die();
}

// Il ne nous reste plus qu'à ajouter l'image dans la base de données 
// On vérifie que l'utilisateur n'a pas déjà upload une image 

if (empty($data)){
    addImage($destinationFile, $userId['id']);
    $_SESSION['successUpload'] = 'Image téléchargée avec succès.';
} else {
    array_push($_SESSION['errorUpload'], "Vous avez déjà publié votre photo !");
    header('Location: /SAE-302/concours/index.php');
    die();
}

// Enfin, on redirige sur la page pour voir le résultat !
header('Location: /SAE-302/concours/index.php');
die();
