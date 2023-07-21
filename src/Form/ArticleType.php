<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\ArticleCategory;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
                'placeholder' => 'Sélectionner une valeur',

                'format' => 'dd MM yyyy',
                // la propriété published_date de notre entité est de type DateTime
                'input' => 'datetime',
                // @see https://symfony.com/doc/current/reference/forms/types/date.html#years
               
                'years' => range(date('Y'), 1950),
            ])
            
            ->add('is_from', EntityType::class, [
                'class' => ArticleCategory::class,
                'label' => ' Cet article est la catégorie',
                'placeholder' => 'Sélectionner une catégorie',
            ])
            ->add('publish',EntityType::class,[
                'class' => User::class,
                'label' => ' Cet article est publié par',
                'placeholder' => 'Sélectionner un auteur'
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
