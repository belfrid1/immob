<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontofficeController extends AbstractController
{
    /**
     * @Route("/", name="frontoffice")
     */
    public function index(): Response
    {
        return $this->render('frontoffice/index.html.twig', [
            'controller_name' => 'FrontofficeController',
        ]);
    }
    /**
     * @Route("/search", name="search")
     */
    public function search(): Response
    {
        return $this->render('frontoffice/search.html.twig');
    }
}
