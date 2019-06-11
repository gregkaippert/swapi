<?php

require_once('vendor/autoload.php');
require_once('app/config/config.php');

use controllers\planetas;
use models\planet;

$app = new Slim\App($slimConfig);

$app->group('/api', function() use($app){

	$app->get('[/]', function(){
		
		$planet = new planet;
		$planet->listAll();

	});

	$app->get('/listAttr/{id_name}[/]', function($request, $response, $args){
		$id_name = strip_tags(trim(isset($args['id_name']) ? $args['id_name'] : ''));
		$planet = new planet;
		$planet->setId_Name($id_name);
		$planet->listAttr();
	});

	$app->delete('/delete/{id_planet}[/]', function($request, $response, $args){
		$id_planet = strip_tags(trim(isset($args['id_planet']) ? $args['id_planet'] : ''));
		$planet = new planet;
		$planet->setId($id_planet);
		$planet->delete();
	});

	$app->post('/update[/]', function($request){
		$data = json_decode($request->getBody());
		$nome = strip_tags(trim($data->nome) ? $data->nome : '');
		$clima = strip_tags(trim(isset($data->clima) ? $data->clima : ''));
		$terreno = strip_tags(trim(isset($data->terreno) ? $data->terreno : ''));
		$id = strip_tags(trim(isset($data->id) ? $data->id : ''));
		$planet = new planet;
		$planet->setNome($nome);
		$planet->setClima($clima);
		$planet->setTerreno($terreno);
		$planet->setId($id);
		$planet->update();
	});

	$app->post('/insert[/]', function($request){
		$data = json_decode($request->getBody());
		$nome = strip_tags(trim($data->nome) ? $data->nome : '');
		$clima = strip_tags(trim(isset($data->clima) ? $data->clima : ''));
		$terreno = strip_tags(trim(isset($data->terreno) ? $data->terreno : ''));
		$planet = new planet;
		$planet->setNome($nome);
		$planet->setClima($clima);
		$planet->setTerreno($terreno);
		$planet->adicionar();
	});

	$app->get('/films/{planet}[/]', function($request, $response, $args){
		$planet = strip_tags(trim($args['planet']) ? $args['planet'] : '');
		$dados = json_decode(@file_get_contents('https://swapi.co/api/planets/'.$planet));
		
		if($dados === NULL):
		    $error = error_get_last();
		    $exp = explode('HTTP/1.1 ', $error['message']);
		    echo json_encode(array("code"=>intval($exp[1]),"message"=>"error"));
		else:
			echo json_encode(array("nome"=>$dados->name, "clima"=>$dados->climate, "terreno"=>$dados->terrain, "filmes"=>$dados->films));
		endif;
	});

});

$app->run();
