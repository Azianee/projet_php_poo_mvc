<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?= ucfirst( htmlspecialchars($fruit->getName() ) ) ?> - Wikifruit</title>
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
            <h1 class=text-center>Fiche du fruit <?= ucfirst( htmlspecialchars( $fruit->getName() ) ) ?></h1>
        </div>
    </div>

    <!-- Contenu -->
    <div class="row">

        <!-- Lien de retour à la liste des fruits -->
        <div class="col-12 my-3 text-center">
            <a href="<?= PUBLIC_PATH ?>/fruits/liste/">Revenir à la liste des fruits</a>
        </div>

        <?php

        // Affichage des liens de suppression et modification du fruit seulement si le visiteur est connecté
        if(isConnected()){

            ?>
            <div class="col-12 my-4 text-center">

                <a class="text-success me-3" href="<?= PUBLIC_PATH ?>/fruits/modifier/?id=<?= htmlspecialchars( $fruit->getId() ) ?>"><i class="fas fa-edit me-2"></i>Modifier le fruit</a>
                <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce fruit ?');" class="text-danger" href="<?= PUBLIC_PATH ?>/fruits/supprimer/?id=<?= htmlspecialchars( $fruit->getId() ) ?>"><i class="fas fa-times me-2"></i>Supprimer le fruit</a>

            </div>
            <?php
        }
        ?>

    </div>

    <!-- Affichage des infos du fruit -->
    <div class="row">

        <div class="col-12">

            <div class="card text-center">

                <div class="card-body">
                    Couleur : <b><?= ucfirst( htmlspecialchars( $fruit->getColor() ) ) ?></b>
                    |
                    Origine : <b><?= ucfirst( htmlspecialchars( $fruit->getOrigin() ) ) ?></b>
                    |
                    Prix : <b><?= htmlspecialchars( number_format( $fruit->getPricePerKilo(), 2, ',', ' ' ) ) ?>€ /kg</b>
                </div>

                <p class="card-text my-5"><?= htmlspecialchars( $fruit->getDescription() ) ?></p>

                <div class="card-footer text-muted">
                    Ce fruit a été ajouté sur le site par <b><?= ucfirst( htmlspecialchars( $fruit->getUser()->getFirstname() ) ) ?></b>
                </div>

            </div>

        </div>

    </div>

</div>


<!-- Inclusion du contenu du fichier footer.php -->
<?php include VIEWS_DIR . '/partials/footer.php'; ?>
</body>
</html>