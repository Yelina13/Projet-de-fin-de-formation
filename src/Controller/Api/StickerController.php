<?php

namespace App\Controller\Api;

use App\Entity\Sticker;
use App\Repository\StickerRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class StickerController extends AbstractController
{
    /**
     * API de récupération de l'ensemble des Stickers avec le nom de l'auteur 
     * je rajoute un groupe pour ça et viter un  ['get_sticker']
     * Method = GET, pas de paramètre
     * 
     * API to get all stickers with author name
     * adding group to gather them : ['get_sticker']
     * Method GET without parameter
     * 
     * @Route("/api/stickers", name="api_stickers", methods={"GET"})
     */
    public function stickers(StickerRepository $sr): Response
    {
        $stickerList = $sr->findAll();

        return $this->json(
            // La liste des stickers à sérialiser
            // List of stickers to serialize
            $stickerList,
            // Code de retour HTTP
            // Return HTTP code
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            // Array of headers to send with response
            [],
            // Groupes a envoyer avec la réponse
            // Groups to send with response
            ['groups' => ['get_sticker']]
        );
    }

      /**
     * API de récupération d'un seul Sticker avec le nom de l'auteur
     * Method = GET, ID du sticker
     * 
     * API to get a sticker with author name
     * adding group to gather them : ['get_sticker']
     * Method GET, sticker ID
     *
     * @Route("/api/sticker/{id<\d+>}", name="api_sticker", methods={"GET"})
     */
    public function sticker (StickerRepository $sr, int $id): Response
    {
        $sticker = $sr->find($id);

        return $this->json(
            
            $sticker,
            // Code de retour HTTP
            // Return HTTP code
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            // Array of header to send with response
            [],
            // Groupes a envoyer avec la réponse
            // Groups to send with response
            ['groups' => ['get_sticker']]
        );
    }

    /**
 * API de modification d'un sticker existant
 * Method = POST, données post encodées json dans le corps de la Requete
 * 
 * API to modify an existing sticker
 * Method POST with JSON encoded datas
 *
 * @Route("/api/sticker/edit/{id}", name="api_sticker_update", methods={"PUT"}) 
 */
public function updateSticker(
    Request $request,
    StickerRepository $sr,
    SerializerInterface $serializer,
    ValidatorInterface $validator,
    $id
): Response {
    $jsonContent = $request->getContent();

    // Vérifie si le sticker existe en utilisant son ID
    // Check if sticker exists using its ID
    $sticker = $sr->find($id);

    // Si le sticker n'est pas trouvé, retourner une erreur
    // If sticker isn't found, return an error
    if (!$sticker) {
        return $this->json(['error' => 'sticker not found'], Response::HTTP_NOT_FOUND);
    }

    // Désérialiser les données JSON et les assigner au sticker existant
    // Deserialize JSON datas and assign them to existing sticker
    $sticker = $serializer->deserialize($jsonContent, Sticker::class, 'json', ['object_to_populate' => $sticker]);

    // Valider l'entité avec notre validation
    // Validate entity
    $errors = $validator->validate($sticker);

    if (count($errors) > 0) {
        return $this->json($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
    }


    return $this->json(
        $sticker,
        Response::HTTP_OK,
        [
            'Location' => $this->generateUrl('api_stickers', ['id' => $sticker->getId()])
        ],
        ['groups' => 'get_sticker']
    );
}

    /**
     * API pour créer un sticker dont les données ont été fournies en 'POST'
     * Method = POST, données post encodées json dans le corps de la Requette
     * 
     * API to create a new sticker
     * Method POST with encoded JSON datas in request
     * 
     * @Route("/api/sticker/new", name="api_sticker_new", methods={"POST"}) 
     */
    public function addSticker (
        Request $request, 
        SerializerInterface $serializer,
        StickerRepository $sr
         ): Response

        {

         $jsonContent = $request->getContent();

         $sticker = $serializer->deserialize($jsonContent, Sticker::class,'json');

        // $errors = $validator->validate($sticker);
        
        // if (count($errors) > 0) {
        //    return $this->json($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        // }

         $sr->add($sticker,true);

         return $this->json(

        $sticker, 
        // Code de retour HTTP
        // Return HTTP code
        Response::HTTP_CREATED,

        [
            // Nom de l'en-tête + URL
            // Name of header + URL
            'Location' => $this->generateUrl('api_sticker', ['id' => $sticker->getId()])
        ],

        ['groups' => 'get_new_sticker']

         );       
    }


     /**
     * API de suppression d'un sticker dont les données ont été fournies en 'POST'
     * 
     * API to delete a sticker whose datas are sent in POST
     *
     * 
     * @Route("/api/sticker/delete/{id<\d+>}", name="api_sticker_post", methods={"DELETE"})
     */
    public function removeSticker(StickerRepository $sr,$id): Response

        {

         $sticker = $sr->find($id);
   
        
        // Méthode remove du repository

        $sr->remove($sticker, true);

        return $this->json(
            // La liste des stickers à sérialiser
            // List of stickers to serialize
            $sticker,
            // Code de retour HTTP
            // Return HTTP code
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            // Array of headers with response to send
            [],
            // Groupes a envoyer avec la réponse
            // Groups to send with response
            ['groups' => 'get_sticker']
        );
    }
}

