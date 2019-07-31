<?php

namespace Tariff;

require_once 'Tariff.php';

use Tariff\Abstracts\Tariff;

class Base extends Tariff
{
    const PRICE_PER_KILOMETER = 10;
    const PRICE_PET_TIME_UNITE = 3;

    protected $pricePerKilometer;
    protected $pricePerTimeUnite;

    public function __construct(float $distance, int $time, int $age, array $services = [])
    {
        parent::__construct($distance, $time, $age, $services);
        $this->pricePerKilometer = self::PRICE_PER_KILOMETER;
        $this->pricePerTimeUnite = self::PRICE_PET_TIME_UNITE;
    }
}
