<?php


namespace App\Controller\Articulo;

use App\Repository\ArticuloRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/articulos",name="articulo_index_web", methods={"GET"})
     *
     */
    public function index(ArticuloRepository $repoArt)
    {
        $articulos = $repoArt->findAll();
        //dd($articulos);
        return $this->render('articulo/index.html.twig',
            ['articulos'=>$articulos]);
    }
}