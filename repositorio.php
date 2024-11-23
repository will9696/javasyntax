<!DOCTYPE html>
<html class="wide wow-animation" lang="es">
  <head>
    <title>Repositorio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/512x512.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato:400,700%7COpen+Sans:400,600,700%7CSource+Code+Pro:300,400,500,600,700,900%7CNothing+You+Could+Do%7CPoppins:400,500">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/estilo1.css">
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/501.css">
    <style>
      /* Estilos para el modal */
      .modal {
        display: none;
        position: fixed;
        z-index: 10000; /* Asegura que el modal esté por encima de todo */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
      }

      .modal-content {
        background-color: #fff;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #ccc;
        width: 80%;
        max-width: 800px; /* Ajusta el ancho máximo del modal */
        position: relative; /* Para posicionar la "X" */
      }

      .close {
        color: red;
        position: absolute;
        top: 10px;
        right: 20px;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
      </div>
    </div>
    <div class="page">
      <header class="section page-header">
        <div class="rd-navbar-wrap" style="position: absolute">
          <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
                <div class="rd-navbar-panel">
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <div class="rd-navbar-brand">
                    <a class="brand" href="index.php"><img src="images/02.png" alt="" width="100" height="36"/></a>
                  </div>
                </div>
                <div class="rd-navbar-main-element">
                  <div class="rd-navbar-nav-wrap">
                    <ul class="rd-navbar-nav">
                      <li class="rd-nav-item"><a class="rd-nav-link" href="index.php">Inicio</a></li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="videos.php">Clases</a></li>
                      <li class="rd-nav-item active"><a class="rd-nav-link" href="repositorio.php">Repositorio</a></li>
                    </ul>
                  </div>
                </div>
                <div class="rd-navbar-collapse">
                  <ul class="socialite-list">
                    <li><a class="fa-solid fa-user" href="Admin/login.php">&nbsp;Admin</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>

      <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(images/P1.jpg);">
        <div class="container">
          <h2 class="breadcrumbs-custom-title">Recursos</h2>
        </div>
        <ul class="breadcrumbs-custom-path">
          <li><a href="index.php">Inicio</a></li>
          <li class="active">Repositorio</li>
        </ul>
      </section>

      <section class="section section-lg bg-default">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-10">
              <h3>¡Recursos en PDF Gratis!</h3>
              <p class="text-white-600">Descarga totalmente Gratis todos los recursos en PDF que necesite:</p><br><br>
            </div>
          </div>

          <form class="rd-form rd-mailform text-left" data-form-output="form-output-global" data-form-type="contact" method="post" action="">
            <div class="row row-40">
              <?php
              // Conexión a la base de datos
              $conexion = new mysqli('localhost', 'root', '', 'java');

              // Verificar si hay errores en la conexión
              if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
              }

              // Consultar los datos de los repositorios
              $sql = "SELECT id_rep, nomb_rep, pdf FROM repositorio";
              $resultado = $conexion->query($sql);

              if ($resultado->num_rows > 0) {
                while($row = $resultado->fetch_assoc()) {
                  $nomb_rep = $row['nomb_rep'];
                  $pdf = $row['pdf']; // Nombre del archivo PDF
                  $ruta_pdf = "Admin/" . $pdf; // Ruta del archivo

                  // Generar la estructura de la caja con PHP
                  echo "
                  <div class='col-lg-4'>
                    <div class='form-wrap'>
                      <div class='box-event novi-bg'>
                        <div class='box-event-text-wrap'>
                          <h8 class='box-event-text-title'>$nomb_rep</h8>
                        </div>
                        <div class='box-event-button-wrap'>
                          <a class='button button-outline button-sm' href='#' onclick='abrirModal(\"$ruta_pdf\")'>
                            <i style='font-size: 30px;' class='zmdi zmdi-download'></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>";
                }
              } else {
                echo "<div class='container'>";
                echo "  <div class='container-title5'> ";
                echo "    <div class='title'> ";
                echo "      <div class='number'>5</div> ";
                echo "      <div class='moon'> ";
                echo "        <div class='face'> ";
                echo "          <div class='mouth'></div> ";
                echo "          <div class='eyes'> ";
                echo "            <div class='eye-left'></div> ";
                echo "            <div class='eye-right'></div> ";
                echo "          </div> ";
                echo "        </div> ";
                echo "      </div> ";
                echo "      <div class='number'>1</div> ";
                echo "    </div> <br>";
                echo "    <div class='subtitle'>Oops! No Hay Recursos Disponibles...</div> ";
                echo "  </div> ";
                echo "</div>";
              }

              $conexion->close();
              ?>
            </div>
          </form>
        </div>
      </section>

      <div id="modalPDF" class="modal">
        <div class="modal-content">
          <span class="close" onclick="cerrarModal()">&times;</span>
          <iframe id="iframePDF" src="" width="100%" height="500px"></iframe>
        </div>
      </div>

      <footer class="section footer-classic bg-default">
        <div class="container">
          <div class="row row-15">
            <div class="col-sm-6">
              <p class="rights"><span>JavaSyntax</span><span>&nbsp;</span><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>\&nbsp;</span>Derechos Reservados
                \ Realizado por <a target="_blank" href="https://www.youtube.com/@WalterBen%C3%ADtezMart%C3%ADnez/videos">Will</a>
              </p>
            </div>
            <div class="col-sm-6">
              <div class="footer-contact"><a href="nosotros.php">
                  <div class="icon novi-icon mdi mdi-email-outline"></div>Nosotros</a></div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <script>
      // Función para abrir el modal
      function abrirModal(rutaPDF) {
        document.getElementById('iframePDF').src = rutaPDF;
        document.getElementById('modalPDF').style.display = 'block';
      }

      // Función para cerrar el modal
      function cerrarModal() {
        document.getElementById('iframePDF').src = '';
        document.getElementById('modalPDF').style.display = 'none';
      }
    </script>
  </body>
</html>