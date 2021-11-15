<?php

namespace App\Service\Articulo;

use App\Entity\Articulo;
use App\Entity\Stock;
use Doctrine\ORM\EntityManagerInterface;


class NuevoArticuloService
{

  private $em;

  public function __construct(EntityManagerInterface $em)
  {

    $this->em = $em;
  }

  public function __invoke(Articulo $articulo): void
  {

    $this->em->beginTransaction();

    $this->em->persist($articulo);

    $stock = new Stock($articulo);

    $this->em->persist($stock);

    $this->em->flush();

    //$this->em->rollback();
    $this->em->commit();
  }
}
