<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Entity\Bien;
use App\Entity\Contrat;
use App\Entity\User;
use App\Repository\BienRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BackofficeController extends AbstractController
{
    /**
     * @Route("admin/backoffice", name="backoffice")
     */
    public function index(): Response
    {

        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $biens = $this->getDoctrine()
            ->getRepository(Bien::class)
            ->findAll();

            $annonces = $this->getDoctrine()
            ->getRepository(Annonce::class)
            ->findAll();
            $utilisateurs = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();
            $contrats = $this->getDoctrine()
            ->getRepository(Contrat::class)
            ->findAll();

        return $this->render('backoffice/index.html.twig', [
            'biens' =>$biens,
            'annonces' =>$annonces,
            'utilisateurs' =>$utilisateurs,
            'contrats' =>$contrats,
        ]);
    }
}
