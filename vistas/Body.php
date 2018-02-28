<?php
ob_start();
session_start();
if(!isset($_SESSION["nomUser"]))
{
  header("Location:login.php");
}else{
require "Head.php";
?>
<div class="row">
    <div class="row" id="cuadroDeHonor">
      <div class="col">
      <p class="label" id="perro">Necesitan de ti...</p>
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
  
  <?php
  require "Foot.php";
  ?>
  <?php
}
ob_end_flush();
  ?>