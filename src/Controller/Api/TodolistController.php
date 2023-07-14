<?php

namespace App\Controller\Api;

use App\Entity\Todolist;
use App\Repository\TodolistRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class TodolistController extends AbstractController
{
    /**
     * API de récupération de l'ensemble des Todolists avec le nom de l'auteur 
     * je rajoute un groupe pour ça ['get_Todolists']
     * Method = GET, pas de paramètre
     * 
     * @Route("/api/todolists", name="api_todolists", methods={"GET"})
     */
    public function articles(TodolistRepository $tr): Response
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
            ['groups' => ['get_Todolists']]
        );
    }


      /**
     * API de récupération d'une seule Todolist avec le nom de l'auteur
     * Method = GET, pas de paramètre
     *
     * @Route("/api/todolist/{id<\d+>}", name="api_todolist", methods={"GET"})
     */
    public function Todolist (TodolistRepository $tr, int $id): Response
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
            ['groups' => ['get_Todolists']]
        );
    }



     /**
     * API de suppression d'une todolist dont les données ont été fournies en 'POST'
     * Method = POST, données post encodées json dans le corps de la Requette
     * 
     * @Route("/api/todolist/delete/{id<\d+>}", name="api_todolist_post", methods={"POST"})
     */
    public function supprimerTodolist(TodolistRepository $tr,$id): Response

        {

         $todolist = $tr->find($id);
   
        
        // Méthode remove du repository

        $tr->remove($todolist, true);

        return $this->json(
            // La liste des films à sérialiser
            $todolist,
            // Code de retour HTTP
            202,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            [],
            // Groupes a envoyer avec la réponse
            ['groups' => 'get_todolist']
        );
    }
}

