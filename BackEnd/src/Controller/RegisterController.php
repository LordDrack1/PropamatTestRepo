<?php

namespace App\Controller;

use App\Entity\Usuarios;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
     * @Route("/api")
     */

class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="app_register",methods={"POST"})
     */
    public function crearCuenta(Request $request,EntityManagerInterface $em): Response
    {
       $request = $this->transformJsonBody($request);
       $usuarios = new Usuarios;

       $usuarios->setRut($request->get('Rut'));
       $usuarios->setContrasenia($request->get('Contrasenia'));

        $em->persist($usuarios);
        $em->flush();

        return new Response(
            'Usuario Creado',
            Response::HTTP_OK
        );
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
