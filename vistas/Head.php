<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bloodify</title>
    <link rel="stylesheet" href="../public/css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/principal.css">
</head>

<body>
  <!---->
  <div class="navbar z-depth-1" id="menuSuperior">
    <nav class="z-depth-0" id="menuSuperiorNav">
      <div class="nav-wrapper">
        <a href="Body.php" class="brand-logo left">Bloodify</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse right">
          <i class="material-icons">more_vert</i>
        </a>
        <ul class="right hide-on-med-and-down">
          <li><a href="misCampanas.php">Mis campañas</a></li>
          <li><a href="Compromisos.php">Mis compromisos</a></li>
          <li><a href="../ajax/donantes.php?op=cerrarSesion">Salir</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li>
            <div class="menuMenu">
            </div>
            <div class="perfilMenu">
            <img class="z-depth-3 circle" width="105" height="105" 
            src="../files/fotos_donantes/<?php echo $_SESSION['fotoUser'] ?>">
            </div>
            <div class="nombreMenu">
              <p class="flow-text "><?php echo $_SESSION['nomUser'] ?></p>
            </div>
          </li>
          <li><a href="misCampanas.php">Mis campañas</a></li>
          <li><a href="Compromisos.php">Mis compromisos</a></li>
          <li><a href="../ajax/donantes.php?op=cerrarSesion">Salir</a></li>
        </ul>
      </div>
    </nav>
  </div>