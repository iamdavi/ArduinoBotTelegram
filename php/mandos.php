<?php
session_start();
include "funciones.php";

if(!empty($_POST['check_list'])) {

    foreach($_POST['check_list'] as $check) {
    	$porciones = explode("-", $check);
    	puerto($porciones[0], $porciones[1]);
    }

}

?>