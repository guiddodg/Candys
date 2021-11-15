<?php


namespace App\Controller\Movimiento;

use App\Repository\MovimientoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MovimientoByArtIdController extends AbstractController
{
    /**
     * @Route("/articulos/{id}/movimientos",name="articulo_movimientos_web", methods={"GET"})
     *
     */
    public function index(int $id, MovimientoRepository $repoMovs)
    {

        $movimientos = $repoMovs->findBy(["articulo"=>$id]);
        //$movimientos = $repoMovs->findAll();
        //dd($movimientos);
        return $this->render('articulo/movimientos.html.twig',
            ['movimientos'=>$movimientos]);
    }
}