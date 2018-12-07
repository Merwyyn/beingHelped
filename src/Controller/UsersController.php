<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UsersController
{
    /**
     * @Route("/users/login", methods={"GET"})
     */
    public function login()
    {
        $request = Request::createFromGlobals();
        $isLogged=($request->query->get("login")==="admin" && $request->query->get("password")==="admin");
        $response = new JsonResponse();
        $response->setData([["isLogged" => $isLogged]]);
        return $response;
    }
}