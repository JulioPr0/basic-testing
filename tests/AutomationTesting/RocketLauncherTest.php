<?php

namespace Tests\AutomationTesting;

use App\AutomationTesting\models\Rocket;
use App\AutomationTesting\RocketLauncher;
use PHPUnit\Framework\TestCase;

class RocketLauncherTest extends TestCase
{
    public function testLaunchAllRockets()
    {
        // arrange
        $nasaRocket = new Rocket("nasa");
        $spaceXRocket = new Rocket("space X");
        $rocketLauncher = new RocketLauncher([$nasaRocket, $spaceXRocket]);

        // action
        $rocketLauncher->launchAllRockets();

        // assert
        self::assertEquals("active", $nasaRocket->getEngineStatus());
        self::assertEquals("active", $spaceXRocket->getEngineStatus());
        self::assertCount(0, $rocketLauncher->getRocket());
    }
}
