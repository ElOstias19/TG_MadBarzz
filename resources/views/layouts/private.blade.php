<!DOCTYPE html>
<html lang="es" data-theme="dark">
<head>
    <!-- Título -->
    <title>MadBarzz</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="">


    <!-- PWA -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#1E88E5">
    <link rel="apple-touch-icon" href="{{ asset('images/icons/icon-144x144.png') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="MiApp">



    <script>
        // Forzar dark antes de que cargue el CSS
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark'); // Guardar en localStorage
        window.dezSettingsOptions = window.dezSettingsOptions || {};
        window.dezSettingsOptions.version = 'dark'; // Para que Gymove arranque ya en oscuro
    </script>

    <meta name="keywords" content="admin, panel de administración, plantilla admin, bootstrap, bootstrap 5, plantilla admin bootstrap 5, fitness, admin fitness, moderno, panel de administración responsive, panel de ventas, sass, kit de interfaz, aplicación web">
    <meta name="description" content="Descubre Gymove, la solución fitness definitiva diseñada para ayudarte a lograr un estilo de vida más saludable con sus características innovadoras y programas personalizados. Gymove es una plantilla de panel de administración completamente responsive que ofrece la combinación perfecta de ejercicio, nutrición y motivación. Comienza tu viaje fitness hoy con Gymove y visita DexignZone para más información.">

    <meta property="og:title" content="Gymove - Plantilla de Panel de Administración Fitness Bootstrap">
    <meta property="og:description" content="Descubre Gymove, la solución fitness definitiva diseñada para ayudarte a lograr un estilo de vida más saludable con sus características innovadoras y programas personalizados. Gymove es una plantilla de panel de administración completamente responsive que ofrece la combinación perfecta de ejercicio, nutrición y motivación. Comienza tu viaje fitness hoy con Gymove y visita DexignZone para más información.">
    <meta property="og:image" content="https://gymove.dexignzone.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets_private/images/favicon.png') }}">
    <!--<link rel="stylesheet" href="vendor/chartist/css/chartist.min.css">-->
    <link href="{{ asset('assets_private/vendor/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_private/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_private/css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('assets_private/images/logo_mad.png') }}" alt="">
                <img class="logo-compact" src="{{ asset('assets_private/images/log_text_mad.png') }}" alt="">
                <img class="brand-title" src="{{ asset('assets_private/images/log_text_mad.png') }}" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
        
        <!--**********************************
            Chat box start
        ***********************************
        <div class="chatbox">
            <div class="chatbox-close"></div>
            <div class="custom-tab-1">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#notes">Notas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#alerts">Alertas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#chat">Chat</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="chat" role="tabpanel">
                        <div class="card mb-sm-3 mb-md-0 contacts_card dz-chat-user-box">
                            <div class="card-header chat-list-header text-center">
                                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/></g></svg></a>
                                <div>
                                    <h6 class="mb-1">Lista de Chat</h6>
                                    <p class="mb-0">Mostrar Todo</p>
                                </div>
                                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
                            </div>
                            <div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body">
                                <ul class="contacts">
                                    <li class="name-first-letter">A</li>
                                    <li class="active dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="{{ asset('assets_private/images/avatar/1.jpg') }}" class="rounded-circle user_img" alt="">
                                                <span class="online_icon"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>Archie Parker</span>
                                                <p>Kalid está en línea</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="{{ asset('assets_private/images/avatar/2.jpg') }}" class="rounded-circle user_img" alt="">
                                                <span class="online_icon offline"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>Alfie Mason</span>
                                                <p>Taherah salió hace 7 minutos</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="{{ asset('assets_private/images/avatar/3.jpg') }}" class="rounded-circle user_img" alt="">
                                                <span class="online_icon"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>AharlieKane</span>
                                                <p>Sami está en línea</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="{{ asset('assets_private/images/avatar/4.jpg') }}" class="rounded-circle user_img" alt="">
                                                <span class="online_icon offline"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>Athan Jacoby</span>
                                                <p>Nargis salió hace 30 minutos</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="name-first-letter">B</li>
                                    <li class="dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="{{ asset('assets_private/images/avatar/5.jpg') }}" class="rounded-circle user_img" alt="">
                                                <span class="online_icon offline"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>Bashid Samim</span>
                                                <p>Rashid salió hace 50 minutos</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="{{ asset('assets_private/images/avatar/1.jpg') }}" class="rounded-circle user_img" alt="">
                                                <span class="online_icon"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>Breddie Ronan</span>
                                                <p>Kalid está en línea</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="{{ asset('assets_private/images/avatar/2.jpg') }}" class="rounded-circle user_img" alt="">
                                                <span class="online_icon offline"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>Ceorge Carson</span>
                                                <p>Taherah salió hace 7 minutos</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="name-first-letter">D</li>
                                    <li class="dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="{{ asset('assets_private/images/avatar/3.jpg') }}" class="rounded-circle user_img" alt="">
                                                <span class="online_icon"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>Darry Parker</span>
                                                <p>Sami está en línea</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="{{ asset('assets_private/images/avatar/4.jpg') }}" class="rounded-circle user_img" alt="">
                                                <span class="online_icon offline"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>Denry Hunter</span>
                                                <p>Nargis salió hace 30 minutos</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="name-first-letter">J</li>
                                    <li class="dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="{{ asset('assets_private/images/avatar/5.jpg') }}" class="rounded-circle user_img" alt="">
                                                <span class="online_icon offline"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>Jack Ronan</span>
                                                <p>Rashid salió hace 50 minutos</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="{{ asset('assets_private/images/avatar/1.jpg') }}" class="rounded-circle user_img" alt="">
                                                <span class="online_icon"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>Jacob Tucker</span>
                                                <p>Kalid está en línea</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="{{ asset('assets_private/images/avatar/2.jpg') }}" class="rounded-circle user_img" alt="">
                                                <span class="online_icon offline"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>James Logan</span>
                                                <p>Taherah salió hace 7 minutos</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="{{ asset('assets_private/images/avatar/3.jpg') }}" class="rounded-circle user_img" alt="">
                                                <span class="online_icon"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>Joshua Weston</span>
                                                <p>Sami está en línea</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="name-first-letter">O</li>
                                    <li class="dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="{{ asset('assets_private/images/avatar/4.jpg') }}" class="rounded-circle user_img" alt="">
                                                <span class="online_icon offline"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>Oliver Acker</span>
                                                <p>Nargis salió hace 30 minutos</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dz-chat-user">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont">
                                                <img src="{{ asset('assets_private/images/avatar/5.jpg') }}" class="rounded-circle user_img" alt="">
                                                <span class="online_icon offline"></span>
                                            </div>
                                            <div class="user_info">
                                                <span>Oscar Weston</span>
                                                <p>Rashid salió hace 50 minutos</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card chat dz-chat-history-box d-none">
                            <div class="card-header chat-list-header text-center">
                                <a href="#" class="dz-chat-history-back">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"/><rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1"/><path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/></g></svg>
                                </a>
                                <div>
                                    <h6 class="mb-1">Chat con Khelesh</h6>
                                    <p class="mb-0 text-success">En línea</p>
                                </div>                            
                                <div class="dropdown">
                                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> Ver perfil</li>
                                        <li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Agregar a amigos cercanos</li>
                                        <li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Agregar a grupo</li>
                                        <li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Bloquear</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body msg_card_body dz-scroll" id="DZ_W_Contacts_Body3">
                                <div class="d-flex justify-content-start mb-4">
                                    <div class="img_cont_msg">
                                        <img src="{{ asset('assets_private/images/avatar/1.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                    <div class="msg_cotainer">
                                        Hola, ¿cómo estás samim?
                                        <span class="msg_time">8:40 AM, Hoy</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mb-4">
                                    <div class="msg_cotainer_send">
                                        Hola Khalid, estoy bien, gracias. ¿Y tú?
                                        <span class="msg_time_send">8:55 AM, Hoy</span>
                                    </div>
                                    <div class="img_cont_msg">
                                <img src="{{ asset('assets_private/images/avatar/2.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start mb-4">
                                    <div class="img_cont_msg">
                                        <img src="{{ asset('assets_private/images/avatar/1.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                    <div class="msg_cotainer">
                                        Yo también estoy bien, gracias por tu plantilla de chat
                                        <span class="msg_time">9:00 AM, Hoy</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mb-4">
                                    <div class="msg_cotainer_send">
                                        De nada
                                        <span class="msg_time_send">9:05 AM, Hoy</span>
                                    </div>
                                    <div class="img_cont_msg">
                                <img src="{{ asset('assets_private/images/avatar/2.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start mb-4">
                                    <div class="img_cont_msg">
                                        <img src="{{ asset('assets_private/images/avatar/1.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                    <div class="msg_cotainer">
                                        Estoy buscando tus próximas plantillas
                                        <span class="msg_time">9:07 AM, Hoy</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mb-4">
                                    <div class="msg_cotainer_send">
                                        Ok, gracias, que tengas un buen día
                                        <span class="msg_time_send">9:10 AM, Hoy</span>
                                    </div>
                                    <div class="img_cont_msg">
                                        <img src="{{ asset('assets_private/images/avatar/2.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start mb-4">
                                    <div class="img_cont_msg">
                                        <img src="{{ asset('assets_private/images/avatar/1.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                    <div class="msg_cotainer">
                                        Adiós, nos vemos
                                        <span class="msg_time">9:12 AM, Hoy</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start mb-4">
                                    <div class="img_cont_msg">
                                        <img src="{{ asset('assets_private/images/avatar/1.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                    <div class="msg_cotainer">
                                        Hola, ¿cómo estás samim?
                                        <span class="msg_time">8:40 AM, Hoy</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mb-4">
                                    <div class="msg_cotainer_send">
                                        Hola Khalid, estoy bien, gracias. ¿Y tú?
                                        <span class="msg_time_send">8:55 AM, Hoy</span>
                                    </div>
                                    <div class="img_cont_msg">
                                <img src="{{ asset('assets_private/images/avatar/2.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start mb-4">
                                    <div class="img_cont_msg">
                                        <img src="{{ asset('assets_private/images/avatar/1.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                    <div class="msg_cotainer">
                                        Yo también estoy bien, gracias por tu plantilla de chat
                                        <span class="msg_time">9:00 AM, Hoy</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mb-4">
                                    <div class="msg_cotainer_send">
                                        De nada
                                        <span class="msg_time_send">9:05 AM, Hoy</span>
                                    </div>
                                    <div class="img_cont_msg">
                                <img src="{{ asset('assets_private/images/avatar/2.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start mb-4">
                                    <div class="img_cont_msg">
                                        <img src="{{ asset('assets_private/images/avatar/1.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                    <div class="msg_cotainer">
                                        Estoy buscando tus próximas plantillas
                                        <span class="msg_time">9:07 AM, Hoy</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mb-4">
                                    <div class="msg_cotainer_send">
                                        Ok, gracias, que tengas un buen día
                                        <span class="msg_time_send">9:10 AM, Hoy</span>
                                    </div>
                                    <div class="img_cont_msg">
                                        <img src="{{ asset('assets_private/images/avatar/2.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start mb-4">
                                    <div class="img_cont_msg">
                                        <img src="{{ asset('assets_private/images/avatar/1.jpg') }}" class="rounded-circle user_img_msg" alt="">
                                    </div>
                                    <div class="msg_cotainer">
                                        Adiós, nos vemos
                                        <span class="msg_time">9:12 AM, Hoy</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer type_msg">
                                <div class="input-group">
                                    <textarea class="form-control" placeholder="Escribe tu mensaje..."></textarea>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-primary"><i class="fa fa-location-arrow"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="alerts" role="tabpanel">
                        <div class="card mb-sm-3 mb-md-0 contacts_card">
                            <div class="card-header chat-list-header text-center">
                                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
                                <div>
                                    <h6 class="mb-1">Notificaciones</h6>
                                    <p class="mb-0">Mostrar Todo</p>
                                </div>
                                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/></g></svg></a>
                            </div>
                            <div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body1">
                                <ul class="contacts">
                                    <li class="name-first-letter">ESTADO DEL SERVIDOR</li>
                                    <li class="active">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont primary">KK</div>
                                            <div class="user_info">
                                                <span>Cumpleaños de David Nester</span>
                                                <p class="text-primary">Hoy</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="name-first-letter">SOCIAL</li>
                                    <li>
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont success">RU<i class="icon fa-birthday-cake"></i></div>
                                            <div class="user_info">
                                                <span>Perfección Simplificada</span>
                                                <p>Jame Smith comentó tu estado</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="name-first-letter">ESTADO DEL SERVIDOR</li>
                                    <li>
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont primary">AU<i class="icon fa fa-user-plus"></i></div>
                                            <div class="user_info">
                                                <span>AharlieKane</span>
                                                <p>Sami está en línea</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont info">MO<i class="icon fa fa-user-plus"></i></div>
                                            <div class="user_info">
                                                <span>Athan Jacoby</span>
                                                <p>Nargis salió hace 30 minutos</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer"></div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="notes">
                        <div class="card mb-sm-3 mb-md-0 note_card">
                            <div class="card-header chat-list-header text-center">
                                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/></g></svg></a>
                                <div>
                                    <h6 class="mb-1">Notas</h6>
                                    <p class="mb-0">Agregar Nueva Nota</p>
                                </div>
                                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/></g></svg></a>
                            </div>
                            <div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body2">
                                <ul class="contacts">
                                    <li class="active">
                                        <div class="d-flex bd-highlight">
                                            <div class="user_info">
                                                <span>Nuevo pedido realizado..</span>
                                                <p>10 Ago 2020</p>
                                            </div>
                                            <div class="ms-auto">
                                                <a href="#" class="btn btn-primary btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex bd-highlight">
                                            <div class="user_info">
                                                <span>Youtube, un sitio web para compartir videos..</span>
                                                <p>10 Ago 2020</p>
                                            </div>
                                            <div class="ms-auto">
                                                <a href="#" class="btn btn-primary btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex bd-highlight">
                                            <div class="user_info">
                                                <span>john acaba de comprar tu producto..</span>
                                                <p>10 Ago 2020</p>
                                            </div>
                                            <div class="ms-auto">
                                                <a href="#" class="btn btn-primary btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex bd-highlight">
                                            <div class="user_info">
                                                <span>Athan Jacoby</span>
                                                <p>10 Ago 2020</p>
                                            </div>
                                            <div class="ms-auto">
                                                <a href="#" class="btn btn-primary btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <!--**********************************
            Chat box End
        ***********************************-->
        
        <!--**********************************
            Header start
        ***********************************-->
        <header class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                Panel de Control <button id="btnSubscribe">Activar Notificaciones</button>
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                          <!--  <li class="nav-item">
                                <form>
                                    <div class="input-group search-area d-lg-inline-flex d-none me-3">
                                      <span class="input-group-text" id="header-search">
                                            <button class="bg-transparent border-0">
                                                <i class="flaticon-381-search-2"></i>
                                            </button>
                                      </span>
                                      <input type="text" class="form-control" placeholder="Buscar aquí" aria-label="Username" aria-describedby="header-search">
                                    </div>
                                </form>
                            </li>-->
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-theme-mode" href="javascript:void(0);" id="theme-toggle">
                                    <i id="icon-light" class="fas fa-sun"></i>
                                    <i id="icon-dark" class="fas fa-moon"></i>
                                </a>
                            </li>

<li class="nav-item dropdown header-profile">
    <a class="nav-link" href="javascript:void(0)" role="button" data-bs-toggle="dropdown">
        <img src="{{ asset('assets_private/images/profile/17.jpg') }}" width="20" alt="">
        <div class="header-info">
            <span class="text-black">
<strong>{{ Auth::user()?->persona?->nombre_completo ?? Auth::user()?->name }}</strong>
            </span>
            <p class="fs-12 mb-0">{{ Auth::user()->rol->nombre ?? 'Usuario' }}</p>
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
        <!-- Perfil -->
@auth
    <a href="{{ route('users.edit', Auth::user()?->id) }}" class="dropdown-item ai-icon">
        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
        </svg>
        <span class="ms-2">Perfil</span>
    </a>
@endauth
            <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
            <span class="ms-2">Perfil</span>
        </a>

        <!-- Cerrar sesión -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" class="dropdown-item ai-icon" onclick="event.preventDefault(); this.closest('form').submit();">
                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
                <span class="ms-2">Cerrar sesión</span>
            </a>
        </form>
    </div>
</li>


                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
<div class="deznav d-flex flex-column">
    <div class="deznav-scroll flex-grow-1">
        <ul class="metismenu" id="menu">
            <li>
                @php
                    $userRol = Auth::user()->rol->nombre ?? '';
                @endphp

                @if($userRol === 'Cliente')
                    <a href="{{ route('dashboard.cliente') }}">Panel de Control</a>
                @else
                    <a href="{{ route('dashboard') }}">Panel de Control</a>
                @endif
            </li>

            @if($userRol === 'Administrador')
                <!-- Usuarios - Solo para Administrador -->
                <li class="has-arrow">
                    <a href="javascript:void()">
                        <i class="flaticon-381-user-1"></i>
                        <span class="nav-text">Usuarios</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('roles.index') }}">Roles</a></li>
                        <li><a href="{{ route('users.index') }}">Usuarios del Sistema</a></li>
                        <li><a href="{{ route('personas.index') }}">Personas</a></li>
                    </ul>
                </li>
            @endif

            @if(in_array($userRol, ['Administrador', 'Entrenador', 'Recepcionista', 'Cliente']))
                <!-- Clientes y Membresías - Para todos excepto Cliente (Cliente verá versión limitada) -->
                <li class="has-arrow">
                    <a href="javascript:void()">
                        <i class="flaticon-381-id-card"></i>
                        <span class="nav-text">Clientes y Membresías</span>
                    </a>
                    <ul aria-expanded="false">
                        @if($userRol === 'Cliente')
                            <li><a href="{{ route('clientes.show', Auth::user()->id) }}">Mi Membresía</a></li>
                        @else
                            <li><a href="{{ route('clientes.index') }}">Clientes</a></li>
                            <li><a href="{{ route('membresias.index') }}">Membresías</a></li>
                            <li><a href="{{ route('membresia_cliente.index') }}">Membresías de Clientes</a></li>
                        @endif
                    </ul>
                </li>
            @endif

            @if(in_array($userRol, ['Administrador', 'Entrenador', 'Recepcionista']))
                <!-- Personal - Solo para Administrador, Entrenador y Recepcionista -->
                <li class="has-arrow">
                    <a href="javascript:void()">
                        <i class="fas fa-users"></i>
                        <span class="nav-text">Personal</span>
                    </a>
                    <ul aria-expanded="false">
                        <li>
                            <a href="{{ route('entrenadores.index') }}">
                                <i class="fas fa-dumbbell"></i> Entrenadores
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('recepcionistas.index') }}">
                                <i class="fas fa-id-badge"></i> Recepcionistas
                            </a>
                        </li>
                        @if($userRol === 'Administrador')
                        <li>
                            <a href="{{ route('administradores.index') }}">
                                <i class="fas fa-user-shield"></i>Administradores
                            </a>
                        </li>
                        @endif
                    </ul>   
                </li>
            @endif

            @if(in_array($userRol, ['Administrador', 'Entrenador', 'Recepcionista', 'Cliente']))
                <!-- Operaciones - Para todos los roles -->
                <li class="has-arrow">
                    <a href="javascript:void()">
                        <i class="flaticon-381-settings-2"></i>
                        <span class="nav-text">Operaciones</span>
                    </a>
                    <ul aria-expanded="false">
                        @if($userRol === 'Cliente')
                            <li><a href="{{ route('asistencias.mis') }}">Mis Asistencias</a></li>
                             <li><a href="{{ route('pagos.mis-pagos') }}">Mis Pagos</a></li>
                            <li><a href="{{ route('rutinas.show', Auth::user()->id) }}">Mi Rutina</a></li>
                        @else
                            <li><a href="{{ route('asistencias.index') }}">Asistencias</a></li>
                            <li><a href="{{ route('notificaciones.index') }}">Notificaciones</a></li>
                            <li><a href="{{ route('pagos.index') }}">Pagos</a></li>
                            <li><a href="{{ route('rutinas.index') }}">Rutinas</a></li>
                        @endif
                    </ul>
                </li>   
            @endif

            @if(in_array($userRol, ['Administrador', 'Entrenador', 'Recepcionista']))
                <!-- Reportes - Solo para Administrador, Entrenador y Recepcionista -->
                <li class="has-arrow">
                    <a href="javascript:void()">
                        <i class="fas fa-chart-bar"></i>
                        <span class="nav-text">Reportes</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('reportes.clientes.estado') }}">Clientes Activos/Inactivos</a></li>
                        <li><a href="{{ route('reportes.clientes.nuevos') }}">Clientes Nuevos del Mes</a></li>
                        <li><a href="{{ route('reportes.clientes.membresia_vencida') }}">Clientes Membresía Vencida</a></li>
                        <li><a href="{{ route('reportes.pagos.mes') }}">Pagos por Mes</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div>
        <!--**********************************
            Sidebar end
        ***********************************-->
        
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body default-height">
            <!-- row -->
            <div class="container-fluid">
                <div class="row">
                    @yield('contenido')
                    
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <footer class="footer">
            <div class="copyright">
                  <p>Copyright © Diseñado y Desarrollado por <a href="https://www.instagram.com/robertadrian.07?igsh=MThyMGpsb3gycjhpZg==" target="_blank">Robert Garrado Adrian</a> 2025</p>
            </div>
        </footer>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!-- SERVICE WORKER -->

<script>
const publicVapidKey = {!! json_encode(env('VAPID_PUBLIC_KEY')) !!};

function urlBase64ToUint8Array(base64String) {
    const padding = '='.repeat((4 - (base64String.length % 4)) % 4);
    const base64 = (base64String + padding).replace(/-/g, '+').replace(/_/g, '/');
    const rawData = atob(base64);
    return new Uint8Array([...rawData].map(c => c.charCodeAt(0)));
}

async function subscribeUser() {
    if (!('serviceWorker' in navigator)) return alert('Service Worker no soportado');

    try {
        // 1️⃣ Registrar SW
        const register = await navigator.serviceWorker.register('/serviceworker.js');
        await navigator.serviceWorker.ready;
        console.log('Service Worker registrado');

        // 2️⃣ Eliminar suscripción previa
        const existing = await register.pushManager.getSubscription();
        if (existing) {
            await existing.unsubscribe();
            console.log('Suscripción previa eliminada');
        }

        // 3️⃣ Crear nueva suscripción
        const subscription = await register.pushManager.subscribe({
            userVisibleOnly: true,
            applicationServerKey: urlBase64ToUint8Array(publicVapidKey)
        });
        console.log('Suscripción creada:', subscription);

        // 4️⃣ Guardar en backend Laravel
        await fetch('/save-subscription', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(subscription)
        });

        console.log('Suscripción enviada al servidor');
        alert('Notificaciones activadas!');
    } catch (err) {
        console.error('Error registrando suscripción:', err);
        console.log('err.name:', err.name);
        console.log('err.message:', err.message);
        console.log('err.stack:', err.stack);
        console.log('Todo el objeto err:', err);
        alert('Error registrando suscripción: ' + err.message);
    }
}

document.getElementById('btnSubscribe').addEventListener('click', subscribeUser);
</script>



    <!--**********************************
        Scripts
    ***********************************-->
    <script>
        const savedTheme = localStorage.getItem('theme') || 'dark';
        document.documentElement.setAttribute('data-theme', savedTheme);
        window.dezSettingsOptions = window.dezSettingsOptions || {};
        window.dezSettingsOptions.version = savedTheme;
    </script>
    <!-- Required vendors -->
    <script src="{{ asset('assets_private/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets_private/vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets_private/vendor/chart-js/chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets_private/vendor/owl-carousel/owl.carousel.js') }}"></script>
    <!-- Chart piety plugin files -->
    <!--    <script src="{{ asset('assets_private/vendor极狐/peity/jquery.peity.min.js') }}"></script>-->
    <!-- Apex Chart -->
    <!--<script src="{{ asset('assets_private/vendor/apexchart/apexchart.js') }}"></script>-->
    <!-- Dashboard 1 -->
    <!--<script src="{{ asset('assets_private/js/dashboard/dashboard-1.js') }}"></script>-->
    <script src="{{ asset('assets_private/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets_private/js/deznav-init.js') }}"></script>
    <script>
        function carouselReview(){
            /*  testimonial one function by = owl.carousel.js */
            jQuery('.testimonial-one').owlCarousel({
                nav:true,
                loop:true,
                autoplay:true,
                margin:30,
                dots: false,
                left:true,
                navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
                responsive:{
                    0:{
                        items:1
                    },
                    484:{
                        items:2
                    },
                    882:{
                        items:3
                    },    
                    1200:{
                        items:2
                    },            
                    
                    1540:{
                        items:3
                    },
                    1740:{
                        items:4
                    }
                }
            })            
        }
        jQuery(window).on('load',function(){
            setTimeout(function(){
                carouselReview();
            }, 1000); 
        });
    </script>
    <script>
        // Función para cambiar el tema
        function toggleTheme() {
            const html = document.documentElement;
            const themeToggle = document.getElementById('theme-toggle');
            const iconLight = document.getElementById('icon-light');
            const iconDark = document.getElementById('icon-dark');
            
            if (html.getAttribute('data-theme') === 'dark') {
                html.removeAttribute('data-theme');
                localStorage.setItem('theme', 'light');
                iconLight.style.display = 'inline-block';
                iconDark.style.display = 'none';
            } else {
                html.setAttribute极狐('data-theme', 'dark');
                localStorage.setItem('theme', 'dark');
                iconLight.style.display = 'none';
                iconDark.style.display = 'inline-block';
            }
        }

        // Verificar el tema al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme') || 'dark';
            const html = document.documentElement;
            const themeToggle = document.getElementById('theme-toggle');
            const iconLight = document.getElementById('icon-light');
            const iconDark = document.getElementById('icon-dark');
            
            // Aplicar el tema guardado
            if (savedTheme === 'dark') {
                html.setAttribute('data-theme', 'dark');
                iconLight.style.display = 'none';
                iconDark.style.display = 'inline-block';
            } else {
                html.removeAttribute('data-theme');
                iconLight.style.display = 'inline-block';
                iconDark.style.display = 'none';
            }
            
            // Configurar el evento click para el botón de cambio de tema
            themeToggle.addEventListener('click', toggleTheme);
        });

        jQuery(document).ready(function(){

            
            (function() {
                const savedTheme = localStorage.getItem('theme') || 'dark';
                window.de极狐zSettingsOptions = window.dezSettingsOptions || {};
                window.dezSettingsOptions.version = savedTheme;
                new dezSettings(window.dezSettingsOptions);
            })();
            
            
            jQuery(window).on('resize',function(){
                const savedTheme = localStorage.getItem('theme') || 'dark';
                if (savedTheme === 'dark') {
                    dezSettingsOptions.version = 'dark';
                } else {
                    dezSettingsOptions.version = 'light';
                }
                new dezSettings(dezSettingsOptions);
                jQuery('.dz-theme-mode').addClass('active');
            });
        });
    </script>
</body>
</html>