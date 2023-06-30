<?php

namespace App\DTO;

class MileageDTO
{
    public $mileage_min;
    public $mileage_max;

    public function getMileageMin()
    {
        return $this->mileage_min;
    }

    public function setMileageMin($mileage_min): self
    {
        $this->mileage_min = $mileage_min;

        return $this;
    }

    public function getMileageMax()
    {
        return $this->mileage_max;
    }

    public function setMileageMax($mileage_max): self
    {
        $this->mileage_max = $mileage_max;

        return $this;
    }
}