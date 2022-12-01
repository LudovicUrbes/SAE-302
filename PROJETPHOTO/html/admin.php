<?php session_start(); ?>

<?php 
    if ($_SESSION['condition'] === 1) {
    } else {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h1>Liste des photos</h1>
    <div>
    <table class="table table-striped">
        <?php 
            include('connexion_base.php');
            $query = $pdo->prepare('SELECT * FROM photo');
            $success = $query->execute();
            $res = $query->fetchall(PDO::FETCH_ASSOC);
        ?>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Stockage</th>
                <th scope="col">Légende</th>
                <th scope="col">Like</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($res as $photo) : ?>
            <tr>
                <th scope="row"> <?= $photo['id'] ?> </th>
                <td> <?= $photo['stockage'] ?> </td>
                <td> <?= $photo['legend'] ?> </td>
                <td> <?= $photo['like'] ?> </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>
</body>
</html>