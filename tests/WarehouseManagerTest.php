<?php

namespace Natalia\WarehouseRobot;

use PHPUnit\Framework\TestCase;

final class WarehouseManagerTest extends TestCase 
{
    private ?WarehouseManager $manager;

    protected function setUp() : void
    {
        $this->manager = new WarehouseManager();
    }

    public function testRobotStartingCoordinates()
    {
        $this->assertEquals("[0, 0]", $this->manager->getRobotCoordinates());
    }

    public function testMoveRobotChangesCoordinates()
    {
    	$this->manager->moveRobot("N E N E N S W");
        $this->assertEquals("[1, 2]", $this->manager->getRobotCoordinates());
    }
}