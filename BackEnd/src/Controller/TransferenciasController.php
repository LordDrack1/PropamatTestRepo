<?php

namespace App\Controller;

use App\Entity\Transferencias;
use App\Repository\TransferenciasRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/api")
*/

class TransferenciasController extends AbstractController
{
    /**
     * @Route("/transferir", name="app_transferencias", methods={"POST"})
     */
    public function crearTransferencia(Request $request,EntityManagerInterface $em): Response
    {
       $request = $this->transformJsonBody($request);
       $transferencias = new Transferencias;

        $transferencias->setDestinatario($request->get('Nombre'));
        $transferencias->setRut($request->get('Rut'));
        $transferencias->setBanco($request->get('Banco'));
        $transferencias->setTipoCuenta($request->get('TipoCuenta'));        
        $transferencias->setMonto($request->get('Monto'));
        $transferencias->setRemitente('11111111-1');

        $em->persist($transferencias);
        $em->flush();

        return new Response(
            'Transferencia Creada',
            Response::HTTP_OK
        );
    }

     /**
     * @Route("/transferencias", name="app_transferencias_getall", methods={"GET"})
     */
    public function getDestinatarios(TransferenciasRepository $transferenciasRepository): JsonResponse
    {
        $transferencias = $transferenciasRepository->findAll();
        $array_transferencias = array();

        foreach($transferencias as $transferencia){
            $array_transferencias[] = array(
                'id' => $transferencia->getId(),
                'nombre' => $transferencia->getDestinatario(),
                'rut'=>$transferencia->getRut(),
                'banco'=>$transferencia->getBanco(),
                'tipo_cuenta'=>$transferencia->getTipoCuenta(),
                'monto'=>$transferencia->getMonto()

            );
        }
        return new JsonResponse($array_transferencias);
    }

    protected function transformJsonBody(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        if(json_last_error() !== JSON_ERROR_NONE){
            return null;
        } 
        if($data === null){
            return $request;
        }
        $request->request->replace($data);
        return $request;
    }
}
