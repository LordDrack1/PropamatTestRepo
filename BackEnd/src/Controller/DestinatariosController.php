<?php

namespace App\Controller;

use App\Entity\Destinatarios;
use App\Repository\DestinatariosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/api")
*/

class DestinatariosController extends AbstractController
{
    /**
     * @Route("/agregarDestinatario", name="app_destinatarios_add", methods={"POST"})
     */
    public function crearDestinatario(Request $request,EntityManagerInterface $em): Response
    {
       $request = $this->transformJsonBody($request);
       $destinatarios = new Destinatarios;

       $destinatarios->setRut($request->get('Rut'));
       $destinatarios->setNombre($request->get('Nombre'));
       $destinatarios->setCorreo($request->get('Correo'));
       $destinatarios->setNumeroTelefono($request->get('Telefono'));
       $destinatarios->setBancoDestino($request->get('Banco'));
       $destinatarios->setTipoCuenta($request->get('TipoCuenta'));
       $destinatarios->setNumeroCuenta($request->get('NumeroCuenta'));

        $em->persist($destinatarios);
        $em->flush();

        return new Response(
            'Destinatario Creado',
            Response::HTTP_OK
        );
    }
    
     /**
     * @Route("/destinatarios", name="app_destinatarios_getall", methods={"GET"})
     */
    public function getDestinatarios(DestinatariosRepository $destinatariosRepository): JsonResponse
    {
        $destinatarios = $destinatariosRepository->findAll();
        $array_destinatarios = array();

        foreach($destinatarios as $destinatario){
            $array_destinatarios[] = array(
                'id' => $destinatario->getId(),
                'nombre' => $destinatario->getNombre(),
                'rut'=>$destinatario->getRut(),
                'numero_telefono'=>$destinatario->getNumeroTelefono(),
                'banco_destino'=>$destinatario->getBancoDestino(),
                'tipo_cuenta'=>$destinatario->getTipoCuenta(),
                'numero_cuenta'=>$destinatario->getNumeroCuenta(),
                'correo'=>$destinatario->getCorreo()

            );
        }
        return new JsonResponse($array_destinatarios);
    }
    /**
     * @Route("/destinatario/{id}", name="app_destinatarios_getById", methods={"GET"})
     */
    public function getDestinatario($id,DestinatariosRepository $destinatariosRepository): JsonResponse
    {
        $destinatario = $destinatariosRepository->findOneBy(['id' => $id]);
        $array_destinatario[] = array(
            'id' => $destinatario->getId(),
            'nombre' => $destinatario->getNombre(),
            'rut'=>$destinatario->getRut(),
            'numero_telefono'=>$destinatario->getNumeroTelefono(),
            'banco_destino'=>$destinatario->getBancoDestino(),
            'tipo_cuenta'=>$destinatario->getTipoCuenta(),
            'numero_cuenta'=>$destinatario->getNumeroCuenta(),
            'correo'=>$destinatario->getCorreo()

        );
        return new JsonResponse($array_destinatario);
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
