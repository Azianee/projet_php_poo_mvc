<?php

namespace Models\DAO;

use PDO;
use Models\DTO\User;

/**
 * Classe DAO servant à gérer et à faire l'interface entre les objets "User" et la base de données
 */
class UserManager{

    /**
     * Méthode servant à créer un nouvel utilisateur dans la base de données à partir d'un objet de la classe "User"
     */
    public function save(User $userToSave): void
    {

        // Connexion à la base de données
        $db = new PDO('mysql:host=localhost;dbname=wikifruit_mvc_poo;charset=utf8', 'root', '');

        // Requête préparée pour l'insertion
        $insertUser = $db->prepare('INSERT INTO user(email, password, register_date, firstname, lastname) VALUES(?, ?, ?, ?, ?)');

        // Execution de la requête en envoyant les données à partir de l'objet à sauvegarder
        $insertUser->execute([
            $userToSave->getEmail(),
            $userToSave->getPassword(),
            // On envoie la date sous forme de chaîne de texte extraite de l'objet DateTime avec ->format()
            $userToSave->getRegisterDate()->format('Y-m-d H:i:s'),
            $userToSave->getFirstname(),
            $userToSave->getLastname(),
        ]);

        // Fermeture de la requête
        $insertUser->closeCursor();

    }

}