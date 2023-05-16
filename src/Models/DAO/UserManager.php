<?php

namespace Models\DAO;

use PDO;
use Models\DTO\User;
USE DateTime;

/**
 * Classe DAO servant à gérer et à faire l'interface entre les objets "User" et la base de données
 */
class UserManager{
    private PDO $db;

    public function getDb(): PDO
    {
        return $this->db;
    }
    public function setDb(PDO $db): void
    {
        $this->db = $db;
    }

    public function __construct()
    {
        $this->db = connectedDb();
    }

    /**
     * Méthode servant à créer un nouvel utilisateur dans la base de données à partir d'un objet de la classe "User"
     */
    public function save(User $userToSave): void
    {

        // Connexion à la base de données
        $db = new PDO('mysql:host=localhost;dbname=wikifruit_mvc_poo;charset=utf8', 'root', '');

        // Requête préparée pour l'insertion
        $insertUser = $this->db->prepare('INSERT INTO user(email, password, register_date, firstname, lastname) VALUES(?, ?, ?, ?, ?)');

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
    /**
     * Méthode permettant de récupérer un User trouvé dans la base de données par rapport à la valeur d'un champ
     * Par exemple : récupérer l'utilisateur dont l'email est "a@a.a"
     */
    public function findOneBy(string $field, $value): ?User
    {

        // Requête SQL préparée pour sélectionner l'utilisateur dont le champ $field contient la valeur $value
        $getUser = $this->db->prepare('SELECT * FROM user WHERE ' . $field . ' = ?');

        // Execution de la requête en envoyant la valeur
        $getUser->execute([
            $value,
        ]);

        // Récupération de l'utilisateur trouvé sous la forme d'un array associatif
        $foundUser = $getUser->fetch(PDO::FETCH_ASSOC);

        // Fermeture de la requête
        $getUser->closeCursor();

        // Si un utilisateur a bien été trouvé, on le convertit en "objet" de la classe "User"
        if(!empty($foundUser)){

            $convertedUser = new User();

            // Hydratation de "lobjet à partir des données de l'array
            $convertedUser
                ->setId( $foundUser['id'] )
                ->setEmail( $foundUser['email'] )
                ->setPassword( $foundUser['password'] )
                ->setFirstname( $foundUser['firstname'] )
                ->setLastname( $foundUser['lastname'] )
                ->setRegisterDate( new DateTime( $foundUser['register_date'] ) )
            ;

        }

        // On retourne la variable $convertedUser si elle existe, sinon "null"
        return $convertedUser ?? null;

    }
}