<?php 

/*-- Conexión con la base de datos*/

$ipCon = "10.14.2.175";
$userCon = "root3";
$passCon = "root";
$dbCon = "proyecto1";
$con = mysqli_connect($ipCon, $userCon, $passCon, $dbCon);

function serv(){ 

	global $con;

	if ($con) {
		return true;
	} else {
		return false;
	}
}

/*-- Visualizar el estado de un aula --*/

function estadoAula($rfid){

	global $con;

	/*Está ocupada por el*/

	$qry = "SELECT * FROM registro_aula WHERE rfid='$rfid' and dentro='si'"; 
	$res = mysqli_query($con, $qry);
	$num = mysqli_num_rows($res);

	/*Está ocupada por otros usuarios*/

	$qry2 = "SELECT * FROM registro_aula WHERE dentro='si'";
	$res2 = mysqli_query($con, $qry2);
	$num2 = mysqli_num_rows($res2);

	if ($num == 1) {
		return "primary"; /*Significa que el aula está OCUPADA POR ÉL MISMO*/
	} elseif ($num2 == 1) {
		return "danger"; /*Significa que el aula está OCUPADA POR OTRA PERSONA*/
	} else {
		return "success"; /*Significa que el aula está libre.*/
	}

}

/*-- Funcion que devuelve la descripción del numero de puerto --*/
/*-- Se debe de usar en un bucle ya que el retur*/

function descripcionPuerto($ip, $numP){

	global $con;

	$qryDescrip = "SELECT * from puertos where ip='$ip' and num_puertos='$numP'";
    $resDescrip = mysqli_query($con, $qryDescrip);
    $rowDescrip = mysqli_fetch_row($resDescrip);

    return $rowDescrip;

}

 ?>