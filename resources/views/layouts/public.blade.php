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
   
  <div class="preloader">
    <div class="loader-wrap-heading">
      <div class="load-text"> <span>C</span> <span>A</span> <span>R</span> <span>G</span> <span>A</span> <span>N</span> <span>D</span> <span>O</span></div>
    </div>
  </div>
  <header class="header-style-one two">
    <div class="top-bar">
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
                            <a href="{{ route('login') }}" class="login">Iniciar sesión / Registrarse</a>
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
            <div class="nav-bar">
            <ul>
                <li class="menu-item-has-children">
                <a href="javascript:void(0)">Inicio</a>
                <ul class="sub-menu">
                    <li><a href="index.html">Inicio Uno</a></li>
                    <li><a href="index-2.html">Inicio Dos</a></li>
                    <li><a href="index-3.html">Inicio Tres</a></li>
                </ul>
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
                <a href="javascript:void(0)">Tienda</a>
                <ul class="sub-menu">
                    <li class="menu-item-has-children">
                    <a href="javascript:void(0)">Nuestros productos</a>
                    <ul class="sub-menu">
                        <li><a href="product-list.html">Lista de productos</a></li>
                        <li><a href="product-grid.html">Cuadrícula de productos</a></li>
                    </ul>
                    </li>
                    <li><a href="product-detail.html">Detalles del producto</a></li>
                    <li><a href="cart.html">Carrito</a></li>
                    <li><a href="checkout.html">Finalizar compra</a></li>
                </ul>
                </li>
                <li class="menu-item-has-children">
                <a href="javascript:void(0)">Páginas</a>
                <ul class="sub-menu">
                    <li class="menu-item-has-children">
                    <a href="javascript:void(0)">Servicios</a>
                    <ul class="sub-menu">
                        <li><a href="services.html">Lo que hacemos</a></li>
                        <li><a href="service-detail.html">Detalle del servicio</a></li>
                    </ul>
                    </li>
                    <li class="menu-item-has-children">
                    <a href="javascript:void(0)">Proyectos</a>
                    <ul class="sub-menu">
                        <li><a href="our-projects-1.html">Nuestros proyectos uno</a></li>
                        <li><a href="our-projects-2.html">Nuestros proyectos dos</a></li>
                        <li><a href="project-detail.html">Detalle del proyecto</a></li>
                    </ul>
                    </li>
                    <li class="menu-item-has-children">
                    <a href="javascript:void(0)">Equipo</a>
                    <ul class="sub-menu">
                        <li><a href="our-team.html">Nuestro equipo</a></li>
                        <li><a href="team-detail.html">Detalle del equipo</a></li>
                    </ul>
                    </li>
                    <li><a href="login.html">Iniciar sesión / Registrarse</a></li>
                    <li>
                    <!-- Cerrar sesión -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                        Cerrar sesión
                        </a>
                    </form>
                    </li>
                </ul>
                </li>
                <li class="menu-item-has-children">
                <a href="javascript:void(0)">Noticias</a>
                <ul class="sub-menu">
                    <li><a href="our-blog-1.html">Nuestro blog uno</a></li>
                    <li><a href="our-blog-2.html">Nuestro blog dos</a></li>
                    <li><a href="blog-detail.html">Detalle del blog</a></li>
                </ul>
                </li>
                <li>
                <a href="contact.html">Contacto</a>
                </li>
            </ul>

            <div class="extras">
                <a href="javascript:void(0)" id="desktop-menu" class="menu-start">
                <!-- Ícono hamburguesa -->
                <svg id="ham-menue" viewBox="0 0 100 100">
                    <path class="line line1" d="..." />
                    <path class="line line2" d="..." />
                    <path class="line line3" d="..." />
                </svg>
                </a>
                <a href="javascript:void(0)" id="show">
                <!-- Ícono carrito -->
                <svg id="Shoping-bags" ...> ... </svg>
                </a>
                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="theme-btn">
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
            <li class="menu-item-has-children">
                <a href="javascript:void(0)">Inicio</a>
                <ul class="sub-menu">
                <li><a href="index.html">Inicio Uno</a></li>
                <li><a href="index-2.html">Inicio Dos</a></li>
                <li><a href="index-3.html">Inicio Tres</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children">
                <a href="javascript:void(0)">Acerca de</a>
                <ul class="sub-menu">
                <li><a href="about.html">Nosotros</a></li>
                <li><a href="features-and-benefits.html">Características y beneficios</a></li>  
                </ul>
            </li>
            <li class="menu-item-has-children"><a href="JavaScript:void(0)">Tienda</a>
                <ul class="sub-menu">
                <li><a href="product.html">Nuestros Productos</a></li>
                <li><a href="product-detail.html">Detalle del Producto</a></li>
                <li><a href="cart.html">Carrito</a></li>
                <li><a href="checkout.html">Finalizar Compra</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children"><a href="JavaScript:void(0)">Páginas</a>
                <ul class="sub-menu">
                <li class="menu-item-has-children">
                    <a href="javascript:void(0)">Servicios</a>
                    <ul class="sub-menu">
                    <li><a href="services.html">Servicios</a></li>
                    <li><a href="service-detail.html">Detalle del Servicio</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="javascript:void(0)">Clases</a>
                    <ul class="sub-menu">
                    <li><a href="our-classes.html">Nuestras Clases</a></li>
                    <li><a href="our-classes-2.html">Nuestras Clases 2</a></li>
                    <li><a href="class-details.html">Detalles de la Clase</a></li>
                    <li><a href="classes-schedule.html">Horario de Clases</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="javascript:void(0)">Equipo</a>
                    <ul class="sub-menu">
                    <li><a href="our-team.html">Nuestro Equipo</a></li>
                    <li><a href="team-detail.html">Detalle del Equipo</a></li>
                    </ul>
                </li>
                <li><a href="login.html">Iniciar Sesión / Registrarse</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children">
                <a href="javascript:void(0)">Gestión</a>
                <ul class="sub-menu">
                <li><a href="{{ route('roles.index')   }}">Roles</a></li>
                <li class="menu-item-has-children">
                    <a href="javascript:void(0)">Clientes</a>
                    <ul class="sub-menu">
                    <li><a href="clientes.html">Ver Clientes</a></li>
                    <li><a href="registrar-cliente.html">Añadir Cliente</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="javascript:void(0)">Entrenadores</a>
                    <ul class="sub-menu">
                    <li><a href="entrenadores.html">Ver Entrenadores</a></li>
                    <li><a href="registrar-entrenador.html">Añadir Entrenador</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="javascript:void(0)">Recepcionistas</a>
                    <ul class="sub-menu">
                    <li><a href="recepcionistas.html">Ver Recepcionistas</a></li>
                    <li><a href="registrar-recepcionista.html">Añadir Recepcionista</a></li>
                    </ul>
                </li>
                </ul>
            </li>
            <li class="menu-item-has-children">
                <a href="javascript:void(0)">Noticias</a>
                <ul class="sub-menu">
                <li><a href="our-blog-1.html">Nuestro Blog Uno</a></li>
                <li><a href="our-blog-2.html">Nuestro Blog Dos</a></li>
                <li><a href="blog-detail.html">Detalle del Blog</a></li>
                </ul>
            </li>
            <li>
                <a href="contact.html">Contacto</a>
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
  <section class="myslider owl-carousel owl-theme"> 
    <div data-dot="<button><span>01</span> Workout Classes</button>" class=" item featured-section-three" style="background-image:url(https://via.placeholder.com/1920x770);">
     <div class="container">
        <div class="featured-text-two">
          <h1>Workout Classes</h1>
          <p>Enjoy our progressive programs with world class fitness equipment, trainers.</p>
          <a href="#" class="theme-btn">EXPLORE WILDSMITH</a>
        </div>
     </div>
    </div>
    <div data-dot="<button><span>02</span> Cardio Program</button>" class=" item featured-section-three" style="background-image:url(https://via.placeholder.com/1920x770);">
     <div class="container">
        <div class="featured-text-two">
          <h1>Cardio Program</h1>
          <p>Enjoy our progressive programs with world class fitness equipment, trainers</p>
          <a href="#" class="theme-btn">EXPLORE WILDSMITH</a>
        </div>
     </div>
    </div>
    <div data-dot="<button><span>03</span> Fitness Studio </button>" class=" item featured-section-three" style="background-image:url(https://via.placeholder.com/1920x770);">
     <div class="container">
        <div class="featured-text-two">
          <h1>Fitness Studio</h1>
          <p>Enjoy our progressive programs with world class fitness equipment, trainers</p>
          <a href="#" class="theme-btn">EXPLORE WILDSMITH</a>
        </div>
     </div>
    </div>
  </section>
  <section class="gap history-style-one">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="history-data">
            <figure>
              <img class="w-100" src="https://via.placeholder.com/416x584" alt="Crain Image">
            </figure>
            <div class="details">
              <h3>Weight Lifting</h3>
              <p>Weightlifting, also called Olympic weightlifting, is an athletic discipline in the modern Olympic programe</p>
              <a href="service-detail.html">
                <i class="fa-solid fa-arrow-up-long"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="history-data">
            <figure>
              <img class="w-100" src="https://via.placeholder.com/416x584" alt="C-Man Image">
            </figure>
            <div class="details">
              <h3>Yoga Relaxation</h3>
              <p>Weightlifting, also called Olympic weightlifting, is an athletic discipline in the modern Olympic programe</p>
              <a href="service-detail.html">
                <i class="fa-solid fa-arrow-up-long"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="history-data">
            <figure>
              <img class="w-100" src="https://via.placeholder.com/416x584" alt="Building Image">
            </figure>
            <div class="details">
              <h3>Diet Nutrition</h3>
              <p>MWeightlifting, also called Olympic weightlifting, is an athletic discipline in the modern Olympic programe</p>
              <a href="service-detail.html">
                <i class="fa-solid fa-arrow-up-long"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="cta-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7">
          <div class="cta-data">
            <h2>Let's Start Workout!</h2>
            <p>Join our gym and let our expert Trainers guide you towards your fitness goals! Get personalized workouts, expert guidance.</p>
            <a href="our-projects-2.html" data-bs-toggle="modal" data-bs-target="#exampleModal1" class="theme-btn">Join Us Today</a>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="cta-data">
            <figure>
              <img src="https://via.placeholder.com/858x597" alt="Building-2 Pic">
            </figure>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="gap shop-style-one timetable-section">
    <div class="heading">
      <figure>
        <img src="assets/images/heading-icon.png" alt="heading-icon-2">
      </figure>
      <span>Sell your Products</span>
      <h2>Industry Products</h2>
    </div>
    <div class="container">
      <div class="row p-slider owl-carousel">
        <div class="col-lg-12">
          <div class="product">
            <div class="main-data">
              <div class="btn-hover">
                <figure>
                  <img src="https://via.placeholder.com/336x216" alt="Product Image 1">
                </figure>
                <a href="cart.html" class="theme-btn">Add to Cart <i class="fa-solid fa-bag-shopping"></i></a>
              </div>
              <div class="data">
                <div class="ratings">
                  <i class="fa-solid fa-star"></i>
                  <span>5.0</span>
                </div>
                <h3><a href="product-detail.html">Customised Gym Bottle</a></h3>
                <div class="price-range">
                  <span>$18.60</span>
                </div>
              </div>
            </div> 
          </div>
        </div>
        <div class="col-lg-12">
          <div class="product">
            <figure>
              <img class="w-100" src="https://via.placeholder.com/336x216" alt="Product Image 2">
            </figure>
            <div class="btn-hover"> 
              <a href="cart.html" class="theme-btn">Add to Cart <i class="fa-solid fa-bag-shopping"></i></a>
            </div>
            <div class="ratings">
              <i class="fa-solid fa-star"></i>
              <span>5.0</span>
            </div>
            <h3><a href="product-detail.html">Gym Black T-shirt</a></h3>
            <div class="price-range">
              <span>$18.60</span>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="product">
            <figure>
              <img class="w-100" src="https://via.placeholder.com/336x216" alt="Product Image 3">
            </figure>
            <div class="btn-hover"> 
              <a href="cart.html" class="theme-btn">Add to Cart <i class="fa-solid fa-bag-shopping"></i></a>
            </div>
            <div class="ratings">
              <i class="fa-solid fa-star"></i>
              <span>5.0</span>
            </div>
            <h3><a href="product-detail.html">Gym Workout Shoes</a></h3>
            <div class="price-range">
              <span>$18.60</span>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="product">
            <figure>
              <img class="w-100" src="https://via.placeholder.com/336x216" alt="Product Image 4">
            </figure>
            <div class="btn-hover"> 
              <a href="cart.html" class="theme-btn">Add to Cart <i class="fa-solid fa-bag-shopping"></i></a>
            </div>
            <div class="ratings">
              <i class="fa-solid fa-star"></i>
              <span>5.0</span>
            </div>
            <h3><a href="product-detail.html">Gym Water Bottel</a></h3>
            <div class="price-range">
              <span>$18.60</span>
            </div>
          </div>
        </div>
      </div>
      <div class="inner-container">
        <div class="table-outer">
          <div class="table-inner">
            <div class="table-title-box clearfix"> 
              <div class="data">
                <span>solutions for each project</span>
                <h2>Project Completed</h2>
              </div>
              <div class="day" >MONDAY</div>
              <div class="day">TUESDAY</div>
              <div class="day">WEDNESDAY</div>
              <div class="day">THURSDAY</div>
              <div class="day">FRIDAY</div>
              <div class="day">SATURDAY</div>
            </div>
            <div class="timetable-tabs tabs-box">
              <ul class="tab-btns tab-buttons clearfix">
                <li data-tab="#prod-cardio" class="tab-btn">CARDIO</li>
                <li data-tab="#prod-crossfit" class="tab-btn">CROSSFIT</li>
                <li data-tab="#prod-gym" class="tab-btn">GYM</li>
                <li data-tab="#prod-powerlifting" class="tab-btn active-btn">POWERLIFTING</li>
              </ul>
              <div class="tabs-content">
                <div class="tab" id="prod-cardio" style="display:none">
                  <div class="content">
                    <div class="clearfix">
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Cardio Burn <span>MAdona FRON <br> 11:00 -
                              12:00</span>
                          </div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Cardio Burn <span>MAdona FRON <br> 11:00 -
                              12:00</span>
                          </div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Crossfit Class <span>Madison fren <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Crossfit Class <span>Madison fren <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab" id="prod-crossfit" style="display:none">
                  <div class="content">
                    <div class="clearfix">
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Cardio Burn <span>MAdona FRON <br> 11:00 -
                              12:00</span>
                          </div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Cardio Burn <span>MAdona FRON <br> 11:00 -
                              12:00</span>
                          </div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Crossfit Class <span>Madison fren <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Crossfit Class <span>Madison fren <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab" id="prod-gym" style="display:none">
                  <div class="content">
                    <div class="clearfix">
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Cardio Burn <span>MAdona FRON <br> 11:00 -
                              12:00</span>
                          </div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Cardio Burn <span>MAdona FRON <br> 11:00 -
                              12:00</span>
                          </div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Crossfit Class <span>Madison fren <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Crossfit Class <span>Madison fren <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab active-tab" id="prod-powerlifting" style="display:block">
                  <div class="content">
                    <div class="clearfix">
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Cardio Burn <span>MAdona FRON <br> 11:00 -
                              12:00</span>
                          </div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Cardio Burn <span>MAdona FRON <br> 11:00 -
                              12:00</span>
                          </div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Crossfit Class <span>Madison fren <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Crossfit Class <span>Madison fren <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">GYM OPEN <span>11:00 - 12:00</span></div>
                        </div>
                      </div>
                      <div class="time-box">
                        <div class="box-inner">
                          <div class="time">Power Lifting <span>Steve Cross <br> 11:00 -
                              12:00</span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="gap" >
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="data">
            <span>WE’RE MAKING PEOPLE</span>
            <h2>HEALTHIER, HAPPIER & STRONGER. JOIN US! </h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="making-people">
            <p>We are confident that our staff and facilities can help you to reach your fitness goals. Whether you’re a beginner or a pro... we’re here to help! After spending time with us, we want our members to walk out of our doors after a workout and feel a better version of themselves.</p>
            <div class="features">
                <ul>
                  <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> You will achieve your goals</li>
                  <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> You’ll have unlimited support</li>
                  <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> You’ll find the help useful</li>
                  <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> You’ll gain confidence</li>
                  <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> You’ll learn something new</li> 
                </ul>
              </div>
          </div>
        </div>
      </div>
     </div>
    <div class="marquee_text">
        <a href="team-detail.html">
          <div class="team-style-2">
            <figure>
              <img src="https://via.placeholder.com/240x290" alt="IMG">
            </figure>
            <span>Fitness Instructor</span>
            <h5>Thomas Marqos</h5>
          </div>
        </a>
        <a href="team-detail.html">
          <div class="team-style-2">
            <figure>
              <img src="https://via.placeholder.com/240x290" alt="IMG">
            </figure>
            <span>Fitness Instructor</span>
            <h5>Maria Robbert</h5>
          </div>
        </a>
        <a href="team-detail.html">
          <div class="team-style-2">
            <figure>
              <img src="https://via.placeholder.com/240x290" alt="IMG">
            </figure>
            <span>Fitness Instructor</span>
            <h5>Petar Parkar</h5>
          </div>
        </a>
        <a href="team-detail.html">
          <div class="team-style-2">
            <figure>
              <img src="https://via.placeholder.com/240x290" alt="IMG">
            </figure>
            <span>Fitness Instructor</span>
            <h5>Jessica Lorance</h5>
          </div>
        </a>
        <a href="team-detail.html">
          <div class="team-style-2">
            <figure>
              <img src="https://via.placeholder.com/240x290" alt="IMG">
            </figure>
            <span>Fitness Instructor</span>
            <h5>Oliver Rankis</h5>
          </div>
        </a>
        <a href="team-detail.html">
          <div class="team-style-2">
            <figure>
              <img src="https://via.placeholder.com/240x290" alt="IMG">
            </figure>
            <span>Fitness Instructor</span>
            <h5>Moniqa Linda</h5>
          </div>
        </a>
      </div>
  </section>
  <section class="gap payment-product" style="background-image:url(https://via.placeholder.com/1920x846);">
    <div class="heading">
      <figure>
        <img src="assets/images/heading-icon.png" alt="heading-icon-2">
      </figure>
      <span>GET IN TOUCH</span>
      <h2>Quality Passion With Contact Form</h2>
    </div>
     <div class="container">
       <div class="row">
         <div class="col-lg-6">
           <div class="payment-product-card">
            <img src="https://via.placeholder.com/363x446" alt="img">
              <h5>Full Membership</h5>  
              <h2>$55.00</h2>
              <span>Subscription Type</span>
              <select id="inputState-111" class="form-control">
                  <option selected="">Select your subscription</option>
                  <option>Monthly</option>
                  <option>Yearly</option> 
                </select> 
              <p>Minimum subscription of 12 months</p>
              <a href="#" class="theme-btn">Get Started</a>
           </div> 
         </div> 
         <div class="col-lg-6">
           <div class="payment-product-card">
            <img src="https://via.placeholder.com/363x446" alt="img">
              <h5>Full Membership</h5>  
              <h2>$55.00</h2>
              <span>Subscription Type</span>
              <select id="inputState-111" class="form-control">
                  <option selected="">Select your subscription</option>
                  <option>Monthly</option>
                  <option>Yearly</option> 
                </select>  
                  <p>Minimum subscription of 12 months</p>
                  <a href="#" class="theme-btn">Get Started</a> 
           </div> 
         </div>
       </div>
     </div>
  </section>
  <section class="contact-form-one gap no-bottom">
     <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="data"> 
            <span>GET IN TOUCH</span>
            <h2>gym beginners guide</h2>
          </div>
          <div class="acc2">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading-Two">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-Two" aria-expanded="false" aria-controls="collapse-Two">
                    How to start at the gym as a beginner?
                  </button>
                </h2>
                <div id="collapse-Two" class="accordion-collapse collapse" aria-labelledby="heading-Two" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Lorem ipsum dolor sit amet, consectetur adi piscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading-One">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-One" aria-expanded="true" aria-controls="collapse-One">
                    What is the basic information of gym?
                  </button>
                </h2>
                <div id="collapse-One" class="accordion-collapse collapse show" aria-labelledby="heading-One" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Lorem ipsum dolor sit amet, consectetur adi piscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading-Three">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-Three" aria-expanded="false" aria-controls="collapse-Three">
                    What to do in the gym for the first time?
                  </button>
                </h2>
                <div id="collapse-Three" class="accordion-collapse collapse" aria-labelledby="heading-Three" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Lorem ipsum dolor sit amet, consectetur adi piscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading-Four">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-Four" aria-expanded="false" aria-controls="collapse-Four">
                    How do I find a gym routine for beginners?
                  </button>
                </h2>
                <div id="collapse-Four" class="accordion-collapse collapse" aria-labelledby="heading-Four" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Lorem ipsum dolor sit amet, consectetur adi piscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading-Five">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-Five" aria-expanded="false" aria-controls="collapse-Five">
                    How to start a gym routine?
                  </button>
                </h2>
                <div id="collapse-Five" class="accordion-collapse collapse" aria-labelledby="heading-Five" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Lorem ipsum dolor sit amet, consectetur adi piscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    leased.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="together">
              <h4>together we thrive</h4>
              <h2>2 months half price</h2>
              <span>+ no joining fee</span>
              <p>ends wednesday!</p>
              <div id="countdown">
                <ul>
                  <li><span id="days"></span>days</li>
                  <li><span id="hours"></span>Hour</li>
                  <li><span id="minutes"></span>Min</li>
                  <li class="mb-0"><span id="seconds"></span>Sec</li>
                </ul>
              </div>
              <a href="#" class="theme-btn">get started</a>
              <a href="contact.html" class="theme-btn two">contact now</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="gap blog-style-three">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="blog-heading data">
            <span>News Articles</span>
            <h2>Latest News</h2>
            <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit.</p>
            <a href="our-blog-1.html" class="theme-btn">View All News</a>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="blog-posts row">
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="boxx">
                <figure>
                  <img src="https://via.placeholder.com/385x225" alt="Blog Image 1">
                </figure>
                <div class="space">
                  <span class="date">January 9, 2025</span>
                  <h3>
                    <a href="blog-detail.html">
                      Interval training, and focusing on compound exercises.
                    </a>
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="boxx">
                <figure>
                  <img src="https://via.placeholder.com/385x225" alt="Blog Image 2">
                </figure>
                <div class="space">
                  <span class="date">January 9, 2025</span>
                  <h3>
                    <a href="blog-detail.html">
                      How to Keep Your Body Healthy Over the Festive Season
                    </a>
                  </h3>
                </div>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="footer-style-one" style="background-image: url(https://via.placeholder.com/1920x732);">
    <div class="container">
      <div class="footer-p-4">
        <div class="footer-p-4-left">
          <i class="flaticon-contact-form"></i>
          <a href="#"> <h3>join now</h3></a>
          <span>2 months half price + no joining fee</span>
        </div>
        <div class="footer-p-4-right">
          <i class="flaticon-stopwatch-1"></i>
          <a href="#"> <h3>book a tour</h3></a>
          <span>choose uour nearest club</span>
        </div>
      </div>
    </div>
    <div class="footer-p-2">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="footer-col">
              <h3>Information</h3>
              <p>Regular trips to the gym are great, but don't worry if you can't find a large chunk of time to exercise every day.</p>
              <ul class="social-media">
                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="flaticon-twitter"></i></a></li>
                <li><a href="#"><i class="flaticon-instagram"></i></a></li>
                <li><a href="#"><i class="flaticon-pinterest"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="footer-col">
              <h3>Contact</h3>
              <ul>
                <li>
                   <i class="flaticon-maps"></i>
                  <p>901 N Pitt Str., Suite 170, VA 22314, USA</p>
                </li>
                <li>
                   <i class="flaticon-iphone"></i>
                  <p><a href="callto:(+380)503184707">(+380) 50 318 47 07</a></p>
                </li>
                <li>
                   <i class="flaticon-mail"></i>
                  <p><a href="mailto:username@domain.com">username@domain.com</a></p>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="footer-col">
              <h3>Newsletter</h3>
              <p>Signup for our weekly newsletter to get the latest news.</p>
              <form>
                <input type="email" name="email" placeholder="Enter your email.">
                <button>
                  <i class="fa-solid fa-arrow-up-long"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <ul class="image-gallery">
      <li>
          <a href="https://via.placeholder.com/250x150" data-fancybox="gallery">
              <i class="flaticon-instagram"></i>
          </a>
          <figure><img alt="girl" src="https://via.placeholder.com/250x150"></figure>
      </li>
      <li>
          <a href="https://via.placeholder.com/250x150" data-fancybox="gallery">
              <i class="flaticon-instagram"></i>
          </a>
          <figure><img alt="girl" src="https://via.placeholder.com/250x150"></figure>
      </li>
      <li>
          <a href="https://via.placeholder.com/250x150" data-fancybox="gallery">
              <i class="flaticon-instagram"></i>
          </a>
          <figure><img alt="girl" src="https://via.placeholder.com/250x150"></figure>
      </li>
      <li>
          <a href="https://via.placeholder.com/250x150" data-fancybox="gallery">
              <i class="flaticon-instagram"></i>
          </a>
          <figure><img alt="girl" src="https://via.placeholder.com/250x150"></figure>
      </li>
      <li>
          <a href="https://via.placeholder.com/250x150" data-fancybox="gallery">
              <i class="flaticon-instagram"></i>
          </a>
          <figure><img alt="girl" src="https://via.placeholder.com/250x150"></figure>
      </li>
      <li>
          <a href="https://via.placeholder.com/250x150" data-fancybox="gallery">
              <i class="flaticon-instagram"></i>
          </a>
          <figure><img alt="girl" src="https://via.placeholder.com/250x150"></figure>
      </li>
      <li>
          <a href="https://via.placeholder.com/250x150" data-fancybox="gallery">
              <i class="flaticon-instagram"></i>
          </a>
          <figure><img alt="girl" src="https://via.placeholder.com/250x150"></figure>
      </li> 
    </ul>

    <div class="footer-p-3 rights">
      <div class="container">
        <div class="row">
          <div class="footer-col">
            <p>gym on fitness center<i class="fa-solid fa-heart"></i> © 2024 <a href="https://winsfolio.net/"> winsfolio.net</a> All rights reserved</p> 
          </div>
        </div>
      </div>
    </div>
  </footer>
  <div id="lightbox" class="lightbox clearfix">
        <div class="white_content">
            <a href="javascript:;" class="textright" id="close"><i class="fa-regular fa-circle-xmark"></i></a>
                <div class="cart-popup">
                <ul>

                      <li class="d-flex align-items-center position-relative">

                        <div class="p-img light-bg">

                          <img src="assets/images/p-1.png" alt="Product Image">

                        </div>

                        <div class="p-data">

                          <h3 class="font-semi-bold">Fosroc Galvafroid – 400ml</h3>

                          <p class="theme-clr font-semi-bold">1 x $18.60</p>

                        </div>

                        <a href="JavaScript:void(0)" id="crosss"></a>

                      </li>

                      <li class="d-flex align-items-center position-relative">

                        <div class="p-img light-bg">

                          <img src="assets/images/p-1.png" alt="Product Image">

                        </div>

                        <div class="p-data">

                          <h3 class="font-semi-bold">Fosroc Galvafroid – 400ml</h3>

                          <p class="theme-clr font-semi-bold">1 x $18.60</p>

                        </div>

                        <a href="JavaScript:void(0)" id="cross"></a>

                      </li>

                </ul>
                <div class="cart-btn">
                  <div class="cart-total d-flex align-items-center justify-content-between">

                  <span class="font-semi-bold">Total:</span>

                  <span class="font-semi-bold"> $40.20 </span>

                  </div>

                  <div class="cart-btns d-flex align-items-center justify-content-between">

                  <a class="font-bold" href="JavaScript:void">View Cart</a>

                  <a class="font-bold theme-bg-clr text-white checkout" href="JavaScript:void">Checkout</a>

                  </div>
                </div>
        </div>
        </div>
    </div>
  <div id="scroll-percentage"><span id="scroll-percentage-value"></span></div>
  <div class="modal fade popups conslt-popup" id="exampleModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <img src="https://via.placeholder.com/420x591" alt="img">
            <div class="contact-form-one popup">
              <div class="c-form-2">
                <h3>Start Consulting</h3>
                <div class="parallax" style="background-image: url(assets/images/pattren.png);"></div>
                <form>
                  <div class="row g-0">
                    <input type="text" class="form-control" id="exampleInputText1"  placeholder="Complete Name">
                  </div>
                  <div class="row g-0">
                    <input type="email" class="form-control" id="exampleInputEmail1"  placeholder="Email Address">
                  </div>
                  <div class="row g-0">
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Phone No">
                  </div>
                  <div class="row g-0">
                    <select id="inputState-21" class="form-control">
                      <option selected>Subject</option>
                      <option>Subject 1</option>
                      <option>Subject 2</option>
                      <option>Subject 3</option>
                    </select>
                  </div>
                  <div class="row g-0">
                    <textarea placeholder="Question / Message?"></textarea>
                  </div>
                  <button type="submit" class="theme-btn">Submit Now</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/jquery.counterup.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.fancybox.min.js"></script>
  <script src="assets/js/jquery.nice-select.js"></script> 
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/marquee.js"></script> 
  <script src="assets/js/custom.js"></script> 
</body></html>