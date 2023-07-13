<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {  
         // Les "add" on étaient spécifiés car sinon on rencontré un message d'erreur 
         // ( An exception has been thrown during the rendering of a template ("Notice: Array to string conversion").)

        $builder
            ->add('username', null, [
                'label' => 'Pseudo',
                'attr' => [
                    'placeholder' => 'saisissez votre pseudo',
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Courriel',
                // si besoin de placeholder sur un champ autre que ChoiceType
                'attr' => [
                    'placeholder' => 'ex. toto@toto.com',
                ]
            ])
            
            ->add('password', PasswordType::class,[
                'label' => 'Mot de passe',
                // si besoin de placeholder sur un champ autre que ChoiceType
                'attr' => [
                    'placeholder' => 'mot de passe',
                ]
            ])
            ->add('roles', ChoiceType::class, [
                'label' => 'Rôle de la personne',
                'choices' => [
                    'USER'  => 'ROLE_USER',
                    'ADMIN' => 'ROLE_ADMIN'
                ],
                'expanded' => false,
                'multiple' => true  
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
