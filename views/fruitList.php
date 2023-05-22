<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Liste des fruits - Wikifruit</title>
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
            <h1 class=text-center>Liste des fruits</h1>
        </div>
    </div>

    <!-- Contenu -->
    <div class="row">

        <div class="col-12">

            <?php

            // S'il n'y a pas de fruit, message en conséquence
            if(empty($fruits)){

                echo '<div class="alert alert-info fw-bold text-center">Il n\'y a pas de fruit à afficher pour le moment !</div>';

            } else {

                ?>

                <table class="col-12 table table-bordered text-center table-hover">

                    <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Fruit</th>
                        <th>Couleur</th>
                        <th>Pays d'origine</th>
                        <th>Prix /kg</th>
                        <th>Fiche</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php

                    // Pour chaque fruit, on crée une nouvelle ligne "<tr>" composée de 6 "<td>" (pour chaque info du fruit)
                    foreach($fruits as $fruit){
                        ?>

                        <!-- Affichage des infos du fruit (avec htmlspecialchars pour se protéger des failles XSS) -->
                        <tr>
                            <td><?= htmlspecialchars( $fruit->getId() ) ?></td>
                            <td><?= ucfirst( htmlspecialchars( $fruit->getName() ) ) ?></td>
                            <td><?= ucfirst( htmlspecialchars( $fruit->getColor() ) ) ?></td>
                            <td><?= ucfirst( htmlspecialchars( $fruit->getOrigin() ) ) ?></td>
                            <td><?= htmlspecialchars( number_format( $fruit->getPricePerKilo(), 2, ',', ' ' ) ) ?>€</td>
                            <td><a href="<?= PUBLIC_PATH ?>/fruits/fiche/?id=<?= htmlspecialchars( $fruit->getId() ) ?>">Voir la fiche</a></td>
                        </tr>

                        <?php
                    }

                    ?>
                    </tbody>

                </table>

                <?php

            }

            ?>

        </div>

    </div>

</div>


<!-- Inclusion du contenu du fichier footer.php -->
<?php include VIEWS_DIR . '/partials/footer.php'; ?>
</body>
</html>