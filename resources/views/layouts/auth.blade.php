<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta Options -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Title -->
  <title>Shared on THEMELOCK.COM - Login and Register</title>
  
  <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="icon" type="image/x-icon" href="assets/images/heading-icon.png">
  <link rel="stylesheet" href="assets/font/flaticon_mycollection.css">
  <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/owl.theme.default.min.css"> 
  <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/fontawesome.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/nice-select.css">
  
  <!-- Stylesheet -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css"> 
  <link rel="stylesheet" type="text/css" href="assets/css/style-dark.css"> 
  
  <!-- Responsive -->
  <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
  
  <!-- Custom CSS -->
  <style>
    /* Iconos blancos con fondo naranja */
    .flaticon-maps,
    .flaticon-iphone,
    .flaticon-mail,
    .flaticon-instagram,
    .flaticon-whatsapp,
    .flaticon-facebook,
    .flaticon-pinterest,
    .flaticon-twitter {
      color: white !important;
      background-color: #FD6A01 !important;
      padding: 8px;
      border-radius: 4px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 30px;
      height: 30px;
      margin-right: 10px;
    }
    
    /* Botones con texto blanco y fondo naranja */
    .theme-btn {
      background-color: #FD6A01 !important;
      color: white !important;
      border: none !important;
    }
    
    .theme-btn:hover {
      background-color: #e05b00 !important;
      color: white !important;
    }
    
    /* Corazón en footer */
    .fa-heart {
      color: #FD6A01 !important;
    }
    
    /* Texto activo en breadcrumb */
    .breadcrums .current p {
      color: #FD6A01 !important;
    }
    
    /* Menú superior naranja */
    .top-bar {
      background-color: #FD6A01 !important;
    }
    
    /* Iconos del menú móvil */
    #ham-menu path,
    #ham-menue path {
      stroke: white !important;
    }
    
    /* Centrado del logo - modificado para mostrar completo */
 .header-logo {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      width: auto;
      max-width: 100%;
      top: 20px; /* Ajusta este valor para moverlo más arriba o abajo */
    }
    
    .header-logo img {
      max-width: 100%;
      height: auto;
      display: block;
    }
    
    /* Asegurar que el header tenga suficiente altura */
    .header-style-one {
      padding: 30px 0; /* Ajusta según necesites */
      position: relative;
    }
    
    /* Ajustes para el menú */
    .nav-bar {
      margin-left: auto;
    }
  </style>
</head>

<body class="light-d">
  <!-- Loader Start -->
<div class="preloader" style="background-color: #000000;">
  <div class="loader-wrap-heading">
    <div class="load-text">
      <span style="color: #FFA500;">C</span>
      <span style="color: #FFA500;">A</span>
      <span style="color: #FFA500;">R</span>
      <span style="color: #FFA500;">G</span>
      <span style="color: #FFA500;">A</span>
      <span style="color: #FFA500;">N</span>
      <span style="color: #FFA500;">D</span>
      <span style="color: #FFA500;">O</span>
    </div>
  </div>
</div>
  <!-- Loader End -->

  <!-- Header Style One Start -->
  <header class="header-style-one">
    <div class="container">
      <div class="row">
        <div class="desktop-nav" id="stickyHeader">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="d-flex-all justify-content-between">
                  <div class="header-logo">
                    <a href="index.html">
                      <figure>
                        <img src="{{ asset('assets_private/images/logo_mad.png') }}" alt="logoo">
                      </figure>
                    </a>
                  </div>
                  

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Header Style One End -->

  <!-- Banner Style One Start -->
  <section class="banner-style-one">
    <div class="parallax" style="background-image: url(https://via.placeholder.com/1920x640);"></div>
    <div class="container">
      <div class="row">
        <div class="banner-details">
          <h2>Inicio de sesión</h2>
          <p>Nuestros valores nos han llevado a lo más alto de nuestra industria.</p>
        </div>
      </div>
    </div>
    <div class="breadcrums">
      <div class="container">
        <div class="row">
          <ul>
            <li>
              <a href="{{ route('public') }}">
                <i class="fa-solid fa-house"></i>
                <p>Inicio</p>
              </a>
            </li>
            <li class="current">
              <p>Iniciar sesión</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- Banner Style One End -->

  <!-- Login Register Start -->
  <section class="login-register" style="padding-top: 40px; padding-bottom: 40px;">
    <div class="container">
      @yield(section: 'contenido')
    </div>
  </section>
  <!-- Login Register End -->

  <!-- Footer Style One Start -->
  <footer class="footer-style-one" style="background-image: url(https://via.placeholder.com/1920x732);">
    <div class="footer-p-2">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="footer-col">
              <h3>Información</h3>
              <p>En Calistenia MadBarzz creemos que la constancia es la clave para alcanzar tus objetivos fitness.</p>
             <!-- <ul class="social-media">
                <li><a href="#"><i class="flaticon-instagram"></i></a></li>
                <li><a href="#"><i class="flaticon-whatsapp"></i></a></li>
                <li><a href="#"><i class="flaticon-facebook"></i></a></li>
              </ul> -->
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="footer-col">
              <h3>Contacto</h3>
              <ul>
                <li>
                  <i class="flaticon-maps"></i>
                  <p>Av. Santos Dumont, 4to anillo, Santa Cruz de la Sierra</p>
                </li>
                <li>
                  <i class="flaticon-iphone"></i>
                  <p><a href="https://wa.me/59176372337">+591 76372337</a></p>
                </li>
                <li>
                  <i class="flaticon-mail"></i>
                  <p><a href="mailto:contacto@madbarzz.com">contacto@madbarzz.com</a></p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-p-3 rights">
      <div class="container">
        <div class="row">
          <div class="footer-col">
            <p>Calistenia MadBarzz <i class="fa-solid fa-heart"></i> © 2025 Todos los derechos reservados</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer Style One End -->

  <!-- Scripts -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/jquery.counterup.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.fancybox.min.js"></script>
  <script src="assets/js/jquery.nice-select.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>