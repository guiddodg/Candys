<?php

namespace App\Service\Stock;

use App\Entity\Articulo;
use App\Entity\TipoMovimiento;
use App\Entity\Stock;
use App\Entity\Movimiento;
use App\Repository\StockRepository;
use App\Repository\ArticuloRepository;
use App\Repository\TipoMovimientoRepository;
use Doctrine\ORM\EntityManagerInterface;


class ActualizarStockService
{
  private $em;
  private $repoTipoMov;

  public function __construct(
    EntityManagerInterface $em,
    TipoMovimientoRepository $repoTipoMov
  ) {
    $this->em = $em;

    $this->repoTipoMov = $repoTipoMov;
  }

  public function __invoke(Stock $stock, int $tipoMov, $cantidad): void
  {

    $tipoMovimiento = $this->repoTipoMov->find($tipoMov);

    //esta parte se puede mejorar
    if ($tipoMovimiento->getId() == 1) { //compra
      $stock->setCantidad($stock->getCantidad() + $cantidad);
    }

    if ($tipoMovimiento->getId() == 2) { //venta
      if (($stock->getCantidad() - $cantidad) < 0) {
        throw new \Exception('No hay suficiente stock');
      }
      $stock->setCantidad($stock->getCantidad() - $cantidad);
    }

    if ($tipoMovimiento->getId() == 3) { //ajuste plano
      $stock->setCantidad($cantidad);
    }

    $this->em->beginTransaction();

    $this->em->persist($stock);

    $movimiento = $this->NuevoMovimiento($stock->getArticulo(), $cantidad, $tipoMovimiento);

    $this->em->persist($movimiento);

    $this->em->flush();

    $this->em->commit();
  }

  private function NuevoMovimiento(Articulo $articulo, int $cantidad, TipoMovimiento $tipoMovimeinto): Movimiento
  {
    $movimiento = new Movimiento();
    $movimiento->setArticulo($articulo);
    $movimiento->setCantidad($cantidad);
    $movimiento->setTipoMovimiento($tipoMovimeinto);
    $movimiento->setFechaCrea(new \DateTime());

    return $movimiento;
  }
}
