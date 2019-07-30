<?php

require 'Tariffs/Base.php';
require 'Tariffs/Student.php';
require 'Tariffs/Hourly.php';
require 'Tariffs/Daily.php';
require_once 'Services/Driver.php';
require_once 'Services/GPS.php';

use Tariff\Base;
use Tariff\Student;
use Tariff\Hourly;
use Tariff\Daily;
use Tariff\Service\GPS;
use Tariff\Service\Driver;

$base = new Base(2100, 5000, 26, [new GPS()]);
$student = new Student(2100, 5000, 25);
$hourly = new Hourly(2100, 5000, 26, [new GPS(), new Driver()]);
$daily = new Daily(2100, 88100, 21);

echo "<pre>";
var_dump($base->getPrice());
var_dump($student->getPrice());
var_dump($hourly->getPrice());
var_dump($daily->getPrice());
echo "<pre>";
