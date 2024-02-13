<?php
	require "vendor/autoload.php";
	try {
		$cliente = new MongoDB\Client("mongodb://localhost:27017");
		$bd = $cliente->libroservidor;

		// Elimina al usuario con nombre "Paco"
		echo "Documentos antes de borrar: " . $bd-> usuarios->count() . "<br>";
		$deleteResult = $bd->usuarios->deleteOne( [ "nombre" => "Paco" ] ) ;
		echo "Documentos restantes después de borrar: " . $bd-> usuarios->count() . "<br>";

	}catch (Exception $e) {
		print($e);
	}


