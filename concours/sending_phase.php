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
        <input type="submit" class="cursor-pointer" value="Envoyer votre photo !" id="submit">
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
            <form method="post" action="/SAE-302/concours/index.php" class="col-span-3 grid grid-cols-3 place-items-center w-full h-fit gap-y-5">
                <div class="col-span-1 max-w-sm rounded overflow-hidden shadow-lg relative mb-5 h-fit w-fit mx-auto">
                    <img onclick="zoomImage()" class="w-[300px] h-[200px] object-cover" src="<?= 'admin/uploads/' . $image['url'] ?>" alt="Photo" />
                    <div class="absolute bottom-1 right-2 p-1">
                        <input id="default-checkbox" type="radio" value="<?php echo $image['id'] ?>" name="choix" class="w-4 h-4 overflow-hidden rounded text-blue-600 bg-gray-100 rounded border-gray-300 dark:bg-gray-700">
                    </div>
                </div>
                <?php endforeach; ?>
                <button class="col-span-3 w-fit h-fit bg-green-200 hover:bg-green-300 text-green-700 font-bold py-2 px-4 rounded inline-flex items-center">
                    <input type="submit" class="cursor-pointer" value="Effectuez votre vote !" name="submit">
                </button>
            </form>

            <?php
                if (isset($_POST['submit']))
                {                                     
                    $bdd = getPDO();
                    $sql_2 = "SELECT vote_possible FROM users WHERE id = :userId";
                    $req_2 = $bdd->prepare($sql_2);
                    $req_2->bindParam(":userId", $userId['id']);
                    $req_2->execute();
                    $data = $req_2->fetch(PDO::FETCH_ASSOC);
                    var_dump($data);

                    if ($data['vote_possible'] == 0) {
                        
                        $bdd = getPDO();
                        $sql = "UPDATE images SET likes = likes +1 WHERE id = :choix";
                        $req = $bdd->prepare($sql);
                        $req->bindParam(":choix", $_POST['choix']);
                        $req->execute();

                        $sql_3 = "UPDATE users SET vote_possible = vote_possible+1 WHERE id = :userId";
                        $req_3 = $bdd->prepare($sql_3);
                        $req_3->bindParam(":userId", $userId['id']);
                        $req_3->execute();

                        $_SESSION['successUpload'] = 'Vote accepté avec succès.';

                    } else {

                        array_push($_SESSION['errorUpload'], "Vous avez déjà voté pour une photo !");
                    }
                } 
            ?>

    <?php else : ?>
        <div class="col-span-3 p-2 bg-yellow-500 items-center text-yellow-100 leading-none rounded flex inline-flex overflow-hidden" role="alert">
            <span class="flex rounded-full bg-yellow-600 uppercase px-2 py-1 text-xs font-bold mr-3">Attention</span>
            <span class="font-semibold mr-2 text-center flex-auto">
                Nous n'avons pas encore d'image à vous proposer 😥
            </span>
        </div>
    <?php endif; ?>
</section>