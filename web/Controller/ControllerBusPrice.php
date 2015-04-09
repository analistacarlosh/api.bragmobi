<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$busPrices = $app['controllers_factory'];
$response = array('message' => null, 'more' => null, 'ruas' => null);
$offsetDefault = 1;
$limitDefault = 20;

/* /bragmobi/bus-price/ */
$busPrices->get("/", function(Silex\Application $app,  Request $request){

	$sql = "SELECT id_tarifa, valor_comum, valor_estudante, idoso, especial, linhas, observacao FROM tbl_tarifas ";
	$response['bus_prices'] = $app['dbs']['mysql_read']->fetchAll($sql);	
	$response['message'] = 'sucess';

  return $app->json($response, 200);
});

return $busPrices;