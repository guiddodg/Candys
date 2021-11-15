<?php


namespace App\Controller\Api\Articulo;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\StockRepository;
use App\Form\Type\StockType;
use App\Repository\MovimientoRepository;
use App\Service\Stock\ActualizarStockService;

class MovimientosPorArticuloController extends AbstractController
{
  /**
   * @Route("api/articulo/{id}/movimientos",name="articulo_busqueda_mov", methods={"GET"})
   *
   */
  public function buscarArticuloPorId(int $id, MovimientoRepository $repodb)
  {
    $movimientos = $repodb->findBy(['articulo' => $id]);
    if (!$movimientos) {
      return new JsonResponse(['mensaje' => 'No existe movimientos del articulo'], 404);
    }
    $movs = [];
    foreach ($movimientos as $movimiento) {
      $movs[] = $movimiento->ToJson();
    }
    return new JsonResponse($movs);
  }
}
