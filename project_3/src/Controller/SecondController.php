<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Container\ContainerInterface;

class SecondController extends Controller 
{
    public function hello(Request $request, Response $response)
    {
        return $this->render($response, 'hello.html', ['name' => 'name hardcoded']);
    }
}