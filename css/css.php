<?php
	/**
	 * Compresor CSS al vuelo.
	 *
	 * La idea es minimizar la cantidad de HTTP Request realizados
	 * para mejorar sustancialemente la carga del DOM al vuelo
	 *
	 */

	/* 
	 * Los CSS que se encuentran dentro de la carpeta css/ son copiados de docs.min.css
	 * y unificamente tienen como uso realizar un test de funcionamiento
	 */

	/*
	 * Para usar el codigo en HTML, simplemente
	 *
	 * <link rel="stylesheet" type="text/css" href="/css/css.php" />
	*/

	# Añadir tus css, si los tienes todos en la misma carpeta puedes realizar un readdir
	$ficherosUnificar = array(
	  "bootstrap.min.css",
	  "estilosPropios.css",
	  "docs.min.css",
	);

	#Agregar el contenido a una unica variable
	$contenido = "";
	foreach ($ficherosUnificar as $fichero) {
	  $contenido .= file_get_contents($fichero);
	}
	// Eliminar los comentarios para reducir el tiempo de carga
	$contenido = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', ' ', $contenido);
	// Eliminar los espacios despues del simbolo ":"
	$contenido = str_replace(': ', ':', $contenido);
	// Eliminar espacios vacios, saltos de linea......etc
	$contenido = str_replace(array("\r\n", "\r", "\n", "\t"), '', $contenido);
	$contenido = str_replace(array('} '), '}', $contenido);
	$contenido = str_replace(array('{ '), '{', $contenido);
	$contenido = str_replace(array('; '), ';', $contenido);
	$contenido = str_replace(array(', '), ',', $contenido);
	$contenido = str_replace(array(' }'), '}', $contenido);
	$contenido = str_replace(array(' {'), '{', $contenido);
	$contenido = str_replace(array(' ;'), ';', $contenido);
	$contenido = str_replace(array(' ,'), ',', $contenido);
	// Habilitar la codificacion GZip- Si el navegador lo permite
	if(!ob_start("ob_gzhandler")) ob_start();
	// Habilitar Cache para el CSS
	header('Cache-Control: public');
	// Preparar el cache para que caduque en un dia
	header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 86400) . ' GMT');
	// Establecer en tipo MIME para que sea txt/css
	header("Content-type: text/css");
	// Escribir todo
	echo($contenido);
?>