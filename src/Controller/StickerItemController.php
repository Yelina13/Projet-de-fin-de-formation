<?php

namespace App\Controller;

use App\Entity\StickerItem;
use App\Form\StickerItemType;
use App\Repository\StickerItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sticker/item")
 */
class StickerItemController extends AbstractController
{
    /**
     * @Route("/", name="app_sticker_item_index", methods={"GET"})
     */
    public function index(StickerItemRepository $stickerItemRepository): Response
    {
        return $this->render('sticker_item/index.html.twig', [
            'sticker_items' => $stickerItemRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_sticker_item_new", methods={"GET", "POST"})
     */
    public function new(Request $request, StickerItemRepository $stickerItemRepository): Response
    {
        $stickerItem = new StickerItem();
        $form = $this->createForm(StickerItemType::class, $stickerItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $stickerItemRepository->add($stickerItem, true);

            return $this->redirectToRoute('app_sticker_item_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sticker_item/new.html.twig', [
            'sticker_item' => $stickerItem,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_sticker_item_show", methods={"GET"})
     */
    public function show(StickerItem $stickerItem): Response
    {
        return $this->render('sticker_item/show.html.twig', [
            'sticker_item' => $stickerItem,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_sticker_item_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, StickerItem $stickerItem, StickerItemRepository $stickerItemRepository): Response
    {
        $form = $this->createForm(StickerItemType::class, $stickerItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $stickerItemRepository->add($stickerItem, true);

            return $this->redirectToRoute('app_sticker_item_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sticker_item/edit.html.twig', [
            'sticker_item' => $stickerItem,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_sticker_item_delete", methods={"POST"})
     */
    public function delete(Request $request, StickerItem $stickerItem, StickerItemRepository $stickerItemRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stickerItem->getId(), $request->request->get('_token'))) {
            $stickerItemRepository->remove($stickerItem, true);
        }

        return $this->redirectToRoute('app_sticker_item_index', [], Response::HTTP_SEE_OTHER);
    }
}
