<?php

namespace App\Controller;

use App\Repository\BancosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
     * @Route("/api")
     */

class BancosController extends AbstractController
{
    /**
     * @Route("/banks", name="app_bancos", methods={"GET"})
     */
    public function getBancos(BancosRepository $bancosRepository): JsonResponse
    {
        $bancos = $bancosRepository->findAll();
        $array_bancos = array();

        foreach($bancos as $banco){
            $array_bancos[] = array(
                'id' => $banco->getId(),
                'nombre_banco' => $banco->getNombreBanco()
            );
        }
        return new JsonResponse($array_bancos);
    }
}
