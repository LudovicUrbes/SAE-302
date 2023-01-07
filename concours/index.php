<?php
session_start();
require_once('config/crud.php');
var_dump(getAllImages());
$images = getAllImages();
$userId = getUserIdByEmail($email);
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Concours Photo | IUT Châtellerault</title>
</head>

<body <?php if (!isset($_SESSION['user'])) : ?> class="relative z-auto w-full h-full bg-stone-700" <?php endif; ?>>
    <?php if (isset($_SESSION['user'])) : ?>
        <!-- Vrai Contenu Une fois connecté :) -->
        <section class="w-full h-full bg-white">
            <header class="w-full h-fit bg-gray-200 inline-flex items-center justify-between flex-nowrap">
                <h1 class="text-2xl ml-3">Concours</h1>

                <?php if ($_SERVER['REQUEST_URI'] == "/SAE-302/concours/index.php" && $_SESSION['logon'] === true && $userId['id'] === 100 or 101 or 102 or 103): ?>
                <a class="nav-link active" aria-current="page" href="/SAE-302/concours/admin.php" style="color:#000000;">ADMIN</a>
                <?php endif ?>

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
                        <header class="text-xl font-bold text-center">Bienvenue ! 🎊🎊🎊</header>
                        <br />
                    </section>
                    <hr class="my-4 mx-16 h-px bg-gray-200 border-0 dark:bg-gray-700">
                    <section class=" w-fit h-fit mx-auto">
                        <header class="text-xl font-bold text-center">Conditions de participation 📝</header>
                        <p class="text-center">
                            Sachez que la participation est <u>anonyme</u>.
                            <br />
                            Lors du vote, personne ne pourra connaître l'auteur depuis le site.
                            <br />
                            Les images seront affichées lorsque le timer sera écoulé. Vous aurez alors quelques jours pour voter !!
                            <br />
                            Le nom de l'auteur sera donc dévoilé à la fin du concours ! 🎉
                            <br />
                            Pensez à bien vérifier votre photo lors de votre participation au concours !
                            <br />
                            Vous ne pourrez y participer qu'une seule fois !
                            <br />
                            Ne vous amuser pas à poster des images n'ayant aucun rapport avec le thème du coucours !
                            <br />
                            Le nom et prénom des personnes ayant posté seront connus !
                            <br />
                        </p>
                    </section>
                    <hr class="my-4 mx-16 h-px bg-gray-200 border-0 dark:bg-gray-700">
                    <section class=" w-fit h-fit mx-auto">
                    <header class="text-xl font-bold text-center">Explication</header>
                        <p class="text-center">
                            Cette année <strong>le thème du concours est votre ville d'origine</strong>.
                            <br />
                            Juste en dessous, nous vous proposons de voter pour l'image que vous aimez.
                            <br />
                            Toutefois, si vous désirez participer, nous vous offrons la possibilité de le faire !
                            <br />
                            Pour cela, choississez votre image à partir du bouton ci-dessous 👇.
                            <br />
                            Une fois votre image téléchargée, les utilisateurs pourront alors voter pour votre image.
                            <br />
                            Vous avez juste qu'au ..... pour publié votre photo et les votes aront lieu du .... au ....
                        </p>
                    </section>
                </article>

                <?php if (!empty($_SESSION['errorUpload'])) : ?>
                    <!-- Error Message -->
                    <?php foreach ($_SESSION['errorUpload'] as $error) : ?>
                        <div class="col-span-3 text-center" role="alert">
                            <div class="p-2 bg-red-500 items-center text-red-100 leading-none rounded flex inline-flex overflow-hidden" role="alert">
                                <span class="flex rounded-full bg-red-600 uppercase px-2 py-1 text-xs font-bold mr-3">Erreur</span>
                                <span class="font-semibold mr-2 text-center flex-auto">
                                    <?= $error; ?>
                                </span>
                            </div>
                        </div>
                    <?php unset($_SESSION['errorUpload']);
                    endforeach; ?>
                <?php endif; ?>

                <?php if (!empty($_SESSION['successUpload'])) : ?>
                    <!-- Success Message -->
                    <div class="col-span-3 text-center" role="alert">
                        <div class="p-2 bg-cyan-500 items-center text-cyan-100 leading-none rounded flex inline-flex overflow-hidden" role="alert">
                            <span class="flex rounded-full bg-cyan-600 uppercase px-2 py-1 text-xs font-bold mr-3">Info</span>
                            <span class="font-semibold mr-2 text-center flex-auto">
                                <?= $_SESSION['successUpload']; ?>
                            </span>
                        </div>
                    </div>
                    <?php unset($_SESSION['successUpload']); ?>
                <?php endif; ?>

                <!-- Ajout d'Image -->
                <form action="admin/controllers/upload.php" enctype="multipart/form-data" method="post" class="col-span-3 flex justify-center">
                    <?php require_once('admin/components/customInputIlmage.php'); ?>
                    <button class="bg-emerald-200 hover:bg-emerald-300 text-emerald-700 font-bold py-2 px-4 rounded inline-flex items-center">
                        <?php require_once('admin/utils/upload.php'); ?>
                        <input type="submit" class="cursor-pointer" value="Envoyer !" id="submit">
                    </button>
                </form>

                <!-- Liste des images -->
                <section class="col-span-3 w-full h-full grid grid-cols-3 place-items-center gap-5 p-5">
                    <header class="col-span-3 text-center text-2xl font-medium"><span class="underline">Liste des images : </span> 🖼️</header>
                    <?php
                    if (count($images) != 0) :
                        foreach ($images as $image) :
                    ?>
                            <!-- Création de la carte qui contiendra l'image ! -->
                            <div class="col-span-1 max-w-sm rounded overflow-hidden shadow-lg relative">
                                <img class="w-[300px] h-[200px] object-cover" src="<?= 'admin/uploads/' . $image['url'] ?>" alt="Photo" />
                                <div class="absolute bottom-1 right-2 p-1">
                                    <!-- Nécessite un formulaire avec un checkbox fantôme pour le like : -->
                                    <input id="default-checkbox" type="checkbox" value="vote" class="w-4 h-4 overflow-hidden rounded text-blue-600 bg-gray-100 rounded border-gray-300 dark:bg-gray-700">
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
                                Nous n'avons pas d'image à vous proposer 😥
                            </span>
                        </div>
                    <?php endif; ?>
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