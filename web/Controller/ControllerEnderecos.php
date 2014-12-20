<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$enderecos = $app['controllers_factory'];
$enderecos->get("/", function(){
    return new Response("Enderecos");
});

$enderecos->get("/bairros-de-braganca", function(){
    return new Response("Exibe todas os bairros-de-braganca");
});

$enderecos->get("/ruas-de-braganca", function(){
    return new Response("Exibe todas as ruas-de-braganca");
});

return $enderecos;

