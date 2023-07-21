<?php

namespace App\Form;

use App\Entity\Todolist;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TodolistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('name',TextType::class,[
                'label' => 'Nom de la todolist',
                'attr' => [
                    'placeholder' => 'Saisir le nom de la todolist',
                ],
            ])
            ->add('make',EntityType::class,[
                'class' => User::class,
                'label' => ' Cette todolist est créée par',
            ])
            ->add('listing',TextType::class,[
                'label' => 'Tâches',
                'attr' => [
                    'placeholder' => 'Saisir les tâches',
                ]])
        ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Todolist::class,
        ]);
    }
}
