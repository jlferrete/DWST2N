<!DOCTYPE html>
<html lang=”es”>
<head>
<meta charset="UTF-8"/>
</head>
<body>

<h2>Ejercicio 1</h2>

<?php
// Generamos el número aleatorio entre 1 y 100
$numAle= rand(1,100);
/*Recorremos los numeros comprendidos entre el numero aleatorio y el 0, 
comprobando si se trata de un número impar
*/
echo("Los números impares comprendidos entre $numAle y 0 son: <br/>");
for($i=$numAle;$i>=0;$i--){
	if($i%2!==0){
		echo("$i<br/>");
	}else{
		
	}
}
?>
<h2>Ejercicio 2</h2>
<?php

function numPar($num1,$num2){

$contador=0;
$numMax = max($num1,$num2);
$numMin = min($num1,$num2);
$arrNum = array();

for($numMax;$numMax>=$numMin;$numMax--){
	if($numMax%2==0){
		array_push($arrNum,$numMax);
		$contador++;
		}
	}
	$msg="La cantidad de números pares comprendidos entre los numeros elegidos es de $contador <br/>" . "Son los siguientes: " . implode(",",$arrNum);
	return $msg;

}
$num1=rand(1,100);
echo("El primer número es: $num1<br/>");
$num2=rand(1,100);
echo("El segundo número es: $num2<br/>");
echo(numPar($num1,$num2));
?>
<h2>Ejercicio 3</h2>
<?php

function cuadrado($lado){
	$area=$lado*$lado;
	$perimetro=$lado*4;
	echo("El área del cuadrado de lado $lado es $area y su perimetro es de $perimetro <br/>");
	}
$lado=rand(1,100);
echo ("El valor del lado generado aleatoriamente es de: $lado <br/>");
cuadrado($lado);
		
?>
<h2>Ejercicio 4</h2>
<?php
function inferior($numero){
	$sumatorio=0;
	for($i=1;$i<$numero;$i++){
		$sumatorio=$sumatorio+($i);
	}
	return $sumatorio;
}
$num3=rand(1,100);
echo("El número generado aleatoriamente es $num3 <br/>");
echo("La suma de los valores inferiores al número $num3 es de " . inferior($num3) . "<br/>"); 
	
?>

<h2>Ejercicio 5</h2>
<?php
function cuenta($arrValores,$numRep){
	/*Buscando en W3CSchools ( https://www.w3schools.com/php/func_array_count_values.asp ) en la documentación de 
	PHP ( http://php.net/manual/es/function.array-count-values.php ), encontré la función (array_count_values()) 
	que cuenta todos los valores dentro de una array.
	Devuelve una array asociativa, donde las claves son los valores originales de la array, y los valores el número de coincidencias
	Emplear este método, nos ahorra muchas líneas de código*/
	$contador=array_count_values($arrValores);
	$resultado=$contador[$numRep];
	return $resultado;
	}
	
$arrValores=array();
echo("La lista de valores de la array es: ");
for($i=0;$i<50;$i++){
	$num4=rand(1,10);	
	array_push($arrValores,$num4);
	echo ("$num4 ");
	}
$num5= rand(1,10);
$vecesRep = cuenta($arrValores,$num5);
echo("<br/> El numero de veces que obtenemos repetido $num5 es: $vecesRep");
?>
<h2>Ejercicio 6</h2>
<?php

/* La función array_unique ( http://php.net/manual/es/function.array-unique.php ) elimina valores duplicados de un array */
// Al estar ejecutando la función cuenta varias veces en el mismo documento, no se puede redefinir por eso está comentada.

/*function cuenta($arrValores,$numRep){
	$contador=array_count_values($arrValores);
	$resultado=$contador[$numRep];
	return $resultado;
	}*/

function criba($arrValores){

$resultadoCriba = array_unique($arrValores);
return $resultadoCriba;
}
	
$arrValores=array();
echo("La lista de valores de la array es: ");
for($i=0;$i<50;$i++){
	$num4=rand(1,10);	
	array_push($arrValores,$num4);
	echo ("$num4 ");
	}
$num5= rand(1,10);
$vecesRep = cuenta($arrValores,$num5);
echo("<br/> El numero de veces que obtenemos repetido $num5 es: $vecesRep. <br/>");
//Modificamos el ejercicio 5 y ejecutamos la función criba para eliminar valores duplicados
$arrCriba = criba($arrValores);

//Ahora comprobamos los resultados obtenidos con la array cribada
echo("La lista de valores tras la criba de la array es: ".implode(",",$arrCriba));
$vecesRep = cuenta($arrCriba,$num5);
echo("<br/>Tras la criba, el numero de veces que obtenemos repetido $num5 es: $vecesRep");
?>

<h2>Ejercicio 7</h2>
<?php

function comprueba($arrAlumno,$pk){

/*Buscando en la documentación de PHP, encontramos ( http://php.net/manual/es/function.sizeof.php ) con la
siguiente recomendación:
If your array is "huge", it is reccomended to set a variable first for this case:

$max = sizeof($huge_array);
for($i = 0; $i < $max;$i++)
{
code...
}
 */
$tamArr=sizeof($arrAlumno);
for($i=0;$i<$tamArr;$i++){
	if($arrAlumno[0][$i]==$pk){
		echo ("Nombre: ".$arrAlumno[1][$i]."<br>");
		echo ("Apellidos: ".$arrAlumno[2][$i]."<br>");
		echo ("Idioma: ".$arrAlumno[3][$i]."<br>");
		echo ("Nota media: ".$arrAlumno[4][$i]."<br>");
			}
	}

}
function estadisticas($arrAlumno){
	$suma=0;
	$media=0;
	$contadorAprobado=0;
	$tamArr=sizeof($arrAlumno);
	for($i=0;$i<$tamArr;$i++){
	$suma=$suma+$arrAlumno[4][$i];
		if($arrAlumno[4][$i]>=5){
			$contadorAprobado++;
		}
	}
	$media=$suma/$tamArr;
	echo("La nota media de los alumnos es igual a: ".$media."<br/> El número de aprobados es de: ".$contadorAprobado);
}

/* Para generar una array multidimensional en PHP, hemos consultado: ( https://www.w3schools.com/php/php_arrays_multi.asp )
Now the two-dimensional $cars array contains four arrays, and it has two indices: row and column.
To get access to the elements of the $cars array we must point to the two indices (row and column)
Por ello, al recorrer la arrAlumno, hemos seleecionado primero la fila y luego la columna*/
$arrAlumno=array(
	array(1,2,3,4,5),
	array("Miriam", "Manolo", "Miguel", "Marcos","Mercedes"),
	array("Gutiérrez Gutiérrez", "Fernández Fernández", "González González", "Pérez Pérez","Díaz Díaz"),
	array("Español", "Francés", "Alemán", "Inglés","Italiano"),
	array(5.4,6.7,5.1,8.9,3.1));

$pk=2;

comprueba($arrAlumno, $pk);
estadisticas($arrAlumno);

?>

</body>
</html>