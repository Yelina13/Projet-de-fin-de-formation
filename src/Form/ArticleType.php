<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title',TextType::class,[
                'label' => 'Titre',
                'attr' => [
                    'placeholder' => 'saisir un titre',
                ],
            ])
            ->add('overview')
            ->add('content')
            ->add('published_date', DateType::class, [
                'label' => 'Cet article a été publié le',
                'placeholder' => 'Selectionner une valeur',

                'format' => 'dd MM yyyy',
                // la propriété published_date de notre entité est de type DateTime
                'input' => 'datetime',
                // @see https://symfony.com/doc/current/reference/forms/types/date.html#years
               
                'years' => range(date('Y'), 1950),
            ])
            ->add('is_from')
            ->add('publish')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
