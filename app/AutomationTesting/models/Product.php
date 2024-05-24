<?php

namespace App\AutomationTesting\models;

class Product
{
    private string $id, $name, $description;
    private int $price, $qry;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function getQry(): int
    {
        return $this->qry;
    }

    public function setQry(int $qry): void
    {
        $this->qry = $qry;
    }

}
