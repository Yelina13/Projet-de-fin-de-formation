<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {  
         // Les "add" on étaient spécifiés car sinon on rencontré un message d'erreur 
         // ( An exception has been thrown during the rendering of a template ("Notice: Array to string conversion").)

        $builder
            ->add('username')
            ->add('email')
            ->add('password')
            ->add('roles', ChoiceType::class, [
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
