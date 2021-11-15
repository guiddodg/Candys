<?php


namespace App\Controller\Api\Articulo;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\StockRepository;
use App\Form\Type\StockType;
use App\Repository\ArticuloRepository;
use App\Service\Stock\ActualizarStockService;

class BuscarArticuloController extends AbstractController
{
  /**
   * @Route("api/articulo/{id}",name="articulo_busqueda_id", methods={"GET"})
   *
   */
  public function buscarArticuloPorId(int $id, ArticuloRepository $repodb)
  {
    $articulo = $repodb->find($id);
    if (!$articulo) {
      return new JsonResponse(['mensaje' => 'No existe el articulo'], 404);
    }
    return new JsonResponse($articulo->ToJson());
  }
}
