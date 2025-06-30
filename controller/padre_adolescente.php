<?php
require_once("../config/conexion.php");

class PadreAdolescente extends Conectar {

    public function get_relaciones() {
        $conectar = parent::Conexion();
        $sql = "SELECT pa.id, p.nombres AS padre_nombre, a.nombres AS adolescente_nombre, pa.tipo_relacion, pa.observaciones
                FROM padre_adolescente pa
                INNER JOIN padres p ON pa.id_padre = p.id
                INNER JOIN adolescentes a ON pa.id_adolescente = a.id";
        $stmt = $conectar->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_relacion($id_padre, $id_adolescente, $observaciones, $tipo_relacion) {
        $conectar = parent::Conexion();
        $sql = "INSERT INTO padre_adolescente (id_padre, id_adolescente, observaciones, tipo_relacion) VALUES (?, ?, ?, ?)";
        $stmt = $conectar->prepare($sql);
        return $stmt->execute([$id_padre, $id_adolescente, $observaciones, $tipo_relacion]);
    }

    public function get_relacion_x_id($id) {
        $conectar = parent::Conexion();
        $sql = "SELECT * FROM padre_adolescente WHERE id = ?";
        $stmt = $conectar->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update_relacion($id, $id_padre, $id_adolescente, $observaciones, $tipo_relacion) {
        $conectar = parent::Conexion();
        $sql = "UPDATE padre_adolescente SET id_padre = ?, id_adolescente = ?, observaciones = ?, tipo_relacion = ? WHERE id = ?";
        $stmt = $conectar->prepare($sql);
        return $stmt->execute([$id_padre, $id_adolescente, $observaciones, $tipo_relacion, $id]);
    }

    public function delete_relacion($id) {
        $conectar = parent::Conexion();
        $sql = "DELETE FROM padre_adolescente WHERE id = ?";
        $stmt = $conectar->prepare($sql);
        return $stmt->execute([$id]);
    }
}

$relacion = new PadreAdolescente();

if (isset($_GET["op"])) {
    switch ($_GET["op"]) {

        case "listar":
            $datos = $relacion->get_relaciones();
            $data = array();

            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row["padre_nombre"];
                $sub_array[] = $row["adolescente_nombre"];
                $sub_array[] = $row["tipo_relacion"];
                $sub_array[] = $row["observaciones"];
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
            $datos = $relacion->get_relacion_x_id($_POST["id"]);
            echo json_encode($datos);
            break;

        case "guardaryeditar":
            if (empty($_POST["id"])) {
                $relacion->insert_relacion(
                    $_POST["id_padre"],
                    $_POST["id_adolescente"],
                    $_POST["observaciones"],
                    $_POST["tipo_relacion"]
                );
            } else {
                $relacion->update_relacion(
                    $_POST["id"],
                    $_POST["id_padre"],
                    $_POST["id_adolescente"],
                    $_POST["observaciones"],
                    $_POST["tipo_relacion"]
                );
            }
            break;

        case "eliminar":
            $relacion->delete_relacion($_POST["id"]);
            break;
    }
}
?>
