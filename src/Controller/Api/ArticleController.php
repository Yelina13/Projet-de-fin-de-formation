<?php

namespace App\Controller\Api;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ArticleController extends AbstractController
{
    /**
     * API de récupération de l'ensemble des articles avec le nom de l'auteur et du nom de la categpry article 
     * je rajoute un groupe pour ça ['get_articles']
     * Method = GET, pas de paramètre
     * 
     * API to get all articles with author name and category name
     * adding group to gather them : ['get_articles']
     * Method GET without parameter
     * 
     * @Route("/api/articles", name="api_articles", methods={"GET"}) 
     */
    public function articles(ArticleRepository $ar): Response
    {
        $articleList = $ar->findAll();

        return $this->json(
            // La liste des articles à sérialiser
            // list of articles to serialize
            $articleList,
            // Code de retour HTTP
            // Return code HTTP
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            // Array of headers to send with response
            [],
            // Groupes a envoyer avec la réponse
            // Group to send with response
            ['groups' => ['get_article']]
        );
    }


    /**
     * API de récupération d'un seul article
     * Method = GET, ID de l'article
     * 
     * API to get an article with author name and category name
     * Method GET, article ID
     *
     * @Route("/api/article/{id<\d+>}", name="api_article", methods={"GET"}) 
     */
    public function article (ArticleRepository $ar, int $id): Response
    {
        $article = $ar->find($id);

        return $this->json(
          
            $article,
            // Code de retour HTTP
            // Return code HTTP
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            // Array of headers to send with response
            [],
            // Groupes a envoyer avec la réponse
            // Group to send with response
            ['groups' => ['get_article']]
        );
    }
}