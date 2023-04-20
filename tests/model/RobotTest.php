<?php

namespace Natalia\WarehouseRobot\Model;

use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

final class RobotTest extends TestCase 
{
	private ?Robot $robot;

    protected function setUp() : void
    {
        $this->robot = new Robot();
    }
	
    public function testRobotStartsAtZeroZero()
    {
    	$coords = $this->robot->getCoordinates();
        $this->assertEquals(0, $coords->getX());
        $this->assertEquals(0, $coords->getY());
    }

    public function testRobotDoesNotMoveWithNoInstruction()
    {
        $this->robot->move("", new Warehouse(10, 10));

        $coords = $this->robot->getCoordinates();
        $this->assertEquals(0, $coords->getX());
        $this->assertEquals(0, $coords->getY());
    }

    public function testRobotDoesNotMoveWithUnknownInstruction()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->robot->move("T", new Warehouse(10, 10));
    }

    public function testRobotMovesUpWithNorth()
    {
        $this->robot->move("N", new Warehouse(10, 10));

        $coords = $this->robot->getCoordinates();
        $this->assertEquals(0, $coords->getX());
        $this->assertEquals(1, $coords->getY());
    }

    public function testRobotMovesRightWithEast()
    {
        $this->robot->move("E", new Warehouse(10, 10));

        $coords = $this->robot->getCoordinates();
        $this->assertEquals(1, $coords->getX());
        $this->assertEquals(0, $coords->getY());
    }

    public function testRobotMovesNorthThenSouth()
    {
        $this->robot->move("N S", new Warehouse(10, 10));

        $coords = $this->robot->getCoordinates();
        $this->assertEquals(0, $coords->getX());
        $this->assertEquals(0, $coords->getY());
    }

    public function testRobotMovesEastThenWest()
    {
        $this->robot->move("E W", new Warehouse(10, 10));

        $coords = $this->robot->getCoordinates();
        $this->assertEquals(0, $coords->getX());
        $this->assertEquals(0, $coords->getY());
    }

    public function testRobotMovesToFiveFive()
    {
        $this->robot->move("N E N E N E N E N E", new Warehouse(10, 10));

        $coords = $this->robot->getCoordinates();
        $this->assertEquals(5, $coords->getX());
        $this->assertEquals(5, $coords->getY());
    }

    public function testRobotDoesNotGoOutOfBoundsToNegative()
    {
        $this->robot->move("S W", new Warehouse(10, 10));

        $coords = $this->robot->getCoordinates();
        $this->assertEquals(0, $coords->getX());
        $this->assertEquals(0, $coords->getY());
    }

    public function testRobotDoesNotGoOutOfBoundsToOverflow()
    {
        $this->robot->move("N N N E E E", new Warehouse(2, 2));

        $coords = $this->robot->getCoordinates();
        $this->assertEquals(1, $coords->getX());
        $this->assertEquals(1, $coords->getY());
    }

}