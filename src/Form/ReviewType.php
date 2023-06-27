<?php

namespace App\Form;

use App\Entity\Review;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ReviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,
            ["label" => "Nom",
            "required" => true,
            "constraints" => [
                new NotBlank(["message" => "Veuillez renseigner votre nom"]),
                new Length(["max" => 50, "maxMessage" => "Votre nom doit comporter moins de 50 caractères"]),
            ]])
            ->add('comment', TextareaType::class,
            ["label" => "Commentaire",
            "required" => false,
            "constraints" => [
                new Length(["max" => 1000, "maxMessage" => "Votre commentaire doit comporter moins de 1000 caractères"])
            ]])
            ->add('note', ChoiceType::class,
            ["label" => "Note",
            "required" => true,
            "choices" => [
                0 => 0,
                1 => 1,
                2 => 2,
                3 => 3,
                4 => 4,
                5 => 5,
            ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "data_class" => Review::class,
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id' => 'review_item',
        ]);
    }
}
