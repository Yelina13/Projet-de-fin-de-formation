<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Repository\UserRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserController extends AbstractController
{
    
   

      /**
     * API de récupération d'une seul user 
     * Method = GET, pas de paramètre
     *
     * @Route("/api/user/{id<\d+>}", name="api_user", methods={"GET"})
     */
    public function user (UserRepository $ur, int $id): Response
    {
        $user = $ur->find($id);

        return $this->json(
            
            $user,
            // Code de retour HTTP
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            [],
            // Groupes a envoyer avec la réponse
            ['groups' => ['get_user','get_userAll']]
        );
    }

/**
 * API de modification d'un user existant
 *
 * @Route("/api/user/edit/{id<\d+>}", name="api_user_update", methods={"PUT"}) 
 */
public function updateUser(
    Request $request,
    UserRepository $ur,
    SerializerInterface $serializer,
    ValidatorInterface $validator,
    UserPasswordHasherInterface $userPasswordHasher,
    int $id
): Response {
    $jsonContent = $request->getContent();

    // Vérifie si le user existe en utilisant son ID
    $user = $ur->find($id);

    // Si le user n'est pas trouvé, retourner une erreur
    if (!$user) {
        return $this->json(['error' => 'user not found'], Response::HTTP_NOT_FOUND);
    }

    $user = $serializer->deserialize($jsonContent, User::class, 'json', ['object_to_populate' => $user]);

    // Valider l'entité avec notre validation
    $errors = $validator->validate($user);

    if (count($errors) > 0) {
        return $this->json($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    // Hacher le mot de passe
    $hashedPassword = $userPasswordHasher->hashPassword($user, $user->getPassword());

    // On écrase le mot de passe en clair par le mot de passe haché
    $user->setPassword($hashedPassword);
    
    // cette fonction a été mis car comparé aux autres Controller d'Api avec le edit , ici sans cette fonction cela n'enregistre pas dans la BDD
    
    $ur->update($user,true); // fonction crée dans le UserRepository ( même si le $ur->add($user,true) fonctionne )

    return $this->json(
        $user,
        Response::HTTP_OK,
        [
            'Location' => $this->generateUrl('api_user', ['id' => $user->getId()])
        ],
        ['groups' => 'get_user',]
    );
}
    /**
     * API pour créer une user dont les données ont été fournies en 'POST'
     * Method = POST, données post encodées json dans le corps de la Requette
     * 
     * @Route("/api/user/new", name="api_user_new", methods={"POST"}) 
     */
    public function addUser (
        Request $request, 
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        UserPasswordHasherInterface $userPasswordHasher,
        userRepository $tr
         ): Response

        {

         $json = $request->getContent();

         $user = $serializer->deserialize($json, User::class,'json');

         $errors = $validator->validate($user);
        
         if (count($errors) > 0) {
            return $this->json($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $hashedPassword = $userPasswordHasher->hashPassword($user, $user->getPassword());

        // On écrase le mot de passe en clair par le mot de passe haché
        $user->setPassword($hashedPassword);


         $tr->add($user,true);

         return $this->json(

        $user, 
        // Code de retour HTTP
        Response::HTTP_CREATED,

        [
            // Nom de l'en-tête + URL
            'Location' => $this->generateUrl('api_user', ['id' => $user->getId()])
        ],

        ['groups' => 'get_user']

         );       
    }


     /**
     * API de suppression d'une user dont les données ont été fournies en 'POST'
     *
     * 
     * @Route("/api/user/delete/{id<\d+>}", name="api_user_post", methods={"DELETE"})
     */
    public function removeUser(UserRepository $ur,int $id): Response

        {

         $user = $ur->find($id);
   
        // Méthode remove du repository

        $ur->remove($user, true);

        return $this->json(
        
            $user,
            // Code de retour HTTP
            200,
            // Tableau des headers complémentaires à envoyer 
            // Avec la réponse
            [],
            // Groupes a envoyer avec la réponse
            ['groups' => 'get_user']
        );
    }
}

