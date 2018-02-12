<?php
//Conexion a la BD
require "../config/conexion.php";

class Campaña{
    public  function _construct(){

    }
    public function insertar($nombre,$ubicacion,$fechaI,$fechaF){
        $sql="INSERT INTO campaña(nombre,ubicacion,fechaInicio,fechaFin,estado) 
        VALUES ('$nombre','$ubicacion','$fechaI','$fechaF','0')";
        return ejecutarConsulta($sql);
    }
    public function editar($id,$nombre,$ubicacion,$fechaI,$fechaF){
        $sql="UPDATE campaña SET nombre='$nombre',ubicacion='$ubicacion',
        fechaInicio='$fechaI',fechaFin='$fechaF'
        WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    public function activar($id){
        $sql="UPDATE campaña SET estado='1' WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    public function desactivar($id){
        $sql="UPDATE campaña SET estado='0' WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    public function eliminar($id){
        $sql="DELETE FROM campaña WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    public function mostrar($id){
        $sql="SELECT * FROM campaña WHERE id='$id'";
        return ejecutarConsultaSimpleFila($sql);
    }
    public function listar(){
        $sql="SELECT * FROM campaña";
        return ejecutarConsulta($sql);
    }
    public function select(){
        $sql="SELECT * FROM campaña WHERE estado='1'";
        return ejecutarConsulta($sql);
    }
}
?>