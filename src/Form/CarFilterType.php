<?php

namespace App\Form;

use App\DTO\CarFilterDTO;
use App\DTO\HorsepowerDTO;
use App\DTO\MileageDTO;
use App\DTO\PriceDTO;
use App\DTO\YearDTO;
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
                'data_class' => PriceDTO::class,
                'required' => false
            ])

            ->add('brand', TextType::class, [
                'label' => 'Marque',
                'required' => false
            ])

            ->add('year', YearRangeType::class, [
                'label' => 'Année',
                'data_class' => YearDTO::class,
                'required' => false
            ])

            ->add('mileage', MileageRangeType::class, [
                'label' => 'Kilométrage',
                'data_class' => MileageDTO::class,
                'required' => false
            ])

            ->add('horsepower', HorsepowerRangeType::class, [
                'label' => 'Puissance',
                'data_class' => HorsepowerDTO::class,
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
            'data_class' => CarFilterDTO::class,
            'method' => 'POST'
        ]);
    }
}
