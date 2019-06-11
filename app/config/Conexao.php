<?php

namespace config;

use \PDO;

require_once("config.php");

class Conexao
{
	private static $conn;

	public function getConn()
	{
		try
		{
			if(!isset(self::$conn)):
				self::$conn = new PDO("mysql:host=".HOST."; dbname=".DB."", USER, PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			endif;
		}
		catch(PDOException $e)
		{
			echo "Erro: " . $e->getMessage();
		}

		return self::$conn;

	}

	public function prepare($sql)
	{
		return $this->getConn()->prepare($sql);
	}

}
