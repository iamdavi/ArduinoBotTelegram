<?php
session_start();
 if (isset($_SESSION['nombreUsuario']) && $_SESSION['nombreUsuario'] != "") {
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Usuario</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="../css/styleUsers.css" rel="stylesheet">
</head>

    <body id="bodyWallpaper">
    <div id="backgroud"></div>
    
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark primary-color-dark">
            <div class="container">
                <a class="navbar-brand" href="#"><?php echo $_SESSION['nombreUsuario']; ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="navbar-collapse collapse order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item text-sm-center active">
                        <a class="nav-link text-center " href="#">Aulas</a>
                    </li>
                    <li class="nav-item text-sm-center">
                        <a class="nav-link text-center" href="cerrarSesion.php">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
        <div class="container">
          <div class="row">
            <div class="navbar fixed-bottom navbar-dark">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active"><a class="white-text" href="#">Aulas</a></li>
                </ol>
            </div>
          </div>
        </div>
    </header>

  <main>
    <div class="container">
      
      <?php 
          include "funciones.php";

          if (serv()) {
            $rfid = $_SESSION['rfidUsuario'];

            $qry = "select a.id_aula,a.descripcion,d.ip  from empleados e, permisos p, puertos pu, dispositivos d, aulas a where e.rfid=p.rfid and p.num_puertos=pu.num_puertos and p.ip=pu.ip and d.ip=pu.ip and a.ip=d.ip and e.rfid='$rfid' group by a.id_aula;";
            $res = mysqli_query($con,$qry); 
            while ( $row = mysqli_fetch_row($res) ) {
              if (estadoAula($rfid) == "primary") { /*Si el aula está ocupada por el mismo...*/
                
      ?> 

      <div class="row fuera filaAula primary-color align-items-center justify-content-md-center z-depth-2">
        <div class="col-1"><span class="numAula z-depth-2"><?php echo $row[0]; ?></span></div>
        <div class="col-8 text-center text-truncate"><?php echo $row[1]; ?></div>

        <div class='col-2 float-right'><a href="userAula.php" class='btn btn-info botonIr'><i class='fa fa-caret-right' aria-hidden='true'></i></a></div>
      </div>

      <!-- Estado de el aula -->

      <?php 
              }elseif (estadoAula($rfid) == "danger") {
      ?> 
        <div class="row fuera filaAula deshabilitado primary-color align-items-center justify-content-md-center z-depth-2">
        <div class="col-1"><span class="numAula z-depth-2"><?php echo $row[0]; ?></span></div>
        <div class="col-8 text-center text-truncate"><?php echo $row[1]; ?></div>
          <div class='col-2 float-right'><a href="userAula.php" class='btn btn-danger botonIr'><i class='fa fa-caret-right' aria-hidden='true'></i></a></div>
        </div>
        <?php 
      } elseif (estadoAula($rfid) == "success"){?>

        <div class="row fuera filaAula primary-color align-items-center justify-content-md-center z-depth-2">
        <div class="col-1"><span class="numAula z-depth-2"><?php echo $row[0]; ?></span></div>
        <div class="col-8 text-center text-truncate"><?php echo $row[1]; ?></div>
          <div class='col-2 float-right'><a href="userAula.php" class='btn btn-success botonIr'><i class='fa fa-caret-right' aria-hidden='true'></i></a></div>
        </div>

        <?php
      } }


          } else{
            header('Location: ../html/fallo.html');
          }
       ?>

    </div>
  </main>

    <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>


</body>
</html>
<?php } else{
  header('Location: ../html/fallo.html');
} ?>