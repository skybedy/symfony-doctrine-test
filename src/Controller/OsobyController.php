<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Osoby;
use App\Entity\Tymy;
use Doctrine\Persistence\ManagerRegistry;

class OsobyController extends AbstractController
{
    /**
     * @Route("/osoby", name="app_osoby")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
       
        
        $osoby = $doctrine->getRepository(Osoby::class)->find(7);
        $tym = $osoby->getTym()->getNazevTymu();
        
        /*
        $osoby = $doctrine->getRepository(Osoby::class)->findBy(
            Array(),
            Array(),
            10,
            0
        );*/

        return $this->render('osoby/index.html.twig', [
            'osoby' => $osoby,
            'tym' => $tym
        ]);
    }

    /**
     * @Route("/osoby/show", name="app_show")
     */

    public function show(ManagerRegistry $doctrine){
        $tym = $doctrine->getRepository(Tymy::class)->find(10);
       
        $osoby = $tym->getOsoby1test();

/*
        foreach ($tym->getOsoby2s() as $x) {
            echo $x->jmeno;
        }*/

        dd($tym,$osoby);
       // dd($osoby);

        return $this->render('osoby/index.html.twig', [
           'osoby' => $osoby,
            'tym' => $tym
        ]);


        
    }

    public function test(){
        return "hoj";
    }

}
