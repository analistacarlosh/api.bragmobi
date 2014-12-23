<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$linhasDeOnibus = $app['controllers_factory'];
$response = array('message' => null, 'more' => null, 'ruas' => null);
$offsetDefault = 1;
$limitDefault = 20;

/* /offset/{offset}/limit/{limit} */
$linhasDeOnibus->get("/offset/{offset}/limit/{limit}", function(Silex\Application $app,  Request $request, $offset, $limit){

	$sql = "SELECT * FROM tbl_linha_onibus LIMIT " . $offset . ", " . $limit;
	$response['linhas_de_onibus'] = $app['dbs']['mysql_read']->fetchAll($sql);	
	$response['message'] = 'sucess';

  return $app->json($response, 200);
})->assert('offset', '\d+')
	->assert('limit', '\d+')
  ->value('offset', $offsetDefault)
  ->value('limit', $limitDefault);

/* /linha/{id_da_linha} */
$linhasDeOnibus->get("/linha/{id_da_linha}", function(Silex\Application $app, Request $request, $id_da_linha){

  $sql = "SELECT * FROM tbl_linha_onibus WHERE id_linha = ? ";
  $response['dados-da-linha'] = $app['dbs']['mysql_read']->fetchAll($sql, array($id_da_linha));  
  $response['message'] = 'sucess';

  return $app->json($response, 200);
})->assert('id_da_linha', '\d+');

/* /horarios-da-linha/linha/{linha} */
$linhasDeOnibus->get("/horarios-da-linha/linha/{id_da_linha}", function(Silex\Application $app, Request $request, $id_da_linha){

  $sql = "SELECT * FROM tbl_relaciona_linha_enderecos WHERE fk_id_linha = ? ";
  $response['horarios-da-linha'] = $app['dbs']['mysql_read']->fetchAll($sql, array($id_da_linha));  
  $response['message'] = 'sucess';

  return $app->json($response, 200);
})->assert('id_da_linha', '\d+');

/* /itinerarios-da-linha/linha/{linha} */
$linhasDeOnibus->get("/itinerarios-da-linha/linha/{id_da_linha}", function(Silex\Application $app, Request $request, $id_da_linha){

    $sql = "SELECT * FROM tbl_relaciona_linha_horarios WHERE fk_id_linha = ? ";
    $response['itinerarios-da-linha'] = $app['dbs']['mysql_read']->fetchAll($sql, array($id_da_linha));  
    $response['message'] = 'sucess';

  return $app->json($response, 200);
})->assert('id_da_linha', '\d+');


return $linhasDeOnibus;