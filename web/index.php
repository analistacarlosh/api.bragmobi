<?php
require_once __DIR__.'/../vendor/autoload.php';

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app['debug'] = true;

	$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'dbs.options' => array (
        'mysql_read' => array(
            'driver'    => 'pdo_mysql',
            'host'      => '127.0.0.1',
            'dbname'    => 'banco_brag_mobi',
            'user'      => 'root',
            'password'  => 'root',
            'charset'   => 'utf8',
        ),
    ),
));

 $app->mount("/bragmobi/linhas-de-onibus", require_once 'Controller/ControllerLinhasDeOnibus.php');
 $app->mount("/bragmobi/enderecos", require_once 'Controller/ControllerEnderecos.php');
 $app->mount("/bragmobi/bus-station", require_once 'Controller/ControllerBusStation.php');
 $app->mount("/bragmobi/bus-price", require_once 'Controller/ControllerBusPrice.php');

$app->after(function (Request $request, Response $response) {
    $response->headers->set('Access-Control-Allow-Origin', '*');
    $response->headers->set('Access-Control-Allow-Headers', 'X-CSRF-Token, X-Requested-With, Accept, Accept-Version, Content-Length, Content-MD5, Content-Type, Date, X-Api-Version, Origin');
    $response->headers->set('Access-Control-Allow-Methods', 'GET, PUT, POST, DELETE, OPTIONS');
});

/*
$app['res'] = function(){
    return new Response('Oi');
};
 */

// Share Serviço compartilhados
/* $app['res'] = $app->share(function(){
    return new Response('Oi');
});

$res1 = $app['res'];
$res2 = $app['res'];

if($res1 === $res2){
    echo "iguais";
} else {
    echo "diferentes";
} */

$app->run();