<?php
session_start();
require_once('config/crud.php');
var_dump(getAllImages());
$images = getAllImages();
$email = $_SESSION['user'];
$userId = getUserIdByEmail($email);


if (($userId['id'] === 100) or ($userId['id'] === 101) or ($userId['id'] === 102)){
} else {
    header('Location: /SAE-302/concours/index.php');
}

?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="/SAE-302/concours/style.css">
    <title>Concours Photo | IUT Châtellerault</title>
</head>

<body <?php if (!isset($_SESSION['user'])) : ?> class="relative z-auto w-full h-full bg-stone-700" <?php endif; ?>>
    <?php if (isset($_SESSION['user'])) : ?>
        <!-- Vrai Contenu Une fois connecté :) -->
        <section class="w-full h-full bg-white">
            <header class="w-full h-fit bg-gray-200 inline-flex items-center justify-between flex-nowrap">
                <h1 class="text-2xl ml-3">Page d'Administration</h1>
                <h1 class="text-2xl ml-3"> <a href ="/SAE-302/concours/index.php">Concours Photo</a></h1>
                <div class="flex items-center gap-y-1">
                    <h3><?= $_SESSION['user']; ?></h3>
                    <a href="admin/controllers/logout.php">
                        <button class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded m-4">
                            Se déconnecter
                        </button>
                    </a>
                </div>
            </header>
            <section class="grid grid-cols-3 w-full h-fit gap-y-5">
                <!-- Message Informatif -->
                <article class="col-span-3 h-fit mt-5 mx-5 shadow-xl p-4 rounded overflow-hidden">
                    <section class=" w-fit h-fit mx-auto">
                        <header class="text-xl font-bold text-center">Bienvenue sur la page admin ! 🎊🎊🎊</header>
                        <br />
                    </section>
                    <hr class="my-4 mx-16 h-px bg-gray-200 border-0 dark:bg-gray-700">
                    <section class=" w-fit h-fit mx-auto">
                        <header class="text-xl font-bold text-center"> Utilité de la page 📝</header>
                        <p class="text-center">
                            Depuis cette page vous pouvez supprimez des photos si elles ne correspondent aux réglements.
                            <br />
                            Vous pouvez aussi avoir un aperçu sur les votes et les noms des participants.
                            <br />
                </article>

                <!-- Liste des images -->
                <section class="col-span-3 w-full h-full grid grid-cols-3 place-items-center gap-5 p-5">
                    <header class="col-span-3 text-center text-2xl font-medium"><span class="underline">Liste des images : </span> 🖼️</header>
                    <?php
                    if (count($images) != 0) :
                        foreach ($images as $image) :
                    ?>
                            <!-- Création de la carte qui contiendra l'image ! -->
                            <div class="col-span-1 max-w-sm rounded overflow-hidden shadow-lg relative">
                                <h1 style="text-align: center; font-size: 30px;"><?php echo $image['id'] ?></h1>
                                <img class="w-[300px] h-[200px] object-cover" src="<?= 'admin/uploads/' . $image['url'] ?>" alt="Photo" />
                                <div class="absolute bottom-1 right-2 p-1">
                                    <!-- Nécessite un formulaire avec un checkbox fantôme pour le like : -->
                                    <input id="default-checkbox" type="radio" value="vote" name="vote_photo" class="w-4 h-4 overflow-hidden rounded text-blue-600 bg-gray-100 rounded border-gray-300 dark:bg-gray-700">
                                    <div id="fb-root"></div>
                                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v15.0" nonce="d2o5Gc7r"></script>
                                    <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="col-span-3 p-2 bg-yellow-500 items-center text-yellow-100 leading-none rounded flex inline-flex overflow-hidden" role="alert">
                            <span class="flex rounded-full bg-yellow-600 uppercase px-2 py-1 text-xs font-bold mr-3">Attention</span>
                            <span class="font-semibold mr-2 text-center flex-auto">
                                Nous n'avons pas encore d'image à vous proposer 😥
                            </span>
                        </div>
                    <?php endif; ?>
                </section>
                <section>
                    <button class="bg-red-200 hover:bg-red-300 text-red-700 font-bold py-2 px-4 rounded inline-flex items-center">
                        <input type="submit" class="cursor-pointer" value="Supprimer la photo sélectionnée !" id="submit">
                    </button>
                </section>
                <section>
                    <h1>Tableau des scores : </h1>
                    <div>
                        <table class="table">
                        <?php

                            $bdd = getPDO();
                            $req = $bdd->query("SELECT id, likes, user_id FROM images ORDER BY likes DESC");

                        ?>

                            <!--
                            $bdd_2 = getPDO();    
                            $sql = "SELECT email FROM users WHERE id = :userId";
                            $req_2 = $bdd_2->prepare($sql);
                            $req_2->bindParam(":userId", $req['user_id']);
                            $req_2->execute();
                            $data = $req_2->fetch(PDO::FETCH_ASSOC);
                            -->

                        <thead>
                            <tr>
                                <th scope="col">Identifiant de l'image </th>
                                <th scope="col">Nombre de likes </th>
                                <th scope="col">Identifiant de l'utilisateur </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($req as $donnees):?>
                            <tr>
                                <td style="background-color: #f2f2f2"> <?=$donnees['id']?></td>
                                <td style="background-color: #d3d3d3"> <?=$donnees['likes']?></td>
                                <td style="background-color: #f2f2f2"> <?=$donnees['user_id']?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                        </table>
                </section>       
            </section>
        </section>
    <?php else : ?>
        <!-- Contenu -->
        <section class="grid grid-cols-3 place-items-center py-64 blur-sm w-full h-full">
            <article class=" col-span-3 text-white">
                <h1 class="text-lg">Félicitations !</h1>
                <p>Tu as perdu ton temps je crois...</p>
            </article>
        </section>

        <!-- LoginForm -->
        <?php require_once('admin/components/loginForm.php'); ?>

        <!-- Script -->
        <script src="./admin/js/togglePassword.js"></script>
    <?php endif; ?>
</body>

</html>