<?php
session_start();
 if (isset($_SESSION['nombreUsuario']) && $_SESSION['nombreUsuario'] != "") {
  include "funciones.php";
  $rfid = $_SESSION['rfidUsuario'];
  $aulaEstatus = estadoAula($rfid);
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
                <a class="navbar-brand" href="#"><?php echo $_SESSION["nombreUsuario"]; ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="navbar-collapse collapse order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item text-sm-center active">
                        <a class="nav-link text-center " href="#">Aulas</a>
                    </li>
                    <li class="nav-item text-sm-center">
                        <a class="nav-link text-center" href="index.html">Salir</a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
        <div class="container">
          <div class="row">
            <div class="navbar fixed-bottom navbar-dark">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active"><a class="white-text" href="user.html">Aulas</a></li>
                  <li class="breadcrumb-item active">Aula Nº XX</li>
                </ol>
            </div>
          </div>
        </div>
    </header>

  <main>
    <div class="container">

      <div class="row z-depth-2 alert-<?php echo $aulaEstatus?> seccion">

            <div class="col-2 col-md-1 iconSection z-depth-1 info-color-dark text-center">
              <i class="fa fa-book fa-2x white-text" aria-hidden="true"></i>
            </div>

            <div class="col-9 col-md-9 text-center">
              <h3 class="black-text">Estado del aula</h3>
            </div>

            <div class="col-sm-12">
              <h4 class="black-text">En este momento está dentro del aula.</h4>
            </div>

      </div>

      <div class="row z-depth-2 seccion">

            <div class="col-2 col-md-1 iconSection z-depth-1 primary-color-dark text-center">
              <i class="fa fa-microchip fa-2x white-text" aria-hidden="true"></i>
            </div>

            <div class="col-9 col-md-9 text-center">
              <h3 class="black-text">Dispositivo</h3>
            </div>

            <div class="col-sm-12">
              <h3 class="black-text">Lista de puertos:</h3>
            </div>

            <div class="col-sm-12">
              <div class="table-responsive">
                <table class="table black-text">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Descripción</th>
                      <th scope="col">Estado</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Encender luz</td>
                      <td>
                        <label class="switch">
                          <input type="checkbox">
                          <span class="slider round"></span>
                        </label>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Cerrar puerta</td>
                      <td>
                        <label class="switch">
                          <input type="checkbox">
                          <span class="slider round"></span>
                        </label>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Bajar persianas</td>
                      <td>
                        <label class="switch">
                          <input type="checkbox">
                          <span class="slider round"></span>
                        </label>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
      </div>

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