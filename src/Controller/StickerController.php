<?php

namespace App\Controller;

use App\Entity\Sticker;
use App\Form\StickerType;
use App\Repository\StickerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sticker")
 */
class StickerController extends AbstractController
{
    /**
     * @Route("/", name="app_sticker_index", methods={"GET"})
     */
    public function index(StickerRepository $stickerRepository): Response
    {
        return $this->render('sticker/index.html.twig', [
            'stickers' => $stickerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_sticker_new", methods={"GET", "POST"})
     */
    public function new(Request $request, StickerRepository $stickerRepository): Response
    {
        $sticker = new Sticker();
        $form = $this->createForm(StickerType::class, $sticker);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $stickerRepository->add($sticker, true);


               $this->addFlash('info','Etiquette créée avec succès !') ; // équivalent à "$request->getSession()->getFlashBag()->add()"

            return $this->redirectToRoute('app_sticker_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sticker/new.html.twig', [
            'sticker' => $sticker,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id<\d+>}", name="app_sticker_show", methods={"GET"})
     */
    public function show(Sticker $sticker): Response
    {
        return $this->render('sticker/show.html.twig', [
            'sticker' => $sticker,
        ]);
    }

    /**
     * @Route("/{id<\d+>}/edit", name="app_sticker_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Sticker $sticker, StickerRepository $stickerRepository): Response
    {
        $form = $this->createForm(StickerType::class, $sticker);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $stickerRepository->add($sticker, true);

            return $this->redirectToRoute('app_sticker_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sticker/edit.html.twig', [
            'sticker' => $sticker,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id<\d+>}", name="app_sticker_delete", methods={"POST"})
     */
    public function delete(Request $request, Sticker $sticker, StickerRepository $stickerRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sticker->getId(), $request->request->get('_token'))) {
            $stickerRepository->remove($sticker, true);
        }

        return $this->redirectToRoute('app_sticker_index', [], Response::HTTP_SEE_OTHER);
    }
}
