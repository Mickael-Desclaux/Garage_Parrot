<?php

namespace App\Service;

use App\Entity\OpeningHours;
use Doctrine\Persistence\ManagerRegistry;

class OpeningHoursService
{
    private ManagerRegistry $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getOpeningHours(): array
    {
        $repository = $this->doctrine->getRepository(OpeningHours::class);
        return $repository->findAll();
    }
}
