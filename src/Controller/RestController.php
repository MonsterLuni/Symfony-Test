<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
/**
* @Route("/api", name="api_")
 */
class RestController extends AbstractController
{
    /**
     * @Route("/rest",name="get_index", methods={"GET"})
     */

    public function get(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller! (GET)',
            'path' => 'src/Controller/RestController.php',
        ]);
    }

    /**
     * @Route("/rest",name="post_index", methods={"POST"})
     */

    public function post(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller! (POST)',
            'path' => 'src/Controller/RestController.php',
        ]);
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