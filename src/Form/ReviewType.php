<?php

namespace App\Form;

use App\Entity\Review;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ReviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add(
                'name',
                TextType::class,
                [
                    "label" => "Nom",
                    "required" => true,
                    "constraints" => [
                        new NotBlank(["message" => "Veuillez renseigner votre nom"]),
                        new Length(["max" => 50, "maxMessage" => "Votre nom doit comporter moins de 50 caractères"]),
                    ]
                ]
            )

            ->add(
                'comment',
                TextareaType::class,
                [
                    "label" => "Commentaire",
                    "required" => false,
                    "constraints" => [
                        new Length(["max" => 1000, "maxMessage" => "Votre commentaire doit comporter moins de 1000 caractères"])
                    ]
                ]
            )

            // ->add('note', ChoiceType::class,
            // ["required" => true,
            // "choices" => [
            //     '5' => 5,
            //     '4' => 4,
            //     '3' => 3,
            //     '2' => 2,
            //     '1' => 1,
            // ],
            // 'expanded' => true,
            // 'multiple' => false,
            // ])

            ->add(
                'note',
                IntegerType::class,
                [
                    "required" => true,
                    "constraints" => [
                        new Range([
                            "min" => 1,
                            "max" => 5,
                            "minMessage" => "Vous devez attribuer au moins une étoile",
                            "maxMessage" => "Vous ne pouvez pas attribuer plus de 5 étoiles"
                        ])
                    ]
                ]
            )

            ->add('submit', SubmitType::class, [
                'label' => 'Publier',
                'attr' => ['class' => 'btn btn-danger']
            ]);;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "data_class" => Review::class,
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id' => 'review_name',
        ]);
    }
}
