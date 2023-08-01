<?php

namespace App\Form;

use App\Entity\ArticleCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


// Classe ArticlecategoryType qui étend AbstractType
class ArticleCategoryType extends AbstractType
{
    
   // Méthode pour construire le formulaire
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder // Cette variable "$builder" représente l'objet FormBuilder qui est utilisé pour construire le formulaire.
                // This variable "$builder" represents the FormBuilder object used to construct the form.

            ->add('name',TextType::class,[ // On ajoute un champ "name" de type "TextType" au formulaire.
                                          // We add a field named "name" of type "TextType" to the form.

                'label' => 'Nom d\'une categorie d\'article', // Le label affiché à côté du champ dans le formulaire.
                                                              // The label displayed next to the field in the form.
        
                'attr' => [// Les attributs HTML supplémentaires pour le champ.
                           // Additional HTML attributes for the field.
                           
                    'placeholder' => 'saisir un nom', // L'attribut placeholder qui affiche un texte d'exemple dans le champ.
                                                     // The placeholder attribute displays example text inside the field to guide the user.
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    { 
        // $resolver est un objet qui permet de définir les options du formulaire.
        // $resolver is an object used to define form options.
        $resolver->setDefaults([
            'data_class' => ArticleCategory::class,
        ]);
    }
}