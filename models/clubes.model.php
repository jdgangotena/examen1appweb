<?php
//TODO: Clase de Clubes
require_once('../config/config.php');
class Clubes
{
    //TODO: Implementar los metodos de la clase

    public function todos() //select * from clubes
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `clubes`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($club_id) //select * from clubes where id = $id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `clubes` WHERE `club_id`=$club_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($nombre, $deporte, $ubicacion) //insert into clubes (nombre, deporte, ubicacion) values ($nombre, $deporte, $ubicacion)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `clubes` ( `nombre`, `deporte`, `ubicacion`) VALUES ('$nombre','$deporte','$ubicacion')";
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($club_id,$nombre,$deporte,$ubicacion) //update clubes
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `clubes` SET `nombre`='$nombre',`deporte`='$deporte',`ubicacion`='$ubicacion' WHERE `club_id` = $club_id";
            if (mysqli_query($con, $cadena)) {
                return $club_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($club_id) //delete from clubes where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `clubes` WHERE `club_id`= $club_id";
            // echo $cadena;
            if (mysqli_query($con, $cadena)) {
                return 1;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}
