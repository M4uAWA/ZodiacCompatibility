<?php

//preg_explode split

function getDay($str)
{
	$day = ltrim($str, "0..9");
	$day = ltrim($day, "-");
	$day = ltrim($day, "0..9");
	$day = ltrim($day, "-");

	return $day;
}

function getMon($str)
{
	$mon = ltrim($str, "0..9");
	$mon = ltrim($mon, "-");
	$mon = rtrim($mon, "0..9");
	$mon = rtrim($mon, "-");

	return $mon;
}


function getIndex($day, $mon)
{
	if (($mon == 3) && ($day >= 21) || ($mon == 4) && ($day <= 19)) {
		$sig = 0;
	} else if (($mon == 4) && ($day >= 20) || ($mon == 5) && ($day <= 20)) {
		$sig = 1;
	} else if (($mon == 5) && ($day >= 21) || ($mon == 6) && ($day <= 20)) {
		$sig = 2;
	} else if (($mon == 6) && ($day >= 21) || ($mon == 7) && ($day <= 22)) {
		$sig = 3;
	} else if (($mon == 7) && ($day >= 23) || ($mon == 8) && ($day <= 22)) {
		$sig = 4;
	} else if (($mon == 8) && ($day >= 23) || ($mon == 9) && ($day <= 22)) {
		$sig = 5;
	} else if (($mon == 9) && ($day >= 23) || ($mon == 10) && ($day <= 22)) {
		$sig = 6;
	} else if (($mon == 10) && ($day >= 23) || ($mon == 11) && ($day <= 21)) {
		$sig = 7;
	} else if (($mon == 11) && ($day >= 22) || ($mon == 12) && ($day <= 21)) {
		$sig = 8;
	} else if (($mon == 12) && ($day >= 22) || ($mon == 1) && ($day <= 19)) {
		$sig = 9;
	} else if (($mon == 1) && ($day >= 20) || ($mon == 2) && ($day <= 18)) {
		$sig = 10;
	} else if (($mon == 2) && ($day >= 19) || ($mon == 3) && ($day <= 20)) {
		$sig = 11;
	}
	return $sig;
}

function relationship($sig1, $sig2)
{
	$tabla = array(
		array(100, 100, 200, 300, 100, 200, 300, 200, 200, 300, 100, 300),
		array(100, 100, 200, 100, 300, 100, 300, 300, 300, 100, 300, 100),
		array(200, 200, 200, 200, 300, 300, 100, 200, 200, 300, 100, 300),
		array(300, 100, 200, 100, 200, 100, 300, 100, 300, 200, 300, 100),
		array(100, 300, 300, 200, 200, 200, 100, 300, 100, 200, 100, 200),
		array(200, 100, 300, 100, 200, 100, 300, 200, 200, 100, 200, 200),
		array(300, 200, 100, 300, 100, 300, 100, 200, 100, 300, 200, 200),
		array(200, 200, 200, 100, 300, 200, 200, 100, 300, 100, 300, 100),
		array(200, 200, 200, 300, 100, 200, 100, 300, 100, 200, 100, 200),
		array(300, 100, 300, 200, 200, 100, 300, 100, 200, 100, 200, 200),
		array(100, 300, 100, 300, 100, 200, 200, 300, 100, 200, 100, 300),
		array(300, 100, 300, 100, 200, 200, 200, 100, 200, 200, 300, 100)
	);

	return $tabla[$sig1][$sig2];
}

$day1 = getDay($_POST['fecha1']);
$mon1 = getMon($_POST['fecha1']);
$day2 = getDay($_POST['fecha2']);
$mon2 = getMon($_POST['fecha2']);

$sig1 = getIndex($day1, $mon1);
$sig2 = getIndex($day2, $mon2);

$rel = relationship($sig1, $sig2);

echo "<body background=\"..\img\cora.jpg\">";
echo "<link rel=\"stylesheet\" href=\"../estilo/estiloz.css\" />";
echo "<link rel=\"stylesheet\" href=\"../estilo/estiloz.css\" />";
echo "<br/><br/><br/><br/>";
echo "<center><div class = \"titulo\">Su compatibilidad es:</h><br/><br/></center>";
echo "<center><img src = \"../img/zodi/{$sig1}.png\"/>"."<img src = \"../img/zodi/{$rel}.png\"/>" . "<img src = \"../img/zodi/{$sig2}.png\"/></center>";
echo "<br/><br/>";
echo "<center><a href=\"http://localhost/219704734/html/signosZodiacales.html\"><button class=\"return\">Probar otras fechas</button></a></center>";
