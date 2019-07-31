<?php

namespace Tariff;

require_once 'Tariff.php';

use Tariff\Abstracts\Tariff;

class Student extends Tariff
{
    const PRICE_PER_KILOMETER = 4;
    const PRICE_PET_TIME_UNITE = 1;

    protected $pricePerKilometer;
    protected $pricePerTimeUnite;

    public function __construct(float $distance, int $time, int $age, array $services = [])
    {
        parent::__construct($distance, $time, $age, $services);
        $this->pricePerKilometer = self::PRICE_PER_KILOMETER;
        $this->pricePerTimeUnite = self::PRICE_PET_TIME_UNITE;
    }

    public function setAge($age)
    {
        if ($age > 25) {
            throw new \Exception("Ошибка: На тарифе 'Студентческий',возраст водителя не может быть больше 25");
        }
        parent::setAge($age);
    }
}
