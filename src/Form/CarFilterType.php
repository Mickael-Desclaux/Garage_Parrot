<?php

namespace App\Form;

use App\Entity\Car;
use App\Form\YearRangeType;
use App\Form\PriceRangeType;
use App\Form\MileageRangeType;
use App\Form\HorsepowerRangeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class CarFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('price', PriceRangeType::class, [
                'label' => 'Prix'
            ])

            ->add('brand', EntityType::class, [
                'class' => Car::class,
                'choice_label' => 'brand',
                'placeholder' => 'Marque',
                'multiple' => 'true'
            ])

            ->add('year', YearRangeType::class, [
                'label' => 'Année'
            ])

            ->add('mileage', MileageRangeType::class, [
                'label' => 'Kilométrage'
            ])

            ->add('horsepower', HorsepowerRangeType::class, [
                'label' => 'Puissance'
            ])

            ->add('energy', EntityType::class, [
                'class' => Car::class,
                'choice_label' => 'energy',
                'placeholder' => 'Énergie',
                'multiple' => 'true'
            ])

            ->add('gearbox', EntityType::class, [
                'class' => Car::class,
                'choice_label' => 'gearbox',
                'placeholder' => 'Boîte de vitesse',
                'multiple' => 'true'
            ])

            ->add('doors', EntityType::class, [
                'class' => Car::class,
                'choice_label' => 'doors',
                'placeholder' => 'Nombre de portes',
                'multiple' => 'true'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
