<?php
ob_start();
session_start();
if(!isset($_SESSION["nomUser"]))
{
  header("Location:login.php");
}else{
require "Head.php";
?>
<link rel="stylesheet" href="../public/css/perfil.css">
<div class="container">
   <div class="row">
      <div class="col-12">
         <img src="../files/fotos_donantes/<?php echo $_SESSION['fotoUser'];?>" id="foto" class="responsive-img">
      </div>
      <div class="row">
        <div class="col s12 center">
          <h5 id"nombres"><?php echo $_SESSION['nomUser']." ".$_SESSION['apUser'];?></h5>
        </div>
        <div class="col s12 center">
         <i class="material-icons">opacity</i><label class="texto"> 
        <?php echo $_SESSION['tsangreUser'];?></label>
        </div>
      </div>
   </div>
   <div class="row">
     <div class="col s12 center">
      <i class="material-icons">people</i><label class="texto">  
        <?php echo $_SESSION['dniUser'];?></label>
     </div>
     <div class="col s12 center">
     <i class="material-icons">phone</i><label class="texto"> 
        <?php echo $_SESSION['celUser'];?></label>
     </div>
   </div>
   <div id="ubicacion"></div>
</div>

<?php
require "Foot.php";
?>

<?php
}
ob_end_flush();
  ?>