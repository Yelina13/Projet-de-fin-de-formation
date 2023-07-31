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
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;


// Classe ArticleType qui étend AbstractType
class ArticleType extends AbstractType
{
   // Méthode pour construire le formulaire
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
    // Le label affiché à côté du champ dans le formulaire.
    // The label displayed next to the field in the form.
    // Les 'attr' sont des attributs HTML supplémentaires pour le champ.
    // attr' are additional HTML attributes for the field.
    // L'attribut placeholder qui affiche un texte d'exemple dans le champ.
    // The placeholder attribute displays example text inside the field to guide the user.


        $builder
            ->add('title',TextType::class,[ // On ajoute un champ "title" de type "TextType" au formulaire.
                                            // We add a field named "title" of type "TextType" to the form.
                'label' => 'Titre',
                'attr' => [
                    'placeholder' => 'Saisir un titre',
                ],
            ])
            ->add('overview',TextType::class,[ // On ajoute un champ "overwiew" de type "TextType" au formulaire.
                                               // We add a field named "overview" of type "TextType" to the form.
                'label' => 'Aperçu',
               
            ])
            ->add('content',TextareaType::class,[ //  TextareaType::class: est le type de champ qu'on utilise pour 'content'. Dans ce cas, c'est un champ de texte multiligne.
                                                  //  TextareaType::class: is the type of field used for 'content'. In this case, it is a multiline text field.
                'label' => 'Contenu',
            
            ])
            ->add('image',UrlType::class,[ // UrlType est le type de champ qu'on utilise pour 'image'.c'est un champ qui attend une URL comme valeur.
                                           // UrlType is the type of field we use for 'image'. It's a field that expects a URL as its value.
                'label' => 'Adresse de l\'image',
            
            ])
            ->add('published_date', DateType::class, [ // DateType::class: Ceci est le type de champ qu'on utilise pour 'published_date'. Dans ce cas, c'est un champ qui permet à l'utilisateur de sélectionner une date.
                                                      // DateType::class: This is the type of field used for 'published_date'. In this case, it is a field that allows the user to select a date.
                'label' => 'Cet article a été publié le',
                'placeholder' => 'Sélectionner une valeur',

                'format' => 'dd MM yyyy',
                // la propriété published_date de notre entité est de type DateTime
                'input' => 'datetime',
                // @see https://symfony.com/doc/current/reference/forms/types/date.html#years
               
                'years' => range(date('Y'), 1950),
            ])
            ->add('updated_date', DateType::class, [
                'label' => 'Cet article a été mis à jour le',
                'placeholder' => 'Sélectionner une valeur',
                'format' => 'dd MM yyyy',
                'input' => 'datetime', // 'input' => 'datetime': Cela indique que les valeurs saisies dans le champ seront traitées comme un objet DateTime.
                                       // 'input' => 'datetime': This indicates that the values entered in the field will be treated as a DateTime object.

                'years' => range(date('Y'), 1950), // 'years' => range(date('Y'), 1950): Cela définit la liste des années disponibles dans le champ déroulant pour sélectionner l'année. Dans cet exemple, la liste ira de l'année actuelle jusqu'en 1950.
                                                  // 'years' => range(date('Y'), 1950): This defines the list of years available in the drop-down field for selecting the year. In this example, the list will go from the current year to 1950.
            ])
            
            ->add('is_from', EntityType::class, [ // EntityType::class: Ceci est le type de champ qu'on utilise pour 'is_from'. Dans ce cas, c'est un champ de type EntityType qui permet de sélectionner une entité spécifiée par la classe 'ArticleCategory'.
                                                 // EntityType::class: This is the type of field used for 'is_from'. In this case, it is an EntityType field used to select an entity specified by the 'ArticleCategory' class.

                'class' => ArticleCategory::class, // 'class' => ArticleCategory::class: Ceci indique la classe de l'entité avec laquelle le champ 'is_from' sera associé. Dans cet exemple, il est associé à la classe 'ArticleCategory', ce qui signifie que les options de la liste déroulante seront des entités de la classe 'ArticleCategory'.
                                                   // 'class' => ArticleCategory::class: This indicates the class of the entity with which the 'is_from' field will be associated. In this example, it is associated with the 'ArticleCategory' class, which means that the drop-down list options will be entities of the 'ArticleCategory' class.
               
                'label' => ' Cet article a comme catégorie',
                'placeholder' => 'Sélectionner une catégorie',
            ])
            ->add('publish',EntityType::class,[ // EntityType::class: Ceci est le type de champ que vous souhaitez utiliser pour 'publish'. Dans ce cas, c'est un champ de type EntityType qui permet de sélectionner une entité spécifiée par la classe 'User'.
                                               // EntityType::class: This is the type of field you want to use for 'publish'. In this case, it is an EntityType field which allows you to select an entity specified by the 'User' class.

                'class' => User::class, // 'class' => User::class: Ceci indique la classe de l'entité avec laquelle le champ 'publish' sera associé. Dans cet exemple, il est associé à la classe 'User', ce qui signifie que les options de la liste déroulante seront des entités de la classe 'User'.
                                        // 'class' => User::class: This indicates the class of the entity with which the 'publish' field will be associated. In this example, it is associated with the 'User' class, which means that the options in the drop-down list will be entities of the 'User' class.
                'label' => ' Cet article est publié par',
                'placeholder' => 'Sélectionner un auteur'
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
         // $resolver est un objet qui permet de définir les options du formulaire.
         // $resolver is an object used to define form options.
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
