<?php
ob_start();
session_start();
if(!isset($_SESSION["nomUser"]))
{
  header("Location:login.php");
}else{
  require "Head.php";
?>
<div class="row" id="formularioReceptor">
    <form class="col s12" id="formularioRec" method="POST">
      <input type="hidden" id="idRec" name="idRec">
      <input type="hidden" id="donanteD" name="donanteD" value=<?php echo $_SESSION['idUser'] ?>>
      <div class="row">
        <div class="input-field col s12">
           <input id="nomRec" name="nomRec" type="text" class="validate">
           <label>Nombre del paciente</label>
        </div>
        <div class="input-field col s12">
          <input id="apRec" name="apRec" type="text" class="validate">
          <label>Apellidos del paciente</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
           <input id="dniRec" name="dniRec" type="text" class="validate">
           <label>DNI</label>
        </div>
        <div class="input-field col s6">
           <input id="celRec" name="celRec" type="text" class="validate">
           <label>cel</label>
        </div>
      </div>
      <div class="input-field col s12">
          <h6>Fecha de nacimiento</h6>
          <input id="fnacDon" name="fnacDon" type="date" class="">
      </div>
      <div class="row">
         <div class="input-field col s6">
          <h6>Tipo de sangre</h6>
          <select name="tsangreRec" id="tsangreRec">
          </select>
         </div>
        <div class="input-field col s6">
          <input id="necesitaRec" name="necesitaRec" type="number" class="validate">
          <label>Cantidad de unidades</label>
        </div>
      </div>
      <div class="row">
         <div class="input-field col s6">
            <select name="cMedicoRec" id="cMedicoRec">
            </select>
            <label>Centro Médico</label>
         </div>
         <div class="input-field col s6">
           <input id="codigoRec" name="codigoRec" type="text" class="validate">
           <label>Código de referencia</label>
        </div>
      </div>
      <div class="input-field col s12">
         <textarea id="descripcionRec" name="descripcionRec" class="materialize-textarea" data-length="500"></textarea>
         <label>Cuéntanos sobre él</label>
      </div>
      <div class="input-field col s12">
         <textarea id="casoRec" name="casoRec" class="materialize-textarea" data-length="500"></textarea>
         <label>¿Qué pasó?</label>
      </div>
      <label>Sube una foto de tu paciente demostrando optimismo antes de estar enfermo</label>
      <div class="file-field input-field">
         <div class="btn waves-effect waves-light #e53935 red darken-1">
            <span>Escoger foto</span>
            <input type="file" id="fotosRec" name="fotosRec">
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
          type="submit">Agregar paciente</button>
      </div>
    </form>
    <h5>1</h5>
    <label>1</label>
  </div>
  <script src="../public/js/jquery-3.3.1.js"></script>
  <script src="../public/js/popper.min.js"></script>
  <script type="text/javascript" src="../public/js/materialize.js"></script>
  <script src="scripts/registroPaciente.js"></script>
<?php
    require "Foot.php";
?>

<?php
}
ob_end_flush();
?>