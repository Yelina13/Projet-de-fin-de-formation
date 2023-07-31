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
    // Le label affiché à côté du champ dans le formulaire.
    // The label displayed next to the field in the form.
    // Les 'attr' sont des attributs HTML supplémentaires pour le champ.
    // attr' are additional HTML attributes for the field.
    // L'attribut placeholder qui affiche un texte d'exemple dans le champ.
    // The placeholder attribute displays example text inside the field to guide the user.

        $builder
            ->add('craft', EntityType::class, [ // EntityType::class: Ceci est le type de champ qu'on utilise pour 'craft'.C'est un champ de type EntityType qui permet de sélectionner une entité spécifiée par la classe 'User'.
                                                // EntityType::class: This is the type of field we use for 'craft'. It is an EntityType field which is used to select an entity specified by the 'User' class.
                'class' => User::class, // 'class' => User::class: Ceci indique la classe de l'entité avec laquelle le champ 'craft' sera associé. Dans cet exemple, il est associé à la classe 'User', ce qui signifie que les options de la liste déroulante seront des entités de la classe 'User'.
                                        // 'class' => User::class: This indicates the class of the entity with which the 'craft' field will be associated. In this example, it is associated with the 'User' class, which means that the options in the drop-down list will be entities of the 'User' class.
               
                'label' => 'Sticker créé par',
                'placeholder' => 'Sélectionner un auteur'
            ])
            ->add('is_about', EntityType::class, [ //EntityType::class: Ceci est le type de champ qu'on utilise pour 'is_about'. C'est un champ de type EntityType qui permet de sélectionner une entité spécifiée par la classe 'StickerCategory'.
                                                   //EntityType::class: This is the type of field used for 'is_about'. It is an EntityType field which is used to select an entity specified by the 'StickerCategory' class.
                
                'class' => StickerCategory::class, // 'class' => StickerCategory::class: Ceci indique la classe de l'entité avec laquelle le champ 'is_about' sera associé. Dans cet exemple, il est associé à la classe 'StickerCategory', ce qui signifie que les options de la liste déroulante seront des entités de la classe 'StickerCategory'.
                                                  // 'class' => StickerCategory::class: This indicates the class of the entity with which the 'is_about' field will be associated. In this example, it is associated with the 'StickerCategory' class, which means that the drop-down list options will be entities of the 'StickerCategory' class.
               
                'label' => 'Sticker de la catégorie',
                'placeholder' => 'Sélectionner une catégorie'
            ])
            ->add('contains',EntityType::class,[ // EntityType::class: Ceci est le type de champ qu'on utilise pour 'contains'.C'est un champ de type EntityType qui permet de sélectionner plusieurs entités spécifiées par la classe 'StickerItem'.
                                                // EntityType::class: This is the type of field used for 'contains'. It is an EntityType field used to select several entities specified by the 'StickerItem' class.
                
                'class' => StickerItem::class, // 'class' => StickerItem::class: Ceci indique la classe de l'entité avec laquelle le champ 'contains' sera associé. Dans cet exemple, il est associé à la classe 'StickerItem', ce qui signifie que les options de la liste déroulante avec cases à cocher seront des entités de la classe 'StickerItem'.
                                               // 'class' => StickerItem::class: This indicates the class of the entity with which the 'contains' field will be associated. In this example, it is associated with the 'StickerItem' class, which means that the drop-down list options with checkboxes will be entities of the 'StickerItem' class.
               
                'choice_label' => 'name', // 'choice_label' => 'name': Cela indique que l'attribut 'name' de l'entité 'StickerItem' sera utilisé comme étiquette (label) pour afficher les options dans la liste déroulante avec cases à cocher.
                                          // 'choice_label' => 'name': This indicates that the 'name' attribute of the 'StickerItem' entity will be used as a label to display the options in the drop-down list with checkboxes.
                'multiple' => true,
                'expanded' => true,
               'attr' => [
                'style' => 'max-height:400px;column-count:3;column-gap:500px;'// Cela ajoute un attribut HTML 'style' au champ, qui contrôle le style d'affichage de la liste déroulante avec cases à cocher. Dans cet exemple, les cases à cocher seront affichées en trois colonnes avec une hauteur maximale de 400 pixels.
                                                                              // This adds an HTML 'style' attribute to the field, which controls the display style of the drop-down list with checkboxes. In this example, the checkboxes will be displayed in three columns with a maximum height of 400 pixels.
            ],
            ])
            ;}

    public function configureOptions(OptionsResolver $resolver): void
    {

         // $resolver est un objet qui permet de définir les options du formulaire.
         // $resolver is an object used to define form options.
        $resolver->setDefaults([
            'data_class' => Sticker::class,
        ]);
    }
}
