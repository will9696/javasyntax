<!DOCTYPE html>
<html class="wide wow-animation" lang="es">
  <head>
    <title>Videos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/512x512.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato:400,700%7COpen+Sans:400,600,700%7CSource+Code+Pro:300,400,500,600,700,900%7CNothing+You+Could+Do%7CPoppins:400,500">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/estilo1.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/501.css">
    <!--Mejora para los videos estilo móvil-->
    <style>
      @media (max-width: 768px) {
        .entry-video {
          margin-bottom: 20px; /* Ajusta el espacio entre los videos */
        }
      }
      .entry-video {
  margin-bottom: 0; /* Elimina el margen inferior del video */
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
      <!-- Page Header-->
      <header class="section page-header">
        <!--RD Navbar-->
        <div class="rd-navbar-wrap" style="position: absolute">
          <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
                <!--RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!--RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!--RD Navbar Brand-->
                  <div class="rd-navbar-brand">
                    <!--Brand--><a class="brand" href="index.php"><img src="images/02.png" alt="" width="100" height="36"/></a>
                  </div>
                </div>
                <div class="rd-navbar-main-element">
                  <div class="rd-navbar-nav-wrap">
                    <ul class="rd-navbar-nav">
                      <li class="rd-nav-item"><a class="rd-nav-link" href="index.php">Inicio</a>
                      </li>
                      <li class="rd-nav-item active"><a class="rd-nav-link" href="videos.php">Clases</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="repositorio.php">Repositorio</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="rd-navbar-collapse">
                <ul class="socialite-list">
                    
                  <li><a class="fa-solid fa-user" href="Admin/login.php">&nbsp; Admin</a></li>
                </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>

      <!-- Cuerpo Videos a Mostrar -->
      <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(images/P1.jpg);">
        <div class="container">
          <h2 class="breadcrumbs-custom-title">Contenido Audiovisual</h2>
        </div>
        <ul class="breadcrumbs-custom-path">
          <li><a href="index.php">Inicio</a></li>
          <li class="active">Clases</li>
        </ul>

                    <?php
                      include 'capalogica/clasejava.php';
                      $result_modulos = obtener_modulos_videos();
                    ?>

              <!-- Cuerpo de Videos a Mostrar -->
<section class="section section-lg bg-default text-center">
    <div class="container">
        <div class="tab-content">
            <div class="row">
                <?php
                $current_module = null;  // Inicializamos la variable para el seguimiento de módulos
                $has_videos = false; // Inicializamos la variable que verifica si un módulo tiene videos

                if ($result_modulos->num_rows > 0) {
                    while ($row = $result_modulos->fetch_assoc()) {
                        // Comprobar si estamos en un nuevo módulo
                        if ($current_module != $row['id_modulo']) {
                            if ($current_module != null) {
                                // Si no hubo videos en el módulo anterior, mostrar el mensaje
                                if (!$has_videos) {
                                    echo "<div class='container'>";
                                    echo "   <div class='container-title5'> ";
                                    echo "     <div class='title'> ";
                                    echo "       <div class='number'>5</div> ";
                                    echo "       <div class='moon'> ";
                                    echo "         <div class='face'> ";
                                    echo "           <div class='mouth'></div> ";
                                    echo "           <div class='eyes'> ";
                                    echo "             <div class='eye-left'></div> ";
                                    echo "             <div class='eye-right'></div> ";
                                    echo "           </div> ";
                                    echo "         </div> ";
                                    echo "       </div> ";
                                    echo "       <div class='number'>1</div> ";
                                    echo "     </div> <br>";
                                    echo "     <div class='subtitle'>Oops! No Hay Videos Disponibles...</div> ";
                                    echo "   </div> ";
                                    echo " </div> ";
                                    echo " </div>"; 
                                    echo "<br><br>";
                                }
                                echo "</div>"; // Cerrar el div del módulo anterior
                            }

                            // Mostrar nuevo módulo
                            echo "<div class='col-md-12'>";
                            echo "<h6 class='text-gray-600'>{$row['nomb_mod']}</h6>";
                            echo "<h2>{$row['tema_mod']}</h2>";
                            echo "<div class='row'>";
                            $current_module = $row['id_modulo']; // Actualizar el módulo actual
                            $has_videos = false; // Reiniciar la bandera de videos
                        }

                        // Mostrar video si existe
                        if ($row['titulo_corto'] && $row['url']) {
                            $has_videos = true;  // Si hay un video, actualizar la bandera
                            // Extraer el ID de YouTube
                            parse_str(parse_url($row['url'], PHP_URL_QUERY), $query_params);
                            $youtube_id = $query_params['v'] ?? '';
                            
                            if ($youtube_id) {
                                echo "<div class='col-md-6'>";
                                echo "  <div class='tab-pane fade show active' id='tabs-2-1'>";
                                echo "      <div class='entry-video embed-responsive embed-responsive-16by9'>";
                                echo "          <iframe width='560' height='315' src='https://www.youtube.com/embed/$youtube_id' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' referrerpolicy='strict-origin-when-cross-origin' allowfullscreen></iframe>";
                                echo "      </div>";
                                echo "      <h6 class='text-gray-600'>Clase {$row['id_videos']} - {$row['titulo_corto']}</h6><br>";
                                echo "  </div>";
                                echo "</div>";
                            }
                        }
                    }

                    // Después de la última iteración, revisar si hubo videos en el último módulo
                    if (!$has_videos) {
                        echo "<div class='container'>";
                        echo "   <div class='container-title5'> ";
                        echo "     <div class='title'> ";
                        echo "       <div class='number'>5</div> ";
                        echo "       <div class='moon'> ";
                        echo "         <div class='face'> ";
                        echo "           <div class='mouth'></div> ";
                        echo "           <div class='eyes'> ";
                        echo "             <div class='eye-left'></div> ";
                        echo "             <div class='eye-right'></div> ";
                        echo "           </div> ";
                        echo "         </div> ";
                        echo "       </div> ";
                        echo "       <div class='number'>1</div> ";
                        echo "     </div> <br>";
                        echo "     <div class='subtitle'>Oops! No Hay Videos Disponibles...</div> ";
                        echo "   </div> ";
                        echo " </div> ";
                        echo " </div>"; 
                        echo "<br><br>";
                    }
                    echo "</div>"; // Cerrar el div del último módulo
                } else {
                    // Si no hay módulos ni videos
                    echo "<div class='container'>";
                    echo "   <div class='container-title5'> ";
                    echo "     <div class='title'> ";
                    echo "       <div class='number'>5</div> ";
                    echo "       <div class='moon'> ";
                    echo "         <div class='face'> ";
                    echo "           <div class='mouth'></div> ";
                    echo "           <div class='eyes'> ";
                    echo "             <div class='eye-left'></div> ";
                    echo "             <div class='eye-right'></div> ";
                    echo "           </div> ";
                    echo "         </div> ";
                    echo "       </div> ";
                    echo "       <div class='number'>1</div> ";
                    echo "     </div> <br>";
                    echo "     <div class='subtitle'>Oops! No Hay Videos Disponibles...</div> ";
                    echo "   </div> ";
                    echo " </div> ";
                    echo " </div>"; 
                    echo "<br><br>";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>
</section>


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
</body>
</html>