<?php

namespace Models\DAO;

use Models\DTO\Fruit;
use PDO;

/**
 * Classe DAO servant à gérer et à faire l'interface entre les objets "Fruit" et la base de données
 */
class FruitManager{

    /**
     * Stockage dans cet attribut d'une instance de PDO de connexion active à la base de données
     */
    private PDO $db;

    /**
     * Getter/setter
     */
    public function getDb(): PDO
    {
        return $this->db;
    }

    public function setDb(PDO $db): void
    {
        $this->db = $db;
    }

    /**
     * On se sert du constructeur pour hydrater l'attribut $db avec une instance de connexion à la BDD (récupérée via la fonction connectDb())
     */
    public function __construct()
    {
        $this->db = connectDb();
    }


    /**
     * Méthode servant à créer un nouveau fruit dans la base de données à partir d'un objet de la classe "Fruit"
     */
    public function save(Fruit $fruitToSave): void
    {

        // Requête préparée pour l'insertion
        $insertFruit = $this->db->prepare('INSERT INTO fruit(name, color, origin, price_per_kilo, user_id, description) VALUES(?, ?, ?, ?, ?, ?)');

        // Execution de la requête en envoyant les données à partir de l'objet à sauvegarder
        $insertFruit->execute([
            $fruitToSave->getName(),
            $fruitToSave->getColor(),
            $fruitToSave->getOrigin(),
            $fruitToSave->getPricePerKilo(),
            $fruitToSave->getUser()->getId(),
            $fruitToSave->getDescription(),
        ]);

        // Fermeture de la requête
        $insertFruit->closeCursor();

    }
    /**
     * Méthode pour récupérer la liste de tous les fruits
     */
    public function findAll(): array
    {

        // Requête directe SQL (pas préparée car pas de variable dans la requête)
        $getFruits = $this->db->query('SELECT * FROM fruit');

        // Récupération de tous les fruits sous la forme d'arrays associatifs
        $fruits = $getFruits->fetchAll( PDO::FETCH_ASSOC );

        // Fermeture de la requête
        $getFruits->closeCursor();

        // Création d'un nouvel array qui contiendra tous les fruits sous la forme d'objets de la classe "Fruit"
        $convertedFruits = [];

        // Récupération du manager des utilisateurs
        $userManager = new UserManager();

        // Pour chaque "fruit-array" dans $fruits, on crée un nouveau "fruit-objet" (de la classe Fruit) à insérer dans $convertedFruits
        foreach($fruits as $fruit){

            // Récupération de l'objet de l'auteur du fruit
            $author = $userManager->findOneBy('id', $fruit['user_id']);

            // Création d'un nouvel objet Fruit pour matérialiser le fruit extrait dans la boucle
            $convertedFruit = new Fruit();

            // Hydratation
            $convertedFruit
                ->setId( $fruit['id'] )
                ->setName( $fruit['name'] )
                ->setColor( $fruit['color'] )
                ->setOrigin( $fruit['origin'] )
                ->setPricePerKilo( $fruit['price_per_kilo'] )
                ->setUser( $author )
                ->setDescription( $fruit['description'] )
            ;

            // On ajoute le nouvel objet dans l'array $convertedFruits
            $convertedFruits[] = $convertedFruit;

        }

        // On retourne le tableau contenant tous les fruits sous la forme d'objets de la classe "Fruit"
        return $convertedFruits;

    }
    /**
     * Méthode permettant de récupérer un Fruit trouvé dans la base de données par rapport à la valeur d'un champ
     * Par exemple : récupérer le fruit dont le nom est "ananas"
     */
    public function findOneBy(string $field, $value): ?Fruit
    {

        // Requête SQL préparée pour sélectionner le fruit dont le champ $field contient la valeur $value
        $getFruit = $this->db->prepare('SELECT * FROM fruit WHERE ' . $field . ' = ?');

        // Execution de la requête en envoyant la valeur
        $getFruit->execute([
            $value,
        ]);

        // Récupération du fruit trouvé sous la forme d'un array associatif
        $foundFruit = $getFruit->fetch(PDO::FETCH_ASSOC);

        // Fermeture de la requête
        $getFruit->closeCursor();

        // Si un utilisateur a bien été trouvé, on le convertit en "objet" de la classe "User"
        if(!empty($foundFruit)){

            // Récupération du manager des utilisateurs
            $userManager = new UserManager();

            // Récupération de l'objet de l'auteur du fruit
            $author = $userManager->findOneBy('id', $foundFruit['user_id']);

            $convertedFruit = new Fruit();

            // Hydratation de "lobjet à partir des données de l'array
            $convertedFruit
                ->setId( $foundFruit['id'] )
                ->setName( $foundFruit['name'] )
                ->setColor( $foundFruit['color'] )
                ->setOrigin( $foundFruit['origin'] )
                ->setPricePerKilo( $foundFruit['price_per_kilo'] )
                ->setUser( $author )
                ->setDescription( $foundFruit['description'] )
            ;

        }

        // On retourne la variable $convertedUser si elle existe, sinon "null"
        return $convertedFruit ?? null;

    }
    /*
     * Méthode permettant de supprimer un fruit dans la base de données
     */
    public function delete(Fruit $fruitToDelete): void
    {
        // Requête SQL préparée pour supprimer le fruit dont l'id correspond à celui du fruit dans l'objet
        $deleteFruit = $this->db->prepare('DELETE FROM fruit WHERE id = ?');

        // Execution de la requête en envoyant la valeur de l'id
        $deleteFruit->execute([
            $fruitToDelete->getId(),
        ]);

        // Fermeture de la requête
        $deleteFruit->closeCursor();
    }

}