<?php

namespace App\Form;

use App\DTO\CarFilterDTO;
use App\Entity\Car;
use App\Form\YearRangeType;
use App\Form\PriceRangeType;
use App\Form\MileageRangeType;
use App\Form\HorsepowerRangeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CarFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('price', PriceRangeType::class, [
                'label' => 'Prix',
                'required' => false
            ])

            ->add('brand', TextType::class, [
                'label' => 'Marque',
                'required' => false
            ])

            ->add('year', YearRangeType::class, [
                'label' => 'Année',
                'required' => false
            ])

            ->add('mileage', MileageRangeType::class, [
                'label' => 'Kilométrage',
                'required' => false
            ])

            ->add('horsepower', HorsepowerRangeType::class, [
                'label' => 'Puissance',
                'required' => false
            ])

            ->add('energy', ChoiceType::class,
            ["label" => "Énergie",
            "choices" => [
            "Essence" => "Essence",
            "Gazole" => "Gazole",
            "Électrique" => "Électrique",
            "Hybride" => "Hybride",
            ],
            'multiple' => 'true',
            'required' => false
            ])

            ->add('gearbox', ChoiceType::class,
            ["label" => "Boîte de vitesse",
            "choices" => [
            "Manuelle" => "Manuelle",
            "Automatique" => "Automatique"],
            'required' => false
            ])

            ->add('doors', ChoiceType::class,
                ["label" => "Nombre de portes",
                "choices" => [
                    2 => 2,
                    3 => 3,
                    4 => 4,
                    5 => 5,
                ],
                'multiple' => 'true',
                'required' => false
            ])

            ->add ('submit', SubmitType::class, [
                'label' => 'Filtrer',
                'attr' => ['class' => 'btn btn-danger']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
            'method' => 'POST'
        ]);
    }
}
