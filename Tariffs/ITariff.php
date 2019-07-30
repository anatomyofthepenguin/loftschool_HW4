<?php

namespace Tariff\Interfaces;

interface ITariff
{
    public function getPrice();
    public function setDistance(float $distance);
    public function setAge(int $age);
    public function setTime(int $time);
}
