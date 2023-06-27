<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('subject', TextType::class,
            ["label" => "Sujet",
            "attr" => ['readonly' => true]])

            ->add('firstname', TextType::class,
            ["label" => "Prénom",
            "required" => true,
            "constraints" => [
                new NotBlank(["message" => "Veuillez renseigner votre prénom"]),
                new Length(["max" => 50, "maxMessage" => "Votre prénom doit faire moins de 50 caractères"])
            ]])
            
            ->add('lastname', TextType::class,
            ["label" => "Nom",
            "required" => true,
            "constraints" => [
                new NotBlank(["message" => "Veuillez renseigner votre nom"]),
                new Length(["max" => 50, "maxMessage" => "Votre nom doit faire moins de 50 caractères"])
            ]])

            ->add('phone', TelType::class,
            ["label" => "Numéro de téléphone",
            "required" => true,
            "constraints" => [
                new NotBlank(["message" => "Veuillez renseigner un numéro de téléphone"])
            ]])

            ->add('email', EmailType::class,
            ["label" => "Adresse Mail",
            "required" => true,
            "constraints" => [
                new NotBlank(["message" => "Veuillez renseigner une adresse mail"])
            ]])

            ->add('message', TextareaType::class,
            ["label" => "Message",
            "required" => true,
            "constraints" => [
                new NotBlank(["message" => "Veuillez renseigner un message"]),
                new Length(["max" => 1000, "maxMessage" => "Veuillez renseigner un message de moins de 1000 caractères"])
            ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
            'csrf_protection' => true,
            'csrf_field_subject' => '_token',
            'csrf_token_id' => 'contact_item',
        ]);
    }
}
