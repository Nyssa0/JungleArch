<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'attr' => array(
                    'placeholder' => 'Prénom'
                )
            ])
            ->add('lastname', TextType::class, [
                'attr' => array(
                    'placeholder' => 'Nom'
                )
            ])
            ->add('message', TextareaType::class, [
                'attr' => array(
                    'placeholder' => 'Écrivez votre message...'
                )
            ])
            ->add('phone', TelType::class, [
                'attr' => array(
                    'placeholder' => 'Téléphone',
                    'maxlength' => 10
                )
            ])
            ->add('email', EmailType::class, [
                'attr' => array(
                    'placeholder' => 'Email'
                )
            ])
            ->add('submit', SubmitType::class, [
                'attr' => array(
                    'class' => 'button'
                )
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
