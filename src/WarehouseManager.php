<?php

namespace Natalia\WarehouseRobot;

use Natalia\WarehouseRobot\Model\Warehouse;
use Natalia\WarehouseRobot\Model\Robot;

class WarehouseManager 
{
	private $warehouse, $robot;

	public function __construct() {
		$this->warehouse = new Warehouse(10, 10);
		$this->robot = new Robot();
	}

	public function getRobotCoordinates(): string {
		$coords = $this->robot->coordinates;
		return "[".$coords->getX().", ".$coords->getY()."]";
	}

	public function moveRobot($instruction) {
		return $this->robot->move($instruction, $this->warehouse);
	}
}