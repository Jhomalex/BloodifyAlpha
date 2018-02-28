<?php
ob_start();
session_start();
if(!isset($_SESSION["nomUser"]))
{
  header("Location:login.php");
}else{
    require "Head.php";
?>
<div class="row" id="centrosM">


</div>

<style>
   .tCM{
      background:#d6d4d4;
      color: white;
   }
</style>
<script src="../public/js/jquery-3.3.1.js"></script>
<script src="scripts/centroMedico.js"></script>
 <?php
    require "Foot.php";
    ?>
    <?php
}
ob_end_flush();
  ?>