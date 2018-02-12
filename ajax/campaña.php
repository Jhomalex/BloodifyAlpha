<?php
require_once "../models/Campaña.php";

$campaña=new Campaña();

$id=isset($_POST["idCp"])? limpiarCadena($_POST["idCp"]):"";
$nombre=isset($_POST["nombreCp"])? limpiarCadena($_POST["nombreCp"]):"";
$ubicacion=isset($_POST["ubicacionCp"])? limpiarCadena($_POST["ubicacionCp"]):"";
$fechaI=isset($_POST["fechaICp"])? limpiarCadena($_POST["fechaICp"]):"";
$fechaF=isset($_POST["fechaFCp"])? limpiarCadena($_POST["fechaFCp"]):"";
$estado=isset($_POST["estadoCp"])? limpiarCadena($_POST["estadoCp"]):"";

switch($_GET["op"]){
    case 'guardaryeditar':
        if(empty($id)){
            $respuesta=$campaña->insertar($nombre,$ubicacion,$fechaI,$fechaF);
            echo $respuesta ? "Campaña registrada" : "Campaña no se pudo registrar";
        }else{
            $respuesta=$campaña->editar($id,$nombre,$ubicacion,$fechaI,$fechaF);
            echo $respuesta ? "Campaña actualizada" : "Campaña no se pudo actualizar";
        }
    break;

    case 'activar':
        $respuesta=$campaña->activar($id);
        echo $respuesta ? "Campaña activada" : "Campaña no se pudo activar";
    break;

    case 'desactivar':
        $respuesta=$campaña->desactivar($id);
        echo $respuesta ? "Campaña desactivada" : "Campaña no se pudo desactivar";
    break;

    case 'eliminar':
        $respuesta=$campaña->eliminar($id);
        echo $respuesta ? "Campaña eliminada" : "Campaña no se pudo eliminar";
    break;

    case 'mostrar':
        $respuesta=$campaña->mostrar($id);
        echo json_encode($respuesta);
    break;

    case 'listar':
        $respuesta=$campaña->listar();
        $data=Array();
        while($reg=$respuesta->fetch_object()){
            $data[]=array(
                "0"=>'<button class="btn btn-warning" data-toggle="modal" href="#formularioCampaña" 
                onclick="mostrarCp('.$reg->id.')"><i class="fa fa-pencil"></i></button>',
                "1"=>$reg->nombre,
                "2"=>$reg->ubicacion,
                "3"=>$reg->fechaInicio,
                "4"=>$reg->fechaFin,
                "5"=>($reg->estado)?'<label class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" checked onclick="desactivarCp('.$reg->id.')">
    <span class="custom-control-indicator"></span>
</label>' : '<label class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" onclick="activarCp('.$reg->id.')">
    <span class="custom-control-indicator"></span>
</label>'
            );
        }
        $result = array(
                "sEcho"=>1, //info del datatable
                "iTotalRecords"=>count($data), //enviar todos los registros al datatable
                "iTotalDisplayRecords"=>count($data), //enviar todos los registros a visualizar
                "aaData"=>$data
            );

        echo json_encode($result);
    break;
}
?>

