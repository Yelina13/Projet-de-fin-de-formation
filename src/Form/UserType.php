<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // Les "add" on étaient spécifiés car sinon on rencontré un message d'erreur 
        // ( An exception has been thrown during the rendering of a template ("Notice: Array to string conversion").)

        // Le label affiché à côté du champ dans le formulaire.
        // The label displayed next to the field in the form.
        // Les 'attr' sont des attributs HTML supplémentaires pour le champ.
        // attr' are additional HTML attributes for the field.
        // L'attribut placeholder qui affiche un texte d'exemple dans le champ.
        // The placeholder attribute displays example text inside the field to guide the user.

        $builder
            ->add('username', null, [
                'label' => 'Pseudo',
                'attr' => [
                    'placeholder' => 'saisissez votre pseudo',
                ]
            ])
            ->add('email', EmailType::class, [ //  EmailType::class:est un type de champ qu'on utilise pour 'email'. c'est un champ qui attend une adresse e-mail valide comme valeur.
                                               // EmailType::class:It is a field type used for "email". is a field that expects a valid email address as its value.
                'label' => 'Courriel',
                // si besoin de placeholder sur un champ autre que ChoiceType
                'attr' => [
                    'placeholder' => 'ex. toto@toto.com',
                ]
            ])

            ->add('password', PasswordType::class, [// PasswordType::class:est le type de champ qu'on utilise pour 'password'.C'est un champ qui masquera les caractères saisis par l'utilisateur.
                                                    //PasswordType::class:is the type of field we use for the "password", which hides the characters entered by the user.
                'label' => 'Mot de passe',
                // si besoin de placeholder sur un champ autre que ChoiceType
                'attr' => [
                    'placeholder' => 'mot de passe',
                ]
            ])
            ->add('roles', ChoiceType::class, [ // ChoiceType::class: est le type de champ qu'on utilise pour 'roles'.C'est un champ de sélection multiple, où l'utilisateur peut choisir un ou plusieurs rôles.
                                             //ChoiceType::class: is the field type used for 'roles', a multiple selection field where the user can choose one or more roles.
                'label' => 'Rôle de la personne',
                'choices' => [ // 'choices': est un tableau associatif des options disponibles dans le champ. Dans cet exemple, l'utilisateur peut choisir entre 'USER' (qui est affiché comme option) et 'ADMIN' (qui est également affiché comme option).Lorsque l'utilisateur sélectionne l'une de ces options, la valeur associée à cette option ('ROLE_USER' ou 'ROLE_ADMIN') sera envoyée dans le formulaire.
                               // 'choices': is an associative array of the options available in the field. In this example, the user can choose between 'USER' (which is displayed as an option) and 'ADMIN' (which is also displayed as an option). When the user selects one of these options, the value associated with that option ('ROLE_USER' or 'ROLE_ADMIN') will be sent to the form.
                    'USER'  => 'ROLE_USER',
                    'ADMIN' => 'ROLE_ADMIN'
                ],
                'expanded' => false, // 'expanded' => false: Cette option indique que le champ ne doit pas être affiché sous forme de boutons radio ou de cases à cocher, mais sous forme de liste déroulante. Si 'expanded' était true, les options seraient affichées en tant que boutons radio ou cases à cocher.
                                    // 'expanded' => false: This option indicates that the field should not be displayed as radio buttons or tick boxes, but as a drop-down list. If 'expanded' were true, the options would be displayed as radio buttons or checkboxes.
                'multiple' => true  // 'multiple' => true: Cette option indique que l'utilisateur peut sélectionner plusieurs options. Si 'multiple' était false, l'utilisateur ne pourrait choisir qu'une seule option dans la liste déroulante.
                                    // 'multiple' => true: This option indicates that the user can select several options. If 'multiple' were false, the user would only be able to choose one option from the drop-down list.
            
            ]);                    
    }

    public function configureOptions(OptionsResolver $resolver): void
    {

         // $resolver est un objet qui permet de définir les options du formulaire.
         // $resolver is an object used to define form options.
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
