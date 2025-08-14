<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calistenia MadBarzz</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="icon" type="image/x-icon" href="assets/images/logo_mad.png">
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/font/flaticon_mycollection.css">
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="assets/css/fontawesome.min.css"> 
  <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="assets/css/nice-select.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style-dark.css"> 
  <link rel="stylesheet" href="assets/css/responsive.css"> 
</head>

<body class="light-d">
   <a id="inicio"></a> <!-- Anclaje para el inicio -->
   
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
  <header class="header-style-one two">
    <div class="top-bar" style="background-color: #FD6A01;">
      <h4>CALISTENIA MADBARZZ</h4>
    </div>
    <div class="container">
      <div class="row">
        <div class="desktop-nav" id="stickyHeader">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="d-flex-all justify-content-between">
                  <div class="nav-bar">
                   <div class="extras">
                        <!-- Botón de menú móvil -->
                        <a href="javascript:void(0)" id="mobile-menu" class="menu-start">
                            <svg id="ham-menu" viewBox="0 0 100 100">
                            <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058"></path>
                            <path class="line line2" d="M 20,50 H 80"></path>
                            <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942"></path>
                            </svg>
                        </a>

                        @auth
                            <!-- Cerrar sesión si el usuario está autenticado -->
                            <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" class="login" onclick="event.preventDefault(); this.closest('form').submit();">
                                Cerrar sesión
                            </a>
                            </form>
                        @else
                            <!-- Si no está autenticado: mostrar login/registro -->
                            <a href="{{ route('login') }}" class="login">Iniciar sesión</a>
                        @endauth
                    </div>

                  </div>
                  <div class="header-logo">
                    <a href="index.html">
                      <figure>
                        <img src="{{ asset(path: 'assets_private/images/logo_mad.png') }}" alt="logoo">
                      </figure>
                    </a>
                  </div>
                  <style>
                    .header-logo {
                        margin-left: 315px;
                    }
                    </style>

 <div class="nav-bar">
    <ul>
        <li class="menu-item-has-children">
            <a href="#inicio">Inicio</a> <!-- Lleva al principio -->

        </li>
        
        <li class="menu-item-has-children">
            <a href="javascript:void(0)">Nosotros</a>
            <ul class="sub-menu">
                <li><a href="about.html">Sobre la empresa</a></li>
                <li><a href="features-and-benefits.html">Características y beneficios</a></li>
                <li><a href="leadership.html">Liderazgo</a></li>
                <li><a href="history.html">Historia</a></li>
            </ul>
        </li>
        
        <li class="menu-item-has-children">
            <a href="#servicios">Servicios</a> <!-- Nuevo enlace a servicios -->
            <ul class="sub-menu">
                <li><a href="#servicios">Todos los servicios</a></li>
                <li><a href="#guias">Guías para principiantes</a></li>
                <li><a href="#entrenadores">Nuestros entrenadores</a></li>
            </ul>
        </li>
        

        
        <li>
            <a href="#contacto">Contacto</a> <!-- Lleva al final -->
        </li>
    </ul>

    <div class="extras">
        <a href="">
            <svg id="" ...> ... </svg>
        </a>
        <a href="https://wa.me/59176372337?text=Hola,%20me%20llamo%20[Tu%20Nombre]%20y%20quiero%20unirme%20a%20la%20Calistenia%20MadBarzz.%20%C2%BFCu%C3%A1ndo%20puedo%20empezar?" 
           target="_blank" class="theme-btn" style="background-color: #FD6A01;">
            Comenzar consulta
        </a>
    </div>
</div>


                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mobile-nav" id="mobile-nav">
          <div class="res-log">
            <a href="index.html">
              <img src="{{ asset('assets_private/images/log_text_mad.png') }}" alt="logoo">
            </a>
          </div>
            <ul>
            <li>
                <a href="#inicio">Inicio</a> <!-- Eliminada la clase menu-item-has-children -->
            </li>

            <li class="menu-item-has-children">
                <a href="#servicios">Servicios</a>
                <ul class="sub-menu">
                <li><a href="#servicios">Todos los servicios</a></li>
                <li><a href="#guias">Guías para principiantes</a></li>
                <li><a href="#entrenadores">Nuestros entrenadores</a></li>
                </ul>
            </li>
            <li>
                <a href="#contacto">Contacto</a>
            </li>
            </ul>

          <a href="JavaScript:void(0)" id="res-cross"></a>
        </div>
        <div class="mobile-nav desktop-menu">
          <h2>We Build Building and Great Homes.</h2>
          <p class="des">We successfully cope with tasks of varying complexity, provide long-term guarantees and
            regularly master new technologies.</p>
          <figure>
            <img src="https://via.placeholder.com/320x222" alt="Desktop Menu Image">
          </figure>
          <h3>Get in touch</h3>
          <p class="num">(+380) 50 318 47 07</p>
          <p class="adrs">65 Allerton Street 901 N Pitt Str, Suite 170, VA 22314, USA</p>
          <div class="social-medias">
            <a href="javascript:void(0)">Facebook</a>
            <a href="javascript:void(0)">Twitter</a>
            <a href="javascript:void(0)">Linkedin</a>
          </div>
        </div>
      </div>
    </div>
  </header>
  
  <!-- Sección de Servicios -->
  <section id="servicios" class="myslider owl-carousel owl-theme"> 
    <div data-dot="<button><span>01</span> Clases de Calistenia</button>" class="item featured-section-three" style="background-image:url(https://via.placeholder.com/1920x770);">
        <div class="container">
            <div class="featured-text-two">
                <h1>Clases de Calistenia</h1>
                <p>Disfruta de nuestros programas progresivos con equipos de calistenia de primer nivel y entrenadores expertos.</p>
            </div>
        </div>
    </div>

    <div data-dot="<button><span>02</span> Programa de Cardio</button>" class="item featured-section-three" style="background-image:url(https://via.placeholder.com/1920x770);">
        <div class="container">
            <div class="featured-text-two">
                <h1>Programa de Cardio</h1>
                <p>Mantente en forma con nuestras rutinas de cardio diseñadas para mejorar tu resistencia y fuerza.</p>
            </div>
        </div>
    </div>
    <div data-dot="<button><span>03</span> Estudio de Fitness</button>" class="item featured-section-three" style="background-image:url(https://via.placeholder.com/1920x770);">
        <div class="container">
            <div class="featured-text-two">
                <h1>Estudio de Fitness</h1>
                <p>Accede a nuestro estudio de calistenia con entrenadores especializados y áreas adaptadas para todos los niveles.</p>
            </div>
        </div>
    </div>
  </section>

  <!-- Sección CTA -->
  <section class="cta-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="cta-data">
                    <h2>¡Comienza tu Entrenamiento!</h2>
                    <p>Únete a la Calistenia MadBarzz y deja que nuestros entrenadores expertos te guíen hacia tus metas de fuerza y resistencia. Obtén rutinas personalizadas y asesoramiento profesional.</p>
                      <a href="https://wa.me/59176372337?text=Hola%2C%20me%20llamo%20[TU%20NOMBRE]%20y%20quiero%20unirme%20a%20la%20Calistenia%20MadBarzz.%20%C2%BFCu%C3%A1ndo%20puedo%20empezar%3F" 
                        target="_blank" 
                        class="theme-btn" style="background-color: #FD6A01;">
                        ¡Únete Hoy!
                      </a>
                </div>
            </div>
<div class="col-lg-5">
    <div class="cta-data">
        <figure>
            <img src="{{ asset('assets/images/entrenaconnosotros.jpg') }}" 
                 alt="Imagen Calistenia MadBarzz"
                 class="img-mas-chica">
        </figure>
    </div>
</div>
        </div>
    </div>
  </section>

  <!-- Sección de Entrenadores -->
  <section id="entrenadores" class="gap" style="padding-bottom: 20px;">
    <div class="container">
        <div class="row">
            <!-- Texto principal -->
            <div class="col-lg-6">
                <div class="data">
                    <span style="color: #FD6A01;">EN CALISTENIA MADBARZZ</span>
                    <h2>HACEMOS A LAS PERSONAS MÁS SALUDABLES, FELICES Y FUERTES. ¡ÚNETE A NOSOTROS!</h2>
                </div>
            </div>

            <!-- Beneficios -->
            <div class="col-lg-6">
                <div class="making-people">
                    <p>Estamos seguros de que nuestro personal y nuestras instalaciones pueden ayudarte a alcanzar tus objetivos de calistenia. Ya seas principiante o avanzado, ¡estamos aquí para apoyarte! Después de entrenar con nosotros, queremos que nuestros miembros se sientan una mejor versión de sí mismos.</p>
                    <div class="features">
                        <ul>
                            <li><i class="fa-solid fa-circle-check" aria-hidden="true" style="color: #FD6A01;"></i> Alcanzarás tus objetivos</li>
                            <li><i class="fa-solid fa-circle-check" aria-hidden="true" style="color: #FD6A01;"></i> Tendrás soporte ilimitado</li>
                            <li><i class="fa-solid fa-circle-check" aria-hidden="true" style="color: #FD6A01;"></i> Encontrarás la ayuda útil</li>
                            <li><i class="fa-solid fa-circle-check" aria-hidden="true" style="color: #FD6A01;"></i> Ganarás confianza</li>
                            <li><i class="fa-solid fa-circle-check" aria-hidden="true" style="color: #FD6A01;"></i> Aprenderás algo nuevo cada día</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

  <!-- Sección de Guías para principiantes - Reducido el padding superior -->
  <section id="guias" class="contact-form-one gap no-bottom" style="padding-top: 20px;">
    <div class="container">
      <div class="row align-items-center">
        
        <!-- Guía de inicio -->
        <div class="col-lg-6">
          <div class="data"> 
            <span style="color: #FD6A01;">PONTE EN CONTACTO</span>
            <h2>Guía para principiantes en Calistenia MadBarzz</h2>
          </div>
          <div class="acc2">
            <div class="accordion" id="accordionExample">
              
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading-Two">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-Two" aria-expanded="false" aria-controls="collapse-Two">
                    ¿Cómo empezar en Calistenia si soy principiante?
                  </button>
                </h2>
                <div id="collapse-Two" class="accordion-collapse collapse" aria-labelledby="heading-Two" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    En Calistenia MadBarzz te recomendamos comenzar con ejercicios básicos de fuerza y flexibilidad, dedicando al menos 20-30 minutos al día para acostumbrarte a la rutina.
                  </div>
                </div>
              </div>
              
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading-One">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-One" aria-expanded="true" aria-controls="collapse-One">
                    ¿Cuál es la información básica que debo conocer?
                  </button>
                </h2>
                <div id="collapse-One" class="accordion-collapse collapse show" aria-labelledby="heading-One" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Aprende sobre los diferentes tipos de ejercicios, seguridad, calentamiento y enfriamiento, y la importancia de la constancia en tu progreso.
                  </div>
                </div>
              </div>
              
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading-Three">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-Three" aria-expanded="false" aria-controls="collapse-Three">
                    ¿Qué hacer en tu primera sesión de calistenia?
                  </button>
                </h2>
                <div id="collapse-Three" class="accordion-collapse collapse" aria-labelledby="heading-Three" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Comienza con ejercicios sencillos como flexiones, sentadillas y planchas. Nuestros entrenadores te guiarán para que realices cada movimiento correctamente.
                  </div>
                </div>
              </div>
              
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading-Four">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-Four" aria-expanded="false" aria-controls="collapse-Four">
                    ¿Cómo encontrar una rutina adecuada para principiantes?
                  </button>
                </h2>
                <div id="collapse-Four" class="accordion-collapse collapse" aria-labelledby="heading-Four" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    En Calistenia MadBarzz te proporcionamos rutinas personalizadas según tu nivel y objetivos. Puedes consultar con nuestros entrenadores para recibir orientación.
                  </div>
                </div>
              </div>
              
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading-Five">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-Five" aria-expanded="false" aria-controls="collapse-Five">
                    ¿Cómo iniciar una rutina de entrenamiento?
                  </button>
                </h2>
                <div id="collapse-Five" class="accordion-collapse collapse" aria-labelledby="heading-Five" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Comienza con 2-3 sesiones por semana, aumentando gradualmente la intensidad. La clave es la constancia y la técnica correcta para evitar lesiones.
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        
        <!-- Fotos de Instagram con fondo oscuro -->
        <div class="col-lg-6">
          <h4 style="color:#fff; text-align:center;">Síguenos en Instagram</h4>
          
          <div style="background-color:#111; padding:20px; border-radius:8px; display:flex; justify-content:center;">
            <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/p/DBSfSuDRUVm/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style="background:#111; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin:1px; max-width:540px; min-width:326px; padding:0; width:100%;">
              <div style="padding:16px;">
                <a href="https://www.instagram.com/p/DBSfSuDRUVm/?utm_source=ig_embed&amp;utm_campaign=loading" style="background:#111; color:#fff; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank">
                  Ver esta publicación en Instagram
                </a>
              </div>
            </blockquote>
          </div>

          <script async src="//www.instagram.com/embed.js"></script>
        </div>
      </div>
    </div>
  </section>

  <footer id="contacto" class="footer-style-one" style="background-image: url(https://via.placeholder.com/1920x732);">

   <div class="footer-p-2">
    <div class="container">
      <div class="row">
        <!-- Información -->
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="footer-col">
            <h3>Información</h3>
            <p>En Calistenia MadBarzz creemos que la constancia es la clave. Entrenar regularmente mejora tu fuerza, resistencia y bienestar, sin importar si algunos días tienes menos tiempo.</p>
            <ul class="social-media">
            <li>
              <a href="https://www.facebook.com/MadBarzz" target="_blank">
                <i class="fa-brands fa-facebook-f"></i>
              </a>
            </li>

            <li>
              <a href="https://wa.me/{{ '591' . preg_replace('/\D/', '', $superadmin->persona->telefono ?? '') }}" target="_blank">
                <i class="fa-brands fa-whatsapp"></i>
              </a>
            </li>

            <li>
              <a href="https://www.instagram.com/calistenia_madbarzz?igsh=aW91eXl6ZnVtMGJ2" target="_blank">
                <i class="fa-brands fa-instagram"></i>
              </a>
            </li>
            </ul>
          </div>
        </div>
        <!-- Contacto -->
       <div class="col-lg-6 col-md-6 col-sm-12">
  <div class="footer-col">
    <h3>Contacto</h3>
    <ul>
      <li>
        <span style="background-color: #FD6A01; padding: 8px; border-radius: 4px; display: inline-flex; align-items: center; justify-content: center; margin-right: 10px;">
          <i class="flaticon-maps" style="color: #ffffff; font-size: 16px;"></i>
        </span>
        <p>Av. Santos Dumont, 4to anillo, al lado de la HOT, Santa Cruz de la Sierra</p>
      </li>
      <li>
        <span style="background-color: #FD6A01; padding: 8px; border-radius: 4px; display: inline-flex; align-items: center; justify-content: center; margin-right: 10px;">
          <i class="flaticon-iphone" style="color: #ffffff; font-size: 16px;"></i>
        </span>
        <p>
          <a href="https://wa.me/{{ '591' . preg_replace('/\D/', '', $superadmin->persona->telefono ?? '') }}" target="_blank">
            {{ $superadmin->persona->telefono ?? 'Número no disponible' }}
          </a>
        </p>
      </li>
      <li>
        <span style="background-color: #FD6A01; padding: 8px; border-radius: 4px; display: inline-flex; align-items: center; justify-content: center; margin-right: 10px;">
          <i class="flaticon-mail" style="color: #ffffff; font-size: 16px;"></i>
        </span>
        <p>
          <a href="mailto:{{ $superadmin->user->email ?? '' }}">
            {{ $superadmin->user->email ?? 'Correo no disponible' }}
          </a>
        </p>
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
            <p>gym on fitness center<i class="fa-solid fa-heart" style="color: #FD6A01;"></i> © 2024 <a href="https://winsfolio.net/"> winsfolio.net</a> All rights reserved</p> 
          </div>
        </div>
      </div>
    </div>
  </footer>
  

  <div id="scroll-percentage"><span id="scroll-percentage-value"></span></div>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/jquery.counterup.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.fancybox.min.js"></script>
  <script src="assets/js/jquery.nice-select.js"></script> 
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/marquee.js"></script> 
  <script src="assets/js/custom.js"></script> 
</body>
</html>