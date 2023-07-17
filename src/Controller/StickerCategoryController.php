<?php

namespace App\Controller;

use App\Entity\StickerCategory;
use App\Form\StickerCategoryType;
use App\Repository\StickerCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sticker/category")
 */
class StickerCategoryController extends AbstractController
{
    /**
     * @Route("/", name="app_sticker_category_index", methods={"GET"})
     */
    public function index(StickerCategoryRepository $stickerCategoryRepository): Response
    {
        return $this->render('sticker_category/index.html.twig', [
            'sticker_categories' => $stickerCategoryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_sticker_category_new", methods={"GET", "POST"})
     */
    public function new(Request $request, StickerCategoryRepository $stickerCategoryRepository): Response
    {
        $stickerCategory = new StickerCategory();
        $form = $this->createForm(StickerCategoryType::class, $stickerCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $stickerCategoryRepository->add($stickerCategory, true);

            $this->addFlash('info','Catégorie d\'étiquette crée avec succès !') ;

            return $this->redirectToRoute('app_sticker_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sticker_category/new.html.twig', [
            'sticker_category' => $stickerCategory,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id<\d+>}", name="app_sticker_category_show", methods={"GET"})
     */
    public function show(StickerCategory $stickerCategory): Response
    {
        return $this->render('sticker_category/show.html.twig', [
            'sticker_category' => $stickerCategory,
        ]);
    }

    /**
     * @Route("/{id<\d+>}/edit", name="app_sticker_category_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, StickerCategory $stickerCategory, StickerCategoryRepository $stickerCategoryRepository): Response
    {
        $form = $this->createForm(StickerCategoryType::class, $stickerCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $stickerCategoryRepository->add($stickerCategory, true);

            $this->addFlash('info','Catégorie d\'étiquette modifiée avec succès !') ;

            return $this->redirectToRoute('app_sticker_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sticker_category/edit.html.twig', [
            'sticker_category' => $stickerCategory,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id<\d+>}", name="app_sticker_category_delete", methods={"POST"})
     */
    public function delete(Request $request, StickerCategory $stickerCategory, StickerCategoryRepository $stickerCategoryRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stickerCategory->getId(), $request->request->get('_token'))) {
            $stickerCategoryRepository->remove($stickerCategory, true);
        }

        $this->addFlash('info','Catégorie d\'étiquette supprimée avec succès !') ;

        return $this->redirectToRoute('app_sticker_category_index', [], Response::HTTP_SEE_OTHER);
    }
}
