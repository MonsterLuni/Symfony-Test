<?php

namespace App\Controller;

use App\Entity\Haustier;
use App\Repository\HaustierRepository;
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
     * @Route("/rest",name="create_haustier",methods={"POST"})
     */
    public function create(Request $request, HaustierRepository $repository): JsonResponse
    {
        $name = $request->request->get(key: "name");
        $datum = $request->request->get(key: "datum");
        $gewicht = $request->request->get(key: "gewicht");
        $groesse = $request->request->get(key: "groesse");

        $haustier = new Haustier();
        $haustier->setName($name);
        $haustier->setGeburtsdatum(\DateTime::createFromFormat("d.m.Y",$datum));
        $haustier->setGewicht($gewicht);
        $haustier->setGroesse($groesse);

        $repository->save($haustier, true);

        return $this->json($haustier);
    }

    /**
     * @Route("/rest/{id}",name="update_haustier", methods={"PUT"})
     */

    public function update($id, Request $request, HaustierRepository $repository): JsonResponse
    {
        $gewicht = $request->headers->get(key: "gewicht");
        $groesse = $request->headers->get(key: "groesse");

        $haustierToUpdate = $repository->find($id);

        if($haustierToUpdate){
            $haustierToUpdate->setGroesse($groesse);
            $haustierToUpdate->setGewicht($gewicht);

            $repository->save($haustierToUpdate, true);

            return $this->json("Haustier wurde gespeichert.");
        }

        return $this->json("Kein Haustier für ID " . $id . " gefunden");

    }

    /**
     * @Route("/rest/{id}",name="delete_haustier", methods={"DELETE"})
     */

    public function delete($id, HaustierRepository $repository): JsonResponse
    {
        $haustierToDelete = $repository->find($id);
        if($haustierToDelete){
            $repository->remove($haustierToDelete, true);

            return $this->json("Haustier mit ID " . $id . " erfolgreich gelöscht");
        }
        return $this->json("Kein Haustier für ID " .$id . " gefunden");
    }

    /**
     * @Route("/rest",name="Loadall_index", methods={"GET"})
     */

    public function loadwhatyouwant(HaustierRepository $repository, Request $request)
    {
        $max_groesse = $request->query->get("groessemax") ?? 99998;
        $min_groesse = $request->query->get("groessemin") ?? 0;

        if ($min_groesse == 0 && $max_groesse == 99998){
            $haustiere = $repository->findAll();
        }
        else{
            $haustiere = $repository->filter($max_groesse, $min_groesse);
        }

        $haustierJsonArray = [];


        foreach ($haustiere as $haustier){
            $haustierJsonArray[] = [
                "name" => $haustier->getName(),
                "geburtsdatum" => $haustier->getGeburtsdatum(),
                "gewicht" => $haustier->getGewicht(),
                "groesse" => $haustier->getGroesse(),
            ];
        }
        return $this->json($haustierJsonArray);
    }


}
