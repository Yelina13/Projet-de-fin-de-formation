<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ChangePasswordFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

   // Le label affiché à côté du champ dans le formulaire.
    // The label displayed next to the field in the form.
    // Les 'attr' sont des attributs HTML supplémentaires pour le champ.
    // attr' are additional HTML attributes for the field.
  
        $builder
            ->add('plainPassword', RepeatedType::class, [ // RepeatedType::class:est le type de champ qu'on utilise pour 'plainPassword'. Le champ RepeatedType permet de saisir le mot de passe deux fois pour une confirmation.
                                                          // RepeatedType::class:is the type of field used for 'plainPassword'. The RepeatedType field allows the password to be entered twice for confirmation.
                'type' => PasswordType::class,  // PasswordType::class:est le type de champ qu'on utilise pour 'password'.C'est un champ qui masquera les caractères saisis par l'utilisateur.
                                             //PasswordType::class:is the type of field we use for the "password", which hides the characters entered by the user.

                'first_options' => [//Ceci est un tableau d'options pour le premier champ de mot de passe.
                                     //This is a table of options for the first password field.
                    'attr' => ['autocomplete' => 'new-password'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Please enter a password',
                        ]),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Your password should be at least {{ limit }} characters',
                            // max length allowed by Symfony for security reasons
                            'max' => 4096,
                        ]),
                    ],
                    'label' => 'Mot de passe', 
                ],
                'second_options' => [ //Ceci est un tableau d'options pour le deuxième champ de mot de passe (la confirmation).
                                     //This is a table of options for the second password field (confirmation).
                    'attr' => ['autocomplete' => 'new-password'],
                    'label' => 'Entrer une nouvelle fois votre mot de passe', 
                ],
                'invalid_message' => 'The password fields must match.',
                // Instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
         // $resolver est un objet qui permet de définir les options du formulaire.
         // $resolver is an object used to define form options.
        $resolver->setDefaults([]);
    }
}

