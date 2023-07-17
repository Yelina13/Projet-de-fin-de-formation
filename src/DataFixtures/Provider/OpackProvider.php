<?php

namespace App\DataFixtures\Provider;

class OpackProvider {


 private $articles = [

        '10 conseils essentiels pour un déménagement sans stress',
        'Comment organiser efficacement votre déménagement en 5 étapes',
        'Les erreurs courantes à éviter lors d\'un déménagement et comment les contourner',
        'Déménagement économique : astuces pour réduire les coûts',
        'Déménager avec des enfants : conseils pour une transition en douceur',
        'Comment emballer et protéger vos objets fragiles lors d\'un déménagement',
        'Trouver le bon déménageur : critères à prendre en compte',
        'Déménager dans une autre ville : guide pratique pour s\'adapter rapidement',
        'Conseils pour optimiser l\'espace dans votre nouveau logement après le déménagement',
        'Déménager à l\'étranger : préparation et formalités indispensables',
    ];

    private $articleCategories = [

        'Avant le déménagement',
        'Pendant le déménagement', 
        'Après le déménagement',
        'Emballage',
        'Logistique'
    ];


    public function articleCategory()
    {
        return $this->articleCategories[array_rand($this->articleCategories)];
    }

    public function articleTitle()
    {
        return $this->articles[array_rand($this->articles)];
    }

}