<?php


namespace App\Controller\Api\Articulo;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\StockRepository;
use App\Form\Type\StockType;
use App\Service\Stock\ActualizarStockService;

class VentaController extends AbstractController
{

  /**
   * @Route("api/articulo/venta",name="articulo_venta", methods={"POST"})
   *
   */
  public function venta(Request $request, StockRepository $repoStock, ActualizarStockService $actualizarStock): JsonResponse
  {

    try {

      $stock = $repoStock->findOneBy(['articulo' => $request->get('articulo')]);

      if (!$stock)
        throw new \Exception('No se encontro el articulo');

      $form = $this->createForm(StockType::class);

      $form->submit($request->request->all());

      if ($form->isSubmitted() && $form->isValid()) {

        ($actualizarStock)($stock, 2, $request->get('cantidad')); //2 es venta

        return new JsonResponse(['message' => 'Venta Exitosa'], 201);
      } else {


        return new JsonResponse(['message' => $this->getFormErrors($form)], 500);
      }
    } catch (\Exception $e) {
      return new JsonResponse(['message' => $e->getMessage()], 500);
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
