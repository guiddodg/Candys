<?php


namespace App\Controller\Api\Articulo;

use App\Repository\ArticuloRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TodosArticuloController extends AbstractController
{
  /**
   * @Route("api/articulo",name="articulo", methods={"GET"})
   *
   */
  public function getAll(ArticuloRepository $repo)
  {
    $articulos = $repo->findAll();
    $data = [];
    foreach ($articulos as $articulo) {
      $data[] = $articulo->ToJson();
    }
    return new JsonResponse($data, 200);
  }
}
