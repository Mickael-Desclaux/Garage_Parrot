<?php

namespace App\Repository;

use App\Entity\Car;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Car>
 *
 * @method Car|null find($id, $lockMode = null, $lockVersion = null)
 * @method Car|null findOneBy(array $criteria, array $orderBy = null)
 * @method Car[]    findAll()
 * @method Car[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }

    public function save(Car $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Car $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    public function paginationQuery()
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.id', 'ASC')
            ->getQuery();
    }

    public function findCarsByFilter($filter)
    {
        $queryBuilder = $this->createQueryBuilder('car');

        if ($filter->getPrice() !== null) {
            if (!empty($filter->getPrice()->getPriceMin())) {
                $queryBuilder
                    ->andWhere('car.price >= :price_min')
                    ->setParameter('price_min', $filter->getPrice()->getPriceMin());
            }

            if (!empty($filter->getPrice()->getPriceMax())) {
                $queryBuilder
                    ->andWhere('car.price <= :price_max')
                    ->setParameter('price_max', $filter->getPrice()->getPriceMax());
            }
        }

        if (!empty($filter->getBrand())) {
            $brand = preg_replace('/[^a-zA-Z0-9\s]/', '', $filter->getBrand());
            $brand = str_replace(' ', '-', $brand);
            $queryBuilder
                ->andWhere('car.brand LIKE :brand')
                ->setParameter('brand', '%' . $brand . '%');
        }

        if ($filter->getYear() !== null) {
            if (!empty($filter->getYear()->getYearMin()) && is_numeric($filter->getYear()->getYearMin())) {
                $queryBuilder
                    ->andWhere('car.year >= :year_min')
                    ->setParameter('year_min', $filter->getYear()->getYearMin());
            }

            if (!empty($filter->getYear()->getYearMax()) && is_numeric($filter->getYear()->getYearMax())) {
                $queryBuilder
                    ->andWhere('car.year <= :year_max')
                    ->setParameter('year_max', $filter->getYear()->getYearMax());
            }
        }

        if ($filter->getMileage() !== null) {
            if (!empty($filter->getMileage()->getMileageMin()) && is_numeric($filter->getMileage()->getMileageMin())) {
                $queryBuilder
                    ->andWhere('car.year <= :year_max')
                    ->setParameter('year_max', $filter->getMileage()->getMileageMin());
            }

            if (!empty($filter->getMileage()->getMileageMax()) && is_numeric($filter->getMileage()->getMileageMax())) {
                $queryBuilder
                    ->andWhere('car.year >= :year_min')
                    ->setParameter('year_min', $filter->getMileage()->getMileageMax());
            }
        }

        if ($filter->getHorsepower() !== null) {
            if (!empty($filter->getHorsepower()->getHorsepowerMin()) && is_numeric($filter->getHorsepower()->getHorsepowerMin())) {
                $queryBuilder
                    ->andWhere('car.horsepower >= :horsepower_min')
                    ->setParameter('horsepower_min', $filter->getHorsepower()->getHorsepowerMin());
            }

            if (!empty($filter->getHorsepower()->getHorsepowerMax()) && is_numeric($filter->getHorsepower()->getHorsepowerMax())) {
                $queryBuilder
                    ->andWhere('car.horsepower <= :horsepower_max')
                    ->setParameter('horsepower_max', $filter->getHorsepower()->getHorsepowerMax());
            }
        }

        if (!empty($filter->getEnergy())) {
            $queryBuilder
                ->andWhere('car.energy = :energy')
                ->setParameter('energy', $filter->getEnergy());
        }


        if (!empty($filter->getGearbox())) {
            $queryBuilder
                ->andWhere('car.gearbox = :gearbox')
                ->setParameter('gearbox', $filter->getGearbox());
        }

        if (!empty($filter->getDoors())) {
            $queryBuilder
                ->andWhere('car.doors = :doors')
                ->setParameter('doors', $filter->getDoors());
        }

        dump($queryBuilder->getQuery()->getSQL());
        return $queryBuilder->getQuery();
    }
}
