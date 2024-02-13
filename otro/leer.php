<?php
	require "vendor/autoload.php";
	try {
		$cliente = new MongoDB\Client("mongodb://localhost:27017");
		$bd = $cliente->agenda;

		// devuelve todos los contactos
		echo "Todos los contactos<br>";
		$contactos = $bd->contactos->find();
		foreach ($contactos as $contacto) {
			var_dump($contacto);

			echo '<p>Nombre:' . $contacto['nombre'] . '<br />';
			echo '<p>Telefono:' . $contacto['telefono'] . '<br />';
			echo '<p>Email:' . $contacto['email'] . '<br />' . '</p>';
			echo '<br />';
		}

		// contactos con nombre Ana
		echo "<br><br>";
		echo "Contactos con nombre 'Ana' <br>";
		$contactos = $bd->contactos->find( [ "nombre" => "Ana" ] );
		foreach ($contactos as $contacto) {
			var_dump($contacto);

			echo '<p>Nombre:' . $contacto['nombre'] . '<br />';
			echo '<p>Telefono:' . $contacto['telefono'] . '<br />';
			echo '<p>Email:' . $contacto['email'] . '<br />' . '</p>';
			echo '<br />';
		}

		// solo devuelve el primero que encuentre
		echo "<br><br>";
		echo "Contacto con nombre 'Ana'<br>";
		$ana = $bd->contactos->findOne( [ "nombre"=> "Ana" ] );
		var_dump($ana);
	}catch (Exception $e) {
		print($e);
	}
