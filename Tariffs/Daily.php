<?php

namespace Tariff;

require_once 'Tariff.php';
require_once  __DIR__ . '/../Services/AddDriver.php';

use Tariff\Abstracts\Tariff;
use Tariff\Traits\AddDriver;

class Daily extends Tariff
{
    use AddDriver;

    const PRICE_PER_KILOMETER = 1;
    const PRICE_PET_TIME_UNITE = 1000;

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

        $fullMinutes = ceil($time / 60);
        $fullHours = $fullMinutes / 60;
        $days = floor($fullHours / 24);
        $hours = $fullHours - $days * 24;
        $minutes = $fullMinutes - $hours * 60;

        if ($days < 1) {
            $this->time = 1;
        } elseif ($minutes > 29) {
            $this->time = $days + 1;
        } else {
            $this->time = $days;
        }
    }
}
