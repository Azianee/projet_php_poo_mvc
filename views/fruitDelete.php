<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Suppression d'un fruit - Wikifruit</title>
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
            <h1 class=text-center>Suppression d'un fruit</h1>
        </div>
    </div>

    <!-- Contenu -->
    <div class="row">

        <div class="col-12 alert alert-success fw-bold text-center">

            Le fruit a bien été supprimé !
            <br>
            <a href="<?= PUBLIC_PATH ?>/fruits/liste/">Revenir à la liste des fruits</a>

        </div>

    </div>

</div>


<!-- Inclusion du contenu du fichier footer.php -->
<?php include VIEWS_DIR . '/partials/footer.php'; ?>
</body>
</html>