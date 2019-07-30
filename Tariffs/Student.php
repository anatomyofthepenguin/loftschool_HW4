<?php

namespace Tariff;

require_once 'Tariff.php';

use Tariff\Abstracts\Tariff;

class Student extends Tariff
{
    protected $pricePerKilometer = 4;
    protected $pricePerTimeUnite = 1;

    public function __construct(float $distance, int $time, int $age, array $services = [])
    {
        parent::__construct($distance, $time, $age, $services);
    }

    public function setAge($age)
    {
        if ($age > 25) {
            throw new \Exception("Ошибка: На тарифе 'Студентческий',возраст водителя не может быть больше 25");
        }
        parent::setAge($age);
    }
}
