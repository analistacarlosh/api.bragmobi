<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$linhasDeOnibus = $app['controllers_factory'];

$linhasDeOnibus->get("/", function(){
    return new Response("Todas as linhas");
});

$linhasDeOnibus->get("/dados-da-linha", function(){
    return new Response("Retornará Json dados-da-linha");
});

$linhasDeOnibus->get("/infos-da-linha", function(){
    return new Response("Retornará Json infos-da-linha");
});

$linhasDeOnibus->get("/horarios-da-linha", function(){
    return new Response("Retornará Json horarios-da-linha");
});

$linhasDeOnibus->get("/itinerarios-da-linha", function(){
    return new Response("Retornará Json itinerarios-da-linha");
});

return $linhasDeOnibus;

