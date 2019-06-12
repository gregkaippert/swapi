<?php 
ob_start();
session_start();
require_once('functions.php');
require_once('config/Conexao.php');

use config\Conexao;

$pdo = new Conexao;

$acao = $_POST['acao'];

switch($acao){
	
	case 'logar':
	$email = strip_tags(trim($_POST['email']));
	if(empty($_POST['email'])){
		echo '1'; // campo email vazio
		} else {
	$sel = $pdo->prepare("SELECT email FROM login WHERE email = ?");
	$sel->bindValue(1, $email);
	$sel->execute();
	$select = $sel->rowCount();
	if($select >= 1){
		echo '2'; // usuario cadastrado
		} else {
			echo '3'; // usuario nao cadastrado
			} 
	} // fim if
	break;
	
	case 'entrar':
	$email = strip_tags(trim($_POST['email']));
	$senha = strip_tags(trim($_POST['senha']));
	
	if(empty($_POST['senha'])){
		echo '4'; // campo senha vazio
		} else {
	$sen = $pdo->prepare("SELECT id, nome, email, senha, nivel, status, data FROM login WHERE email = ?");
	$sen->bindValue(1, $email);
	$sen->execute();
	$senhaB = $sen->fetch(PDO::FETCH_ASSOC);
	
	if(verifica($senha, $senhaB['senha'])){
		
		$_SESSION['id'] = $senhaB['id'];
		$_SESSION['nome'] = $senhaB['nome'];
		$_SESSION['email'] = $senhaB['email'];
		$_SESSION['nivel'] = $senhaB['nivel'];
		$_SESSION['status'] = $senhaB['status'];
		$_SESSION['data'] = $senhaB['data'];
		
				/* VERIFICO SE O IP REALMENTE EXISTE NA INTERNET */
				if(!empty($_SERVER['HTTP_CLIENT_IP'])){
					$ip = $_SERVER['HTTP_CLIENT_IP'];
				/* VERIFICO SE O ACESSO PARTIU DE UM SERVIDOR PROXY */
				} elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
					$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				} else {
				/* CASO EU NÃO ENCONTRE NAS DUAS OUTRAS MANEIRAS, RECUPERO DA FORMA TRADICIONAL */
					$ip = $_SERVER['REMOTE_ADDR'];
				}
				
		/*$his = $pdo->prepare("INSERT INTO historico(id_usuario, ip, data_inicio, data_fim) VALUES(?,?,NOW(),?)");
		$his->bindValue(1, $_SESSION['id']);
		$his->bindValue(2, $ip);
		$his->bindValue(3, 'NULL');
		$his->execute();*/
				
		echo '5'; // usuario autorizado
		} else {
			echo '6'; // usuario barrado
			}
	} // fim do else
	break;
	
	} // fim switch
	
ob_end_flush();
$pdo = NULL;
?>