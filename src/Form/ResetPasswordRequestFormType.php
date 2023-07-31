<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ResetPasswordRequestFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [ //  EmailType::class:est un type de champ qu'on utilise pour 'email'.C'est un champ qui attend une adresse e-mail valide comme valeur.
                                               // EmailType::class:It is a field type used for "email". is a field that expects a valid email address as its value.
                'attr' => ['autocomplete' => 'email'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter your email',
                    ]),
                ],
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
