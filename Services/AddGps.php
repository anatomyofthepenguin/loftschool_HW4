<?php

namespace Tariff\Traits;

require_once 'Service.php';

use Tariff\Abstracts\Service;

trait AddGps
{
    protected function addGps(Service $service, int $time)
    {
        $this->servicePrice += $service->getPrice() * ceil($time / 60);
    }
}
