<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Mon Profil - Wikifruit</title>
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
            <h1 class=text-center>Mon profil</h1>
        </div>
    </div>

    <!-- Contenu -->
    <div class="row">

        <div class="col-12 col-lg-6 mx-auto">

            <table class="table table-bordered">

                <tbody>

                <tr>
                    <td class="fw-bold w-50">Adresse email :</td>
                    <td><?= htmlspecialchars($_SESSION['user']->getEmail()) ?>></td>
                </tr>

                <tr>
                    <td class="fw-bold w-50">Prénom :</td>
                    <td><?= htmlspecialchars($_SESSION['user']->getFirstname()) ?></td>
                </tr>

                <tr>
                    <td class="fw-bold w-50">Nom :</td>
                    <td><?= htmlspecialchars($_SESSION['user']->getLastname()) ?></td>
                </tr>

                <tr>
                    <td class="fw-bold w-50">Date d'inscription :</td>

                  <!--  Pas besoin de mettre htmlspecialchars car il s'agit d'un objet "DateTime" qui ne peut être qu'une date valide-->
                    <td><?= $_SESSION['user']->getRegisterDate()->format('d/m/Y à H:i:s') ?></td>
                </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>


<!-- Inclusion du contenu du fichier footer.php -->
<?php include VIEWS_DIR . '/partials/footer.php'; ?>
</body>
</html>