<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;



class APIController extends AbstractController
{
    /**
     * @Route("/a/p/i", name="a_p_i")
     */
    public function index(ActorRepository $assetRepository)
    {
        $assets = $assetRepository->findAll();
        $data = $this->get('jms_serializer')->serialize($assets, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;


        /*return $this->render('api/index.html.twig', [
            'controller_name' => 'APIController',
        ]);*/
    }
}
