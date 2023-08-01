<?php

namespace App\Form;

use App\Entity\StickerCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class StickerCategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

    // Le label affiché à côté du champ dans le formulaire.
    // The label displayed next to the field in the form.
    // Les 'attr' sont des attributs HTML supplémentaires pour le champ.
    // attr' are additional HTML attributes for the field.
    // L'attribut placeholder qui affiche un texte d'exemple dans le champ.
    // The placeholder attribute displays example text inside the field to guide the user.  

        $builder
            ->add('name',TextType::class,[ // On ajoute un champ "name" de type "TextType" au formulaire.
                                           // We add a field named "name" of type "TextType" to the form.
                'label' => 'Nom d\'une categorie d\'étiquette',
                'attr' => [
                    'placeholder' => 'saisir un nom',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {

         // $resolver est un objet qui permet de définir les options du formulaire.
         // $resolver is an object used to define form options.
        $resolver->setDefaults([
            'data_class' => StickerCategory::class,
        ]);
    }
}