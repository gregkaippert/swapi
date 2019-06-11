<?php

namespace controllers;

class planetas
{
	protected $nome;
	protected $clima;
	protected $terreno;
	protected $id_name; # pega o id ou nome para listar os planetas
	private $id;
	
	public function setId_Name($id_name)
	{
		$this->id_name = $id_name;
	}

	public function getId_Name()
	{
		return $this->id_name;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setClima($clima)
	{
		$this->clima = $clima;
	}

	public function getClima()
	{
		return $this->clima;
	}

	public function setTerreno($terreno)
	{
		$this->terreno = $terreno;
	}

	public function getTerreno()
	{
		return $this->terreno;
	}

}
