<?php
//Conexion a la BD
require "../config/conexion.php";

class Cmedico{
    public  function _construct(){

    }
    public function insertar($nombre,$ubicacion,$codUbicacion,$horario){
        $sql="INSERT INTO cmedico(nombre,ubicacion,codUbicacion,horario,estado) 
        VALUES ('$nombre','$ubicacion','$codUbicacion','$horario','0')";
        return ejecutarConsulta($sql);
    }
    public function editar($id,$nombre,$ubicacion,$codUbicacion,$horario){
        $sql="UPDATE cmedico SET nombre='$nombre',ubicacion='$ubicacion',codUbicacion='$codUbicacion', 
        horario='$horario' WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    public function activar($id){
        $sql="UPDATE cmedico SET estado='1' WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    public function desactivar($id){
        $sql="UPDATE cmedico SET estado='0' WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    public function eliminar($id){
        $sql="DELETE FROM cmedico WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    public function mostrar($id){
        $sql="SELECT * FROM cmedico WHERE id='$id'";
        return ejecutarConsultaSimpleFila($sql);
    }
    public function listar(){
        $sql="SELECT * FROM cmedico";
        return ejecutarConsulta($sql);
    }
    public function select(){
        $sql="SELECT * FROM cmedico WHERE estado='1'";
        return ejecutarConsulta($sql);
    }
}
?>