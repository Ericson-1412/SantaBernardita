<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once("../html/MainHead.php"); ?>
  <title>Adolescentes :: Mantenimiento</title>
</head>
<body>
  <div id="app">
    <!-- ESTRUCTURA FALTANTE -->
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      <?php require_once("../html/MainHeader.php"); ?>
      <?php require_once("../html/MainMenu.php"); ?>

      <!-- CONTENIDO PRINCIPAL -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Adolescentes</h1>
          </div>
          <div class="section-body">
            <button class="btn btn-outline-info" onclick="nuevo()">
              <i class="fa fa-plus"></i> Nuevo Registro
            </button>

            <div class="table-responsive mt-3">
              <table id="adolescente_data" class="table display nowrap">
                <thead>
                  <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Edad</th>
                    <th>DNI</th>
                    <th>Sexo</th>
                    <th>Dirección</th>
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

    </div> <!-- cierre de main-wrapper -->
  </div> <!-- cierre de #app -->

  <?php require_once("modalmantenimiento.php"); ?>
  <?php require_once("../html/MainJs.php"); ?>
  <script src="adminmntadolescente.js"></script>
</body>
</html>
<?php
} else {
  header("Location:" . Conectar::ruta() . "view/404/");
}
?>
