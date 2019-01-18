<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Entity\Asset;
use App\Entity\AssetFilter;
use App\Entity\AssetSearch;
use App\Form\AssetFilterType;
use App\Form\AssetSearchType;
use App\Form\AssetType;
use App\Repository\ActorRepository;
use App\Repository\AssetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Zend\Code\Annotation\AnnotationCollection;

/**
 * @Route("/asset")
 */
class AssetController extends AbstractController
{
    /**
     * @Route("/", name="asset_index", methods={"GET"})
     */
    public function index(AssetRepository $assetRepository, Request $request): Response
    {
        $search = new AssetFilter();
        $form = $this->createForm(AssetFilterType::class, $search);
        $form->handleRequest($request);

        return $this->render('asset/index.html.twig', [
            'assets' => $assetRepository->findAll(),
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/new", name="asset_new", methods={"GET","POST"})
     */
    public function new(Request $request, ActorRepository $actorRepository): Response
    {

    //TODO Remplacer cette ligne de script par le user connecté
        $user = $actorRepository->find(1);


        /*$user = new Actor();
        $user->setFirstName("steph");
        $user->setLastName("steph");
        $user->setemail("steph");
        $user->setLogin("steph");
        $user->setPassword("steph");
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();*/


        $asset = new Asset();

        $asset->setActor($user);

        $form = $this->createForm(AssetType::class, $asset);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($asset);
            $entityManager->flush();

            return $this->redirectToRoute('asset_index');
        }

        //$user = $asset->getActor();


        return $this->render('asset/new.html.twig', [
            'asset' => $asset,
            'form' => $form->createView(),
            'user' => $user
        ]);

    }

    /**
     * @Route("/{id}", name="asset_show", methods={"GET"})
     */
    public function show(Asset $asset): Response
    {
        return $this->render('asset/show.html.twig', [
            'asset' => $asset,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="asset_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Asset $asset): Response
    {
        $form = $this->createForm(AssetType::class, $asset);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('asset_index', [
                'id' => $asset->getId(),
            ]);
        }

        return $this->render('asset/edit.html.twig', [
            'asset' => $asset,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="asset_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Asset $asset): Response
    {
        if ($this->isCsrfTokenValid('delete' . $asset->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($asset);
            $entityManager->flush();
        }

        return $this->redirectToRoute('asset_index');
    }
}
