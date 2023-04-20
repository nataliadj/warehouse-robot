<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use \Natalia\WarehouseRobot\WarehouseManager;

$allowedCommands = ["N", "E", "S", "W"];

if (isset($argc)) {
    $instruction = "";
    for ($i = 1; $i < $argc; $i++) {
        if (!in_array($argv[$i], $allowedCommands)) {
            exit("Unknown instruction [".$argv[$i]."]. Please only use [\"N\", \"E\", \"S\", \"W\"]");
        }
        $instruction = $instruction.$argv[$i]." ";
    }
    $manager = new WarehouseManager();
    $manager->moveRobot(trim($instruction));

    echo "Robot is currently at coordinates ".$manager->getRobotCoordinates();

} else {
    echo "argc and argv disabled\n";
}
