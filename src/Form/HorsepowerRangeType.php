<?php

namespace App\Form;

use App\DTO\HorsepowerDTO;
use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class HorsepowerRangeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('horsepower_min', IntegerType::class, [
                'attr' => ['placeholder' => 'Min.'],
                'label' => false
            ])

            ->add('horsepower_max', IntegerType::class, [
                'attr' => ['placeholder' => 'Max.'],
                'label' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => HorsepowerDTO::class
        ]);
    }
}
