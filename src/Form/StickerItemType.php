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
   // Le label affiché à côté du champ dans le formulaire.
    // The label displayed next to the field in the form.
    // Les 'attr' sont des attributs HTML supplémentaires pour le champ.
    // attr' are additional HTML attributes for the field.
    // L'attribut placeholder qui affiche un texte d'exemple dans le champ.
    // The placeholder attribute displays example text inside the field to guide the user.

        $builder
            
            ->add('stickers', EntityType::class, [ // EntityType::class: Ceci est le type de champ qu'on utilise pour 'stickers'. Dans ce cas, c'est un champ de type EntityType qui permet de sélectionner une ou plusieurs entités spécifiées par la classe 'Sticker'.
                'class' => Sticker::class, // 'class' => Sticker::class: Ceci indique la classe de l'entité avec laquelle le champ 'stickers' sera associé. Dans cet exemple, il est associé à la classe 'Sticker', ce qui signifie que les options de la liste déroulante seront des entités de la classe 'Sticker'.
                'label' => 'Créateur(s) du sticker',
                'multiple' => true
            ])

            ->add('name',TextType::class,[ // On ajoute un champ "name" de type "TextType" au formulaire.
                                          // We add a field named "name" of type "TextType" to the form.
                'label' => 'Nom d\'un objet de l\'étiquette',
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
            'data_class' => StickerItem::class,
        ]);
    }
}
