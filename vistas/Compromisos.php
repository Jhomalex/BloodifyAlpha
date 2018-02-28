<?php
ob_start();
session_start();
if(!isset($_SESSION["nomUser"]))
{
  header("Location:login.php");
}else{
    require "Head.php";
?>
<link rel="stylesheet" href="../public/css/compromisos.css">

<div class="row #bdbdbd grey lighten-1" id="compromisosRow">
   <h5 class="col s12">Mis compromisos</h5>
</div>
<input type="hidden" id="donanteD" name="donanteD" value=<?php echo $_SESSION['idUser'] ?>>
<div class="row" id="compromisosDiv">
   
</div>

<script src="../public/js/jquery-3.3.1.js"></script>
<script src="scripts/compromisos.js"></script>

<?php
    require "Foot.php";
    ?>
    <?php
}
ob_end_flush();
  ?>