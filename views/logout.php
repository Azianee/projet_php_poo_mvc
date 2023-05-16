<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Deconnexion -Wikifruits</title>

    <!---Inclusion du contenu du fichier header.php--->
   <?php include VIEWS_DIR . '/partials/header.php';?>

</head>
<body>
<!--- Inclusion du menu ---->
<?php include VIEWS_DIR . '/partials/menu.php'; ?>


<!-- Grille Bootstrap avec le contenu principal de la page -->
<div class="container">

    <!-- Titre h1 -->
    <div class="row my-5">
        <div class="col-12">
            <h1 class=text-center>Déconnexion</h1>
        </div>
    </div>


    <!-- Contenu -->
    <div class="row">

        <div class="col-12">
            <p class="text-center alert alert-warning fw-bold">Vous avez bien été déconnecté de votre compte !</p>
        </div>
        <?php

        // Affichage message de succès s'il existe, sinon affichage formulaire
        if (isset($success)){
        ?>
            <div class="alert alert-success text-center fw-bold"> <?=$success?></div>

        <?php


        }else {

        ?>

        <div class="col-12 col-md-6 mx-auto">

            <form action="<?= PUBLIC_PATH ?>/Deconnexion/" method="POST">

                <?php
                // Affichage des erreurs s'il y en a
                if (isset($errors)){
                    foreach ($errors as $error){
                        echo '<div class="alert alert-danger">' . $error .' </div>';
                    }
                }
                ?>

            </form>

        </div>

        <?php
        }
        ?>
    </div>
    </div>



<!---Inclusion du contenu du fichier header.php--->
<?php include VIEWS_DIR . '/partials/footer.php'; ?>
</body>
</html>