<?php

namespace Natalia\WarehouseRobot\Model;

use InvalidArgumentException;

class Robot 
{
	public Coordinates $coordinates;

	public function __construct()
	{
		$this->coordinates = new Coordinates(0,0);
	}

	public function getCoordinates() 
	{
		return $this->coordinates;
	}

	public function move(string $instruction, Warehouse $warehouse) 
	{
		if (strlen($instruction) == 0) 
		{
			return;
		}

		$commandsList = explode(" ", $instruction);
		if ($this->hasInvalidCommand($commandsList)) 
		{
			throw new InvalidArgumentException("Unknown instruction found!");
		}

		foreach ($commandsList as $command) 
		{
			if ($command == "N") {
				if (($this->coordinates->getY() + 1) < $warehouse->getLength()) 
				{
					$this->coordinates->up();
				}

			} else if ($command == "E") {
				if (($this->coordinates->getX() + 1) < $warehouse->getWidth()) 
				{
					$this->coordinates->right();
				}

			} else if ($command == "W") {
				if ($this->coordinates->getX() - 1 >= 0) 
				{
					$this->coordinates->left();
				}
			
			}  else if ($command == "S") {
				if ($this->coordinates->getY() - 1 >= 0) 
				{
					$this->coordinates->down();
				}
				

			}
		}

	}

	private function hasInvalidCommand($commandsList)
	{
		$eligibleCommands = ["N", "E", "S", "W"];
		return empty(array_intersect($commandsList, $eligibleCommands));
	}
}