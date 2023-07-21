<?php

namespace App\Form;

use App\Entity\Sticker;
use App\Entity\StickerItem;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class StickerItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            /* a revoir pour le changement du label*/
            ->add('stickers', EntityType::class, [
                'class' => Sticker::class,
                'label' => 'Créateur(s) du sticker',
                'multiple' => true
            ])

            ->add('name',TextType::class,[
                'label' => 'Nom d\'un objet de l\'étiquette',
                'attr' => [
                    'placeholder' => 'saisir un nom',
                ],
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => StickerItem::class,
        ]);
    }
}
