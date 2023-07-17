<?php

namespace App\Controller\Api;

use App\Entity\ArticleCategory;
use App\Form\ArticleCategoryType;
use App\Repository\ArticleCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ArticleCategoryController extends AbstractController
{
    /**
     * @Route("/api/article/category", name="app_article_category_index", methods={"GET"})
     */
    public function index(ArticleCategoryRepository $acr): Response
    {
        $articlesCategoryList = $acr->findAll();

        return $this->json(
            // La liste des categories d'articles 
            $articlesCategoryList,
            // Code de retour HTTP
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            [],
        );;
    }

   /**
     * API de récupération une catégorie  d'article au hasard
     * Method = GET, pas de paramètre
     * 
     * @Route("/api/article/category/random", name="api_articles_random", methods={"GET"})
     */
    public function randomArticleCategory(ArticleCategoryRepository $acr): Response
    {

        // On utilise le repository pour aller chercher un
        // article random
        $randomArticleCategory= $acr->getOneRandomArticleCategory();

        return $this->json(
            // La liste des catégories d'articles
            $randomArticleCategory,
            // Code de retour HTTP
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            [],
    
        );
    }
}
