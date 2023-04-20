<?php

namespace Natalia\WarehouseRobot\Model;

class Warehouse 
{
	private int $length;
	private int $width;

	public function __construct($length, $width)
	{
		$this->length = $length;
		$this->width = $width;
	}

	public function getWidth()
	{
		return $this->width;
	}

	public function getLength()
	{
		return $this->length;
	}
}
