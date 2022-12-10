<?php

namespace App\Controller;

use App\Entity\Usuarios;
use App\Repository\UsuariosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
     * @Route("/api")
     */

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="app_login" ,methods={"POST"})
     */
    public function EntrarCuenta(Request $request,EntityManagerInterface $em): Response
    {
       $request = $this->transformJsonBody($request);
       $usuarios = new Usuarios;
        dd($request);

       $usuarios->setRut($request->get('rut'));
       $usuarios->setContrasenia($request->get('contrasenia'));
       $em->persist($usuarios);
       $rut = $usuarios->getRut();
        return new Response(
            'Usuario Logeado',
            Response::HTTP_OK
        );
    }

     /**
     * @Route("/login/{rut}", name="app_login_getByRut", methods={"GET"})
     */
    public function getUsuario($rut, UsuariosRepository $usuariosRepository):JsonResponse
    {
        $usuario = $usuariosRepository->findOneBy(['Rut' => $rut]);
        $array_usuario[] = array(
            'id' => $usuario->getId(),
            'rut' => $usuario->getRut(),
            'contrasenia' => $usuario->getContrasenia()
        );
        return new JsonResponse($array_usuario);
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
