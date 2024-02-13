<?php
	require "vendor/autoload.php";
	try {
		$cliente = new MongoDB\Client("mongodb://localhost:27017");
		$bd = $cliente->agenda;

		// Elimina al usuario con nombre "Paco"
		echo "Documentos antes de borrar: " . $bd-> contactos->count() . "<br>";
		$deleteResult = $bd->contactos->deleteOne( [ "nombre" => "Paco" ] ) ;
		echo "Documentos restantes después de borrar: " . $bd-> contactos->count() . "<br>";

		// Elimina a todos los usuarios con nombre "Ana"
		echo "Documentos antes de borrar: " . $bd->contactos->estimatedDocumentCount() . "<br>";
		$deleteResult = $bd->contactos->deleteMany(["nombre" => "Ana"]);
		echo "Documentos restantes después de borrar: " . $bd->contactos->estimatedDocumentCount() . "<br>";


	}catch (Exception $e) {
		print($e);
	}
