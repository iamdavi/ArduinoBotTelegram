<?php 
session_start();
 if (isset($_SESSION['nombreUsuario']) && $_SESSION['nombreUsuario'] != "") {
    session_start();
  session_unset();
  session_destroy();
  header('Location: ../index.html');
} else {
  header('Location: ../html/fallo.html');
} ?>