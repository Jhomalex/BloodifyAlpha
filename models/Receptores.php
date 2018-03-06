<?php
//Conexion a la BD
require "../config/conexion.php";
class Receptores{
    public  function _construct(){

    }
    public function insertar($nombre,$apellido,$dni,$cel,$fnac,$cMedico_id,$tsangre_id,
    $necesita,$progreso,$descripcion,$caso,$foto,$codigo,$idDon){
        $sql="INSERT INTO receptor(nombre,apellido,dni,cel,fnac,cMedico_id,tsangre_id,
        necesita,progreso,descripcion,caso,foto,codigo,donante_id,likes,estado) 
        VALUES ('$nombre','$apellido','$dni','$cel','$fnac','$cMedico_id','$tsangre_id',
        '$necesita','0','$descripcion','$caso','$foto','$codigo','$idDon','0','1')";
        return ejecutarConsulta($sql);
    }
    public function editar($id,$nombre,$apellido,$dni,$cel,$fnac,$cMedico_id,$tsangre_id,
    $necesita,$progreso,$descripcion,$caso,$foto,$codigo,$idDon){
        $sql="UPDATE receptor SET nombre='$nombre', apellido='$apellido', dni='$dni',cel='$cel',
        fnac='$fnac', cMedico_id='cMedico_id', necesita='$necesita', progreso='$progreso',
        descripcion='$descripcion', caso='$caso', foto='$foto', codigo='$codigo',donante_id='$idDon'
        WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    public function activar($id){
        $sql="UPDATE receptor SET estado='1' WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    public function desactivar($id){
        $sql="UPDATE receptor SET estado='0' WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    public function eliminar($id){
        $sql="DELETE FROM receptor WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    public function mostrar($id){
        $sql="SELECT * FROM receptor WHERE id='$id'";
        return ejecutarConsultaSimpleFila($sql);
    }
    public function mostrar2($idDon){
        $sql="SELECT * FROM receptor WHERE donante_id='$idDon'";
        return ejecutarConsulta($sql);
    }
    public function listar(){
        $sql="SELECT a.id,a.apellido,a.nombre,a.dni,a.cel,a.fnac,b.nombre as cMedico,c.nombre as tsangre, 
        b.horario as horaCM,a.necesita,a.progreso,a.descripcion,a.caso,a.foto,a.codigo,a.likes,a.estado,a.donante_id
        FROM receptor a 
        INNER JOIN cmedico b ON a.cMedico_id=b.id
        INNER JOIN tsangre c ON a.tsangre_id=c.id";
        return ejecutarConsulta($sql);
    }
    public function mostrarPac($id){
        $sql="SELECT a.id,a.apellido,a.nombre,a.dni,a.cel,a.fnac,b.ubicacion as ubicacionCM,b.nombre as cMedico,c.nombre as tsangre, 
        b.horario as horaCM,a.necesita,a.progreso,a.descripcion,a.caso,a.foto,a.codigo,a.likes,a.estado FROM receptor a 
        INNER JOIN cmedico b ON a.cMedico_id=b.id
        INNER JOIN tsangre c ON a.tsangre_id=c.id
        WHERE a.id='$id'";
        return ejecutarConsultaSimpleFila($sql);
    }
    public function aumentarVistas($id){
        $sql="UPDATE receptor SET vistas=vistas+1 WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
}
?>