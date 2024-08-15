<?php
//TODO: Clase de miembros
require_once('../config/config.php');
class Miembros
{
    //TODO: Implementar los metodos de la clase

    public function todos() //select * from miembros
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `miembros`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($miembro_id) //select * from miembros where id = $id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `miembros` WHERE `miembro_id`=$miembro_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
 
    public function insertar($nombre, $apellido, $email, $telefono) //insert into miembros
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `miembros` ( `nombre`, `apellido`, `email`, `telefono`) VALUES ('$nombre','$apellido','$email','$telefono')";
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
    public function actualizar($miembro_id, $nombre, $apellido, $email, $telefono) //update miembros set nombre = $nombre, direccion = $direccion, telefono = $telefono where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `miembros` SET `nombre`='$nombre',`apellido`='$apellido',`email`='$email',`telefono`='$telefono' WHERE `miembro_id` = $miembro_id";
            if (mysqli_query($con, $cadena)) {
                return $miembro_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($miembro_id) //delete from miembros where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `miembros` WHERE `miembro_id`= $miembro_id";
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
