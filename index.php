<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->result->parameters->text;

	switch ($text) {
		case 'hola':
			$speech = "Hola, mucho gusto";
			break;

		case 'adios':
			$speech = "Adiós, Buenas Noches";
			break;

		case 'cualquiera':
			$speech = "Si, tu puedes escribir cualquier cosa aquí.";
			break;
		
		default:
			$speech = "Lo Siento, No entendí eso. Por favot pregunta de nuevo.";
			break;
	}

	$response = new \stdClass();
	$response->speech = $speech;
	$response->displayText = $speech;
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>