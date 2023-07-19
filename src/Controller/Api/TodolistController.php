<?php

namespace App\Controller\Api;

use App\Entity\Todolist;
use App\Repository\TodolistRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class TodolistController extends AbstractController
{
    /**
     * API de récupération de l'ensemble des Todolists avec le nom de l'auteur 
     * je rajoute un groupe pour ça et viter un  ['get_Todolist']
     * Method = GET, pas de paramètre
     * 
     * @Route("/api/todolists", name="api_todolists", methods={"GET"})
     */
    public function todolists(TodolistRepository $tr): Response
    {
        $TodolistList = $tr->findAll();

        return $this->json(
            // La liste des todolists à sérialiser
            $TodolistList,
            // Code de retour HTTP
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            [],
            // Groupes a envoyer avec la réponse
            ['groups' => ['get_todolist']]
        );
    }

      /**
     * API de récupération d'une seule Todolist avec le nom de l'auteur
     * Method = GET, pas de paramètre
     *
     * @Route("/api/todolist/{id<\d+>}", name="api_todolist", methods={"GET"})
     */
    public function todolist(TodolistRepository $tr, int $id): Response
    {
        $Todolist = $tr->find($id);

        return $this->json(
            
            $Todolist,
            // Code de retour HTTP
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            [],
            // Groupes a envoyer avec la réponse
            ['groups' => ['get_todolist']]
        );
    }

    /**
 * API de modification d'une todoliste existante
 * Method = POST, données post encodées json dans le corps de la Requete
 *
 * @Route("/api/todolist/edit/{id}", name="api_todolist_update", methods={"PUT"}) 
 */
public function updateTodolist(
    Request $request,
    TodolistRepository $tr,
    SerializerInterface $serializer,
    ValidatorInterface $validator,
    $id
): Response {
    $jsonContent = $request->getContent();

    // Vérifie si la todolist existe en utilisant son ID
    $todolist = $tr->find($id);

    // Si la todolist n'est pas trouvé, retourner une erreur
    if (!$todolist) {
        return $this->json(['error' => 'todolist not found'], Response::HTTP_NOT_FOUND);
    }

    // Désérialiser les données JSON et les assigner au todolit existant
    $todolist = $serializer->deserialize($jsonContent, Todolist::class, 'json', ['object_to_populate' => $todolist]);

    // Valider l'entité avec notre validation
    $errors = $validator->validate($todolist);

    if (count($errors) > 0) {
        return $this->json($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
    }


    return $this->json(
        $todolist,
        Response::HTTP_OK,
        [
            'Location' => $this->generateUrl('api_todolists', ['id' => $todolist->getId()])
        ],
        ['groups' => 'get_todolist']
    );
}

    /**
     * API pour créer une todolist dont les données ont été fournies en 'POST'
     * Method = POST, données post encodées json dans le corps de la Requette
     * 
     * @Route("/api/todolist/new", name="api_todolist_new", methods={"POST"}) 
     */
    public function addTodolist (
        Request $request, 
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        TodolistRepository $tr
         ): Response

        {

         $json = $request->getContent();

         $todolist = $serializer->deserialize($json, Todolist::class,'json');



         $errors = $validator->validate($todolist);
        
         if (count($errors) > 0) {
            return $this->json($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

         $tr->add($todolist,true);

         return $this->json(

        $todolist, 
        // Code de retour HTTP
        Response::HTTP_CREATED,

        [
            // Nom de l'en-tête + URL
            'Location' => $this->generateUrl('api_todolist', ['id' => $todolist->getId()])
        ],

        ['groups' => 'get_new_todolist']

         );       
    }


     /**
     * API de suppression d'une todolist dont les données ont été fournies en 'POST'
     *
     * 
     * @Route("/api/todolist/delete/{id<\d+>}", name="api_todolist_post", methods={"DELETE"})
     */
    public function removeTodolist(TodolistRepository $tr,$id): Response

        {

         $todolist = $tr->find($id);
   
        
        // Méthode remove du repository

        $tr->remove($todolist, true);

        return $this->json(
            // La liste des todolits à sérialiser
            $todolist,
            // Code de retour HTTP
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            [],
            // Groupes a envoyer avec la réponse
            ['groups' => 'get_todolist']
        );
    }
}

