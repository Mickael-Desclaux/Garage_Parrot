<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;


class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("_username", EmailType::class, 
            ["label" => "email", 
            "required" => true,
            "block_name" => "_email",
            "constraints" => [
                new Length (["min" => 2, "max" => 180, "minMessage" => "L'adresse mail doit comporter au moins 2 caractères", "maxMessage" => 
            "L'adresse mail ne doit pas faire plus de 180 caractères"]),
            new NotBlank(["message" => "Veuillez renseigner une adresse mail"])
            ]])

            ->add("password", PasswordType::class, 
            ["label" => "password", 
            "required" => true,
            "constraints" => [
            new NotBlank(["message" => "Veuillez renseigner un mot de passe"])
            ]]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "data_class" => User::class,
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id' => 'user_item',
        ]);
    }
}