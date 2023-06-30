<?php

namespace App\DTO;

class HorsepowerDTO
{
    public $horsepower_min;
    public $horsepower_max;

    public function getHorsepowerMin()
    {
        return $this->horsepower_min;
    }

    public function setHorsepowerMin($horsepower_min): self
    {
        $this->horsepower_min = $horsepower_min;

        return $this;
    }

    public function getHorsepowerMax()
    {
        return $this->horsepower_max;
    }

    public function setHorsepowerMax($horsepower_max): self
    {
        $this->horsepower_max = $horsepower_max;

        return $this;
    }
}