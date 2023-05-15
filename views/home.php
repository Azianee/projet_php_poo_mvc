<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Acuueil-Wikifruits</title>

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
            <h1 class=text-center>Accueil - Wikifruit</h1>
        </div>
    </div>

    <!-- Contenu -->
    <div class="row">

        <div class="col-12 mb-5">

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore eius facere fuga fugiat, hic perferendis repellat sapiente. Adipisci asperiores aut cumque deleniti eveniet minima quaerat quos suscipit ullam. Blanditiis consequuntur distinctio iure labore magnam minima molestiae rerum veritatis voluptatibus voluptatum. Et excepturi similique unde. Ad aut beatae ipsa rerum vel?</p>

            <div class="d-flex justify-content-around flex-wrap home-fruits">
                <img src="<?= PUBLIC_PATH ?>/images/banane.jpg" alt="Image de banane">
                <img src="<?= PUBLIC_PATH ?>/images/kiwi.jpg" alt="Image de kiwi">
                <img src="<?= PUBLIC_PATH ?>/images/orange.jpg" alt="Image d'orange">
            </div>

        </div>

    </div>

</div>



<!---Inclusion du contenu du fichier header.php--->
<?php include VIEWS_DIR . '/partials/footer.php'; ?>
</body>
</html>