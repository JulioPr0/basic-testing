<?php

namespace App\AutomationTesting\models;

class Rocket
{
    public function __construct(
        private string $name,
        private string $engineStatus = 'inactive'
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEngineStatus(): string
    {
        return $this->engineStatus;
    }

    public function setEngineStatus(string $engineStatus): void
    {
        $this->engineStatus = $engineStatus;
    }


}
