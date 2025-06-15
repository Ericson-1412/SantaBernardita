<?php
require_once("../config/conexion.php");


class Adolescente extends Conectar {

    public function get_adolescentes() {
        $conectar = parent::Conexion();
        $sql = "SELECT * FROM adolescentes";
        $stmt = $conectar->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_adolescente($nombres, $apellidos, $edad, $dni, $sexo, $direccion) {
        $conectar = parent::Conexion();
        $sql = "INSERT INTO adolescentes (nombres, apellidos, edad, dni, sexo, direccion) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conectar->prepare($sql);
        return $stmt->execute([$nombres, $apellidos, $edad, $dni, $sexo, $direccion]);
    }

    public function get_adolescente_x_id($id) {
        $conectar = parent::Conexion();
        $sql = "SELECT * FROM adolescentes WHERE id = ?";
        $stmt = $conectar->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update_adolescente($id, $nombres, $apellidos, $edad, $dni, $sexo, $direccion) {
        $conectar = parent::Conexion();
        $sql = "UPDATE adolescentes SET nombres = ?, apellidos = ?, edad = ?, dni = ?, sexo = ?, direccion = ? WHERE id = ?";
        $stmt = $conectar->prepare($sql);
        return $stmt->execute([$nombres, $apellidos, $edad, $dni, $sexo, $direccion, $id]);
    }

    public function delete_adolescente($id) {
        $conectar = parent::Conexion();
        $sql = "DELETE FROM adolescentes WHERE id = ?";
        $stmt = $conectar->prepare($sql);
        return $stmt->execute([$id]);
    }
}


$adolescente = new Adolescente();

if (isset($_GET["op"])) {
    switch ($_GET["op"]) {

        case "listar":
            $datos = $adolescente->get_adolescentes();
            $data = array();

            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["nombres"];
                $sub_array[] = $row["apellidos"];
                $sub_array[] = $row["edad"];
                $sub_array[] = $row["dni"];
                $sub_array[] = $row["sexo"];
                $sub_array[] = $row["direccion"];
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
            $datos = $adolescente->get_adolescente_x_id($_POST["id"]);
            echo json_encode($datos);
            break;

        case "guardaryeditar":
            if (empty($_POST["id"])) {
                $adolescente->insert_adolescente(
                    $_POST["nombres"],
                    $_POST["apellidos"],
                    $_POST["edad"],
                    $_POST["dni"],
                    $_POST["sexo"],
                    $_POST["direccion"]
                );
            } else {
                $adolescente->update_adolescente(
                    $_POST["id"],
                    $_POST["nombres"],
                    $_POST["apellidos"],
                    $_POST["edad"],
                    $_POST["dni"],
                    $_POST["sexo"],
                    $_POST["direccion"]
                );
            }
            break;

        case "eliminar":
            $adolescente->delete_adolescente($_POST["id"]);
            break;
    }
}
?>
