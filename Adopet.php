<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['id_cargo'] != 0) {
    header('Location: login.php');
    exit();
}
?>

<?php 
include("perfil/connection.php");
$con = connection();

$sql = "SELECT * FROM perfilusuario";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

    <link href="img/logos/LOGO.png" rel="icon">

    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/iniciosesion.css">
    <link rel="stylesheet" href="css/styleWyM.css">
    <link rel="stylesheet" href="css/inde.css">
    <link rel="stylesheet" href="css/voluntario.css">

</head>

<header>

    <div class="header-content">

        <div class="logo">
            <h1>Ado<b>Pet</b></h1>
        </div>

        <div class="menu" id="show-menu">

            <nav>
                <!-- <ul class="menu-selected" class="text-menu-selected" > -->
                <ul>
                    <li class="menu-selected"><a href="AdoPet.php" class="text-menu-selected">
                            <i class="fas fa-file-alt"></i>Inicio</a></li>
                    <!-- <li><a href="index.html"> <i class="fas fa-home"></i> Inicio</a></li> -->
                    <li><a href="iniciosesion/adoptar.php"> <i class="fas fa-file-alt"></i>¿Como adoptar?</a></li>
                    <li><a href="iniciosesion/mascotas.php"> <i class="fab fa-adopta"> </i>Mascotas</a></li>
                    <li><a href="iniciosesion/contacto.php"> <i class="fas fa-headset"></i> Contacto</a></li>
                    <!-- <li><a href="login.php"> <i class="fas fa-file-alt"></i>Login/Registro</a></li> -->
                    <!-- <div class="container-user">
                <a href="login.html"> <i class="fa-solid fa-user"></i></a>
                </div> -->
                    <ul class="navbar-nav ml-auto ml-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <ion-icon name="person-outline"></ion-icon></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#"><?php echo $_SESSION['email']; ?></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="perfil/perfil.php?id=<?php echo $row['id']; ?>">Perfil</a>
                                <a class="dropdown-item" href="php/cerrar_sesion.php">Salir</a>
                            </div>
                    </ul>

                    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
                    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script> 
            </nav>

        </div>

    </div>

    <div id="icon-menu">
        <i class="fas fa-bars"></i>
    </div>

</header>

<body>

    <!-- carousel -->
    <div class="carousel">
        <!-- list item -->
        <div class="list">
            <div class="item">
                <img src="img/mascotasF/Fondo.jpg">
                <div class="content">
                    <div class="author">AdoPet</div>
                    <div class="title">Mascotas en</div>
                    <div class="topic">adopción</div>
                    <div class="des">
                        <!-- lorem 50 -->
                        Explora nuestra galería de fotos a continuación para conocer a algunos de nuestros amigos
                        peludos que están buscando un hogar. Desde adorables cachorros y gatitos hasta compañeros más
                        adultos, ¡hay un amigo para cada familia! Haz clic en "Ver más" para obtener más información
                        sobre cada mascota.
                    </div>
                    <div class="buttons">
                        <button>VER MÁS</button>
                        <button>REGISTRATE</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="img/mascotasF/Plumita.jpg">
                <div class="content">
                    <div class="author">AdoPet</div>
                    <div class="title">Mascotas en</div>
                    <div class="topic">adopción</div>
                    <div class="des">
                        <!-- lorem 50 -->
                        Explora nuestra galería de fotos a continuación para conocer a algunos de nuestros amigos
                        peludos que están buscando un hogar. Desde adorables cachorros y gatitos hasta compañeros más
                        adultos, ¡hay un amigo para cada familia! Haz clic en "Ver más" para obtener más información
                        sobre cada mascota.
                    </div>
                    <div class="buttons">
                        <button>VER MÁS</button>
                        <button>REGISTRATE</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="img/mascotasF/lu.jpg">
                <div class="content">
                    <div class="author">AdoPet</div>
                    <div class="title">Mascotas en</div>
                    <div class="topic">adopción</div>
                    <div class="des">
                        <!-- lorem 50 -->
                        Explora nuestra galería de fotos a continuación para conocer a algunos de nuestros amigos
                        peludos que están buscando un hogar. Desde adorables cachorros y gatitos hasta compañeros más
                        adultos, ¡hay un amigo para cada familia! Haz clic en "Ver más" para obtener más información
                        sobre cada mascota.
                    </div>
                    <div class="buttons">
                        <button>VER MÁS</button>
                        <button>REGISTRATE</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="img/mascotasF/Kiki.jpg">
                <div class="content">
                    <div class="author">AdoPet</div>
                    <div class="title">Mascotas en</div>
                    <div class="topic">adopción</div>
                    <div class="des">
                        <!-- lorem 50 -->
                        Explora nuestra galería de fotos a continuación para conocer a algunos de nuestros amigos
                        peludos que están buscando un hogar. Desde adorables cachorros y gatitos hasta compañeros más
                        adultos, ¡hay un amigo para cada familia! Haz clic en "Ver más" para obtener más información
                        sobre cada mascota.
                    </div>
                    <div class="buttons">
                        <button>VER MÁS</button>
                        <button>REGISTRATE</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- list thumnail -->
        <div class="thumbnail">
            <div class="item">
                <img src="img/mascotasF/Fondo.jpg">
                <div class="content">
                    <div class="title">
                        Boss
                    </div>
                    <div class="description">
                        Golden retriever
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="img/mascotasF/Plumita.jpg">
                <div class="content">
                    <div class="title">
                        Plumita
                    </div>
                    <div class="description">
                        Guacamaya
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="img/mascotasF/lu.jpg">
                <div class="content">
                    <div class="title">
                        Lu
                    </div>
                    <div class="description">
                        Gato persa
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="img/mascotasF/Kiki.jpg">
                <div class="content">
                    <div class="title">
                        Kiki
                    </div>
                    <div class="description">
                        Gato
                    </div>
                </div>
            </div>
        </div>
        <!-- next prev -->

        <div class="arrows">
            <button id="prev"> < </button>
            <button id="next"> > </button>
        </div>
        <!-- time running -->
        <div class="time"></div>
    </div>

    <script src="js/carrusel.js"></script>

    <main>
        <!--COMENTARIOS MOTIVACIONALES-->

        <div class="container__trust container__card-primary">
            <div class="trust card__primary">
                <div class="text__trust text__card-primary">
                    <!-- <h2 class="subtitle">ALGO</h2> -->
                    <!-- <p>ADOPTA</p> -->
                    <!-- <h1>------------</h1> -->
                </div>
                <div class="container__trust container__box-cardPrimary">
                    <div class="card__trust box__card-primary">
                        <img src="img/pet.png" alt="">
                        <h2>Encuentra tu mascota</h2>
                        <p>Selecciona una mascota de nuestra lista de adopción</p>
                    </div>
                    <div class="card__trust box__card-primary">
                        <img src="img/lovepet.png" alt="">
                        <h2>Conoce tu mascota</h2>
                        <p>Agenda una visita con tu mascota elegida</p>
                    </div>
                    <div class="card__trust box__card-primary">
                        <img src="img/refugio.png" alt="">
                        <h2>Lleva tu mascota a casa</h2>
                        <p>Sigue el proceso de adopción</p>
                    </div>
                </div>
            </div>
        </div>
        
        <br>
        <br>
    <!-- Booking Start -->
    <div class="container-fluid bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="bg-primary py-5 px-4 px-sm-5">
                    <form class="py-5" action="php/voluntarios_be.php" method="POST" autocomplete="off">
                            <div class="form-group">
                                <input type="text" pattern="[A-Za-zÑñÁáÉéÍíÓóÚú\s]+" title="Solo se pueden letras y espacios" class="form-control border-0 p-4" name="nombre" id="nombre" placeholder="Nombre Completo" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" title="No te olvides del @" class="form-control border-0 p-4" name="correo" id="correo" placeholder="Correo Electronico" required="required" />
                            </div>
                            <div class="form-group">
                                <div class="date" id="date" data-target-input="nearest">
                                    <input type="tel" pattern="[0-9]{4}[0-9]{4}" title="(Debe tener 8 dígitos)" class="form-control border-0 p-4 datetimepicker-input" name="telefono" id="telefono" placeholder="Numero Telefonico (0000 0000)" data-target="#date" data-toggle="datetimepicker"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="time" id="time" data-target-input="nearest">
                                    <input type="text" pattern="[A-Za-zÑñÁáÉéÍíÓóÚú\s]+" title="Solo se pueden letras" class="form-control border-0 p-4 datetimepicker-input" name="experiencia" id="experiencia" placeholder="¿Tienes experiencia en refugios?" data-target="#time" data-toggle="datetimepicker"/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <select class="custom-select border-0 px-4"  name="puesto" id="puesto" style="height: 47px;" title="Selecciona una opcion">
                                    <option selected>Selecciona para ser voluntario</option>
                                    <option name="puesto" id="puesto" value="Rescate">-Rescate de la mascota</option>
                                    <option name="puesto" id="puesto" value="Cuidador">-Cuidador de las mascotas</option>
                                    <option name="puesto" id="puesto" value="Asistente">-Asistente de Adopciones</option>
                                    <option name="puesto" id="puesto" value="Recaudación">-Recaudación de Fondos</option>
                                </select>
                            </div>
                            <div>
                                <button class="btn btn-dark btn-block border-0 py-3" type="submit" value="Enviar">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-7 py-5 py-lg-0 px-3 px-lg-5">
                    <h4 class="text-secondary mb-3">Se parte de Nosotros</h4>
                    <h1 class="display-4 mb-4">¿Quieres ser<span class="text-primary"> voluntario?</span></h1>
                    <p>¿Estás listo para hacer la diferencia? ¡Inscríbete hoy y comienza tu viaje como voluntario en nuestro refugio de mascotas!</p>
                    <div class="row py-2">
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <!-- <h1 class="flaticon-house font-weight-normal text-secondary m-0 mr-3"></h1> -->
                                    <h5 class="text-truncate m-0">Rescate de la mascota</h5>
                                </div>
                                <p>Responder a llamadas de emergencia para rescatar animales en situación de riesgo, coordinar y realizar el transporte seguro de animales desde el lugar de rescate hasta el refugio.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <!-- <h1 class="flaticon-food font-weight-normal text-secondary m-0 mr-3"></h1> -->
                                    <h5 class="text-truncate m-0">Cuidador de las mascotas</h5>
                                </div>
                                <p>Pasear perros, socializar y jugar con gatos, alimentar a los animales, limpiar jaulas y áreas de vivienda.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <!-- <h1 class="flaticon-grooming font-weight-normal text-secondary m-0 mr-3"></h1> -->
                                    <h5 class="text-truncate m-0">Asistente de Adopciones</h5>
                                </div>
                                <p class="m-0">Ayudar en el proceso de adopción, atender a los posibles adoptantes, proporcionar información sobre los animales disponibles, realizar entrevistas de adopción.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <!-- <h1 class="flaticon-toy font-weight-normal text-secondary m-0 mr-3"></h1> -->
                                    <h5 class="text-truncate m-0">Recaudación de Fondos</h5>
                                </div>
                                <p class="m-0">Ayudar en la organización y ejecución de eventos de recaudación de fondos, ferias de adopción, jornadas de puertas abiertas, y campañas de sensibilización.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking Start -->

        <!--Sobre nosotros - Nuestro equipo-->

        <div class="container__about div__offset">
            <div class="about">
                <div class="text__about">
                    <h1>Nuestros Servicios </h1>
                    <p>Nos dedicamos apasionadamente a rescatar, cuidar y encontrar hogares amorosos para mascotas
                        necesitadas. Somos más que un refugio; somos un puente hacia una nueva vida para nuestros
                        amigos.</p>
                    <!-- <a href="#" class="btn__text-about btn__text">Saber Más</a> -->
                </div>

                <div class="image__about">
                    <img src="img/mascotasF/cats.jpg" alt="">
                    <img src="img/mascotasF/cyp.jpg" alt="">
                </div>
            </div>
        </div>

        <!--contenido principal mascotas-->
        <section class="price container">
            <h2 class="subtitle">Nuestras Mascotas</h2>
            <div class="container-card">
                <div class="card">
                    <figure>
                        <img src="img/mascotasF/BulldogFrances.jpg">
                    </figure>
                    <div class="contenido-card">
                        <h4>Joker</h4>
                        <p></p>
                        <a href="mascotas/joker.php">Ver Màs</a>
                    </div>
                </div>

                <div class="card">
                    <figure>
                        <img src="img/mascotasF/luke.jpg">
                    </figure>
                    <div class="contenido-card">
                        <h4>Luke</h4>
                        <p></p>
                        <a href="mascotas/luke.php">Ver Màs</a>
                    </div>
                </div>

                <div class="card">
                    <figure>
                        <img src="img/mascotasF/siberianobb.jpg">
                    </figure>
                    <div class="contenido-card">
                        <h4>Hades</h4>
                        <p></p>
                        <a href="mascotas/hades.php">Ver Màs</a>
                    </div>
                </div>
            </div>

            <div class="container-card">
                <div class="card">
                    <figure>
                        <img src="img/mascotasF/Beny.jpg">
                    </figure>
                    <div class="contenido-card">
                        <h4>Beny</h4>
                        <p></p>
                        <a href="mascotas/beny.php">Ver Màs</a>
                    </div>
                </div>

                <div class="card">
                    <figure>
                        <img src="img/mascotasF/Gatsby.jpg">
                    </figure>
                    <div class="contenido-card">
                        <h4>Gatsby</h4>
                        <p></p>
                        <a href="mascotas/gatsby.php">Ver Màs</a>
                    </div>
                </div>

                <div class="card">
                    <figure>
                        <img src="img/mascotasF/Kiki.jpg">
                    </figure>
                    <div class="contenido-card">
                        <h4>Kiki</h4>
                        <p></p>
                        <a href="mascotas/kiki.php">Ver Màs</a>
                    </div>
                </div>
            </div>
            </div>
            </div>

            <!-- div del contacto -->
            <div class="containerContac">
                <h2 class="subtitle">Nuestras Ubicacion</h2>
                <div class="content">
                    <div class="left-side">
                        <div class="address details">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="topic">Ubicacion</div>
                            <div class="text-one">Santa Barabara, Galeras</div>
                            <div class="text-two">Col. El Rosario</div>
                        </div>

                        <div class="phone details">
                            <i class="fas fa-phone-alt"></i>
                            <div class="topic">Teléfono</div>
                            <div class="text-one">+504 9497-6009</div>
                            <div class="text-two">+504 9941-0414</div>
                        </div>

                        <div class="email details">
                            <i class="fas fa-envelope"></i>
                            <div class="topic">Email</div>
                            <div class="text-one">AdoPet@gmail.com</div>
                            <div class="text-two">eriickbaraahona21@gmail.com</div>
                        </div>
                    </div>

                    <div class="right-side">
                        <div class="mapa">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3855.0849110836975!2d-88.24269412742139!3d14.932361985594264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f642bedd6f93943%3A0x853f39aa71a3e58c!2sAdoPet!5e0!3m2!1ses-419!2shn!4v1710470728683!5m2!1ses-419!2shn"
                                width="900" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>

    </main>

</body>

<!-- script para la notificaciones -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function getParameterByName(name) {
        const url = new URL(window.location.href);
        return url.searchParams.get(name);
    }
    const success = getParameterByName('success');
    if (success === 'data_sent') {
        Swal.fire({
            toast: true,
            position: "top-end",
            icon: "success",
            title: "Información Enviada",
            text: "Su información ha sido enviada correctamente.",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            customClass: {
                popup: "my-popup-class",
                title: "my-title-class",
                icon: "my-icon-class"
            }
        }).then(() => {
            // Redirige a la página deseada después de que la notificación se cierre
            window.location = "Adopet.php";
        });
    } else if (error === 'data_not_sent') {
        Swal.fire({
            toast: true,
            position: "top-end",
            icon: "error",
            title: "Error al Enviar Información",
            text: "Hubo un problema al enviar su información. Por favor, inténtelo nuevamente.",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            customClass: {
                popup: "error-popup-class",
                title: "error-title-class",
                icon: "error-icon-class"
            }
        }).then(() => {
            // Redirige a la página deseada después de que la notificación se cierre
            window.location = "Adopet.php";
        });
    }
</script>
<style>
    .my-popup-class {
        background-color: #e9f7ef; /* Fondo verde claro */
        border: 1px solid #d4edda; /* Borde verde */
    }
    .my-title-class {
        color: #155724; /* Texto color verde oscuro */
    }
    .my-icon-class {
        color: #d4edda; /* Color del icono */
    }
</style>
<!--container-redes-sociales-contacto-->

<div class="container-redes">
    <a href="https://api.whatsapp.com/send?phone=94976009&text=¿Qué servicios ofrecen?" target="_blank">
        <img src="img/icon-whatsapp.png" title="Enviar mensaje de WhatsApp" alt="">
    </a>

    <a href="http://m.me/adopet" target="_blank">
        <img src="img/icon-messenger.png" alt="" title="Enviar mensaje por Messenger">
    </a>
</div>
<footer>
    <div class="container__footer">
        <div class="box__footer">
            <div class="logo">
                <img src="img/logos/LOGOG.png" alt="">
            </div>
            <div class="terms">
                <p></p>
            </div>
        </div>
        <!-- <div class="box__footer">
            <h2>Soluciones</h2>
            <a href="https://www.google.com">App Desarrollo</a>
            <a href="#">App Marketing</a>
            <a href="#">IOS Desarrollo</a>
            <a href="#">Android Desarrollo</a>
        </div>

        <div class="box__footer">
            <h2>Compañia</h2>
            <a href="#">Acerca de</a>
            <a href="#">Trabajos</a>
            <a href="#">Procesos</a>
            <a href="#">Servicios</a>              
        </div> -->

        <div class="box__footer">
            <h2>Redes Sociales</h2>
                <a href="https://www.facebook.com/profile.php?id=61560919176195" target="_blank"> <i class="fab fa-facebook-square"></i> Facebook</a>
                <a href="https://api.whatsapp.com/send?phone=94976009&text=¿Qué servicios ofrecen?" target="_blank"><i class="fab fa-whatsapp-square"></i> WhatsApp</a>
                <!-- <a href="#"><i class="fab fa-linkedin"></i> Linkedin</a> -->
                <a href="https://www.instagram.com/adopet.sb/" target="_blank"><i class="fab fa-instagram-square"></i> Instagram</a>
        </div>

    </div>

    <div class="box__copyright">
        <hr>
        <p>Todos los derechos reservados © 2024 <b>Erick Barahona</b></p>
    </div>
</footer>

</html>