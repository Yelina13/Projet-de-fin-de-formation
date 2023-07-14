<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="app_user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

      /**
     * @Route("/new", name="app_user_new", methods={"GET", "POST"})
     */
    public function new(Request $request, UserRepository $userRepository, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        
        $user = new User();

       
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            // On va hacher le mot de passe pour plus de sécurité en mettant dans l'injection de dépendance "UserPasswordHasherInterface $userPasswordHasher"
            // - on lui donne sur la méthode hashPassword, notre $user
            // - et le mot de passe en clair (qui est déjà dans le user !)
            $hashedPassword = $userPasswordHasher->hashPassword($user, $user->getPassword());

            // On écrase le mot de passe en clair par le mot de passe haché
            $user->setPassword($hashedPassword);

            // On arrive ici si le formulaire est soumis (POST)
            // et valide => Respecte les contraintes @ Assert
            $userRepository->add($user, true);

            // On revient sur la page liste users
            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        // Si pb validation ou 1er affichage
        return $this->renderForm('user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id<\d+>}", name="app_user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id<\d+>}/edit", name="app_user_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request,User $user,UserRepository $userRepository,UserPasswordHasherInterface $userPasswordHasher): Response
    {
         // On refait la même procédure pour hasher le password comme pour la création de l'user .
           
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
         {
            $hashedPassword = $userPasswordHasher->hashPassword($user, $user->getPassword());

            // On écrase le mot de passe en clair par le mot de passe haché
            $user->setPassword($hashedPassword);
            
            $userRepository->add($user, true);

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id<\d+>}", name="app_user_delete", methods={"POST"})
     */
    public function delete(Request $request, User $user, UserRepository $userRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $userRepository->remove($user, true);
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
