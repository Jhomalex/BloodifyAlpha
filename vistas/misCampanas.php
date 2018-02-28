<?php
ob_start();
session_start();
if(!isset($_SESSION["nomUser"]))
{
  header("Location:login.php");
}else{
    require "Head.php";
?>
<link rel="stylesheet" href="../public/css/misCampañas.css">
<div class="row #bdbdbd grey lighten-1" id="campañasRow">
   <h5 class="col s12">Mis campañas</h5>
</div>
<input type="hidden" id="donanteD" name="donanteD" value=<?php echo $_SESSION['idUser'] ?>>
<div class="row" id="campañasDiv">
<!--div class="row">
      <div class="col s12 #263238 blue-grey darken-4" id="campañasCol">
         <p class="flow-text">Campaña para:</p>
         <h4>Jhonatan Malara Santa Cruz</h4>
         <div class="col s6 center">
            <p class="flow-text">Necesita: 6 u.</p>
         </div>
         <div class="col s6 center">
            <p class="flow-text">Progreso: 4 u.</p>
         </div>
      </div>
      <div class="col s12">
         <a class="btn right z-depth-0 waves-effect col s4" id="botones">DAR DE BAJA</a>
      </div>
   </div-->
</div>
<script src="../public/js/jquery-3.3.1.js"></script>
<script src="scripts/misCampanas.js"></script>
<?php
    require "Foot.php";
    ?>
    <?php
}
ob_end_flush();
  ?>