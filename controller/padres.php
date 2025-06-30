<?php
require_once("../config/conexion.php");

class Padre extends Conectar {

    public function get_padres() {
        $conectar = parent::Conexion();
        $sql = "SELECT * FROM padres"; 
        $stmt = $conectar->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_padre($nombres, $apellidos, $dni, $telefono, $direccion, $ocupacion) {
        $conectar = parent::Conexion();
        $sql = "INSERT INTO padres (nombres, apellidos, dni, telefono, direccion, ocupacion) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conectar->prepare($sql);
        return $stmt->execute([$nombres, $apellidos, $dni, $telefono, $direccion, $ocupacion]);
    }

    public function get_padre_x_id($id) {
        $conectar = parent::Conexion();
        $sql = "SELECT * FROM padres WHERE id = ?";
        $stmt = $conectar->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update_padre($id, $nombres, $apellidos, $dni, $telefono, $direccion, $ocupacion) {
        $conectar = parent::Conexion();
        $sql = "UPDATE padres SET nombres = ?, apellidos = ?, dni = ?, telefono = ?, direccion = ?, ocupacion = ? WHERE id = ?";
        $stmt = $conectar->prepare($sql);
        return $stmt->execute([$nombres, $apellidos, $dni, $telefono, $direccion, $ocupacion, $id]);
    }

    public function delete_padre($id) {
        $conectar = parent::Conexion();
        $sql = "DELETE FROM padres WHERE id = ?";
        $stmt = $conectar->prepare($sql);
        return $stmt->execute([$id]);
    }
}

$padre = new Padre();

if (isset($_GET["op"])) {
    switch ($_GET["op"]) {

        case "listar":
            $datos = $padre->get_padres();
            $data = array();

            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["nombres"];
                $sub_array[] = $row["apellidos"];
                $sub_array[] = $row["dni"];
                $sub_array[] = $row["telefono"];
                $sub_array[] = $row["direccion"];
                $sub_array[] = $row["ocupacion"];
                $sub_array[] = '<button type="button" onClick="editar(' . $row["id"] . ');" class="btn btn-warning btn-sm">Editar</button>';
                $sub_array[] = '<button type="button" onClick="eliminar(' . $row["id"] . ');" class="btn btn-danger btn-sm">Eliminar</button>';
                $data[] = $sub_array;
            }

            echo json_encode([
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            ]);
            break;

        case "mostrar":
            $datos = $padre->get_padre_x_id($_POST["id"]);
            echo json_encode($datos);
            break;

        case "guardaryeditar":
            if (empty($_POST["id"])) {
                $padre->insert_padre(
                    $_POST["nombres"],
                    $_POST["apellidos"],
                    $_POST["dni"],
                    $_POST["telefono"],
                    $_POST["direccion"],
                    $_POST["ocupacion"]
                );
            } else {
                $padre->update_padre(
                    $_POST["id"],
                    $_POST["nombres"],
                    $_POST["apellidos"],
                    $_POST["dni"],
                    $_POST["telefono"],
                    $_POST["direccion"],
                    $_POST["ocupacion"]
                );
            }
            break;
            case "combo":
                $datos = $padre->get_padres(); 
                foreach ($datos as $row) {
                    echo '<option value="'.$row["id"].'">'.$row["nombres"].' '.$row["apellidos"].'</option>';
                }
                break;
            

        case "eliminar":
            $padre->delete_padre($_POST["id"]);
            break;
    }
}
?>
