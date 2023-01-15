<?php

/**
 * Here, we will write the functions that will allow 
 * retrieve images or users in order to verify their identifier.
 */

/**
 * Function that returns the PDO object.
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

// Then we can start writing our functions :

/**
 *  Function that returns all urls of the images stored in the database.
 */
function getAllImages()
{
    $bdd = getPDO();
    // We then prepare the SQL query :
    $req = $bdd->prepare('SELECT * FROM images');
    // Once ready, we execute this :
    $req->execute();
    // Once executed, the information is retrieved in '$data':
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    // The cursor is closed to indicate the end of the operation :
    $req->closeCursor();
    // Finally, we return the information :
    return $data;
}

/**
 * Function that returns the user if it exists in the database.
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
 * Function adds the image to the bdd.
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
 * Function returns the user’s id according to their email.
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
 * Function returns the user’s auth according to their email.
 */
function getUserAuthByEmail($email)
{
    $bdd = getPDO();
    $req = $bdd->prepare('SELECT auth FROM users WHERE email = ?');
    $req->execute(array($email));
    $auth = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $auth;
}

/**
 * Function returns the user’s email according to its id.
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

/**
 * The function returns the user id using the user id in the images table
 */
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

function getBannedUser($userId)
{
    $bdd = getPDO();
    $sql = "SELECT banned FROM users WHERE id = :userId";
    $req = $bdd->prepare($sql);
    $req->bindParam(":userId", $userId['id']);
    $req->execute();
    $banned = $req->fetch(PDO::FETCH_ASSOC);
    return $banned;
}

function getAllDates()
{
    $bdd = getPDO();
    // We then prepare the SQL query :
    $req = $bdd->prepare('SELECT * FROM dates');
    // Once ready, we execute this :
    $req->execute();
    // Once executed, the information is retrieved in '$data':
    $date = $req->fetchAll(PDO::FETCH_ASSOC);
    // The cursor is closed to indicate the end of the operation :
    $req->closeCursor();
    // Finally, we return the information :
    return $date;
}


                                        
                                        