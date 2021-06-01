<?php

namespace App\Controller;

use App\Entity\Bien;
use App\Entity\TypeBien;
use App\Entity\Ville;
use Symfony\Component\HttpFoundation\Request;
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
        $biens = $this->getDoctrine()
            ->getRepository(Bien::class)
            ->findAll();

        //dd($biens[0]);


        return $this->render('frontoffice/index.html.twig', [
            'controller_name' => 'FrontofficeController',
            'biens' => $biens,
        ]);
    }
    /**
     * @Route("/search", name="search")
     */
    public function search(): Response
    {
        $type_biens = $this->getDoctrine()
            ->getRepository(TypeBien::class)
            ->findAll();
        $villes = $this->getDoctrine()
            ->getRepository(Ville::class)
            ->findAll();


        return $this->render('frontoffice/search.html.twig',['type_biens' => $type_biens,'villes' => $villes,]);
    }

    /**
     * @Route("/search/result", name="searchResult")
     */
    public function searchAction(Request $request)
    {
        $type_bien = $request->get("type_bien");
        $surface= $request->get("surface");
        $budget = $request->get("budget");
        $ville = $request->get("ville");


        //dd($request);

        $biens = $this->getDoctrine()
            ->getRepository(Bien::class)
            ->findSearchFilter($ville,$surface,$type_bien);


        //dd($biens);

        return $this->render('frontoffice/searchResult.html.twig', [
            'controller_name' => 'FrontofficeController',
            'biens' => $biens,
        ]);
    }
}
