<?php
    require "Head.php";
?>
    
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-image">
                <img src="../files/fotos_receptores/1517791567.jpg" class="responsive-img">
                <span class="card-title" id="nomPac">Felipo Juanjillo Benites Correa</span>
                </div>
            </div>
        </div>
        <div class="col s12" id="botones">
            <a class="btn left waves-effect waves-light #e53935 red darken-1" 
                id="agregarBtn" onclick="">Me comprometo a donar</a>
                
            <div>
                <a  class="btn-margin btn-floating waves-effect waves-light red left">
                    <i class="material-icons">favorite</i></a>
                <a class="btn-margin btn-floating waves-effect waves-light red left">
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
            <label id="perro">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias quis quos minus, sapiente non itaque aliquam vero numquam labore tempora. Asperiores earum pariatur aliquid iusto rem perspiciatis possimus, repellat excepturi!</label>
        </div>
    </div>
    <div class="row #eceff1 blue-grey lighten-5">
        <div class="col">
            <h6>¿Qué pasó?</h6>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label id="quePaso">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias quis quos minus, sapiente non itaque aliquam vero numquam labore tempora. Asperiores earum pariatur aliquid iusto rem perspiciatis possimus, repellat excepturi!</label>
        </div>
    </div>
    <div class="row #eceff1 blue-grey lighten-5">
        <div class="col">
            <h6>¿Dónde donar?</h6>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
        <iframe width="100%" height="200" frameborder="0" style="border:0" 
        src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJH9jXFXAQSpARErmrONIA_wU&key=AIzaSyAQWH6jkogoQcjvgomKKgDafCd1Vw80lt0" 
        allowfullscreen></iframe>
        </div>
    </div>
    <div class="row #eceff1 blue-grey lighten-5">
        <div class="col">
            <h6>Horarios de atención</h6>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label id="horarioPac">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias quis quos minus, sapiente non itaque aliquam vero numquam labore tempora. Asperiores earum pariatur aliquid iusto rem perspiciatis possimus, repellat excepturi!</label>
        </div>
    </div>
    
    <?php
    require "Foot.php";
?>