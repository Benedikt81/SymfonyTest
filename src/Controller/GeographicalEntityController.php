<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GeographicalEntityController extends AbstractController
{
    /**
     * @Route("/geographical/entity", name="geographical_entity")
     */
    public function index()
    {
        return $this->render('geographical_entity/index.html.twig', [
            'controller_name' => 'GeographicalEntityController',
        ]);
    }
}
