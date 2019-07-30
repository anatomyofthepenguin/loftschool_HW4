<?php

namespace Tariff;

require_once 'Tariff.php';

use Tariff\Abstracts\Tariff;

class Base extends Tariff
{
    protected $pricePerKilometer = 10;
    protected $pricePerTimeUnite = 3;

    public function __construct(float $distance, int $time, int $age, array $services = [])
    {
        parent::__construct($distance, $time, $age, $services);
    }
}
