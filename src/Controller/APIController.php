<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\AssetRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;


class APIController extends AbstractController
{
    /**
     * @Route("/api/assets", name="api",methods={"GET"})
     */
    public function index(AssetRepository $assetRepository)
    {


        $assets = $assetRepository->findAll();

        $array = array();

        foreach ($assets as $asset) {

            $array[] = [
                "descr" => $asset->getDescript(),
                "state" => $asset->getState(),
                "size" => $asset->getSize(),
            ];
        }

        return new JsonResponse($array);


        /*
        //avec jms_serializer
        $assets = $assetRepository->findAll();


        $data = $this->get('jms_serializer')->serialize($assets, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
        */

        /*return $this->render('api/index.html.twig', [
            'controller_name' => 'APIController',
        ]);*/
    }
}
