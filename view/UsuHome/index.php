<?php
  //llamamos al archivo de conexion.php
  require_once("../../config/conexion.php");
  if(isset($_SESSION["usu_id"])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once("../html/MainHead.php"); ?>
  <title>RAUL YAIPEN LAB::Home</title>
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
            <h1>Panel Principal</h1>
          </div>

          <!-- Tarjeta de total de cursos -->
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>TOTAL DE USUARIOS</h4>
                  </div>
                  <div class="card-body" id="lbltotal">
                   3
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Sección de listado de cursos -->
          <section class="section">
              <div class="section-body">
                  <div class="row">
                      <!-- Gráfico de Barras - Productos por Lote -->
                      <div class="col-md-6">
                          <div class="card">
                              <div class="card-header">
                                  <h4>Cantidad de Productos por Lote</h4>
                              </div>
                              <div class="card-body text-center">
                                <div style="width: 100%; margin: auto;">
                                  <canvas id="chartLotes"></canvas>
                                </div>
                              </div>
                          </div>
                      </div>

                      <!-- Gráfico de Pastel - Distribución de Lotes -->
                      <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Distribución de Lotes por Tipo</h4>
                            </div>
                            <div class="card-body text-center">
                                <div style="width: 60%; margin: auto;">
                                    <canvas id="chartDistribucionLotes"></canvas>
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
        Sistema Web - RAÚL YAIPÉN LAB <div class="bullet"></div><a href="#"></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>

  <?php require_once("../html/MainJs.php"); ?>
  <script type="text/javascript" src="usuhome.js"></script>
  <!-- Importar Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
      // Datos estáticos para cantidad de productos en cada lote
      const ctxLotes = document.getElementById('chartLotes').getContext('2d');
      new Chart(ctxLotes, {
          type: 'bar',
          data: {
              labels: ['Lote A', 'Lote B', 'Lote C', 'Lote D', 'Lote E'],
              datasets: [{
                  label: 'Productos por Lote',
                  data: [120, 80, 150, 100, 90],
                  backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545', '#17a2b8']
              }]
          },
          options: {
              responsive: true,
              scales: {
                  y: { beginAtZero: true }
              }
          }
      });

      // Datos estáticos para distribución de lotes por tipo
      const ctxDistribucionLotes = document.getElementById('chartDistribucionLotes').getContext('2d');
      new Chart(ctxDistribucionLotes, {
          type: 'pie',
          data: {
              labels: ['Electrónicos', 'Ropa', 'Alimentos', 'Muebles'],
              datasets: [{
                  data: [40, 25, 20, 15],
                  backgroundColor: ['#ff6384', '#36a2eb', '#ffce56', '#4bc0c0']
              }]
          },
          options: {
              responsive: true
          }
      });
  </script>
</body>
</html>

<?php
  }else{
    //si no ha iniciado sesion se redireccionara a la ventana principal
    header("Location:".Conectar::ruta()."view/404/");
  }
?>