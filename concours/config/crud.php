<?php

/**
 * Ici, nous allons rédiger les fonctions qui nous permettrons de
 * récuperer les images ou les utlisateurs afin de vérifier leur identifiant.
 */

/**
 * Fonction qui retourne l'objet PDO.
 */
function getPDO()
{
    $host = 'localhost';
    $user = 'php';
    $pass = 'web';
    $db = 'projet';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $bdd = new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {
        var_dump($e->getMessage());
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
    return $bdd;
}

// On peut ensuite commencer à rédiger nos fonctions :

/**
 * Retourne toutes les urls des images stockés dans la base de données.
 */
function getAllImages()
{
    $bdd = getPDO();
    // On prépare ensuite la requête SQL :
    $req = $bdd->prepare('SELECT * FROM images');
    // Une fois prête, nous exécutons celle-ci :
    $req->execute();
    // Une fois exécutée, on récupère les informations dans '$data' :
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    // On ferme le curseur pour signaler la fin de l'opération :
    $req->closeCursor();
    // Enfin, on retourne les informations :
    return $data;
}

/**
 * Retourne l'utilisateur s'il existe dans la base de données.
 */
function getUser($email, $pass)
{
    $bdd = getPDO();
    $req = $bdd->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
    $req->execute(array($email, $pass));
    $data = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $data;
}

/**
 * Ajoute l'image dans la bdd.
 */
function addImage($filePath, $user_id)
{
    $bdd = getPDO();
    $req = $bdd->prepare('INSERT INTO images (url, likes, user_id) VALUES (?, ?, ?)');
    $status = $req->execute(array($filePath, 0, $user_id));
    $req->closeCursor();
    return $status;
}

/**
 * Retourne l'id de l'utilisateur selon son email.
 */
function getUserIdByEmail($email)
{
    $bdd = getPDO();
    $req = $bdd->prepare('SELECT id FROM users WHERE email = ?');
    $req->execute(array($email));
    $id = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $id;
}

/**
 * Retourne l'email de l'utilisateur selon son id.
 */
function getUserEmailById($userId)
{
    $bdd = getPDO();
    $req = $bdd->prepare('SELECT email FROM users WHERE id = ?');
    $req->execute(array($userId));
    $email = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $email;
}

function getUserIdByUserImage($userId)
{
    $bdd = getPDO();
    $sql = "SELECT user_id FROM images WHERE user_id = :userId";
    $req = $bdd->prepare($sql);
    $req->bindParam(":userId", $userId['id']);
    $req->execute();
    $data = $req->fetch(PDO::FETCH_ASSOC);
    return $data;
}

/*
function DelPhoto()
{
    $bdd = getPDO();
    $username=$_POST['nom'];
    $query = $bdd->prepare("DELETE FROM images WHERE id ='$username' ");
    $success = $query->execute([
    "username" => $_POST['nom']
    ]);
}
*/