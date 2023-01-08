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
    <link rel="stylesheet" type="text/css" href="/SAE-302/concours/admin/css/style.css">
    <title>Concours Photo | IUT Châtellerault</title>
</head>

<body <?php if (!isset($_SESSION['user'])) : ?> class="relative z-auto w-full h-full bg-stone-700" <?php endif; ?>>
    <?php if (isset($_SESSION['user'])) : ?>
        <!-- Vrai Contenu Une fois connecté :) -->
        <section class="w-full h-full bg-white">
            <header class="w-full h-fit bg-gray-200 inline-flex items-center justify-between flex-nowrap">
                <h1 class="text-2xl ml-3">Page Admin 📂</h1>
                <h1 class="text-2xl ml-3" style="text-indent: 200px"> <a href ="/SAE-302/concours/index.php" style="color: red" >Concours Photo </a>📸</h1>
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
                        <header class="text-xl font-bold text-center">Bienvenue sur la Page d'Administration ! 🎊🎊🎊</header>
                        <br />
                        <div id="temps_restant">
                            <?php
                                // affiche le temps restant
                                echo "<strong>&#8987 EN ATTENTE DU RAFFRA&#206CHISSEMENT DE LA PAGE</strong>";
                            ?>
                        </div>
                        <script>
                          // met à jour le contenu de l'élément HTML toutes les secondes (1000 millisecondes)
                          setInterval(function() {
                            // crée une nouvelle instance de l'objet XMLHttpRequest
                            var xhttp = new XMLHttpRequest();

                            // définit la fonction à exécuter lorsque la réponse est prête
                            xhttp.onreadystatechange = function() {
                              // vérifie si la réponse est prête et valide
                              if (this.readyState == 4 && this.status == 200) {
                                // récupère le contenu de l'élément HTML
                                var temps_restant = document.getElementById("temps_restant");

                                // remplace le contenu de l'élément HTML par le nouveau contenu
                                temps_restant.innerHTML = this.responseText;
                              }
                            };

                            // envoie une requête HTTP GET au serveur pour mettre à jour le timer
                            xhttp.open("GET", "timer_update.php", true);
                            xhttp.send();
                          }, 1000);
                        </script>
                    </section>
                    <hr class="my-4 mx-16 h-px bg-gray-200 border-0 dark:bg-gray-700">
                    <section class=" w-fit h-fit mx-auto">
                        <header class="text-xl font-bold text-center"> Utilité de la page 📝</header>
                        <p class="text-center">
                            Depuis cette page vous pouvez supprimer des photos si elles ne correspondent aux réglements.
                            <br />
                            Vous pouvez aussi avoir un aperçu sur les votes et les noms des participants.
                            <br />
                            <br />
                            Pour faire correspondre les images et le nom des participants.
                            <br />
                            Veuillez vous référer à l'identifiant de l'image indiqué sur celle-ci,
                            <br />
                            Puis à l'aide de ce numéro aidez-vous du tableau qui se trouve en bas de page,
                            <br />
                            Pour pouvoir faire le lien entre l'identifiant de l'image et l'étudiant 
                            <br />
                            Ce qui permettra de sanctionner si des images non conformes sont postées
                            <br />
                            Pour supprimer une photo, il vous suffit de sélectionner le bouton sur la photo,
                            <br />
                            Et de cliquer sur le bouton "Supprimer la photo sélectionnée "
                            <br />
                            <strong>Si vous voulez voir l'image en format réel faites un click droit sur l'image,</strong>
                            <br />
                            <strong>puis "Ouvrir l'image dans un nouvel onglet".</strong>
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
                            <form method="post" action="/SAE-302/concours/admin.php" class="col-span-3 grid grid-cols-3 place-items-center w-full h-fit gap-y-5">
                                <div class="col-span-1 max-w-sm rounded overflow-hidden shadow-lg relative mb-5 h-fit w-fit mx-auto">
                                    <img class="w-[300px] h-[200px] object-cover" src="<?= 'admin/uploads/' . $image['url'] ?>" alt="Photo" />
                                    <h1 style="font-size: 25px;" class="absolute top-1 left-2 text-white">ID image : <strong><?php echo $image['id'] ?></strong></h1>
                                    <div class="absolute bottom-1 right-2 p-1">
                                        <input id="default-checkbox" type="radio" value="<?php echo $image['id'] ?>" name="choix" class="w-4 h-4 overflow-hidden rounded text-blue-600 bg-gray-100 rounded border-gray-300 dark:bg-gray-700">
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <button class="col-span-3 w-fit h-fit bg-red-200 hover:bg-red-300 text-red-700 font-bold py-2 px-4 rounded inline-flex items-center">
                                    <input type="submit" class="cursor-pointer" value="Supprimer la photo sélectionnée !" name="submit">
                                </button>
                            </form>

                        <?php 
                            if (isset($_POST['submit']))
                            {
                                $bdd = getPDO();
                                $sql = "DELETE FROM images WHERE id = :choix";
                                $req = $bdd->prepare($sql);
                                $req->bindParam(":choix", $_POST['choix']);
                                $req->execute();
                            }    
                        ?>
                        <!--
                            <div class="col-span-3 p-2 bg-green-500 items-center text-green-100 leading-none rounded flex inline-flex overflow-hidden" role="alert">
                                <span class="flex rounded-full bg-green-600 uppercase px-2 py-1 text-xs font-bold mr-3">Réussite</span>
                                <span class="font-semibold mr-2 text-center flex-auto">
                                    Vous avez bien supprimer l'image sélectionée &#x1F44D;
                                </span>
                            </div>

                        <?php // else : ?>

                            <div class="col-span-3 p-2 bg-red-500 items-center text-red-100 leading-none rounded flex inline-flex overflow-hidden" role="alert">
                                <span class="flex rounded-full bg-red-600 uppercase px-2 py-1 text-xs font-bold mr-3">Attention</span>
                                <span class="font-semibold mr-2 text-center flex-auto">
                                    Vous n'avez pas réussi à supprimer l'image 😥
                                </span>
                            </div>

                        <?php // endif; ?>
                        -->
                        
                    <?php else : ?>
                        
                        <div class="col-span-3 p-2 bg-yellow-500 items-center text-yellow-100 leading-none rounded flex inline-flex overflow-hidden" role="alert">
                            <span class="flex rounded-full bg-yellow-600 uppercase px-2 py-1 text-xs font-bold mr-3">Attention</span>
                            <span class="font-semibold mr-2 text-center flex-auto">
                                Nous n'avons pas encore d'image à vous proposer 😥
                            </span>
                        </div>
                    <?php endif; ?>
                </section>
                <section class="col-span-3 h-fit mx-5">
                    <h1 style ="font-family: Arial, sans-serif; font-size: 27px; color: #333; text-align: center; text-transform: uppercase;">Tableau des scores </h1>
                    </br>
                    <div>
                        <table class="rounded-lg bg-white-700 border-separate border-spacing-1 border">
                        <?php

                            $bdd = getPDO();
                            $req = $bdd->query("SELECT id, likes, url, user_id FROM images ORDER BY likes DESC");
                            $req->execute();
                            $donnees = $req->fetchAll(PDO::FETCH_ASSOC);
                            $req->closeCursor();                           
                        ?>

                        <thead>
                            <tr>
                                <th class="rounded-tl-lg bg-gray-400" scope="col">Identifiant de l'image </th>
                                <th class="bg-gray-400" scope="col">Nombre de likes </th>
                                <th class="bg-gray-400" scope="col">Url de l'image </th>
                                <th class="rounded-tr-lg bg-gray-400" scope="col">Identifiant de l'utilisateur </th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php for ($i = 0; $i < count($donnees); $i++): ?>
                           <?php if ($i == count($donnees)-1): ?>
                           <tr>
                              <td class="rounded-bl-lg bg-gray-100"> <?=$donnees[$i]['id'];?></td>
                              <td class="bg-gray-300"> <?=$donnees[$i]['likes'];?></td>
                              <td class="bg-gray-100"> <?=$donnees[$i]['url'];?></td>
                              <td class="rounded-br-lg bg-gray-300"> <?=getUserEmailById($donnees[$i]['user_id'])['email'];?></td>
                           </tr>
                           <?php else : ?>
                           <tr>
                              <td class="bg-gray-100"> <?=$donnees[$i]['id'];?></td>
                              <td class="bg-gray-300"> <?=$donnees[$i]['likes'];?></td>
                              <td class="bg-gray-100"> <?=$donnees[$i]['url'];?></td>
                              <td class="bg-gray-300"> <?=getUserEmailById($donnees[$i]['user_id'])['email'];?></td>
                           </tr>
                           <?php endif ?>
                           <?php endfor ?>
                        </tbody>
                        </table>
                </section>
                <br/>
                <br/>    
            </section>
        </section>
    <?php else : ?>
        <!-- Contenu 
        <section class="grid grid-cols-3 place-items-center py-64 blur-sm w-full h-full">
            <article class=" col-span-3 text-white">
                <h1 class="text-lg">Félicitations !</h1>
                <p>Tu as perdu ton temps je crois...</p>
            </article>
        </section>
        -->

        <!-- LoginForm -->
        <?php require_once('admin/components/loginForm.php'); ?>

        <!-- Script -->
        <script src="./admin/js/togglePassword.js"></script>
    <?php endif; ?>
</body>

</html>