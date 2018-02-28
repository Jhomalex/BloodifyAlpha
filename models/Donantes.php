<?php
//Conexion a la BD
require "../config/conexion.php";
class Donantes{
    public  function _construct(){

    }
    public function insertar($usuario,$pass,$nombre,$apellido,$dni,$cel,$correo,
    $tsangre_id,$fnac,$ubicacion,$foto){
        //$fnac2=date('Y-m-d',strtotime($fnac));
        $sql="INSERT INTO donante(usuario,pass,nombre,apellido,dni,cel,correo,tsangre_id,
        fnac,ubicacion,foto,estado) 
        VALUES ('$usuario','$pass','$nombre','$apellido','$dni','$cel','$correo','$tsangre_id',
        '$fnac','$ubicacion','$foto','1')";
        return ejecutarConsulta($sql);
    }
    public function editar($id,$usuario,$pass,$nombre,$apellido,$dni,$cel,$correo,
    $tsangre_id,$fnac,$ubicacion,$foto){
        $sql="UPDATE donante SET usuario='$usuario', pass='$pass', nombre='$nombre', 
        apellido='$apellido', dni='$dni',cel='$cel', correo='$correo', tsangre_id='$tsangre_id',
        fnac='$fnac', ubicacion='$ubicacion', foto='$foto'
        WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    public function activar($id){
        $sql="UPDATE donante SET estado='1' WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    public function desactivar($id){
        $sql="UPDATE donante SET estado='0' WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    public function eliminar($id){
        $sql="DELETE FROM donante WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    public function mostrar($id){
        $sql="SELECT * FROM donante WHERE id='$id'";
        return ejecutarConsultaSimpleFila($sql);
    }
    public function listar(){
        $sql="SELECT a.id,a.usuario,a.pass,a.apellido,a.nombre,a.dni,a.cel,a.correo,c.nombre as tsangre,
        a.fnac,a.ubicacion,a.estado FROM donante a 
        INNER JOIN tsangre c ON a.tsangre_id=c.id";
        return ejecutarConsulta($sql);
    }
    public function verificar($usuario,$pass){
        $sql="SELECT a.id,a.usuario,a.apellido,a.nombre,a.dni,a.cel,c.nombre as tsangre,
        a.fnac,a.foto,a.ubicacion FROM donante a INNER JOIN tsangre c ON a.tsangre_id=c.id 
        WHERE a.usuario='$usuario' AND a.pass='$pass' AND a.estado='1'";
        return ejecutarConsulta($sql);
    }
}
?>