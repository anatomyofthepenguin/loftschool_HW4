<?php

namespace Tariff\Traits;

require_once 'Service.php';

use Tariff\Abstracts\Service;

trait AddDriver
{
    protected function addDriver(Service $service)
    {
        $this->servicePrice += $service->getPrice();
    }
}
