<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Ajouter un fruit-Wikifruit</title>

    <!---Inclusion du contenu du fichier header.php--->
    <?php include VIEWS_DIR . '/partials/header.php'; ?>

</head>
<body>
<!--- Inclusion du menu ---->
<?php include VIEWS_DIR . '/partials/menu.php'; ?>


<!-- Grille Bootstrap avec le contenu principal de la page -->
<div class="container">

    <!-- Titre h1 -->
    <div class="row my-5">
        <div class="col-12">
            <h1 class=text-center>Ajouter un fruit</h1>
        </div>
    </div>


    <!-- Contenu -->
    <div class="row">

        <?php

        // Affichage message de succès s'il existe, sinon affichage formulaire
        if (isset($success)) {
            ?>
            <div class="alert alert-success text-center fw-bold"> <?= $success ?></div>

            <?php


        } else {

            ?>

            <div class="col-12 col-md-6 mx-auto">

                <!--            ici il faut faire attention il faut changer le / et mettre le bon lien-->
                <form action="<?= PUBLIC_PATH ?>/fruits/ajouter-un-fruit/" method="POST">

                    <?php
                    // Affichage des erreurs s'il y en a
                    if (isset($errors)) {
                        foreach ($errors as $error) {
                            echo '<div class="alert alert-danger">' . $error . ' </div>';
                        }
                    }
                    ?>


                    <div class="mb-3">
                        <label class="form-label" for="name">Nom</label>
                        <input name="name" id="name" class="form-control" type="text">
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="color">Couleur</label>
                        <input name="color" id="color" class="form-control" type="text">
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="origin">Pays d'origine</label>
                        <input name="origin" id="origin" class="form-control" type="text">
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="price-per-kilo">Prix aux kilo</label>
                        <input name="price-per-kilo" id="price-per-kilo" class="form-control" type="text">
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                    </div>


                    <div class="mb-3">
                        <input type="submit" class="btn btn-success w-100 btn-lg">
                    </div>

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