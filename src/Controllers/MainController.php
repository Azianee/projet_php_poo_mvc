<?php

// Espace de mon correspondant à l'emplacement physique du fichier dans le projet (dans le dossier "src")
namespace Controllers;

// Importation des classes utilisées

use DateTime;
use Models\DAO\UserManager;
use Models\DTO\User;

/**
 * Classe contenant tous les contrôleurs de notre site
 */
class MainController
{

    /**
     * Contrôleur de la page d'accueil
     */
    public function home(): void
    {
// Charge la vue "home.php" dans le dossier "views"
        require VIEWS_DIR . '/home.php';
    }

    /**
     * Contrôleur de la page d'inscription
     */
    public function register(): void
    {
        //TODO : rediriger sur l'accueil si on est deja connecté

        // Taitement du formulaire d'inscription

        // Appel des variables
        if (
            isset($_POST['email']) &&
            isset($_POST['password']) &&
            isset($_POST['confirm-password']) &&
            isset($_POST['firstname']) &&
            isset($_POST['lastname'])
        ) {

            // Vérifs
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Adresse email invalide';
            }

            if (!preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[ !"#\$%&\'()*+,\-.\/:;<=>?@[\\\\\]\^_`{\|}~]).{8,4096}$/u', $_POST['password'])) {
                $errors[] = 'Mot de passe invalide';
            }

            if ($_POST['password'] != $_POST['confirm-password']) {
                $errors[] = 'La confirmation ne correspond pas au mot de passe';
            }

            if (mb_strlen($_POST['firstname']) < 2 || mb_strlen($_POST['firstname']) > 50) {
                $errors[] = 'Le prénom est invalide (entre 2 et 50 caractères)';
            }

            if (mb_strlen($_POST['lastname']) < 2 || mb_strlen($_POST['lastname']) > 50) {
                $errors[] = 'Le nom est invalide (entre 2 et 50 caractères)';
            }

            // Si pas d'erreurs
            if (!isset($errors)) {


                // Créer un nouvel utilisateur

                $newUserToinsert = new User();

                //Date actuelle (pour hydrater la date d'inscription)
                $today = new DateTime();
                // Hydratation
                $newUserToinsert
                    ->setEmail($_POST['email'])
                    ->setPassword(password_hash($_POST ['password'], PASSWORD_BCRYPT))
                    ->setFirstname($_POST['firstname'])
                    ->setLastname($_POST['lastname'])
                    ->setRegisterDate($today);

                // Instanciation du manager des users
                $userManager = new UserManager();

                // On demande au manager de sauvegarder notre nouvel utilisateur dans la BDD
                $userManager->save($newUserToinsert);

                // Message de succès
                $success = 'Votre compte a bien été créé !';
            }

        }

        // Charge la vue "register.php" dans le dossier "views"
        require VIEWS_DIR . '/register.php';

    }


    /**
     * Contrôleur de la page 404
     */

    public function page404(): void
    {

        // Modifie le code HTTP pour qu'il soit bien 404 et non 200
        header('HTTP/1.1 404 Not Found');
        require VIEWS_DIR . '/404.php';
    }


}