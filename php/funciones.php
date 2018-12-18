<?php 

/*-- Conexión con la base de datos*/

$ipCon = "10.14.2.175";
$userCon = "root3";
$passCon = "root";
$dbCon = "proyecto";
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

function estadoAula($rfid, $ip){

	global $con;

	/*Está ocupada por el*/

	$qry = "SELECT * FROM registro_aula WHERE rfid='$rfid' and ip = '$ip' and f_salida is null"; 
	$res = mysqli_query($con, $qry);
	$num = mysqli_num_rows($res);

	/*Está ocupada por otros usuarios*/

	$qry2 = "SELECT * FROM registro_aula WHERE rfid<>'$rfid' and ip<>'$ip' and f_salida is null";
	$res2 = mysqli_query($con, $qry2);
	$num2 = mysqli_num_rows($res2);

	/*Están libres*/

	$qry3 = "SELECT * FROM registro_aula WHERE f_salida is not null and f_entrada is not null";
	$res3 = mysqli_query($con, $qry3);
	$num3 = mysqli_num_rows($res3);

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