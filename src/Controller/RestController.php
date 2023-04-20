<?php

namespace App\Controller;

use App\Entity\Haustier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api", name="api_")
 */
class RestController extends AbstractController
{
    /**
     * @Route("/rest",name="get_index", methods={"GET"})
     */

    public function get(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $test = $request->query->get(key:"input");

        return $this->json([
            $test
        ]);
    }
    /**
     * @Route("/rest",name="create_haustier",methods={"POST"})
     */
    public function create(Request $request)
    {
        $name = $request->request->get(key: "name");
        $datum = $request->request->get(key: "datum");
        $gewicht = $request->request->get(key: "gewicht");
        $groesse = $request->request->get(key: "groesse");

        $haustier = new Haustier();
        $haustier->setName($name);
        $haustier->setGeburtsdatum(\DateTime::createFromFormat("d.m.Y",$datum));
        $haustier->setGewicht($gewicht);
        $haustier->setGrösse($groesse);

        return $this->json($haustier);
    }

    /**
     * @Route("/rest",name="put_index", methods={"PUT"})
     */

    public function put(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller! (PUT)',
            'path' => 'src/Controller/RestController.php',
        ]);
    }

    /**
     * @Route("/rest",name="put_index", methods={"DELETE"})
     */

    public function delete(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller! (DELETE)',
            'path' => 'src/Controller/RestController.php',
        ]);
    }


}
