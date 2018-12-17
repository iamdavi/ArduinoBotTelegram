<?php 

include "funciones.php";

global $con;

$nombre = $_POST["nameUser"];
$pass   = $_POST["passUser"];

if (isset($_POST["iniciarSesion"]) && $nombre != "" && $pass != "") {

	if (serv()) {

		$qry    = "SELECT * from empleados where usuario = '$nombre' and contrasena = '$pass'";
		$res    = mysqli_query($con, $qry);
		$row    = mysqli_fetch_assoc($res);
		$numRow = mysqli_num_rows($res);

		if ($numRow == 1) {
			session_start();
			$_SESSION['nombreUsuario'] = $row['nombre'];
			$_SESSION['puestoUsuario'] = $row['puesto'];
			$_SESSION['rfidUsuario']   = $row['rfid'];

			header("Location: user.php");
		} else {
			echo "Usuario no encontrado.";
		}

	} else {
		echo "No se ha podido conectar con la base de datos";
	}
}

 ?>