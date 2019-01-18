<?php

namespace App\Controller;

use App\Entity\Equipment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {

        $equipment = new Equipment();
        $equipment->setName("douche");

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'eqt' => $equipment
        ]);
    }
}
