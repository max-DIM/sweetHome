<?php

namespace App\Controller;

use App\Entity\Equipment;
use App\Entity\Nodevisitor;
use GraphAware\Neo4j\OGM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index(EntityManagerInterface $emg)
    {

        $equipment = new Equipment();
        $equipment->setName("douche");

        $visitorId = $this->get("session")->get("visitorId");

        $visitor = $emg->getRepository(Nodevisitor::class)->findOneBy(["name" => $visitorId]);

        if (!$visitor){
            $visitor = new Nodevisitor($visitorId,0);
            $emg.persist($visitor);
            $emg.flush();
        }



        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'eqt' => $equipment
        ]);
    }
}
