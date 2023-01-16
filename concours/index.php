<!-- This page is accessible by users and admin  -->

<?php
session_start(); // Start a PHP session
require_once('config/crud.php'); // Load an external PHP file named "crud.php", which contains database management functions
$images = getAllImages(); // Stores the result of the "getAllImages" function in a variable named "$images"
$email = $_SESSION['user']; // Stores the email of the currently logged in user in a variable named "$email"
$userId = getUserIdByEmail($email); // "getUserIdByEmail" function to retrieve the ID of the currently logged in user from his email address
$authentification = getUserAuthByEmail($email); // "getUserAuthByEmail" function to retrieve a value to know if the user is admin or not
$banned = getBannedUser($userId); // "getBannedUser" function returns the value that lets us know if the user is ban

if (isset($_SESSION['time'])) { // Verification of the existence of the variable then assignment to $time
    $time = $_SESSION['time'];
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

<body <?php if (!isset($_SESSION['user'])) : ?> class="relative z-auto w-full h-full bg-stone-700" <?php endif; ?>>
    <!-- We check if the user is logged in -->
    <?php if (isset($_SESSION['user'])) : ?>
        <!-- True Content Once logged in :) -->
        <section class="w-full h-full bg-white">
            <header class="w-full h-fit bg-gray-200 inline-flex items-center justify-between flex-nowrap">
                <h1 class="text-2xl ml-3">Concours Photo 📸</h1>

                <!-- We check if the logged in user is an administrator -->
                <?php if ($_SERVER['REQUEST_URI'] == "/SAE-302/concours/index.php" && ($authentification['auth'] === "admin")): ?>
                <a class="nav-link active" aria-current="page" href="/SAE-302/concours/admin.php" style="text-indent: 185px ; color: red ; font-size: 23px">Page Admin 📂</a>
                <?php endif ?>
                
                <!-- Displaying the user's email and the button to log out -->
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
                <!-- Informational Message -->
                <article class="col-span-3 h-fit mt-5 mx-5 shadow-xl p-4 rounded overflow-hidden">
                    <section class=" w-fit h-fit mx-auto">
                        <header class="text-xl font-bold text-center">Bienvenue ! 🎊🎊🎊</header>
                        <br />
                        <div id="temps_restant">
                            <?php
                                // displays the remaining time
                                echo "<strong>&#8987 EN ATTENTE DU RAFFRA&#206CHISSEMENT DE LA PAGE &#8987</strong>";
                            ?>
                        </div>
                        <script src="\SAE-302\concours\admin\js\timer_update.js"></script>

                        <!-- Redirection to the different pages according to the variable timer  -->
                        <?php 
                        
                        if ($time == 1)
                            {
                                header('Location: /SAE-302/concours/phase_envoi.php');
                                die();
                            }
                            elseif ($time == 2)
                            {
                                header('Location: /SAE-302/concours/phase_timeout.php');
                                die();
                            }
                            elseif ($time == 3)
                            {
                                header('Location: /SAE-302/concours/phase_vote.php');
                                die();
                            }
                            elseif ($time == 4)
                            {
                                header('Location: /SAE-302/concours/phase_result.php');
                                die();
                            }
                        ?>

                        <br />
                    </section>
                    <hr class="my-4 mx-16 h-px bg-gray-200 border-0 dark:bg-gray-700">
                    <section class=" w-fit h-fit mx-auto">
                        <header class="text-xl font-bold text-center">Conditions de participation 📝</header>
                        <p class="text-center">
                            <br />
                            Lors du vote, personne ne pourra connaître le nom des photographes en 🌱.
                            <br />
                            Les images seront affichées lorsque le timer sera écoulé. Vous aurez alors quelques jours pour voter !!
                            <br />
                            Le nom de du gagnant sera donc dévoilé à la fin du concours ! 🎉
                            <br />
                            Pensez à bien vérifier votre photo lors de votre participation au concours !
                            <br />
                            Vous ne pourrez y participer qu'une seule fois !
                            <br />
                            Pour les personnes qui participeront au concours, votre photo doit être unique.
                            <br />
                            Interdiction de la récupérer sur Internet ( des vérifications seront faites ) !
                            <br />
                            Ne vous amusez pas à poster des images n'ayant aucun rapport avec le thème du concours !
                            <br />
                            Le nom et prénom des personnes ayant posté seront connus !
                            <br />
                            <br />
                        </p>
                    </section>
                    <hr class="my-4 mx-16 h-px bg-gray-200 border-0 dark:bg-gray-700">
                    <section class=" w-fit h-fit mx-auto">
                    <header class="text-xl font-bold text-center">Explications 🤔❓</header>
                        <p class="text-center">
                            <br />
                            Cette année <strong>le thème du concours est <u>votre ville d'origine</u></strong>.
                            <br />
                            Juste en dessous, nous vous proposons de voter pour l'image que vous aimez.
                            <br />
                            Toutefois, si vous désirez participer, nous vous offrons la possibilité de le faire !
                            <br />
                            Pour cela, choisissez votre image à partir du bouton ci-dessous 👇.
                            <br />
                            Une fois votre image téléchargée, les utilisateurs pourront alors voter pour votre image.
                            <br />
                            <strong>Si vous voulez voir l'image en format réel faites un click droit sur l'image,</strong>
                            <br />
                            <strong>puis "Ouvrir l'image dans un nouvel onglet".</strong>
                            <br />
                            <br />
                        </p>
                    </section>
                </article>

                <!-- Verification of user banishment -->
                <?php
                if ($banned['banned'] > 0){
                    $_SESSION['errorUpload'] = array();
                    array_push($_SESSION['errorUpload'], "Votre participation ne sera pas retenue pour cause de non conformité !");
                } 
                ?>

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
</div>
</html>