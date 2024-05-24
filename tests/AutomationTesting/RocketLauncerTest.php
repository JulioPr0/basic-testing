<?php

namespace Tests\AutomationTesting;

use App\AutomationTesting\models\Rocket;
use App\AutomationTesting\RocketLauncer;
use PHPUnit\Framework\TestCase;

class RocketLauncerTest extends TestCase
{
    /**
     * it should launch all rockets
     */
    public function testLaunchAllRockets()
    {

        // Arrange
        $nasaRocket = new Rocket('Nasa');
        $spaceXRocket = new Rocket('SpaceX');
        $rocketLauncher = new RocketLauncer([$nasaRocket, $spaceXRocket]);

        // Action
        $rocketLauncher->launchAllRockets();

        // Assert
        self::assertEquals('active', $nasaRocket->getEngineStatus());
        self::assertEquals('active', $spaceXRocket->getEngineStatus());
        self::assertCount(0, $rocketLauncher->getRockets());
    }
}
