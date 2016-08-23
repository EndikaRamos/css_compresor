# Compresor CSS al vuelo
===================
ES: La idea es minimizar la cantidad de HTTP Request realizados, para mejorar sustancialemente la carga del DOM al vuelo

Nota: Los CSS que se encuentran dentro de la carpeta css/ son copiados de getbootstrap.com y unicamente tienen como uso realizar un test de funcionamiento

Ejemplo de Uso (HTML)
```
//Lo declaramos como siempre
<link rel="stylesheet" type="text/css" href="/css/css.php" />
```

Cambiar los CSS a unificar (PHP): 
```
	$ficherosUnificar = array(
	  "bootstrap.min.css",
	  "estilosPropios.css",
	  "docs.min.css",
	);
```
