<!-- This page is only accessible by administrators  -->

<?php
session_start(); // Start a PHP session
require_once('config/crud.php'); // Load an external PHP file named "crud.php", which contains database management functions
$images = getAllImages(); // Stores the result of the "getAllImages" function in a variable named "$images"
$email = $_SESSION['user']; // Stores the email of the currently logged in user in a variable named "$email"
$userId = getUserIdByEmail($email); // "getUserIdByEmail" function to retrieve the ID of the currently logged in user from his email address
$authentification = getUserAuthByEmail($email);
$date = getAllDates();

// Check to allow access to the page user id must be equal to 100, 101, 102 otherwise it is redirected to the page index.php

if ($authentification['auth'] === "admin") {
} else {
    header('Location: /SAE-302/concours/index.php');
    die();
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

<noscript>
  JavaScript n'est pas activé. Veuillez l'activer pour afficher la page.
</noscript>

<div id="js-check" style="display: none;">
    <script>
      if (!document.getElementById('js-check')) {
      // JavaScript is not enabled, displays an error message
      document.write("JavaScript n'est pas activé. Veuillez l'activer pour afficher la page.");
    } else {
      // JavaScript is enabled, displays the page
      document.getElementById('js-check').style.display = 'block';
    }
    </script>

<body <?php if (!isset($_SESSION['user'])) : ?> class="relative z-auto w-full h-full bg-stone-700" <?php endif; ?>> <!-- User Login Verification -->
    <?php if (isset($_SESSION['user'])) : ?> <!-- User Login Verification -->
        <section class="w-full h-full bg-white">
            <header class="w-full h-fit bg-gray-200 inline-flex items-center justify-between flex-nowrap">
                <h1 class="text-2xl ml-3">Page Admin 📂</h1>
                <h1 class="text-2xl ml-3" style="text-indent: 200px"> <a href ="/SAE-302/concours/index.php" style="color: red" >Concours Photo </a>📸</h1>
                <div class="flex items-center gap-y-1">
                    <h3><?= $_SESSION['user']; ?></h3> <!-- Displaying user email -->
                    <a href="admin/controllers/logout.php">
                        <button class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded m-4"> <!-- Button to disconnect from the page -->
                            Se déconnecter
                        </button>
                    </a>
                </div>
            </header>
            <section class="grid grid-cols-3 w-full h-fit gap-y-5">
                <article class="col-span-3 h-fit mt-5 mx-5 shadow-xl p-4 rounded overflow-hidden">
                    <section class=" w-fit h-fit mx-auto">
                            <header class="text-xl font-bold text-center">Bienvenue sur la Page d'Administration ! 🎊🎊🎊</header>
                            <br />
                            <div id="temps_restant">
                                <?php
                                    // Shows the time remaining
                                    echo "<strong>&#8987 EN ATTENTE DU RAFFRA&#206CHISSEMENT DE LA PAGE</strong>";
                                ?>
                            </div>

                            <script src="\SAE-302\concours\admin\js\timer_update.js"></script>
                    </section>

                <hr class="my-4 mx-16 h-px bg-gray-200 border-0 dark:bg-gray-700">

                    <section class=" w-fit h-fit mx-auto">
                        <?php include('admin/controllers/timer_admin.php'); ?>

                        <?php
                            $date1 = date("d/m/Y H:i:s", strtotime($date[0]['fin_envoi']));
                            $date2 = date("d/m/Y H:i:s", strtotime($date[0]['debut_vote']));
                            $date3 = date("d/m/Y H:i:s", strtotime($date[0]['fin_vote']));

                            echo "<br/><br/>Fin de la période d'envoi : <strong>$date1</strong> ";
                            echo "<br/>Début de la période des votes : <strong>$date2</strong> ";
                            echo "<br/>Résultat du concours : <strong>$date3</strong>";
                        ?>

                    </section>
                    <hr class="my-4 mx-16 h-px bg-gray-200 border-0 dark:bg-gray-700">
                    <section class=" w-fit h-fit mx-auto">
                        <header class="text-xl font-bold text-center"> Utilité de la page 📝</header>  <!-- Explaining the Admin Page Utility to Administrators -->
                        <p class="text-center">
                            <br />
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

                <section class="col-span-3 w-full h-full grid grid-cols-3 place-items-center gap-5 p-5">
                    <header class="col-span-3 text-center text-2xl font-medium"><span class="underline">Liste des images : </span> 🖼️</header>
                    <?php
                        if (count($images) != 0) :
                            foreach ($images as $image) :
                    ?>
                            <!-- Displaying images in thumbnails and creating the delete feature -->
                            <form method="post" action="/SAE-302/concours/admin.php" class="col-span-3 grid grid-cols-3 place-items-center w-full h-fit gap-y-5">
                                <div class="col-span-1 max-w-sm rounded overflow-hidden shadow-lg relative mb-5 h-fit w-fit mx-auto">
                                    <img class="w-[300px] h-[200px] object-cover" src="<?= 'admin/uploads/' . $image['url'] ?>" alt="Photo" />
                                    <div style="font-size: 25px;" class="absolute top-1 left-2 rounded-md bg-black text-white">ID image : <strong><?php echo $image['id'] ?></strong></div>
                                    <div class="absolute bottom-1 right-2 p-1">
                                        <input id="default-checkbox" type="radio" value="<?php echo $image['id'] ?>" name="choix" class="w-4 h-4 overflow-hidden rounded text-blue-600 bg-gray-100 rounded border-gray-300 dark:bg-gray-700">
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <button class="col-span-3 w-fit h-fit bg-red-200 hover:bg-red-300 text-red-700 font-bold py-2 px-4 rounded inline-flex items-center"> <!-- Button to delete the selected image -->
                                    <input type="submit" class="cursor-pointer" value="Supprimer la photo sélectionnée !" name="submit">
                                </button>
                            </form>

                        <!-- Php request to delete the selected image according to its id -->

                        <?php 
                            if (isset($_POST['submit']))
                            {
                                $bdd = getPDO();
                                $sql = "SELECT user_id FROM images WHERE id = :choix";
                                $req = $bdd->prepare($sql);
                                $req->bindParam(":choix", $_POST['choix']);
                                $req->execute();
                                $image = $req->fetchAll(PDO::FETCH_ASSOC);
                                $req->closeCursor();

                                if(!empty($image)){
                                    $userId2ban = $image[0]['user_id'];
                                }

                                $sql = "UPDATE users SET banned = banned+1 WHERE id = :userId";
                                $req = $bdd->prepare($sql);
                                $req->bindParam(":userId", $userId2ban);
                                $req->execute();

                                $sql = "DELETE FROM images WHERE id = :choix";
                                $req = $bdd->prepare($sql);
                                $req->bindParam(":choix", $_POST['choix']);
                                $req->execute();
                            }    
                        ?> 

                            <!-- Displaying the Image Supression Success Message -->

                            <!--
                         
                            <div class="col-span-3 p-2 bg-blue-500 items-center text-blue-100 leading-none rounded flex inline-flex overflow-hidden" role="alert">
                                <span class="flex rounded-full bg-blue-600 uppercase px-2 py-1 text-xs font-bold mr-3">info</span>
                                <span class="font-semibold mr-2 text-center flex-auto">
                                    Vous avez bien supprimé l'image sélectionée &#x1F44D;
                                </span>
                            </div>

                            -->

                        <?php  // else : ?>

                            <!-- Displaying Image Supression Failure Message -->
                            
                            <!--

                            <div class="col-span-3 p-2 bg-red-500 items-center text-red-100 leading-none rounded flex inline-flex overflow-hidden" role="alert">
                                <span class="flex rounded-full bg-red-600 uppercase px-2 py-1 text-xs font-bold mr-3">Attention</span>
                                <span class="font-semibold mr-2 text-center flex-auto">
                                    Vous n'avez pas réussi à supprimer l'image 😥
                                </span>
                            </div>

                            -->
 
                        <?php  // endif; ?>
                        
                    <?php else : ?>
                        
                         <!-- Display an informative message if no image is displayed by the page -->

                        <div class="col-span-3 p-2 bg-yellow-500 items-center text-yellow-100 leading-none rounded flex inline-flex overflow-hidden" role="alert">
                            <span class="flex rounded-full bg-yellow-600 uppercase px-2 py-1 text-xs font-bold mr-3">Attention</span>
                            <span class="font-semibold mr-2 text-center flex-auto">
                                Nous n'avons pas encore d'image à vous proposer 😥
                            </span>
                        </div>
                    <?php endif; ?>
                </section>
                <section class="col-span-3 h-fit mx-5">
                <header class="col-span-3 text-center text-2xl font-medium"><span class="underline">Tableau des scores : </span> 📈</header>
                    </br>
                    <div>
                        <table class="rounded-lg bg-white-900 border-separate border-spacing-0.1">

                        <!-- Php request to retrieve information contained in a table to display in an array -->

                        <?php

                            $bdd = getPDO();
                            $req = $bdd->query("SELECT id, likes, url, user_id FROM images ORDER BY likes DESC");
                            $req->execute();
                            $donnees = $req->fetchAll(PDO::FETCH_ASSOC);
                            $req->closeCursor();                           
                        ?>

                        <!-- Table containing image table information to give information to administrators -->

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
                           <?php endif ; ?>
                           <?php endfor ; ?>
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


        <!-- Calling the LoginForm page to log in -->
        <?php require_once('admin/components/loginForm.php'); ?>

        <!-- Calling the Script to modify the authentication page -->
        <script src="./admin/js/togglePassword.js"></script>
    <?php endif; ?>
</body>
</div>
</html>