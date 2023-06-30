<?php

namespace App\DTO;

class CarFilterDTO
{
    public $brand;

    public $year;

    public $year_min;

    public $year_max;

    public $mileage;

    public $mileage_min;

    public $mileage_max;

    public $horsepower;

    public $horsepower_min;

    public $horsepower_max;

    public $energy;

    public $gearbox;

    public $doors;

    public $price;

    public $price_min;

    public $price_max;


    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setYear($year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getYearMin()
    {
        return $this->year_min;
    }

    public function setYearMin($year_min): self
    {
        $this->year_min = $year_min;

        return $this;
    }

    public function getYearMax()
    {
        return $this->year_max;
    }

    public function setYearMax($year_max): self
    {
        $this->year_max = $year_max;

        return $this;
    }

    public function getMileage()
    {
        return $this->mileage;
    }

    public function setMileage($mileage): self
    {
        $this->mileage = $mileage;

        return $this;
    }

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

    public function getHorsepower()
    {
        return $this->horsepower;
    }

    public function setHorsepower($horsepower): self
    {
        $this->horsepower = $horsepower;

        return $this;
    }

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

    public function getEnergy()
    {
        return $this->energy;
    }

    public function setEnergy($energy): self
    {
        $this->energy = $energy;

        return $this;
    }

    public function getGearbox()
    {
        return $this->gearbox;
    }

    public function setGearbox($gearbox): self
    {
        $this->gearbox = $gearbox;

        return $this;
    }

    public function getDoors()
    {
        return $this->doors;
    }

    public function setDoors($doors): self
    {
        $this->doors = $doors;

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): self
    {
        $this->price = $price;

        return $this;
    }

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
