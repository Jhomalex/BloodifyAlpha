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
<div class="row">
  <div class="col s12 center">
  <h4>Registro de usuario</h4>
  </div>
    <form class="col s12" id="formularioDon">
      <input type="hidden" id="idDon" name="idDon">
      <div class="row">
        <div class="input-field col s6">
        <input id="nomDon" name="nomDon" type="text" class="validate">
          <label>Nombre</label>
        </div>
        <div class="input-field col s6">
          <input id="apDon" name="apDon" type="text" class="validate">
          <label>Apellidos</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="usDon" name="usDon" type="email" class="validate">
          <label>Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="passDon" name="passDon" type="password" class="validate">
          <label>Contraseña</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="passDon2" name="passDon2" type="password" class="validate">
          <label>Confirmar contraseña</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
           <input id="dniDon" name="dniDon" type="text" class="validate">
           <label>DNI</label>
        </div>
        <div class="input-field col s6">
           <input id="celDon" name="celDon" type="text" class="validate">
           <label>cel</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <h6>Fecha de nacimiento</h6>
          <input id="fnacDon" name="fnacDon" type="date" class="">
        </div>
        <div class="input-field col s6">
          <h6>Tipo de sangre</h6>
          <select name="tsangreDon" id="tsangreDon">
          </select>
         </div>
      </div>
      <div class="file-field input-field">
         <div class="btn waves-effect waves-light #d32f2f red darken-2">
            <span>Escoger foto</span>
            <input type="file" id="fotoDon" name="fotoDon">
         </div>
         <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
         </div>
      </div>
      <div class="row">
         <div class="col s9">
            <h6>¿Quieres que te enviemos notificaciones vía SMS?</h6>
         </div>
         <div class="col s3">
            <div class="switch">
               <label>
                  <input type="checkbox">
                  <span class="lever"></span>
               </label>
            </div>
         </div>
      </div>
      <div class="col s12 center">
         <button class="btn waves-effect waves-light #d32f2f red darken-2" 
          type="submit">Registrarme</button>
      </div>
    </form>
  </div>
  <script src="../public/js/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="../public/js/materialize.js"></script>
  <script src="scripts/registroDonante.js"></script>    
</body>
</html>