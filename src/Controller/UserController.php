<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Knp\Component\Pager\PaginatorInterface;
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
    public function index(UserRepository $userRepository,PaginatorInterface $paginator, Request $request): Response
    {

        $data = $userRepository->findall();

            $users = $paginator->paginate(
            $data,
            $request->query->getInt('page',1),
            10
            );
        return $this->render('user/index.html.twig', [
            'users' => $users,
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
            // Hasing password for more security using the dependency injection
            // - giving it the method hashPassword, $user
            // - and clear password already stored in user
            $hashedPassword = $userPasswordHasher->hashPassword($user, $user->getPassword());

            // On écrase le mot de passe en clair par le mot de passe haché
            // Dumping password and replace with hashed one
            $user->setPassword($hashedPassword);

            // On arrive ici si le formulaire est soumis (POST)
            // et valide => Respecte les contraintes @ Assert
            // If form is submitted, we validate, according to constraints
            $userRepository->add($user, true);

            $this->addFlash('info','Utilisateur crée avec succès !') ;

            // On revient sur la page liste users
            // Back to user list page
            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        // Si pb validation ou 1er affichage
        // If validation issue or 1st display
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
         // Same process than hashing password for user creation
           
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
         {
            $hashedPassword = $userPasswordHasher->hashPassword($user, $user->getPassword());

            // On écrase le mot de passe en clair par le mot de passe haché
            // Dump clear password and replace with hashed one
            $user->setPassword($hashedPassword);
            
            $userRepository->add($user, true);

            $this->addFlash('info','Utilisateur modifié avec succès !') ;

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

        $this->addFlash('info','Utilisateur supprimé avec succès !') ;

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
