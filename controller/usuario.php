<?php
    
    //Llamando a la cadena de Conexion
    require_once("../config/conexion.php");

    //llamando a la clase
    require_once("../models/Usuario.php");

    //inicializando clase
    $usuario = new Usuario();

    //opcion de solicitud de controller
    switch ($_GET["op"]) {
        // Microservicio para mostrar el listado de cursos de un usuario
        case "listar_cursos":
            $datos = $usuario->get_cursos_x_usuario($_POST["usu_id"]);
            $data = array();
    
            foreach ($datos as $row) {
                $sub_array = array();
                // Agregar cada columna al array en lugar de sobrescribirlo
                $sub_array[] = $row["cur_nom"];
                $sub_array[] = $row["cur_fechini"];
                $sub_array[] = $row["cur_fechfin"];
                $sub_array[] = $row["inst_nom"] . " " . $row["inst_apep"];
                $sub_array[] = '<button type="button" onClick="certificado('.$row["curd_id"].');" id="'.$row["curd_id"].'" class="btn btn-outline-primary btn-icon"><i class="fa fa-id-card"></i></button>';
    
                $data[] = $sub_array;
            }
            
            // Devolver los resultados en formato JSON
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            
            echo json_encode($results);
            break;

        // Microservicio para mostrar el listado de cursos de un usuario
        case "listar_cursos_top10":
            $datos = $usuario->get_cursos_x_usuario_top10($_POST["usu_id"]);
            $data = array();
    
            foreach ($datos as $row) {
                $sub_array = array();
                // Agregar cada columna al array en lugar de sobrescribirlo
                $sub_array[] = $row["cur_nom"];
                $sub_array[] = $row["cur_fechini"];
                $sub_array[] = $row["cur_fechfin"];
                $sub_array[] = $row["inst_nom"] . " " . $row["inst_apep"];
                $sub_array[] = '<button type="button" onClick="certificado('.$row["curd_id"].');" id="'.$row["curd_id"].'" class="btn btn-outline-primary btn-icon"><i class="fa fa-id-card"></i></button>';
    
                $data[] = $sub_array;
            }
            
            // Devolver los resultados en formato JSON
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
            
            echo json_encode($results);
            break;
        
        
        /* Microservicio para mostrar información del certificado con el curd_id */
        case "mostrar_curso_detalle":
            $datos = $usuario->get_curso_x_id_detalle($_POST["curd_id"]);
            if(is_array($datos) == true and count($datos) > 0){
                foreach($datos as $row){
                    $output["curd_id"] = $row["curd_id"];
                    $output["cur_id"] = $row["cur_id"];
                    $output["cur_nom"] = $row["cur_nom"];
                    $output["cur_descrip"] = $row["cur_descrip"];
                    $output["cur_fechini"] = $row["cur_fechini"];
                    $output["cur_fechfin"] = $row["cur_fechfin"];
                    $output["usu_id"] = $row["usu_id"];
                    $output["usu_nom"] = $row["usu_nom"];
                    $output["usu_apep"] = $row["usu_apep"];
                    $output["usu_apem"] = $row["usu_apem"];
                    $output["inst_id"] = $row["inst_id"];
                    $output["inst_nom"] = $row["inst_nom"];
                    $output["inst_apep"] = $row["inst_apep"];
                    $output["inst_apem"] = $row["inst_apem"];
                }
                echo json_encode($output);
            }
            break;
        
        case "total":
            $datos=$usuario->get_total_cursos_x_usuario($_POST["usu_id"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["total"] = $row["total"];
                }
                echo json_encode($output);
            }
            break;

        case "mostrar":
            $datos = $usuario->get_usuario_x_id($_POST["usu_id"]);
            if(is_array($datos) == true and count($datos) > 0){
                foreach($datos as $row){
                    $output["usu_id"] = $row["usu_id"];
                    $output["usu_nom"] = $row["usu_nom"];
                    $output["usu_apep"] = $row["usu_apep"];
                    $output["usu_apem"] = $row["usu_apem"];
                    $output["usu_correo"] = $row["usu_correo"];
                    $output["usu_sex"] = $row["usu_sex"];
                    $output["usu_pass"] = $row["usu_pass"];
                    $output["usu_telf"] = $row["usu_telf"];
                    $output["rol_id"] = $row["rol_id"];
                }
                echo json_encode($output);
            }
            break;
        //actualizar datos del Perfil
        case "update_perfil":
            $usuario->update_usuario_perfil(
                $_POST["usu_id"],
                $_POST["usu_nom"],
                $_POST["usu_apep"],
                $_POST["usu_apem"],
                $_POST["usu_pass"],
                $_POST["usu_sex"],
                $_POST["usu_telf"],
            );
            break;

        case "guardaryeditar":
            if(empty($_POST["usu_id"])){
                $usuario->insert_usuario($_POST["usu_nom"],$_POST["usu_apep"],$_POST["usu_apem"],$_POST["usu_correo"],$_POST["usu_pass"],$_POST["usu_sex"],$_POST["usu_telf"],$_POST["rol_id"]);
            }else{
                $usuario->update_usuario($_POST["usu_id"],$_POST["usu_nom"],$_POST["usu_apep"],$_POST["usu_apem"],$_POST["usu_correo"],$_POST["usu_pass"],$_POST["usu_sex"],$_POST["usu_telf"],$_POST["rol_id"]);
            }
            break;

        case "eliminar":
            $usuario->delete_usuario($_POST["usu_id"]);
            break;

        case "listar":
            $datos=$usuario->get_usuario();
            $data= Array();
            foreach($datos as $row){
            $sub_array = array();
            $sub_array[] = $row["usu_nom"];
            $sub_array[] = $row["usu_apep"];
            $sub_array[] = $row["usu_apem"];
            $sub_array[] = $row["usu_correo"];
            $sub_array[] = $row["usu_telf"];
            if ($row["rol_id"]==1) {
                $sub_array[] = "Administrador General";
            }
            else if ($row["rol_id"]==2) {
                $sub_array[] = "Administrador";
            }
            else if ($row["rol_id"]==3) {
                $sub_array[] = "Profesor";
            }else{
                $sub_array[] = null;
            }
                $sub_array[] = '<button type="button" onClick="editar('.$row["usu_id"].');" id="'.$row["usu_id"].'" class="btn btn-outline-warning btn-icon"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["usu_id"].');" id="'.$row["usu_id"].'" class="btn btn-outline-danger btn-icon"><i class="fa fa-times"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;
        //listar todos los usuarios pertenecientes a un curso
        case "listar_cursos_usuario":
            $datos = $usuario->get_cursos_usuario_x_id($_POST["cur_id"]);
            $data = array();
        
            foreach ($datos as $row) {
                $sub_array = array();
                // Agregar cada columna al array en lugar de sobrescribirlo
                $sub_array[] = $row["cur_nom"];
                $sub_array[] = $row["usu_nom"]." ".$row["usu_apep"];
                $sub_array[] = $row["cur_fechini"];
                $sub_array[] = $row["cur_fechfin"];
                $sub_array[] = $row["inst_nom"] . " " . $row["inst_apep"];
                $sub_array[] = '<button type="button" onClick="certificado('.$row["curd_id"].');" id="'.$row["curd_id"].'" class="btn btn-outline-primary btn-icon"><i class="fa fa-id-card"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["curd_id"].');" id="'.$row["curd_id"].'" class="btn btn-outline-danger btn-icon"><i class="fa fa-times"></i></button>';
                $data[] = $sub_array;
            }
                
            // Devolver los resultados en formato JSON
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
                
            echo json_encode($results);
            break;         
    
        case "listar_detalle_usuario":
            $datos=$usuario->get_usuario_modal($_POST["cur_id"]);
            $data= Array();
            foreach($datos as $row){
            $sub_array = array();
            $sub_array[] = "<input type='checkbox' name='detallecheck[]' value='".$row["usu_id"]."'>";
            $sub_array[] = $row["usu_nom"];
            $sub_array[] = $row["usu_apep"];
             $sub_array[] = $row["usu_apem"];
            $sub_array[] = $row["usu_correo"];
            $sub_array[] = $row["usu_telf"];
            if ($row["rol_id"]==1) {
                $sub_array[] = "Usuario";
            }else{
                $sub_array[] = "Admin";
            }
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                    "iTotalDisplayRecords"=>count($data),
                 "aaData"=>$data);
             echo json_encode($results);
            break;
        

    }
?>