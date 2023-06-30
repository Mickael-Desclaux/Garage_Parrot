<?php

namespace App\DTO;

class YearDTO
{
    public $year_min;
    public $year_max;

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
}