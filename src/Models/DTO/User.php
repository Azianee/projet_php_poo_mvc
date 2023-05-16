<?php

namespace Models\DTO;

use DateTime;

/**
 * Classe DTO (attributs + getters + setters) matérialisant les utilisateurs du site
 */
class User{

    private int $id;
    private string $email;
    private string $password;
    private DateTime $registerDate;
    private string $firstname;
    private string $lastname;


    /**
     * Getters/setters
     */

    public function getId(): int
    {
        return $this->id;
    }


    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }


    public function getEmail(): string
    {
        return $this->email;
    }


    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }


    public function getPassword(): string
    {
        return $this->password;
    }


    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }


    public function getRegisterDate(): DateTime
    {
        return $this->registerDate;
    }


    public function setRegisterDate(DateTime $registerDate): self
    {
        $this->registerDate = $registerDate;
        return $this;
    }


    public function getFirstname(): string
    {
        return $this->firstname;
    }


    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }


    public function getLastname(): string
    {
        return $this->lastname;
    }


    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }

}