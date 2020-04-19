<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NamedEntityController extends AbstractController
{
    /**
     * @Route("/named/entity", name="named_entity")
     */
    public function index()
    {
        return $this->render('named_entity/index.html.twig', [
            'controller_name' => 'NamedEntityController',
        ]);
    }
}
