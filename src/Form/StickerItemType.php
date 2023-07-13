<?php

namespace App\Form;

use App\Entity\StickerItem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class StickerItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,[
                'label' => 'Nom d\'une categorie de sticker item',
                'attr' => [
                    'placeholder' => 'saisir un nom',
                ],
            ])
            ->add('stickers')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => StickerItem::class,
        ]);
    }
}
