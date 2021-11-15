<?php


namespace App\Controller;


use App\Repository\ArticuloRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home",name="home", methods={"GET"})
     *
     */
    public function home(ArticuloRepository $repoArt)
    {
        $articulos = $repoArt->findAll();

        return $this->render('articulo/index.html.twig',
        ['articulos'=>$articulos]);
    }
}