<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/utilisateurs", name="utilisateurs")
     */
    public function index(): Response
    {
        return $this->render('backoffice/utilisateurs/index.html.twig');
    }
}
