<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bloodify</title>
    <link rel="stylesheet" href="../public/css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="estilo_principal.css">
</head>

<body>
  <!---->
  <div class="navbar z-depth-1" id="menuSuperior">
    <nav class="z-depth-0" id="menuSuperiorNav">
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo left">Bloodify</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse right">
          <i class="material-icons">more_vert</i>
        </a>
        <ul class="right hide-on-med-and-down">
          <li><a href="sass.html">Mis campañas</a></li>
          <li><a href="badges.html">Mis compromisos</a></li>
          <li><a href="collapsible.html">Términos y condiciones</a></li>
          <li><a href="mobile.html">Salir</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="sass.html">Mis campañas</a></li>
          <li><a href="badges.html">Mis compromisos</a></li>
          <li><a href="collapsible.html">Términos y condiciones</a></li>
          <li><a href="mobile.html">Salir</a></li>
        </ul>
      </div>
    </nav>
  </div>
  
  <div class="row">
    <div class="row" id="cuadroDeHonor">
      <div class="col">
      <p class="label">Necesitan de ti...</p>
      </div>
    </div>

    <div id="peticionesDiv">
    </div>
    
    <div class="row" id="cuadroDeHonor">
      <div class="col s12">
      <p class="flow-text">Cuadro de honor: Los héroes que salvaron vidas donando</p>
      <div class="col s6">
        <div class="card center-align">
          <div class="card-image">
            <img src="../files/perfil.jpg">
          </div>
          <span class="flow-text text-darken-6">Felipe Benites Correa</span>
        </div>
      </div>
      <div class="col s6">
        <div class="card center-align">
          <div class="card-image">
            <img src="../files/perfil.jpg">
          </div>
          <span class="flow-text text-darken-6">Felipe Benites Correa</span>
        </div>
      </div>
    </div>
  </div>
  <h5>1</h5>
  <div id="menuInferior" class="row navbar-fixed">
    <nav class="#e53935 red darken-1 nav-center">
      <div class="nav-wrapper container">
      <ul id="contenidoMenuInferior">
          <li>
            <a href="#" class="center">
              <i class="material-icons">search</i>
            </a>  
          </li>
          <li>
            <a href="#" class="center">
              <i class="material-icons">person_pin</i>
            </a>
          </li>
          <li>
            <a href="#" class="center">
              <i class="material-icons">room</i>
            </a>
          </li>
          <!--li>
            <a href="#" class="center">
              <i class="material-icons">feedback</i>
            </a>        
          </li-->
          <li>
            <a href="#" class="center">
              <i class="material-icons">control_point</i>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </div>

  <!---->
  <script src="../public/js/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="../public/js/materialize.js"></script>
  <script type="text/javascript" src="scripts/principal.js"></script>
    
</body>
</html>