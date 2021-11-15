<?php


namespace App\Controller\Api\Articulo;

use App\Entity\Articulo;
use App\Service\Articulo\NuevoArticuloService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\Type\ArticuloType;

class NuevoArticuloController extends AbstractController
{
  /**
   * @Route("api/articulo",name="articulo_new", methods={"POST"})
   *
   */
  public function new(Request $request, NuevoArticuloService $nuevoArticulo): JsonResponse
  {
    $articulo = new Articulo();

    $form = $this->createForm(ArticuloType::class, $articulo);

    $form->submit($request->request->all());

    if ($form->isSubmitted() && $form->isValid()) {

      try {

        ($nuevoArticulo)($articulo);

        return new JsonResponse(['message' => 'Articulo creado'], 201);
      } catch (\Exception $e) {
        return new JsonResponse(['message' => $e->getMessage()], 500);
      }
    } else {

      //return $errors;
      return new JsonResponse(['message' => $this->getFormErrors($form)], 500);
    }
  }

  /**
   * List all errors of a given bound form.
   *
   * @param Form $form
   *
   * @return array
   */
  protected function getFormErrors($form)
  {
    $errors = array();

    // Global
    foreach ($form->getErrors() as $error) {
      $errors[$form->getName()][] = $error->getMessage();
    }

    // Fields
    foreach ($form as $child
      /** @var Form $child */
    ) {
      if (!$child->isValid()) {
        foreach ($child->getErrors() as $error) {
          $errors[$child->getName()][] = $error->getMessage();
        }
      }
    }

    return $errors;
  }
}
