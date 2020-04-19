<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ValueController extends AbstractController
{
    /**
     * @Route("/value", name="value")
     */
    public function index()
    {
        return $this->render('value/index.html.twig', [
            'controller_name' => 'ValueController',
        ]);
    }
}
