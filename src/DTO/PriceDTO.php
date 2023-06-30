<?php

namespace App\DTO;

class PriceDTO
{
    public $price_min;
    public $price_max;

    public function getPriceMin()
    {
        return $this->price_min;
    }

    public function setPriceMin($price_min): self
    {
        $this->price_min = $price_min;

        return $this;
    }

    public function getPriceMax()
    {
        return $this->price_max;
    }

    public function setPriceMax($price_max): self
    {
        $this->price_max = $price_max;

        return $this;
    }
}