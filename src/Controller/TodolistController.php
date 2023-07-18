<?php

namespace App\Controller;

use App\Entity\Todolist;
use App\Form\TodolistType;
use App\Repository\TodolistRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/todolist")
 */
class TodolistController extends AbstractController
{
    /**
     * @Route("/", name="app_todolist_index", methods={"GET"})
     */
    public function index(TodolistRepository $todolistRepository,PaginatorInterface $paginator, Request $request): Response
    {

        $data = $todolistRepository->findall();

        $todolists = $paginator->paginate(
        $data,
        $request->query->getInt('page',1),
        10
        );
        return $this->render('todolist/index.html.twig', [
            'todolists' => $todolists,
        ]);
    }

    /**
     * @Route("/new", name="app_todolist_new", methods={"GET", "POST"})
     */
    public function new(Request $request, TodolistRepository $todolistRepository): Response
    {
        $todolist = new Todolist();
        $form = $this->createForm(TodolistType::class, $todolist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $todolistRepository->add($todolist, true);

            $this->addFlash('info','Todoliste crée avec succès !') ;

            return $this->redirectToRoute('app_todolist_index', [], Response::HTTP_SEE_OTHER);
        }

        

        return $this->renderForm('todolist/new.html.twig', [
            'todolist' => $todolist,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id<\d+>}", name="app_todolist_show", methods={"GET"})
     */
    public function show(Todolist $todolist): Response
    {
        return $this->render('todolist/show.html.twig', [
            'todolist' => $todolist,
        ]);
    }

    /**
     * @Route("/{id<\d+>}/edit", name="app_todolist_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Todolist $todolist, TodolistRepository $todolistRepository): Response
    {
        $form = $this->createForm(TodolistType::class, $todolist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $todolistRepository->add($todolist, true);

            $this->addFlash('info','Todoliste modifiée avec succès !') ;

            return $this->redirectToRoute('app_todolist_index', [], Response::HTTP_SEE_OTHER);
        }

        

        return $this->renderForm('todolist/edit.html.twig', [
            'todolist' => $todolist,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id<\d+>}", name="app_todolist_delete", methods={"POST"})
     */
    public function delete(Request $request, Todolist $todolist, TodolistRepository $todolistRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$todolist->getId(), $request->request->get('_token'))) {
            $todolistRepository->remove($todolist, true);
        }

        $this->addFlash('info','Todoliste supprimée avec succès !') ;

        return $this->redirectToRoute('app_todolist_index', [], Response::HTTP_SEE_OTHER);
    }
}
