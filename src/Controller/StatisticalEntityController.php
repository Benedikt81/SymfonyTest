<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StatisticalEntityController extends AbstractController
{
    /**
     * @Route("/statistical/entity", name="statistical_entity")
     */
    public function index()
    {
        return $this->render('statistical_entity/index.html.twig', [
            'controller_name' => 'StatisticalEntityController',
        ]);
    }
}
