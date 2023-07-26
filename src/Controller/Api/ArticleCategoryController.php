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
     * API de récupération de l'ensemble des ArticleCategorys avec le nom de l'auteur et du nom de la categpry rticleCategory 
     * je rajoute un groupe pour ça ['get_rticleCategorys']
     * Method = GET, pas de paramètre
     * 
     * @Route("/api/articleCategorys", name="api_articleCategorys", methods={"GET"}) 
     */
    public function articleCategorys(ArticleCategoryRepository $ar): Response
    {
        $articleCategoryList = $ar->findAll();

        return $this->json(
            // La liste des ArticleCategorys à sérialiser
            $articleCategoryList,
            // Code de retour HTTP
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            [],
            // Groupes a envoyer avec la réponse
            ['groups' => ['get_articleCategory']]
        );
    }


    /**
     * API de récupération d'un seul articleCategory
     * Method = GET, pas de paramètre
     *
     * @Route("/api/articleCategory/{id<\d+>}", name="api_articleCategory", methods={"GET"}) 
     */
    public function articleCategory (ArticleCategoryRepository $ar, int $id): Response
    {
        $articleCategory = $ar->find($id);

        return $this->json(
          
            $articleCategory,
            // Code de retour HTTP
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            [],
            // Groupes a envoyer avec la réponse
            ['groups' => ['get_articleCategory']]
        );
    }
}