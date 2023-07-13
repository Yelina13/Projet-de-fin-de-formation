<?php

namespace App\Controller\Api;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ArticleController extends AbstractController
{
    /**API de récupération de l'ensemble des articles
     * Method = GET, pas de paramètre
     * 
     * @Route("/api/articles", name="api_articles_get", methods={"GET"})
     */
    public function index(ArticleRepository $ar): Response
    {
        $articlesList = $ar->findAll();

        return $this->json(
            // La liste des articles 
            $articlesList,
            // Code de retour HTTP
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            [],
         
        );
    }

    /**
     * API de récupération d'un article au hasard
     * Method = GET, pas de paramètre
     * 
     * @Route("/api/article/random", name="api_articles_random", methods={"GET"})
     */
    public function randomArticle(ArticleRepository $ar): Response
    {

        // On utilise le repository pour aller chercher un
        // article random
        $randomArticle= $ar->getOneRandomArticle();

        return $this->json(
            // La liste des articles à sérialiser
            $randomArticle,
            // Code de retour HTTP
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            []
    
        );
    }
}