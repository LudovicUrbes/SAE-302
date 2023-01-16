<?php
require_once '../../config/crud.php';
// Upload the image and move to the 'uploads/' folder
session_start();
$email = $_SESSION['user'];
$userId = getUserIdByEmail($email);
$images = getAllImages();
$data = getUserIdByUserImage($userId);
$banned = getBannedUser($userId);

$_SESSION['errorUpload'] = array();
$_SESSION['successUpload'] = '';

$max_size = 62914560;

// Definition of the various possible errors
switch ($_FILES['image']['error']) {
    case UPLOAD_ERR_OK:
        break;
    case UPLOAD_ERR_NO_FILE:
        array_push($_SESSION['errorUpload'], "Pas d'image envoyée.");
        header('Location: /SAE-302/concours/phase_envoi.php');
        die();
    case UPLOAD_ERR_INI_SIZE:
        array_push($_SESSION['errorUpload'], "La taille de l'image dépasse la limite fixée par le serveur.");
        header('Location: /SAE-302/concours/phase_envoi.php');
        die();
    case UPLOAD_ERR_FORM_SIZE:
        array_push($_SESSION['errorUpload'], "La taille de l'image dépasse le maximum autorisé.");
        header('Location: /SAE-302/concours/phase_envoi.php');
        die();
    default:
        array_push($_SESSION['errorUpload'], 'Erreur inconnue.');
        header('Location: /SAE-302/concours/phase_envoi.php');
        die();
}

// Checking the maximum size
if ($_FILES['image']['size'] > $max_size) {
    array_push($_SESSION['errorUpload'], "La taille de l'image dépasse le maximum autorisé.");
    header('Location: /SAE-302/concours/phase_envoi.php');
    die();
}

$size = $_FILES['image']['size'];
$extension = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));

// Checking the image extension  
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
    header('Location: /SAE-302/concours/phase_envoi.php');
    die();
}


$destinationFile = sprintf(
    '../uploads/%s.%s',
    sha1_file($_FILES['image']['tmp_name']),
    $extension
);

// Moving the file temporarily to our uploads folder
if (!move_uploaded_file(
    $_FILES['image']['tmp_name'],
    $destinationFile
)) {
    array_push($_SESSION['errorUpload'], "Transfert échoué.");
    header('Location: /SAE-302/concours/phase_envoi.php');
    die();
}

// All we have to do is add the image to the database 
// Check that the user has not already uploaded an image 

if (empty($data) && $banned['banned'] == 0){
    addImage($destinationFile, $userId['id']);
    $_SESSION['successUpload'] = 'Image téléchargée avec succès.';
} elseif ($banned['banned'] > 0){
    array_push($_SESSION['errorUpload'], "Vous avez déjà publié votre photo !");
} else {
    array_push($_SESSION['errorUpload'], "Vous avez déjà publié votre photo !");
}

// Finally, we redirect to the page
header('Location: /SAE-302/concours/phase_envoi.php');
die();