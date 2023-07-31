<?php

namespace App\Controller\Api;

use App\Repository\ArticleCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ArticleCategoryController extends AbstractController
{
    /**
     * API de récupération de l'ensemble des ArticleCategories avec le nom de l'auteur et du nom de la categpry articleCategories
     * je rajoute un groupe pour ça ['get_articleCategories']
     * Method = GET, pas de paramètre
     * 
     * API to get all article categories with author name and category name
     * adding group to gather them : ['get_articleCategories']
     * Method GET without parameter
     * 
     * @Route("/api/articleCategories", name="api_articleCategories", methods={"GET"}) 
     */
    public function articleCategories(ArticleCategoryRepository $ar): Response
    {
        $articleCategoryList = $ar->findAll();

        return $this->json(
            // La liste des ArticleCategorys à sérialiser
            // Article categories list to serialize
            $articleCategoryList,
            // Code de retour HTTP
            // Return code HTTP
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            // Headers array to send, with response
            [],
            // Groupes a envoyer avec la réponse
            // Groups to send with response
            ['groups' => ['get_articleCategory']]
        );
    }


    /**
     * API de récupération d'un seul articleCategory avec une ID
     * Method = GET, ID à chercher
     * 
     * API to get only a category article
     * Method GET, ID to find
     *
     * @Route("/api/articleCategory/{id<\d+>}", name="api_articleCategory", methods={"GET"}) 
     */
    public function articleCategory (ArticleCategoryRepository $ar, int $id): Response
    {
        $articleCategory = $ar->find($id);

        return $this->json(
          
            $articleCategory,
            // Code de retour HTTP
            // Return code HTTP
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            // Headers array to send, with response
            [],
            // Groupes a envoyer avec la réponse
            // Groups to send with response
            ['groups' => ['get_articleCategory']]
        );
    }
}