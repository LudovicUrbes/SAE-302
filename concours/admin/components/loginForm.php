<div class="z-10 absolute w-[400px] h-[350px] left-[calc(50%-(400px/2))] top-[calc(60vh-(400px/2))]">
    <form action="admin/controllers/login.php" method="POST" class="w-full h-full">
        <section class="drop-shadow-xl rounded-lg overflow-hidden">
            <div class="bg-white px-4 py-5 sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <!-- Title -->
                    <h2 class="text-xl text-center col-span-6">Connexion</h2>

                    <!-- Error Message -->
                    <?php if (!empty($_SESSION['errorLogin'])) : ?>
                        <div class="col-span-6 text-center" role="alert">
                            <div class="p-2 bg-red-500 items-center text-red-100 leading-none rounded flex inline-flex overflow-hidden" role="alert">
                                <span class="flex rounded-full bg-red-600 uppercase px-2 py-1 text-xs font-bold mr-3">Erreur</span>
                                <span class="font-semibold mr-2 text-center flex-auto">
                                    <?php foreach ($_SESSION['errorLogin'] as $error) : ?>
                                        <?= $error; ?>
                                    <?php unset($_SESSION['errorLogin']);
                                    endforeach; ?>
                                </span>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Email -->
                    <div class="col-span-6">
                        <label for="email" class="block text-sm font-medium text-gray-700">Adresse email</label>
                        <input type="email" name="email" id="email" autocomplete="email" class="mt-1 w-full outline-none border-b-2 border-gray-300 text-base" required>
                    </div>

                    <!-- Password -->
                    <div class="col-span-6">
                        <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                        <?php require_once('customPasswordField.php'); ?>
                    </div>
                </div>
            </div>
            <div class="bg-gray-100 px-4 py-3 text-right sm:px-6">
                <button type="submit" name="login_button" class="rounded-md border border-transparent bg-green-500 hover:bg-green-600 focus:bg-green-600 py-2 px-4 text-sm font-medium text-white shadow-md outline-none active:bg-green-700">Se Connecter</button>
            </div>
        </section>
    </form>
</div>