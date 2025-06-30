<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once("../html/MainHead.php"); ?>
  <title>Padres :: Mantenimiento</title>
</head>
<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      <?php require_once("../html/MainHeader.php"); ?>
      <?php require_once("../html/MainMenu.php"); ?>

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Padres</h1>
          </div>
          <div class="section-body">
            <button class="btn btn-outline-info" onclick="nuevo()">
              <i class="fa fa-plus"></i> Nuevo Registro
            </button>

            <div class="table-responsive mt-3">
              <table id="padre_data" class="table display nowrap">
                <thead>
                  <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>DNI</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Ocupación</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </section>
      </div>

      <footer class="main-footer">
        <div class="footer-left">
          Capstone Project - Universidad Privada del Norte <div class="bullet"></div>
        </div>
        <div class="footer-right"></div>
      </footer>

    </div>
  </div>

  <?php require_once("modalmanto.php"); ?>
  <?php require_once("../html/MainJs.php"); ?>
  <script src="adminpadre.js"></script> <!-- Asegúrate de tener este JS creado -->
</body>
</html>
<?php
} else {
  header("Location:" . Conectar::ruta() . "view/404/");
}
?>
