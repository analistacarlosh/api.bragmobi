<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$linhasDeOnibus = $app['controllers_factory'];
$response = array('message' => null, 'more' => null, 'ruas' => null);
$offsetDefault = 1;
$limitDefault = 20;

/* /offset/{offset}/limit/{limit} */
$busStation->get("/", function(Silex\Application $app,  Request $request){

  // $sql = "SELECT * FROM tbl_pontos_onibus LIMIT " . $offset . ", " . $limit;
  // $response['bus_station'] = $app['dbs']['mysql_read']->fetchAll($sql);  
  $response['cateogry'] = array(
    array('id' => '0', 'describe' => 'Pizzarias', 'img' => 'http://www.guiadebraganca.com.br/public/anuncios/thumb/G14/P/652%20esmeralda_op3.jpg'),
    array('id' => '1', 'describe' => 'Lanchonetes', 'img' => 'http://www.guiadebraganca.com.br/public/anuncios/thumb/G14/P/742%20Pop%20restaurante.jpg'),
    array('id' => '2', 'describe' => 'Restaurantes', 'img' => 'http://www.guiadebraganca.com.br/public/anuncios/thumb/G14/P/761%20Wine%20House.jpg'),
    array('id' => '3', 'describe' => 'Moto-taxi', 'img' => 'http://www.mototaxiparana.com.br/arquivos/motoboys/13102012170551f01.jpg')
    );

  $response['message'] = 'sucess';

  //$response = json_encode($response);

  return $app->json($response, 200);
});

/* /offset/{offset}/limit/{limit} */
$busStation->get("/alphabetica", function(Silex\Application $app,  Request $request){

  // $sql = "SELECT * FROM tbl_pontos_onibus LIMIT " . $offset . ", " . $limit;
  // $response['bus_station'] = $app['dbs']['mysql_read']->fetchAll($sql);  
  $response['alphabetica'] = array(
    array('id' => '0', 'describe' => 'A', 'count' => '10'),
    array('id' => '1', 'describe' => 'B', 'count' => '13'),
    array('id' => '2', 'describe' => 'C', 'count' => '25'),
    array('id' => '3', 'describe' => 'D', 'count' => '40'),
    array('id' => '3', 'describe' => 'E', 'count' => '76'),
    array('id' => '3', 'describe' => 'F', 'count' => '43'),
    array('id' => '3', 'describe' => 'G', 'count' => '23'),
    array('id' => '3', 'describe' => 'H', 'count' => '34'),
    array('id' => '3', 'describe' => 'I', 'count' => '12')
    );

  $response['message'] = 'sucess';

  //$response = json_encode($response);

  return $app->json($response, 200);
});

return $busStation;