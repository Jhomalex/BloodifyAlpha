<?php
require_once "../models/Donantes.php";

$donantes=new Donantes();

$id=isset($_POST["idDon"])? limpiarCadena($_POST["idDon"]):"";
$usuario=isset($_POST["usDon"])? limpiarCadena($_POST["usDon"]):"";
$pass=isset($_POST["passDon"])? limpiarCadena($_POST["passDon"]):"";
$nombre=isset($_POST["nomDon"])? limpiarCadena($_POST["nomDon"]):"";
$apellido=isset($_POST["apDon"])? limpiarCadena($_POST["apDon"]):"";
$dni=isset($_POST["dniDon"])? limpiarCadena($_POST["dniDon"]):"";
$cel=isset($_POST["celDon"])? limpiarCadena($_POST["celDon"]):"";
$correo=isset($_POST["correoDon"])? limpiarCadena($_POST["correoDon"]):"";
$tsangre_id=isset($_POST["tsangreDon"])? limpiarCadena($_POST["tsangreDon"]):"";
$fnac=isset($_POST["fnacDon"])? limpiarCadena($_POST["fnacDon"]):"";
$ubicacion=isset($_POST["ubicacionDon"])? limpiarCadena($_POST["ubicacionDon"]):"";
$foto=isset($_POST["fotoDon"])? limpiarCadena($_POST["fotoDon"]):"";
$estado=isset($_POST["estadoDon"])? limpiarCadena($_POST["estadoDon"]):"";

switch($_GET["op"]){
    case 'guardaryeditar':
        
    
        if (!file_exists($_FILES['fotoDon']['tmp_name']) || !is_uploaded_file($_FILES['fotoDon']['tmp_name']))
        {
            $foto=$_POST[""];
        }
        else
        {
            $ext = explode(".", $_FILES["fotoDon"]["name"]);
            if ($_FILES['fotoDon']['type'] == "image/jpg" || $_FILES['fotoDon']['type'] == "image/jpeg" 
            || $_FILES['fotoDon']['type'] == "image/png")
            {
                $foto = round(microtime(true)) . '.' . end($ext);
                move_uploaded_file($_FILES["fotoDon"]["tmp_name"], "../files/fotos_donantes/" . $foto);
            }
        }

        if(empty($id)){
            $respuesta=$donantes->insertar($usuario,$pass,$nombre,$apellido,$dni,$cel,$correo,$tsangre_id,
            $fnac,$ubicacion,$foto);
            echo $respuesta ? "Donante registrado" : "Donante no se pudo registrar";
        }else{
            $respuesta=$donantes->editar($id,$usuario,$pass,$nombre,$apellido,$dni,$cel,$correo,$tsangre_id,
            $fnac,$ubicacion,$foto);
            echo $respuesta ? "Donante actualizado" : "Donante no se pudo actualizar";
        }
    break;

    case 'activar':
        $respuesta=$donantes->activar($id);
        echo $respuesta ? "Donante activado" : "Donante no se pudo activar";
    break;

    case 'desactivar':
        $respuesta=$donantes->desactivar($id);
        echo $respuesta ? "Donante desactivado" : "Donante no se pudo desactivar";
    break;

    case 'eliminar':
        $respuesta=$donantes->eliminar($id);
        echo $respuesta ? "Donante eliminado" : "Donante no se pudo eliminar";
    break;

    case 'mostrar':
        $respuesta=$donantes->mostrar($id);
        echo json_encode($respuesta);
    break;

    case'listar':
        $respuesta=$donantes->listar();
        $data=Array();
        while($reg=$respuesta->fetch_object()){
            $data[]=array(
                "0"=>'<button class="btn btn-warning" data-toggle="modal" href="#formularioDonante" 
                onclick="mostrarDon('.$reg->id.')"><i class="fa fa-pencil"></i></button>',
                "1"=>$reg->usuario,
                "2"=>$reg->pass,
                "3"=>$reg->apellido.' '.$reg->nombre,
                "4"=>$reg->dni,
                "5"=>$reg->cel,
                "6"=>$reg->correo,
                "7"=>$reg->tsangre,
                "8"=>$reg->fnac,
                "9"=>$reg->ubicacion,
                //"6"=>'<img src="../files/fotos_donantes/'.$reg->foto.'" heigh="50px" width="50px"',
                "10"=>($reg->estado)?'<label class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" checked onclick="desactivarDon('.$reg->id.')">
    <span class="custom-control-indicator"></span>
</label>' : '<label class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" onclick="activarDon('.$reg->id.')">
    <span class="custom-control-indicator"></span>
</label>'
            );
            $result = array(
                "sEcho"=>1, //info del datatable
                "iTotalRecords"=>count($data), //enviar todos los registros al datatable
                "iTotalDisplayRecords"=>count($data), //enviar todos los registros a visualizar
                "aaData"=>$data
            );
        }
        echo json_encode($result);
    break;
    
    case 'selectTipoDeSangre':
        require_once "../models/Tsangre.php";
        $tsangre=new Tsangre();
        $respuesta=$tsangre->select();
        echo '<option value="" selected disabled>Seleccionar tipo de sangre</option>';
        while($reg = $respuesta->fetch_object()){
            echo '<option value=' . $reg->id . '>' . $reg->nombre . '</option>';
        }
    break;
}
?>