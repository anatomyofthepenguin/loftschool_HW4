<?php

namespace Tariff\Abstracts;

abstract class Service
{
    protected $price;
    protected $type;

    public function getPrice()
    {
        return $this->price;
    }

    public function getType()
    {
        return $this->type;
    }
}
