<?php

namespace Models\DTO;


/**
 * Classe DTO (attributs + getters/setters) matérialisant les fruits du site
 */
class Fruit{

    private int $id;
    private string $name;
    private string $color;
    private string $origin;
    private float $pricePerKilo;
    private User $user;
    private string $description;


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

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;
        return $this;
    }

    public function getOrigin(): string
    {
        return $this->origin;
    }

    public function setOrigin(string $origin): self
    {
        $this->origin = $origin;
        return $this;
    }

    public function getPricePerKilo(): float
    {
        return $this->pricePerKilo;
    }

    public function setPricePerKilo(float $pricePerKilo): self
    {
        $this->pricePerKilo = $pricePerKilo;
        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

}