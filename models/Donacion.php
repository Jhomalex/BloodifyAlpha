<?php
//Conexion a la BD
require "../config/conexion.php";

class Donacion{
    public  function _construct(){

    }
    public function insertar($donante_id,$receptor_id,$fdonacion){
        $sql="INSERT INTO donacion(donante_id,receptor_id,fdonacion,estado) 
        VALUES ('$donante_id','$receptor_id','$fdonacion','1')";
        return ejecutarConsulta($sql);
    }
    public function editar($id,$donante_id,$receptor_id,$fdonacion){
        $sql="UPDATE donacion SET donante_id='$donante_id',receptor_id='$receptor_id',
        fdonacion='$fdonacion' WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    public function activar($id){
        $sql="UPDATE donacion SET estado='1' WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    public function desactivar($id){
        $sql="UPDATE donacion SET estado='0' WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    public function eliminar($id){
        $sql="DELETE FROM donacion WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    public function mostrar($id){
        $sql="SELECT * FROM donacion WHERE id='$id'";
        return ejecutarConsultaSimpleFila($sql);
    }
    public function mostrar2($id){
        $sql="SELECT a.id, a.fdonacion, a.estado, b.nombre as nomDon, b.apellido as apDon, c.nombre as nomRec, 
        c.apellido as apRec,(SELECT d.nombre FROM cMedico d WHERE d.id=c.cMedico_id) as cMedico
        FROM donacion a 
        INNER JOIN donante b ON a.donante_id = b.id
        INNER JOIN receptor c ON a.receptor_id = c.id
        WHERE b.id='$id'";
        return ejecutarConsulta($sql);
    }
    public function listar(){
        $id=$_SESSION['idUser'];
        echo $id;
        $sql="SELECT a.id, a.fdonacion, a.estado, b.nombre as nomDon, b.apellido as apDon, 
        c.nombre as nomRec, c.codigo as codigo, c.apellido as apRec,b.id as idDon,
        (SELECT d.nombre FROM cMedico d WHERE d.id=c.cMedico_id) as cMedico 
        FROM donacion a 
        INNER JOIN donante b ON a.donante_id = b.id 
        INNER JOIN receptor c ON a.receptor_id = c.id
        WHERE b.id=$id";
        return ejecutarConsulta($sql);
    }
    public function verificar($idDon,$idRec){
        $sql="SELECT a.fdonacion,a.estado,b.nombre,b.apellido,b.foto,b.cel,c.nombre,
        c.apellido,c.dni,c.cel,c.foto,c.necesita,c.progreso,c.codigo
        FROM donacion a
        INNER JOIN donante b ON a.donante_id = b.id
        INNER JOIN receptor c ON a.receptor_id = c.id
        WHERE b.id='$idDon' AND c.id='$idRec'";
        return ejecutarConsulta($sql);
    }
}
?>