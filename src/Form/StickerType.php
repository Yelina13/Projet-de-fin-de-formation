<?php

namespace App\Form;

use App\Entity\Sticker;
use App\Entity\StickerItem;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StickerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('craft')
            ->add('is_about')
            ->add('contains',EntityType::class,[
                'class' => StickerItem::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
               // pour que l'utilisateur puisse choisir plusieurs objets en même temps 
            ])
            ;}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sticker::class,
        ]);
    }
}
