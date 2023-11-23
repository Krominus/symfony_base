<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BurgerController extends AbstractController
{
    #[Route('/burger-list', name: 'app_burger_list')]
    public function list(BurgerRepository $burgerRepository): Response
    {
        $burgers = $burgerRepository->findAll();

        return $this->render('burger/list.html.twig', [
            'burgers' => $burgers,
        ]);
    }
}
