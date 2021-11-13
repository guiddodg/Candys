<?php


namespace App\Controller\Api\Articulo;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgregarStockController extends AbstractController
{

    /**
     * @Route("/home",name="home")
     *
     */
    public function home() :Response
    {
        $response = new Response();
        $response->setContent('<div>Hola Mundo</div>');

        return $response;
    }
}