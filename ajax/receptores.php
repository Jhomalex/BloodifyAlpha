<?php
require_once "../models/Receptores.php";

$receptores=new Receptores();

$id=isset($_POST["idRec"])? limpiarCadena($_POST["idRec"]):"";
$nombre=isset($_POST["nomRec"])? limpiarCadena($_POST["nomRec"]):"";
$apellido=isset($_POST["apRec"])? limpiarCadena($_POST["apRec"]):"";
$dni=isset($_POST["dniRec"])? limpiarCadena($_POST["dniRec"]):"";
$cel=isset($_POST["celRec"])? limpiarCadena($_POST["celRec"]):"";
$correo=isset($_POST["correoRec"])? limpiarCadena($_POST["correoRec"]):"";
$cMedico_id=isset($_POST["cMedicoRec"])? limpiarCadena($_POST["cMedicoRec"]):"";
$tsangre_id=isset($_POST["tsangreRec"])? limpiarCadena($_POST["tsangreRec"]):"";
$necesita=isset($_POST["necesitaRec"])? limpiarCadena($_POST["necesitaRec"]):"";
$progreso=isset($_POST["progresoRec"])? limpiarCadena($_POST["progresoRec"]):"";
$descripcion=isset($_POST["descripcionRec"])? limpiarCadena($_POST["descripcionRec"]):"";
$caso=isset($_POST["casoRec"])? limpiarCadena($_POST["casoRec"]):"";
$foto=isset($_POST["fotosRec"])? limpiarCadena($_POST["fotosRec"]):"";
$codigo=isset($_POST["codigoRec"])? limpiarCadena($_POST["codigoRec"]):"";
$likes=isset($_POST["likesRec"])? limpiarCadena($_POST["likesRec"]):"";
$estado=isset($_POST["estadoRec"])? limpiarCadena($_POST["estadoRec"]):"";
$valorRecibido=isset($_POST["idVal"])? limpiarCadena($_POST["idVal"]):"";

switch($_GET["op"]){
    case 'guardaryeditar':
    clearstatcache();
        $ext = explode(".", $_FILES["fotosRec"]["name"]);
        if (!file_exists($_FILES['fotosRec']['tmp_name']) || !is_uploaded_file($_FILES['fotosRec']['tmp_name']))
        {
            $foto="";
            echo($ext[0] . $ext[1]);
            
        }
        else
        {
            $ext = explode(".", $_FILES["fotosRec"]["name"]);
            if ($_FILES['fotosRec']['type'] == "image/jpg" || $_FILES['fotosRec']['type'] == "image/jpeg" 
            || $_FILES['fotosRec']['type'] == "image/png")
            {
                $foto = round(microtime(true)) . '.' . end($ext);
                move_uploaded_file($_FILES["fotosRec"]["tmp_name"], "../files/fotos_receptores/" . $foto);
                clearstatcache();
            }
        }

        if(empty($id)){
            $respuesta=$receptores->insertar($nombre,$apellido,$dni,$cel,$correo,$cMedico_id,$tsangre_id,
            $necesita,$progreso,$descripcion,$caso,$foto,$codigo);
            echo $respuesta ? "Receptor registrado" : "Receptor no se pudo registrar";
        }else{
            $respuesta=$receptores->editar($id,$nombre,$apellido,$dni,$cel,$correo,$cMedico_id,$tsangre_id,
            $necesita,$progreso,$descripcion,$caso,$foto,$codigo);
            echo $respuesta ? "Receptor actualizado" : "Receptor no se pudo actualizar";
        }
    break;

    case 'activar':
        $respuesta=$receptores->activar($id);
        echo $respuesta ? "Receptor activado" : "Receptor no se pudo activar";
    break;

    case 'desactivar':
        $respuesta=$receptores->desactivar($id);
        echo $respuesta ? "Receptor desactivado" : "Receptor no se pudo desactivar";
    break;

    case 'eliminar':
        $respuesta=$receptores->eliminar($id);
        echo $respuesta ? "Receptor eliminado" : "Receptor no se pudo eliminar";
    break;

    case 'mostrar':
        $respuesta=$receptores->mostrar($id);
        echo json_encode($respuesta);
    break;

    case'listar':
        $respuesta=$receptores->listar();
        $data=Array();
        while($reg=$respuesta->fetch_object()){
            $data[]=array(
                "0"=>'<a class="btn btn-warning" data-toggle="modal" href="#formularioReceptor" 
                onclick="mostrarRec('.$reg->id.')"><i class="fa fa-pencil"></i></a>',
                "1"=>$reg->apellido.' '.$reg->nombre,
                "2"=>$reg->dni,
                "3"=>$reg->cel,
                "4"=>$reg->correo,
                "5"=>$reg->cMedico,
                "6"=>$reg->tsangre,
                "7"=>$reg->necesita,
                "8"=>$reg->progreso,
                "9"=>$reg->codigo,
                //"6"=>'<img src="../files/fotos_receptores/'.$reg->foto.'" heigh="50px" width="50px"',
                "10"=>($reg->estado)?'<label class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" checked onclick="desactivarRec('.$reg->id.')">
    <span class="custom-control-indicator"></span>
</label>' : '<label class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" onclick="activarRec('.$reg->id.')">
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

    case 'selectCentroMedico':
        require_once "../models/CMedico.php";
        $cmedico=new CMedico();
        $respuesta=$cmedico->select();
        echo '<option value="" selected disabled>Seleccionar centro médico</option>';
        while($reg = $respuesta->fetch_object()){
            echo '<option value=' . $reg->id . '>' . $reg->nombre . '</option>';
        }
    break;
    
    //------------------------Operaciones para la red social--------------------------
    //------------------------Operaciones para la red social--------------------------
    //------------------------Operaciones para la red social--------------------------
    case 'listar2':
    $respuesta=$receptores->listar();
    $data=Array();
    while($reg=$respuesta->fetch_object()){
        $data[]=array(
            "id"=>$reg->id,
            "ap"=>$reg->apellido,
            "nom"=>$reg->nombre,
            "dni"=>$reg->dni,
            "cel"=>$reg->cel,
            "mail"=>$reg->correo,
            "cm"=>$reg->cMedico,
            "ts"=>$reg->tsangre,
            "nec"=>$reg->necesita,
            "prog"=>$reg->progreso,
            "desc"=>$reg->descripcion,
            "caso"=>$reg->caso,
            "foto"=>$reg->foto,
            "cod"=>$reg->codigo,
            "like"=>$reg->likes,
            "boton"=>'<a  href="pacienteView.php" class="btn btn-warning" data-toggle="modal"  
            onclick="mostrarPac('.$reg->id.')">Click Puto</a>'
        );
    }
    echo json_encode($data);
    break;

    case 'mostrarPac':
    $respuesta=$receptores->mostrarPac($id);
    echo json_encode($respuesta);
}
?>