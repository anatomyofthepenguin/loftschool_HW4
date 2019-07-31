<?php

namespace Tariff\Abstracts;

require 'TariffInterface.php';
require __DIR__ . '/../Services/AddGps.php';
require_once __DIR__ . '/../Services/Service.php';

use Tariff\Interfaces\TariffInterface;
use Tariff\Traits\AddGps;
use Tariff\Abstracts\Service;

abstract class Tariff implements TariffInterface
{
    use AddGps;

    const SERVICE_GPS = 1;
    const SERVICE_DRIVER = 2;

    protected $pricePerKilometer;
    protected $pricePerTimeUnite;
    protected $coefficientByAge = 1;
    protected $distance;
    protected $time;
    protected $driverAge;
    protected $servicePrice = 0;

    public function __construct(float $distance, int $time, int $age, array $services = [])
    {
        $this->setDistance($distance);
        $this->setTime($time);
        $this->setAge($age);

        if ($services) {
            $this->setServicePrice($services, $time);
        }
    }

    public function setDistance($distance)
    {
        if ($distance < 0) {
            throw new \Exception("Ошибка: Расстояние не может быть меньше 0");
        }

        $this->distance = $distance / 1000;
    }

    public function setAge($age)
    {
        if ($age < 18 || $age > 65) {
            throw new \Exception("Ошибка: Возраст должен быть в промежутке от 18 до 65");
        }

        if ($age < 22) {
            $this->coefficientByAge = 1.1;
        }

        $this->driverAge = $age;
    }

    public function setTime(int $time)
    {
        if ($time < 0) {
            throw new \Exception("Ошибка: Время не может быть меньше 0");
        }

        $minutes = ceil($time / 60);

        $this->time = $minutes;
    }

    public function getPrice()
    {
        $resultSum =
            ($this->pricePerKilometer * $this->distance + $this->pricePerTimeUnite * $this->time + $this->servicePrice) * $this->coefficientByAge;
        return round($resultSum, 2);
    }

    protected function setServicePrice(array $services, int $time)
    {
        foreach ($services as $service) {
            if (!$service instanceof Service) {
                throw new \Exception("Ошибка: услуга должна быть объектом класса Service");
            }
            if ($service->getType() === self::SERVICE_GPS) {
                $this->addGps($service, $time);
            } elseif ($service->getType() === self::SERVICE_DRIVER) {
                if (!method_exists($this, "addDriver")) {
                    throw new \Exception("Ошибка: Данная услуга не доступна в тарифе");
                }
                $this->addDriver($service);
            } else {
                throw new \Exception("Ошибка: Неизвестная услуга");
            }
        }
    }
}
