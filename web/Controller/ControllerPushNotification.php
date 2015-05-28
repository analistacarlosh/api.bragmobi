<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$busStation = $app['controllers_factory'];
$response = array('message' => null, 'more' => null);

$busStation->post("/send", function(Silex\Application $app,  Request $request){


	$registrationId = "APA91bFJPkA5lemLzQidN1xaABAjPUhv0wuNwlGhJNg9N5jRvCXIxdhqY28vNA4eYSaPQNMiudfY0Adop-it7-7D06ImavzRs12bm6fTmdKjvF46DFZrLxMi06EbbLBIc8fXY1S0k4gs";
	$mensage = "test PUSH";
	$senderAuthToken = "AIzaSyD4gGbEPaRQfuvjLR3YjZnXOGYwNmrvRmI";

	$registatoin_ids = array($registrationId);

	/*$dataPush = array(
		"registration_ids" => $registatoin_ids,
		"data" => array(
				"mensagem" => $mensage
			)
		);

  $NL = "\r\n";

	$options = array(
		'http' => array(
				'method' => 'POST',
				'content' => json_encode($dataPush),
				'header' => "Content-Type: application/json" . $NL .
				"Authorization: key=". $senderAuthToken . $NL
			)
	);*/

	$url     = "https://android.googleapis.com/gcm/send";
	
	// $context = stream_context_create($options);
	// $result  = file_get_contents($url, false, $context);

				$message = array("mensagem" => "push Test");


        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message
        );

        $headers = array(
            'Authorization: key=' . $senderAuthToken,
            'Content-Type: application/json'
        );
		//print_r($headers);
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);

	// $response['message'] = 'sucess';

  return $app->json($result, 200);
});

return $busStation;