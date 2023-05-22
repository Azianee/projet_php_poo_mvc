<!-- Menu principal du site -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark main-navbar">

    <div class="container-fluid">


        <!----Titre cliquable vers l'accueil --->
        <a class="navbar-brand fs-2" href="<?= PUBLIC_PATH ?>/"><i class="fa-solid fa-lemon main-logo me-2"></i>Wikifruit</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                <!----Lien vers la page d'accueil --->
                <li class="nav-item">
                    <a class="nav-link<?= (ROUTE == '/') ? ' active' : '' ?>" href="<?= PUBLIC_PATH ?>/">Accueil</a>
                </li>

                <!----TODO: Penser à masquer ce bouton si l'utilisateur est connecté--->
                <?php

                // Si l'utilisateur est connecté
                if (isConnected()) {
                    ?>

                    <!----Lien vers la page de mon-profil --->
                    <li class="nav-item">
                        <a class="nav-link<?= (ROUTE == '/mon-profil/') ? ' active' : '' ?>"
                           href="<?= PUBLIC_PATH ?>/mon-profil/">Mon profil</a>
                    </li>

                    <!----Lien vers la page de déconnexion --->
                    <li class="nav-item">
                        <a class="nav-link<?= (ROUTE == '/deconnexion/') ? ' active' : '' ?>"
                           href="<?= PUBLIC_PATH ?>/deconnexion/">Déconnexion</a>
                    </li>

                    <!----Lien vers la page d'ajout d'un fruit --->
                    <li class="nav-item">
                        <a class="nav-link<?= (ROUTE == '/fruits/ajouter-un-fruit/') ? ' active' : '' ?>"
                           href="<?= PUBLIC_PATH ?>/fruits/ajouter-un-fruit/">Ajouter un fruit</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link<?= (ROUTE == '/fruits/liste/') ? ' active' : '' ?>"
                           href="<?= PUBLIC_PATH ?>/fruits/liste/">liste des fruits</a>
                    </li>

                    <?php

                } else {
                    ?>
                    <!----Lien vers la page de connexion --->
                    <li class="nav-item">
                        <a class="nav-link<?= (ROUTE == '/connexion/') ? ' active' : '' ?>"
                           href="<?= PUBLIC_PATH ?>/connexion/">Connexion</a>
                    </li>

                    <!----Lien vers la page d'inscription --->
                    <li class="nav-item">
                        <a class="nav-link<?= (ROUTE == '/creer-un-compte/') ? ' active' : '' ?>"
                           href="<?= PUBLIC_PATH ?>/creer-un-compte/">Inscription</a>
                    </li>



                    <?php

                }
                ?>
            </ul>


        </div>

    </div>

</nav>