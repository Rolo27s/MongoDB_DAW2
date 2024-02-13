<?php
	require "vendor/autoload.php";
	try {
		$cliente = new MongoDB\Client("mongodb://localhost:27017");
		// Conecto a la base de datos 'agenda'
		$bd = $cliente->agenda;

		// Insertar un contacto en la agenda, en la tabla 'contactos'
		$res = $bd->contactos->insertOne( [ "nombre" => "Ana", "telefono" => "676552244", "email" => "ana.casas@gmail.com" ] );
		echo "Id del ultimo registro: " . $res->getInsertedId() . "<br />";

		$res = $bd->contactos->insertMany( [
			[ "nombre" => "Paco",  "telefono" => "645789133", "email" => "paco.porras@gmail.com" ],
			[ "nombre" => "Maria", "telefono" => "606547129", "email" => "maria.ravas@gmail.com"  ],
		] );
		echo "Documentos insertados: " . $res->getInsertedCount(). "<br />";
		print_r($res->getInsertedIds());
	} catch (Exception $e) {
		print($e);
	}
