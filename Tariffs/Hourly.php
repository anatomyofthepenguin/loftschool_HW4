<?php

namespace Tariff;

require_once 'Tariff.php';
require_once __DIR__ . '/../Services/AddDriver.php';

use Tariff\Abstracts\Tariff;
use Tariff\Traits\AddDriver;

class Hourly extends Tariff
{
    use AddDriver;

    const PRICE_PER_KILOMETER = 0;
    const PRICE_PET_TIME_UNITE = 200;

    protected $pricePerKilometer;
    protected $pricePerTimeUnite;

    public function __construct(float $distance, int $time, int $age, array $services = [])
    {
        parent::__construct($distance, $time, $age, $services);
        $this->pricePerKilometer = self::PRICE_PER_KILOMETER;
        $this->pricePerTimeUnite = self::PRICE_PET_TIME_UNITE;
    }

    public function setTime(int $time)
    {
        if ($time < 0) {
            throw new \Exception("Ошибка: Время не может быть меньше 0");
        }

        $hours= ceil($time / 60 / 60);

        $this->time = $hours;
    }
}
