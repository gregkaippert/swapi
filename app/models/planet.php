<?php

namespace models;

use config\Conexao;
use controllers\planetas; # pertence a classe dos controllers
use \PDO;

class planet extends planetas # planet pertence a classe dos models
{

	public $tabela = 'planetas';

	# funcao para listar todos os usuarios
	public function listAll()
	{
		// listar quantidade de filmes 
		#$dados = json_decode(file_get_contents('https://swapi.co/api/people/'));

		$conn = new Conexao;
		$sql = "SELECT * FROM $this->tabela";
		$pdo = $conn->prepare($sql);
		$pdo->execute(); # funcao prepare da classe Conexao
		$res = $pdo->fetchAll(PDO::FETCH_OBJ);
		if(count($res) > 0):
			echo json_encode(array("count"=>count($res), "results"=> $res));
		else:
			echo json_encode(array("code"=>404,"message"=>"error"));
		endif;
		//echo self::$tabela;
	}

	#funcao para listar pelo atributo nome ou id
	public function listAttr()
	{
		$conn = new Conexao;
		$sql = "SELECT * FROM $this->tabela WHERE id = ? or nome like ?";
		$pdo = $conn->prepare($sql);
		$pdo->bindValue(1, $this->getId_Name());
		$pdo->bindValue(2, "%".$this->getId_Name()."%");
		$pdo->execute();
		$res = $pdo->fetch(PDO::FETCH_ASSOC);
		if($pdo->rowCount() > 0):
			echo json_encode($res);
		else:
			//echo 'Nenhum planeta cadastrado com a palavra chave "' .$this->getId_Name(). '"';
			echo json_encode(array("count"=>0)); # retorna o numero de dados 0
		endif;
	}

	public function delete()
	{
		try{
			$conn = new Conexao;
			$sql = "DELETE FROM $this->tabela WHERE id = ?";
			$pdo = $conn->prepare($sql);
			$pdo->bindValue(1, $this->getId());
			$pdo->execute();
			if($pdo->rowCount() > 0):
				echo json_encode(array("code"=>200,"message"=>"success"));
			else:
				echo json_encode(array("code"=>404,"message"=>"error"));
			endif;
		}
		catch(PDOException $e)
		{
			echo "Erro: " . $e->getMessage();
		}
	}

	public function update()
	{
		$conn = new Conexao;
		$sql = "UPDATE $this->tabela SET nome = ?, clima = ?, terreno = ? WHERE id = ?";
		$pdo = $conn->prepare($sql);
		$pdo->bindValue(1, $this->getNome());
		$pdo->bindValue(2, $this->getClima());
		$pdo->bindValue(3, $this->getTerreno());
		$pdo->bindValue(4, $this->getId());
		$pdo->execute();
		if($pdo->rowCount() > 0):
			echo json_encode(array("code"=>200,"message"=>"success"));
		else:
			echo json_encode(array("code"=>404,"message"=>"error"));
		endif;
	}

	public function adicionar()
	{
		$conn = new Conexao;
		$sql = "INSERT INTO $this->tabela(nome, clima, terreno) VALUES(?,?,?)";
		$pdo = $conn->prepare($sql);
		$pdo->bindValue(1, $this->getNome());
		$pdo->bindValue(2, $this->getClima());
		$pdo->bindValue(3, $this->getTerreno());
		$pdo->execute();
		if($pdo->rowCount() > 0):
			echo json_encode(array("code"=>200,"message"=>"success"));
		else:
			echo json_encode(array("code"=>505,"message"=>"error"));
		endif;
	}

}
