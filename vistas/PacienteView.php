<?php
ob_start();
session_start();
if(!isset($_SESSION["nomUser"]))
{
  header("Location:login.php");
}else{
    require "Head.php";
    $v1=$_GET['v1'];
    echo "<label id='idPagAnterior' value='$v1'></label>";
?>
    
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-image">
                <img src="../files/fotos_receptores/1517791567.jpg" id="perfilPacienteView" class="responsive-img">
                <span class="card-title" id="nomPac"></span>
                </div>
            </div>
        </div>
        <div class="col s12" id="botones">
            <form id="FormDonacion" method="POST">
                <input type="hidden" id="receptorD" name="receptorD" value=<?php echo $v1 ?>>
                <input type="hidden" id="donanteD" name="donanteD" value=<?php echo $_SESSION['idUser'] ?>>
                <button class="btn left waves-effect waves-light #d32f2f red darken-2" type="submit" 
                    id="donarBtn<?php echo $v1?>">Me comprometo a donar</button>
            </form>
            <div>
                <a  class="btn-margin btn-floating waves-effect waves-light #d32f2f red darken-2 left">
                    <i class="material-icons">favorite</i></a>
                <a class="btn-margin btn-floating waves-effect waves-light #d32f2f red darken-2 left">
                    <i class="material-icons">share</i></a>
            </div>
        </div>
    </div>
    
    <div class="row #eceff1 blue-grey lighten-5">
        <div class="col" id="noSe">
            <h6>¿Quién es?</h6>
            
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label id="quienEs"></label>
        </div>
    </div>
    <div class="row #eceff1 blue-grey lighten-5">
        <div class="col">
            <h6>¿Qué pasó?</h6>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label id="quePaso"></label>
        </div>
    </div>
    <div class="row #eceff1 blue-grey lighten-5">
        <div class="col">
            <h6>¿Dónde donar?</h6>
        </div>
    </div>
    <div class="row">
        <div class="col s12" id="mapaDiv">
        
        </div>
    </div>
    <div class="row #eceff1 blue-grey lighten-5">
        <div class="col">
            <h6>Horarios de atención</h6>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label id="horarioPac"></label>
        </div>
    </div>
    <h4>1</h4>
    <script src="../public/js/jquery-3.3.1.js"></script>
    <script src="scripts/pacienteView.js"></script>
    
    <?php
    require "Foot.php";
    ?>
    <?php
}
ob_end_flush();
  ?>