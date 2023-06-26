<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'brand',
                TextType::class,
                [
                    "label" => "Marque",
                    "required" => true,
                    "constraints" => [
                        new NotBlank(["message" => "Veuillez renseigner la marque du véhicule"]),
                        new Length(["max" => 50, "maxMessage" => "La marque du véhicule ne doit pas dépasser 50 caractères"]),
                    ]
                ]
            )

            ->add(
                'model',
                TextType::class,
                [
                    "label" => "Modèle",
                    "required" => true,
                    "constraints" => [
                        new NotBlank(["message" => "Veuillez renseigner le modèle du véhicule"]),
                        new Length(["max" => 50, "maxMessage" => "Le modèle du véhicule ne doit pas dépasser 50 caractères"]),
                    ]
                ]
            )

            ->add(
                'year',
                IntegerType::class,
                [
                    "label" => "Année",
                    "required" => true,
                    "constraints" => [
                        new NotBlank(["message" => "Veuillez renseigner l'année du véhicule"]),
                        new Length(["min" => 4, "max" => 4, "minMessage" => "L'année doit être composée de 4 chiffres", "maxMessage" => "L'année doit être composée de 4 chiffres"])
                    ]
                ]
            )

            ->add(
                'mileage',
                IntegerType::class,
                [
                    "label" => "Kilométrage",
                    "required" => true,
                    "constraints" => [
                        new NotBlank(["message" => "Veuillez renseigner le kilométrage du véhicule"]),
                    ]
                ]
            )

            ->add(
                'energy',
                ChoiceType::class,
                [
                    "label" => "Énergie",
                    "required" => true,
                    "choices" => [
                        "Essence" => "Essence",
                        "Gazole" => "Gazole",
                        "Électrique" => "Électrique",
                        "Hybride" => "Hybride",
                    ]
                ]
            )

            ->add(
                'gearbox',
                ChoiceType::class,
                [
                    "label" => "Boîte de vitesse",
                    "required" => true,
                    "choices" => [
                        "Manuelle" => "Manuelle",
                        "Automatique" => "Automatique",
                    ]
                ]
            )

            ->add(
                'doors',
                ChoiceType::class,
                [
                    "label" => "Nombre de portes",
                    "required" => true,
                    "choices" => [
                        2 => 2,
                        3 => 3,
                        4 => 4,
                        5 => 5,
                    ]
                ]
            )

            ->add(
                'horsepower',
                IntegerType::class,
                [
                    "label" => "Puissance (ch)",
                    "required" => true,
                    "constraints" => [
                        new NotBlank(["message" => "Veuillez renseigner la puissance du véhicule"]),
                    ]
                ]
            )

            ->add(
                'price',
                IntegerType::class,
                [
                    "label" => "Prix",
                    "required" => true,
                    "constraints" => [
                        new NotBlank(["message" => "Veuillez renseigner le prix du véhicule"]),
                    ]
                ]
            )

            ->add(
                'image',
                FileType::class,
                [
                    "label" => "Image (JPG)",
                    "required" => false,
                    "mapped" => false,
                    "constraints" => [
                        new File([
                            "maxSize" => "1024k",
                            "mimeTypes" => ["application/jpg"],
                            "mimeTypesMessage" => "Veuillez sélectionner une image au format JPG",
                        ])
                    ],

                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id' => 'car_item',
        ]);
    }
}
