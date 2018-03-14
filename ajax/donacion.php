<?php
require_once '../models/Donacion.php';

$donacion = new Donacion();
$fechaActual=getdate();
$id=isset($_POST["idD"])? limpiarCadena($_POST["idD"]):"";
$idDon=isset($_POST["donanteD"])? limpiarCadena($_POST["donanteD"]):"";
$idRec=isset($_POST["receptorD"])? limpiarCadena($_POST["receptorD"]):"";
$tiempoServidor=getdate();
$d = $tiempoServidor['mday'];
$m = $tiempoServidor['mon'];
$y = $tiempoServidor['year'];
$fechaServidor=$y."/".$m."/".$d;
$fdonacion= date('Y-m-d',strtotime($fechaServidor));;

switch($_GET["op"]){
    case 'guardaryeditar':
        if(empty($id)){
            $respuesta=$donacion->insertar($idDon,$idRec,$fdonacion);
            echo $respuesta ? "Donación registrado" : "Donación no se pudo registrar";
        }else{
            $respuesta=$donacion->editar($id,$idDon,$idRec,$fdonacion);
            echo $respuesta ? "Donación actualizado" : "Donación no se pudo actualizar";
        }
    break;

    case 'activar':
        $respuesta=$donacion->activar($id);
        echo $respuesta ? "Donación activada" : "Donación no se pudo activar";
    break;

    case 'desactivar':
        $respuesta=$donacion->desactivar($id);
        echo $respuesta ? "Donación cancelada" : "Donación no se pudo cancelar";
    break;

    case 'eliminar':
        $respuesta=$donacion->eliminar($id);
        echo $respuesta ? "Donación eliminado" : "Donación no se pudo eliminar";
    break;

    case 'mostrar':
        $respuesta=$donacion->mostrar($id);
        echo json_encode($respuesta);
    break;

    case 'mostrar2':
        $respuesta=$donacion->mostrar2($idDon);
        echo($idDon);
        $data=Array();
        while($reg=$respuesta->fetch_object()){
            $data[]=array(
                "fdon"=>$reg->fdonacion,
                "nomDon"=>$reg->nomDon,
                "apDon"=>$reg->apDon,
                "nomRec"=>$reg->nomRec,
                "apRec"=>$reg->apRec,
                "cMedico"=>$reg->cMedico,
                "estado"=>($reg->estado)?'<div class="switch col s3"><label>
                <input id="checkB" type="checkbox" checked="checked" onclick="desactivarDonac('.$reg->id.')">
                <span class="lever"></span></label></div>' : 
                '<div class="switch col s3"><label>
                <input id="checkB'.$reg->id.'" type="checkbox" onclick="activarDonac('.$reg->id.')">
                <span class="lever"></span></label></div>'
            );
        }
        echo json_encode($data);
    break;

    case 'listar':
    echo $idDon;
        $respuesta=$donacion->listar();
        $data=Array();
        while($reg=$respuesta->fetch_object()){
            $data[]=array(
                "fdon"=>$reg->fdonacion,
                "nomDon"=>$reg->nomDon,
                "apDon"=>$reg->apDon,
                "nomRec"=>$reg->nomRec,
                "apRec"=>$reg->apRec,
                "cMedico"=>$reg->cMedico,
                "idDon"=>$reg->idDon,
                "codRec"=>$reg->codigo,
                "idD"=>$reg->id,
                "estado"=>($reg->estado)?'<div class="col s3 #00e676 green accent-3" id="backGreen">
                <h5 class="col">DONÉ</h5><div class="switch col s3"><label>
                <input class="modal-trigger" type="checkbox" checked href="#modalDesactivar'.$reg->id.'" 
                ><span class="lever"></span></label></div></div>':
                '<div class="col s3 #9e9e9e grey" id="backGreen">
                <h5 class="center">NO PUDE DONAR</h5></div>'
            );
        }
        echo json_encode($data);
    break;

    case 'verificarDonacion':
        $idDon=$_POST['donanteD'];
        $idRec=$_POST['receptorD'];
        $respuesta=$donacion->verificar($idDon,$idRec);
        $fetch=$respuesta->fetch_object();
        echo json_encode ($fetch);
    break;
    
    case 'filtrarDonacion':
        $respuesta=$donacion->listarCompatibles($idRec);
        $fetch=$respuesta->fetch_object();
        echo json_encode ($fetch);
    break;

    case 'listarFotos':
        $respuesta=$donacion->listarFotos($idRec);
        $fetch=$respuesta->fetch_object();
        echo json_encode ($fetch);
    break;
}
?>