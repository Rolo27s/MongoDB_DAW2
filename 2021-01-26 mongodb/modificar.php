<?php
	require "vendor/autoload.php";
	try {
		$cliente = new MongoDB\Client("mongodb://localhost:27017");
		$bd = $cliente->libroservidor;

		// pone a 7000 el saldo del usuario con nombre "Ana"
		$updateResult = $bd->usuarios->updateOne(
			[ 'nombre' => 'Ana' ],
			[ '$set'   => [ 'saldo' => '700' ] ]
		);
		// MUY IMPORTANTE LAS COMILLAS SIMPLES
		printf("Datos coincidentes: %d<br>", $updateResult->getMatchedCount());
		printf("Datos modificados:  %d<br>", $updateResult->getModifiedCount());
	}catch (Exception $e) {
		print($e);
	}


