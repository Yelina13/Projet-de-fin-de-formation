<?php

namespace App\Form;

use App\Entity\Sticker;
use App\Entity\StickerCategory;
use App\Entity\StickerItem;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StickerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('craft', EntityType::class, [
                'class' => User::class,
                'label' => 'Sticker créé par',
                'placeholder' => 'Sélectionner un auteur'
            ])
            ->add('is_about', EntityType::class, [
                'class' => StickerCategory::class,
                'label' => 'Sticker de la catégorie',
                'placeholder' => 'Sélectionner une catégorie'
            ])
            ->add('contains',EntityType::class,[
                'class' => StickerItem::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
               // pour que l'utilisateur puisse choisir plusieurs objets en même temps
               'attr' => [
                'style' => 'max-height:400px;column-count:3;column-gap:500px;'
            ],
            ])
            ;}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sticker::class,
        ]);
    }
}
