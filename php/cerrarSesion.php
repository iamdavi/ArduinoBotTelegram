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
                <a class="navbar-brand" href="#"><?php echo $var ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="navbar-collapse collapse order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item text-sm-center">
                        <a class="nav-link text-center " href="aulas.php">Aulas</a>
                    </li>
                    <li class="nav-item text-sm-center active">
                        <a class="nav-link text-center" href="#!">Cerrar sesión</a>
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
<?php } else {
  header('Location: ../html/fallo.html');
} ?>