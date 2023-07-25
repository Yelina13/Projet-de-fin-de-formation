<?php

namespace App\Controller\Api;

use App\Repository\StickerItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class StickerItemController extends AbstractController
{
    /**
     * API de récupération de l'ensemble des StickerItems avec le nom de l'auteur et du nom de la categpry StickerItem 
     * je rajoute un groupe pour ça ['get_StickerItem']
     * Method = GET, pas de paramètre
     * 
     * @Route("/api/stickerItems", name="api_stickerItems", methods={"GET"}) 
     */
    public function StickerItems(StickerItemRepository $ar): Response
    {
        $StickerItemList = $ar->findAll();

        return $this->json(
            // La liste des StickerItems à sérialiser
            $StickerItemList,
            // Code de retour HTTP
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            [],
            // Groupes a envoyer avec la réponse
            ['groups' => ['get_stickerItem']]
        );
    }


    /**
     * API de récupération d'un seul StickerItem
     * Method = GET, pas de paramètre
     *
     * @Route("/api/stickerItem/{id<\d+>}", name="api_stickerItem", methods={"GET"}) 
     */
    public function StickerItem (StickerItemRepository $ar, int $id): Response
    {
        $StickerItem = $ar->find($id);

        return $this->json(
          
            $StickerItem,
            // Code de retour HTTP
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            [],
            // Groupes a envoyer avec la réponse
            ['groups' => ['get_stickerItem']]
        );
    }
}