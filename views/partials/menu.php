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
                <!----Lien vers la page d'inscription --->
                <li class="nav-item">
                    <a class="nav-link<?= (ROUTE == '/creer-un-compte/') ? ' active' : '' ?>" href="<?= PUBLIC_PATH ?>/creer-un-compte/">Inscription</a>
                </li>

            </ul>

        </div>

    </div>

</nav>