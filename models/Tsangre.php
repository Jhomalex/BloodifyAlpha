<?php
//Conexion a la BD
require "../config/conexion.php";

class Tsangre{
    public  function _construct(){
    }
    public function insertar($nombre){
        $sql="INSERT INTO tsangre(nombre) VALUES ('$nombre')";
        return ejecutarConsulta($sql);
    }
    public function editar($id,$nombre){
        $sql="UPDATE tsangre SET nombre='$nombre' WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    public function eliminar($id){
        $sql="DELETE FROM tsangre WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    public function mostrar($id){
        $sql="SELECT * FROM tsangre WHERE id='$id'";
        return ejecutarConsultaSimpleFila($sql);
    }
    public function listar(){
        $sql="SELECT * FROM tsangre";
        return ejecutarConsulta($sql);
    }
    public function select(){
        $sql="SELECT * FROM tsangre";
        return ejecutarConsulta($sql);
    }
    
    /*CREATE TABLE compatibilidad
(
    id INT AUTO_INCREMENT NOT NULL,
    id_receptor INT,
    id_donante  INT,
    PRIMARY KEY(id),
    INDEX (id_donante),
    INDEX (id_receptor),
    FOREIGN KEY (id_donante) REFERENCES tsangre(id),
    FOREIGN KEY (id_receptor) REFERENCES tsangre(id)
);*/
}
?>
