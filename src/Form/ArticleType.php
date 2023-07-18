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
                    'placeholder' => 'Saisir un titre',
                ],
            ])
            ->add('overview',TextType::class,[
                'label' => 'Aperçu',
               
            ])
            ->add('content',TextType::class,[
                'label' => 'Contenu',
            
            ])
            ->add('published_date', DateType::class, [
                'label' => 'Cet article a été publié le',
                'placeholder' => 'Selectionner une valeur',

                'format' => 'dd MM yyyy',
                // la propriété published_date de notre entité est de type DateTime
                'input' => 'datetime',
                // @see https://symfony.com/doc/current/reference/forms/types/date.html#years
               
                'years' => range(date('Y'), 1950),
            ])
            ->add('is_from',TextType::class,[
                'label' => 'Cet article est de',
                'attr' => [
                    'placeholder' => 'Saisir le nom de l\'auteur',
                ],
            ])
            ->add('publish',TextType::class,[
                'label' => ' Cet article est publié par',
            
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
