<?php

require_once('vendor/autoload.php');
require_once('app/config/config.php');

use Slim\Views\PhpRenderer;
use controllers\planetas;
use models\planet;

// session start
session_start();

$app = new Slim\App($slimConfig);
$container = $app->getContainer();
$container['renderer'] = new PhpRenderer("./");

// Check the user is logged in when necessary.
$loggedInMiddleware = function ($request, $response, $next) {
    $route = $request->getAttribute('route');
    $routeName = $route->getName();
    $groups = $route->getGroups();
    $methods = $route->getMethods();
    $arguments = $route->getArguments();

    # Define routes that user does not have to be logged in with. All other routes, the user
    # needs to be logged in with.
    $publicRoutesArray = array(
        '',
    );

    if (!isset($_SESSION['id']) && !in_array($routeName, $publicRoutesArray))
    {
        // redirect the user to the login page and do not proceed.
        $response = $response->withRedirect('/planetas/');
    }
    else
    {
        // Proceed as normal...
        $response = $next($request, $response);
    }

    return $response;
};

// Apply the middleware to every request.
$app->add($loggedInMiddleware);

$app->get('/list[/]', function(){
	$planet = new planet;
	$planet->listAll();
})->setName('listAll');

$app->get('/listAttr/{id_name}[/]', function($request, $response, $args){
	$id_name = strip_tags(trim(isset($args['id_name']) ? $args['id_name'] : ''));
	$planet = new planet;
	$planet->setId_Name($id_name);
	$planet->listAttr();
})->setName('listAttr');

$app->delete('/delete/{id_planet}[/]', function($request, $response, $args){
	$id_planet = strip_tags(trim(isset($args['id_planet']) ? $args['id_planet'] : ''));
	$planet = new planet;
	$planet->setId($id_planet);
	$planet->delete();
})->setName('delete');

$app->post('/update[/]', function($request){
	$data['nome'] = $_POST['nome_upd'];
	$data['clima'] = $_POST['clima_upd'];
	$data['terreno'] = $_POST['terreno_upd'];
	$data['id'] = $_POST['id_upd'];
	if(in_array('', $data)):
		//echo 1;
		echo json_encode(array("code"=>1,"message"=>"error")); // campos em branco
	else:
		$planet = new planet;
		$planet->setNome($data['nome']);
		$planet->setClima($data['clima']);
		$planet->setTerreno($data['terreno']);
		$planet->setId($data['id']);
		$planet->update();
	endif;
})->setName('update');

$app->post('/insert[/]', function($request){
	$data['nome'] = $_POST['nome'];
	$data['clima'] = $_POST['clima'];
	$data['terreno'] = $_POST['terreno'];
	if(in_array('', $data)):
		//echo 1;
		echo json_encode(array("code"=>1,"message"=>"error")); // campos em branco
	else:
		$nome = strip_tags(trim($data['nome']) ? $data['nome'] : '');
		$clima = strip_tags(trim(isset($data['clima']) ? $data['clima'] : ''));
		$terreno = strip_tags(trim(isset($data['terreno']) ? $data['terreno'] : ''));
		$planet = new planet;
		$planet->setNome($nome);
		$planet->setClima($clima);
		$planet->setTerreno($terreno);
		$planet->adicionar();
	endif;
})->setName('insert');

$app->get('/films/{planet}[/]', function($request, $response, $args){
	$planet = strip_tags(trim($args['planet']) ? $args['planet'] : '');
	$data = json_decode(@file_get_contents('https://swapi.co/api/planets/'.$planet));
	
	if($data === NULL):
	    $error = error_get_last();
	    $exp = explode('HTTP/1.1 ', $error['message']);
	    echo json_encode(array("code"=>intval($exp[1]),"message"=>"error"));
	else:
		$someArray = [];
		foreach ($data->films as $films) {
			$the_film2 = json_decode(file_get_contents($films));
			array_push($someArray, [
				'title'   => $the_film2->title,
		    ]);
		}

		echo json_encode($someArray);

	endif;
})->setName('films');

/* rota principal para renderizar o template com o front-end da API */
$app->get('/render[/]', function ($request, $response, $args){
	return $this->renderer->render($response, "main.php", $args);
})->setName('main');

$app->get('/logoff[/]', function(){
	session_destroy();
	echo "<script>location.href='/planetas';</script>"; 
})->setName('logoff');

$app->run();
