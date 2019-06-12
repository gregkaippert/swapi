<?php

/***********************************************************
FUNCÇÃO DO Robson 06/12/2014
FAZ exibe o texto do BD de acordo com a quantidade informada
************************************************************/

function FormatoLista($value, $maxChars) {
	$isBigger = false;
	$value = preg_replace("/<head[^>]*>[\w\W]*?<\/head>[\n\r]*/i", '', $value);
	$value = preg_replace("/<link[^>]*>[\n\r]*/i", '', $value);
	$value = preg_replace("/<script[^>]*>[\w\W]*?<\/script>[\n\r]*/i", '', $value);
	$value = preg_replace("/<style[^>]*>[\w\W]*?<\/style>[\n\r]*/i", '', $value);
	$value = strip_tags($value);
	if ($maxChars != -1) {
		if (strlen(trim($value)) > $maxChars) {
			$value = substr($value, 0, $maxChars);
			$isBigger = true;
		}
	}
	$value = str_replace(array("<", ">"), array("&lt;", "&gt;"), $value);
	if ($value == "") {
		$value = "&nbsp;";
	}
	if ($isBigger) {
		$value .= "...";
	}
	return $value;
}
// forma de aplicar
// echo FormatoLista($row['cont'], 50) 


/*****************************
FUNCÇÃO DO ROBSON
GERA NUMEROS CARACTERES AMIGAVEIS
*****************************/

function randSal(){
// Preparando as caracteristicas da sequencia randomica
$tamanho = 10;
$alfabeto = 'abcdefghijklmnopqrstuvwxyz0123456789';
$minimo = 0;
$maximo = strlen($alfabeto) - 1;
// Gerando a sequencia
$sequencia = '';
for ($i = $tamanho; $i > 0; --$i) {
    // Sorteando uma posicao do alfabeto
    $posicao_sorteada = mt_rand($minimo, $maximo);
    // Obtendo o simbolo correspondente do alfabeto
    $caractere_sorteado = $alfabeto[$posicao_sorteada];
    // Incluindo o simbolo na sequencia
    $sequencia .= $caractere_sorteado;
}
// Sequencia pronta
return $sequencia;
}

/*****************************
FUNCÇÃO DO ROBSON
GERA O sal para senha
*****************************/

function Sal(){
$data = date('d/m/Y H:i:s');
$data = $data + randSal();
$data = sha1($data);
	return $data;
}
/*****************************
FUNCÇÃO DO ROBSON
GERA a senha
*****************************/

function Senha($senha){
$custo = '08';
$salt = sal();

// Gera um hash baseado em bcrypt
$hash = crypt($senha, '$2a$' . $custo . '$' . $salt . '$');
	return $hash;
}
/*****************************
FUNCÇÃO DO ROBSON
verifica a senha
*****************************/

function verifica($senha,$hash){

	if (crypt($senha, $hash) === $hash) {
		return true;
	} else {
		return false;
	}
}

/*****************************
FUNCÇÃO DO PRO PHP
FAZ A NAVEGAÇÃO AMIGÁVEL
*****************************/
function getHome(){
	$url = $_GET['url'];
	$url = explode('/', $url);
	$url[0] = ($url[0] == NULL ? 'index' : $url[0]);
	
		if(file_exists('tpl/'.$url[0].'.php')){
			 require_once('tpl/'.$url[0].'.php');
		}elseif(file_exists('tpl/'.$url[0].'/'.$url[1].'.php')){
			 require_once('tpl/'.$url[0].'/'.$url[1].'.php');
		}else{
			 require_once('tpl/404.php');
		}
}
/*****************************
FUNCÇÃO DO PRO PHP
INCLUE ARQUIVOS
*****************************/
function setArq($nomeArquivo){
	if(file_exists($nomeArquivo.'.php')){
		include($nomeArquivo.'.php');
	}else{
		echo 'Erro ao incluir <strong>'.$nomeArquivo.'.php</strong>, arquivo ou caminho não conferem!';	
	}
}
/*****************************
FUNCÇÃO DO PRO PHP
SETA URL DA HOME
*****************************/
function setHome(){
	echo BASE;	
}
/*****************************
FUNCÇÃO DO PRO PHP
GERA RESUMOS
*****************************/
function lmWord($string, $words = '100'){
	$string 	= strip_tags($string);
	$count		= strlen($string);
	
	if($count <= $words){
		return $string;	
	}else{
		$strpos = strrpos(substr($string,0,$words),' ');
		return substr($string,0,$strpos).'...';
	}
	
}
/*****************************
TRANFORMA STRING EM URL
FUNCÇÃO DO PRO PHP
*****************************/
function setUri($string){
	$a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
	$b = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';	
	$string = utf8_decode($string);
	$string = strtr($string, utf8_decode($a), $b);
	$string = strip_tags(trim($string));
	$string = str_replace(" ","-",$string);
	$string = str_replace(array("-----","----","---","--"),"-",$string);
	return strtolower(utf8_encode($string));
}
/*****************************
SOMA VISITAS
*****************************/	
function setViews($topicoId){
	$topicoId = mysql_real_escape_string($topicoId);
	$readArtigo = read('up_posts',"WHERE id = '$topicoId'");
	
	foreach($readArtigo as $artigo);
		$views = $artigo['visitas'];
		$views = $views +1;
		$dataViews = array(
			'visitas' => $views
		);
		update('up_posts',$dataViews,"id = '$topicoId'");
}