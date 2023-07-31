<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
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
            ->add('username', null, [
                'label' => 'Pseudo',
                'attr' => [
                    'placeholder' => 'saisissez votre pseudo',
                ]
            ])
            ->add('email', EmailType::class, [ //  EmailType::class:est un type de champ qu'on utilise pour 'email'. 'est un champ qui attend une adresse e-mail valide comme valeur.
                                               // EmailType::class:It is a field type used for "email". is a field that expects a valid email address as its value.
                'label' => 'Courriel',
                // si besoin de placeholder sur un champ autre que ChoiceType
                'attr' => [
                    'placeholder' => 'ex. toto@toto.com',
                ]
            ])
            ->add('agreeTerms', CheckboxType::class, [ // CheckboxType::class: est le type de champ qu'on utilise pour 'agreeTerms'. Dans ce cas, c'est un champ de type case à cocher.
                                                    // CheckboxType::class: is the type of field used for 'agreeTerms'. In this case, it's a checkbox field.
                'mapped' => false,
                'constraints' => [ // 'constraints': est un tableau de contraintes pour le champ de case à cocher. Dans cet exemple, il y a une contrainte 'IsTrue' qui vérifie que la case est cochée (valeur true) pour que le formulaire soit valide.
                                   // 'constraints': is an array of constraints for the checkbox field. In this example, there is an 'IsTrue' constraint which checks that the box is ticked (value true) for the form to be valid.
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [  // PasswordType::class:est le type de champ qu'on utilise pour 'password'.C'est un champ qui masquera les caractères saisis par l'utilisateur.
                                                         //PasswordType::class:is the type of field we use for the "password", which hides the characters entered by the user.

                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'attr' => [
                    'placeholder' => 'mot de passe',
                ],
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
            ])
        ;
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
