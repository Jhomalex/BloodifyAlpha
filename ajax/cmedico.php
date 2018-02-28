<?php
require_once "../models/Cmedico.php";

$cmedico=new Cmedico();

$id=isset($_POST["idCM"])? limpiarCadena($_POST["idCM"]):"";
$nombre=isset($_POST["nombreCM"])? limpiarCadena($_POST["nombreCM"]):"";
$ubicacion=isset($_POST["ubicacionCM"])? limpiarCadena($_POST["ubicacionCM"]):"";
$codUbicacion=isset($_POST["codUbicacionCM"])? limpiarCadena($_POST["codUbicacionCM"]):"";
$horario=isset($_POST["horarioCM"])? limpiarCadena($_POST["horarioCM"]):"";
$estado=isset($_POST["estadoCM"])? limpiarCadena($_POST["estadoCM"]):"";

switch($_GET["op"]){
    case 'guardaryeditar':
        if(empty($id)){
            $respuesta=$cmedico->insertar($nombre,$ubicacion,$codUbicacion,$horario);
            echo $respuesta ? "Centro Médico registrado" : "Centro Médico no se pudo registrar";
        }else{
            $respuesta=$cmedico->editar($id,$nombre,$ubicacion,$codUbicacion,$horario);
            echo $respuesta ? "Centro Médico actualizado" : "Centro Médico no se pudo actualizar";
        }
    break;

    case 'activar':
        $respuesta=$cmedico->activar($id);
        echo $respuesta ? "Centro Médico activado" : "Centro Médico no se pudo activar";
    break;

    case 'desactivar':
        $respuesta=$cmedico->desactivar($id);
        echo $respuesta ? "Centro Médico desactivado" : "Centro Médico no se pudo desactivar";
    break;

    case 'eliminar':
        $respuesta=$cmedico->eliminar($id);
        echo $respuesta ? "Centro Médico eliminado" : "Centro Médico no se pudo eliminar";
    break;

    case 'mostrar':
        $respuesta=$cmedico->mostrar($id);
        echo json_encode($respuesta);
    break;

    case 'listar':
        $respuesta=$cmedico->listar();
        $data=Array();
        while($reg=$respuesta->fetch_object()){
            $data[]=array(
                "0"=>'<button class="btn btn-warning" data-toggle="modal" href="#formularioCentroMedico" 
                onclick="mostrarCM('.$reg->id.')"><i class="fa fa-pencil"></i></button>',
                "1"=>$reg->nombre,
                "2"=>$reg->ubicacion,
                "3"=>$reg->codUbicacion,
                "4"=>$reg->horario,
                "5"=>($reg->estado)?'<label class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" checked onclick="desactivarCM('.$reg->id.')">
    <span class="custom-control-indicator"></span>
</label>' : '<label class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" onclick="activarCM('.$reg->id.')">
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

    case 'listar2':
    $respuesta=$cmedico->listar();
    $data=Array();
    while($reg=$respuesta->fetch_object()){
        $data[]=array(
            "id"=>$reg->id,
            "nom"=>$reg->nombre,
            "ub"=>$reg->ubicacion,
            "ho"=>$reg->horario,
        );
    }
    echo json_encode($data);
    break;
}
?>

