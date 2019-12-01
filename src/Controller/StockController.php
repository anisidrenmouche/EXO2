<?php

namespace App\Controller;

use App\Entity\Stock;
use App\Form\StockType;
use App\Repository\StockRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class StockController extends AbstractController
{
    /**
     * @Route("/info", name="information", methods={"GET"})
     */
    public function information(StockRepository $stockRepository)
    {
        return $this->render('info/information.html.twig', [
            'stocks' => $stockRepository->findAll(),
        ]);
    }

    /**
     * @Route("/stock", name="stockage", methods={"GET"})
     */
    public function stockage(StockRepository $stockRepository): Response
    {
        return $this->render('stock/stockage.html.twig', [
            'stocks' => $stockRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="nouveau", methods={"GET","POST"})
     */
    public function nouveau(Request $request): Response
    {
        $stock = new Stock();
        $form = $this->createForm(StockType::class, $stock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($stock);
            $entityManager->flush();

            return $this->redirectToRoute('stockage');
        }

        return $this->render('stock/nouveau.html.twig', [
            'stock' => $stock,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="afficher", methods={"GET"})
     */
    public function afficher(Stock $stock): Response
    {
        return $this->render('stock/afficher.html.twig', [
            'stock' => $stock,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edition", methods={"GET","POST"})
     */
    public function edition(Request $request, Stock $stock): Response
    {
        $form = $this->createForm(StockType::class, $stock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('stockage');
        }

        return $this->render('stock/edition.html.twig', [
            'stock' => $stock,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="supprimer", methods={"DELETE"})
     */
    public function supprimer(Request $request, Stock $stock): Response
    {
        if ($this->isCsrfTokenValid('supprimer'.$stock->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($stock);
            $entityManager->flush();
        }

        return $this->redirectToRoute('stockage');
    }
}
