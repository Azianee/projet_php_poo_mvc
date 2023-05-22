<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Modifier un fruit - Wikifruit</title>
    <!-- Inclusion du contenu du fichier header.php -->
    <?php include VIEWS_DIR . '/partials/header.php'; ?>
</head>
<body>

<!-- Inclusion du menu -->
<?php include VIEWS_DIR . '/partials/menu.php'; ?>


<!-- Grille Bootstrap avec le contenu principal de la page -->
<div class="container">

    <!-- Titre h1 -->
    <div class="row my-5">
        <div class="col-12">
            <h1 class=text-center>Modifier un fruit</h1>
        </div>
    </div>

    <!-- Contenu -->
    <div class="row">

        <!-- Lien de retour à la liste des fruits -->
        <div class="col-12 my-3 text-center">
            <a href="<?= PUBLIC_PATH ?>/fruits/fiche/?id=<?= htmlspecialchars( $_GET['id'] ) ?>">Revenir à la fiche du fruit</a>
        </div>

        <?php

        // Affichage message de succès s'il existe, sinon affichage formulaire
        if(isset($success)){
            ?>

            <div class="alert alert-success text-center fw-bold"><?= $success ?></div>

            <?php

        } else {

            ?>

            <div class="col-12 col-md-6 mx-auto">

                <form action="<?= PUBLIC_PATH ?>/fruits/modifier/?id=<?= htmlspecialchars( $_GET['id'] ) ?>" method="POST">

                    <?php

                    // Affichage des erreurs s'il y en a
                    if(isset($errors)){

                        foreach($errors as $error){

                            echo '<div class="alert alert-danger">' . $error . '</div>';

                        }

                    }

                    ?>

                    <div class="mb-3">
                        <label class="form-label" for="id">ID</label>
                        <input disabled value="<?= htmlspecialchars($fruitToEdit->getId()) ?>" id="id" class="form-control" type="text">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="name">Nom</label>
                        <input value="<?= htmlspecialchars($fruitToEdit->getName()) ?>" name="name" id="name" class="form-control" type="text">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="color">Couleur</label>
                        <input value="<?= htmlspecialchars($fruitToEdit->getColor()) ?>" name="color" id="color" class="form-control" type="text">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="origin">Pays d'origine</label>
                        <input value="<?= htmlspecialchars($fruitToEdit->getOrigin()) ?>" name="origin" id="origin" class="form-control" type="text">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="price-per-kilo">Prix au kilo</label>
                        <input value="<?= htmlspecialchars($fruitToEdit->getPricePerKilo()) ?>" name="price-per-kilo" id="price-per-kilo" class="form-control" type="text">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10"><?= htmlspecialchars($fruitToEdit->getDescription()) ?></textarea>
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


<!-- Inclusion du contenu du fichier footer.php -->
<?php include VIEWS_DIR . '/partials/footer.php'; ?>
</body>
</html>