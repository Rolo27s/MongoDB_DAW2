<?php
	require "vendor/autoload.php";
	try {
		$cliente = new MongoDB\Client("mongodb://localhost:27017");
		$bd = $cliente->libroservidor;

		$res = $bd->usuarios->insertOne( [ "nombre" => "Ana", "clave" => "1234", "saldo" => 1000 ] );
		echo "Id del ultimo registro: " . $res->getinsertedId() . "<br>";

		$res = $bd->usuarios->insertMany( [
			[ "nombre" => "Paco",  "clave" => "1234", "saldo" => 100 ],
			[ "nombre" => "Maria", "clave" => "1234", "saldo" => 30  ],
		] );
		echo "Documentos insertados: " . $res->getInsertedCount(). "<br>";
		print_r($res->getInsertedIds());
	} catch (Exception $e) {
		print($e);
	}
