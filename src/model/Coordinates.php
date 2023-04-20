<?php

namespace Natalia\WarehouseRobot\Model;

class Coordinates
{
	private int $coordinateX;
	private int $coordinateY;

	public function __construct($x, $y)
	{
		$this->coordinateX = $x;
		$this->coordinateY = $y;
	}

	public function getX()
	{
		return $this->coordinateX;
	}

	public function getY()
	{
		return $this->coordinateY;
	}

	public function up()
	{
		return $this->coordinateY += 1;
	}

	public function down()
	{
		return $this->coordinateY -= 1;
	}

	public function right()
	{
		return $this->coordinateX += 1;
	}

	public function left()
	{
		return $this->coordinateX -= 1;
	}
}