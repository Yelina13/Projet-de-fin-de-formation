<?php

namespace App\Form;

use App\Entity\Todolist;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TodolistType extends AbstractType
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
                'label' => 'Nom de la todolist',
                'attr' => [
                    'placeholder' => 'Saisir le nom de la todolist',
                ],
            ])
            ->add('make',EntityType::class,[ // EntityType::class: Ceci est le type de champ que vous souhaitez utiliser pour 'make'. Dans ce cas, c'est un champ de type EntityType qui permet de sélectionner une entité spécifiée par la classe 'User'.
                                             // EntityType::class: This is the type of field you want to use for 'make'. In this case, it's an EntityType field which allows you to select an entity specified by the 'User' class.
                
                'class' => User::class, // 'class' => User::class: Ceci indique la classe de l'entité avec laquelle le champ 'make' sera associé. Dans cet exemple, il est associé à la classe 'User', ce qui signifie que les options de la liste déroulante seront des entités de la classe 'User'.
                                        // 'class' => User::class: This indicates the class of the entity with which the 'make' field will be associated. In this example, it is associated with the 'User' class, which means that the options in the drop-down list will be entities of the 'User' class.
                'label' => ' Cette todolist est créée par',
            ])
            ->add('listing',TextType::class,[
                'label' => 'Tâches',
                'attr' => [
                    'placeholder' => 'Saisir les tâches',
                ]])
        ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {

         // $resolver est un objet qui permet de définir les options du formulaire.
         // $resolver is an object used to define form options.
        $resolver->setDefaults([
            'data_class' => Todolist::class,
        ]);
    }
}
