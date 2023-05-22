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

}