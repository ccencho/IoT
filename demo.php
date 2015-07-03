
<?php
$estado=$_GET["pinD13"];     //variables las cual actualizamos desde la pagina el estado
$estado1=$_GET["pinD14"];   //variables las cual actualizamos desde la pagina el estado
$estado2=$_GET["pinD15"];  //variables las cual actualizamos desde la pagina el estado
$val =$_GET["led"];     //variables que pregunta arduino y utilizamos para saber el estado
$val1=$_GET["led1"];  //variables que pregunta arduino y utilizamos para saber el estado
$val2=$_GET["led2"];  //variables que pregunta arduino y utilizamos para saber el estado
//$temperatura=$_GET["temperatura"];
$con = mysql_connect("localhost", "root", "*****");
if(!$con)
	{
	die('Could not connect: ' .mysql_error());
	}
mysql_select_db("arduino", $con);

//comprobamos el estado de los led

$result = mysql_query("SELECT `numero`, `estado` FROM `habitacion` WHERE numero=$val");
while($rs = mysql_fetch_array($result)) {
echo "$rs[1]";
}
$resulta = mysql_query("SELECT `numero`, `estado` FROM `habitacion` WHERE numero=$val1");
while($rsa = mysql_fetch_array($resulta)) {
echo "$rsa[1]";
}
$resulta1 = mysql_query("SELECT `numero`, `estado` FROM `habitacion` WHERE numero=$val2");
while($rsa1 = mysql_fetch_array($resulta1)) {
echo "$rsa1[1]";
mysql_close($con);
}

//Actualizamos el estado de los led desde la pagina

if ($estado=="Y"){
mysql_query("UPDATE habitacion set estado='BH1YF' WHERE numero=1");
mysql_close($con);
}
if ($estado=="A"){
mysql_query("UPDATE habitacion set estado='BH1AF' WHERE numero=1");
mysql_close($con);
}
if ($estado1=="Y"){
mysql_query("UPDATE habitacion set estado='BH2YF' WHERE numero=2");
mysql_close($con);
}
if ($estado1=="A"){
mysql_query("UPDATE habitacion set estado='BH2AF' WHERE numero=2");
mysql_close($con);
}
if ($estado2=="Y"){
mysql_query("UPDATE habitacion set estado='BH3YF' WHERE numero=3");
mysql_close($con);
}
if ($estado2=="A"){
mysql_query("UPDATE habitacion set estado='BH3AF' WHERE numero=3");
mysql_close($con);
}
mysql_query("INSERT INTO `led`(`habitacion`) VALUES ($val1)");
mysql_close($con);
?>
<b>Apretar Boton para prender o Apagar led Verde</b>
<form action='/prueba2.php' method='GET'><p><input type='hidden' name='pinD13' value='Y'>
<input type='submit' value='Off'/></form>
<form action='/prueba2.php' method='GET'><p><input type='hidden' name='pinD13' value='A'>
<input type='submit' value='On'/></form>
<b>Apretar Boton para prender o Apagar led Rojo</b>
<form action='/prueba2.php' method='GET'><p><input type='hidden' name='pinD14' value='Y'>
<input type='submit' value='Off'/></form>
<form action='/prueba2.php' method='GET'><p><input type='hidden' name='pinD14' value='A'>
<input type='submit' value='On'/></form>
<b>Apretar Boton para prender o Apagar led Amarillo</b>
<form action='/prueba2.php' method='GET'><p><input type='hidden' name='pinD15' value='Y'>
<input type='submit' value='Off'/></form>
<form action='/prueba2.php' method='GET'><p><input type='hidden' name='pinD15' value='A'>
<input type='submit' value='On'/></form>