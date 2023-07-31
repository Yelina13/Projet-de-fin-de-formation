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
     * API to get all  categories of stickers with author name and category name
     * adding group to gather them : ['get_StickerCategory']
     * Method GET without parameter
     * 
     * @Route("/api/stickerCategories", name="api_stickerCategories", methods={"GET"}) 
     */
    public function StickerCategories(StickerCategoryRepository $ar): Response
    {
        $StickerCategoryList = $ar->findAll();

        return $this->json(
            // La liste des StickerCategorys à sérialiser
            // List of categories of stickers to serialize
            $StickerCategoryList,
            // Code de retour HTTP
            // Return HTTP code
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            // Array of headers to send with responses
            [],
            // Groupes a envoyer avec la réponse
            // Groups to send with response
            ['groups' => ['get_stickerCategory']]
        );
    }


    /**
     * API de récupération d'un seul StickerCategory
     * Method = GET, ID de la catégorie
     *
     * API to get a category of sticker with author name and category name
     * adding group to gather them : ['get_StickerCategory']
     * Method GET, category ID
     * 
     * @Route("/api/stickerCategory/{id<\d+>}", name="api_StickerCategory", methods={"GET"}) 
     */
    public function StickerCategory (StickerCategoryRepository $ar, int $id): Response
    {
        $StickerCategory = $ar->find($id);

        return $this->json(
          
            $StickerCategory,
            // Code de retour HTTP
            // Return HTTP code
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            // Array of headers to send with responses
            [],
            // Groupes a envoyer avec la réponse
            // Groups to send with response
            ['groups' => ['get_stickerCategory']]
        );
    }
}