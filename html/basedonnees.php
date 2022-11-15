<?php require '../helper/head.php'; ?>

<?php 
    if ($_SESSION['username'] === 'root') {
    } else {
        header('Location: /login.php');
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
    <h1>Liste des utilisateurs</h1>
    <div>
    <table class="table table-striped">
        <?php 
            include('../helper/connection.php');
            $query = $pdo->prepare('SELECT * FROM users');
            $success = $query->execute();
            $res = $query->fetchall(PDO::FETCH_ASSOC);
        ?>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Role</th>
                <th scope="col">Score</th>
                <th scope="col">Publication</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($res as $users) : ?>
            <tr>
                <th scope="row"> <?= $users['id'] ?> </th>
                <td> <?= $users['username'] ?> </td>
                <td> <?= $users['password'] ?> </td>
                <td> <?= $users['role'] ?> </td>
                <td> <?= $users['score'] ?> </td>
                <td> <?= $users['is_published'] ?> </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    </div>
    <br>
    <p>______________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</p>
    <h1>Liste des questions</h1>
    <div>
    <table class="table table-striped">
        <?php 
            include('../helper/connection.php');
            $query = $pdo->prepare('SELECT * FROM questions');
            $success = $query->execute();
            $res = $query->fetchall(PDO::FETCH_ASSOC);
        ?>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Question</th>
                <th scope="col">Réponse</th>
                <th scope="col">Détail</th>
                <th scope="col">Proposition n°1</th>
                <th scope="col">Proposition n°2</th>
                <th scope="col">Proposition n°3</th>
                <th scope="col">Proposition n°4</th>
                <th scope="col">reward</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($res as $questions) : ?>
            <tr>
                <th scope="row"> <?= $questions['id'] ?> </th>
                <td> <?= $questions['question'] ?> </td>
                <td> <?= $questions['reponse'] ?> </td>
                <td> <?= $questions['detail'] ?> </td>
                <td> <?= $questions['prop1'] ?> </td>
                <td> <?= $questions['prop2'] ?> </td>
                <td> <?= $questions['prop3'] ?> </td>
                <td> <?= $questions['prop4'] ?> </td>
                <td> <?= $questions['reward'] ?> </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    </div>
</body>
</html>

<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

body {
    font-family: 'Montserrat', monospace;
}

big {
    margin-left: 20px;
}

ul {
    background-color : #04c4c1;
    border : solid 2px white;
}

table {
    margin-left : 140px;
    border : solid 2px black;
    text-align : center;
}

div {
    width : 85%;
}

h1 {
    text-align : center;
    font-weight: bold;
    color: black;
    font-size : 300%;
}

</style>