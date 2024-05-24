<?php

namespace App\AutomationTesting;

class RocketLauncher
{
    public function __construct(private array $rocket = [])
    {

    }

    public function getRocket(): array
    {
        return $this->rocket;
    }

    public function setRocket(array $rocket): void
    {
        $this->rocket = $rocket;
    }



    public function launchAllRockets(): void {
        foreach ($this->rocket as $rocket) {
            $rocket->setEngineStatus('active');
        }

        $this->setRocket([]);
    }

    public function launchRocketByQueue(): void {
        $rocket = array_shift($this->rocket);
        $rocket->setEngineStatus('active');
    }
}
