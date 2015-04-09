<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$busStation = $app['controllers_factory'];
$response = array('message' => null, 'more' => null, 'ruas' => null);
$offsetDefault = 1;
$limitDefault = 20;

/* /offset/{offset}/limit/{limit} */
$busStation->get("/offset/{offset}/limit/{limit}", function(Silex\Application $app,  Request $request, $offset, $limit){

	$sql = "SELECT * FROM tbl_pontos_onibus LIMIT " . $offset . ", " . $limit;
	$response['bus_station'] = $app['dbs']['mysql_read']->fetchAll($sql);	
	$response['message'] = 'sucess';

  return $app->json($response, 200);
})->assert('offset', '\d+')
	->assert('limit', '\d+')
  ->value('offset', $offsetDefault)
  ->value('limit', $limitDefault);

return $busStation;