<?php

namespace App\Controller\Api;

use App\Repository\StickerCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class StickerCategoryController extends AbstractController
{
    /**
     * API de récupération de l'ensemble des StickerCategory avec le nom de l'auteur et du nom de la categpry StickerCategory 
     * je rajoute un groupe pour ça ['get_StickerCategory']
     * Method = GET, pas de paramètre
     * 
     * @Route("/api/stickerCategories", name="api_stickerCategories", methods={"GET"}) 
     */
    public function StickerCategories(StickerCategoryRepository $ar): Response
    {
        $StickerCategoryList = $ar->findAll();

        return $this->json(
            // La liste des StickerCategorys à sérialiser
            $StickerCategoryList,
            // Code de retour HTTP
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            [],
            // Groupes a envoyer avec la réponse
            ['groups' => ['get_stickerCategory']]
        );
    }


    /**
     * API de récupération d'un seul StickerCategory
     * Method = GET, pas de paramètre
     *
     * @Route("/api/stickerCategory/{id<\d+>}", name="api_StickerCategory", methods={"GET"}) 
     */
    public function StickerCategory (StickerCategoryRepository $ar, int $id): Response
    {
        $StickerCategory = $ar->find($id);

        return $this->json(
          
            $StickerCategory,
            // Code de retour HTTP
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            [],
            // Groupes a envoyer avec la réponse
            ['groups' => ['get_stickerCategory']]
        );
    }
}