<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$response = array('message' => null, 'more' => null, 'ruas' => null);
$enderecos = $app['controllers_factory'];
$offsetDefault = 1;
$limitDefault = 20;

$enderecos->get("/offset/{offset}/limit/{limit}/", function(Silex\Application $app,  Request $request, $offset, $limit){

		$sql = "SELECT * FROM ruas_braganca LIMIT " . $offset . ", " . $limit;
    $response['ruas'] = $app['dbs']['mysql_read']->fetchAll($sql);	
    $response['message']	= 'sucess';

    return $app->json($response, 200);
})->assert('offset', '\d+')
	->assert('limit', '\d+')
  ->value('offset', $offsetDefault)
  ->value('limit', $limitDefault);

$enderecos->get("/bairros-de-braganca/offset/{offset}/limit/{limit}/", function(Silex\Application $app, $offset, $limit){

	$sql = "SELECT * FROM bairros_braganca LIMIT " . $offset . ", " . $limit;
  $response['bairros'] = $app['dbs']['mysql_read']->fetchAll($sql);	
  $response['message']	= 'sucess';
    
  return $app->json($response, 200);
})->assert('offset', '\d+')
->assert('limit', '\d+')
->value('offeset', $offsetDefault)
->value('limit', $limitDefault);

return $enderecos;

