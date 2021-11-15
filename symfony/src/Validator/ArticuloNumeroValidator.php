<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use App\Repository\ArticuloRepository;

class ArticuloNumeroValidator extends ConstraintValidator
{
  private $repo;

  public function __construct(ArticuloRepository $repo)
  {
    $this->repo = $repo;
  }
  public function validate($protocol, Constraint $constraint)
  {
    $articulo = $this->repo->findOneBy(['numero' => $protocol->getNumero()]);

    if ($articulo) {
      $this->context->buildViolation($constraint->message)
        ->atPath('numero')
        ->addViolation();
    }
  }
}
