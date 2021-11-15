<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ArticuloNumero extends Constraint
{
  public $message = 'El numero del articulo ya existe.';

  public function validatedBy()
  {
    return static::class . 'Validator';
  }
  public function getTargets()
  {
    return self::CLASS_CONSTRAINT;
  }
}
