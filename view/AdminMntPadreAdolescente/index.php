<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once("../html/MainHead.php"); ?>
  <title>EngieCerti::Padre-Adolescente</title>
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
            <h1>Relación Padre - Adolescente</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Mantenimiento</h2>
            <p class="section-lead">Listado de relaciones</p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <button class="btn btn-outline-info" id="add_button" onclick="nuevo()">
                      <i class="fa fa-plus mr-1"></i> Nueva Relación
                    </button>
                  </div>

                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="padreadolescente_data" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th>Padre</th>
                            <th>Adolescente</th>
                            <th>Tipo Relación</th>
                            <th>Observaciones</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
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

  <?php require_once("modalmantenimiento.php"); ?>
  <?php require_once("../html/MainJs.php"); ?>
  <script type="text/javascript" src="adminpadreadolescente.js"></script>
</body>
</html>
<?php
} else {
  header("Location:" . Conectar::ruta() . "view/404/");
}
?>
