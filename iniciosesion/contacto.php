<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['id_cargo'] != 0) {
    header('Location: ../login.php');
    exit();
}
?>

<?php 
include("../perfil/connection.php");
$con = connection();

$sql = "SELECT * FROM perfilusuario";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contacto</title>

    <link href="../img/logos/LOGO.png" rel="icon">
    
    <link rel="stylesheet" href="../css/contacto.css" />
    <link rel="stylesheet" href="../css/styleindex.css" />
    <link rel="stylesheet" href="../css/styleWyM.css" />
    <link rel="stylesheet" href="../css/iniciosesion.css">

    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>

            <!--Header - menu-->
        <header>

            <div class="header-content">

            <div class="logo">
                <h1>Ado<b>Pet</b></h1>
            </div>

            <div class="menu" id="show-menu">
                <nav>
                    <ul>
                        <li><a href="../Adopet.php"> <i class="fas fa-home"></i> Inicio</a></li>
                        <li><a href="adoptar.php"> <i class="fas fa-file-alt"></i>¿Como adoptar?</a></li>
                        <li><a href="mascotas.php"> <i class="fab fa-adopta"> </i>Mascotas</a></li>
                        <li class="menu-selected"><a href="contacto.php" class="text-menu-selected"> 
                            <i class="fas fa-file-alt"></i>Contacto</a></li>
                        <!-- <li><a href="login.php"> <i class="fas fa-file-alt"></i>Login/Registro</a></li> -->
                        <ul class="navbar-nav ml-auto ml-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <ion-icon name="person-outline"></ion-icon></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#"><?php echo $_SESSION['email']; ?></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../perfil/perfil.php?id=<?php echo $row['id']; ?>">Perfil</a>
                                <a class="dropdown-item" href="../php/cerrar_sesion.php">Salir</a>
                            </div>
                        </ul>

                    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
                    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script> 
                    </ul>
                </nav>
            </div>
            </div>

        <div id="icon-menu">
            <i class="fas fa-bars"></i>
        </div>

        </header>

        <body>
            
            <div class="container">
                <span class="big-circle"></span>
                <!-- <img src="img/shape.png" class="square" alt="" /> -->
            <div class="form">
            <div class="contact-info">
                <h3 class="title">Pongámonos en contacto</h3>
                <p class="text">
                    ¡No dudes en ponerte en contacto con nosotros!.
                </p>

            <div class="info">
            <div class="information">
                <img src="../img/contact/vubi.gif" class="icon" alt="" />
                <p>Santa Barabara, Galeras, Col. El Rosario.</p>
            </div>
            
            <div class="information">
                <img src="../img/contact/vemail.gif" class="icon" alt="" />
                    <p>AdoPet@gmail.com</p>
            </div>
            
            <div class="information">
                <img src="../img/contact/vcel.gif" class="icon" alt="" />
                    <p>+504 9497-6009</p>
            </div>
            </div>

            <div class="social-media">
                <p>Nuestras redes sociales:</p>
            <div class="social-icons">
                <a href="#">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#">
                    <i class="fab fa-instagram"></i>
                </a>
                <!-- <a href="#">
                    <i class="fab fa-linkedin-in"></i>
                </a> -->
            </div>
            </div>
        </div>

            <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>
            
                <!-- <form action="https://formsubmit.co/61e7ed3fe8d1c62d130abe6f556457e0" method="POST" autocomplete="off"> -->
                <form action="../php/contacto_admin.php" method="POST" autocomplete="off"> 
                    <input type="hidden" name="_template" value="table">
                        <h3 class="title">Contactanos</h3>
            <div class="input-container">
                <input type="text" name="nombre" pattern="[A-Za-zÑñÁáÉéÍíÓóÚú\s]+" title="Solo se pueden letras" class="input" title="Escribe tu Nombre"/>
                    <label for="">Nombre</label>
                    <span>Nombre Completo</span>
            </div>
            
            <div class="input-container">
                <input type="email" title="No te olvides del @" name="email" class="input" title="Escribe tu Email"/>
                <label for="">Email</label>
                <span>Email</span>
            </div>
            
            <div class="input-container">
                <input type="tel" pattern="[0-9]{4}[0-9]{4}" title="(Debe tener 8 dígitos)" name="telefono" class="input" title="Escribe tu Telefono"/>
                <label for="">Telefono</label>
                <span>Numero De Telefono</span>
            </div>
            
            <div class="input-container textarea">
            <form method="post" action="vacio.php">
                <textarea name="mensaje"  class="input" title="Escribe el Mensaje" required=""></textarea>
                <label for="">Mensaje</label>
                <span>Mensaje</span>
            </div>
                <input type="submit" value="Enviar" class="btn" />

                <input type="hidden" name="_next" value="http://localhost/adopet/contacto.php" />
                <input type="hidden" name="_captcha" value= "false" />


            </form>
            <!-- </form> -->
        </div>
        </div>
    </div>

        <script src="../js/contacto.js"></script>
    </body>

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
            window.location = "iniciosesion/contacto.php";
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
            window.location = "iniciosesion/contacto.php";
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

    <!-- div del contacto de abajo derecha -->
    <div class="container-redes">
        <a href="https://api.whatsapp.com/send?phone=94976009&text=¿Qué servicios ofrecen?" target="_blank">    
            <img src="../img/icon-whatsapp.png" title="Enviar mensaje de WhatsApp" alt="">
        </a>
        
        <a href="http://m.me/themagtimus" target="_blank">
            <img src="../img/icon-messenger.png" alt="" title="Enviar mensaje por Messenger">
        </a>
    </div>

    <!-- pie de la pagina -->
    <div class="container-footer">	
        <footer>
            <div class="logo-footer">
                <img src="../img/logos/LOGO.png" alt="">
            </div>

            <div class="redes-footer">
                <a href="https://www.facebook.com/profile.php?id=61560919176195" target="_blank"><i class="fab fa-facebook-f icon-redes-footer"></i></a>
                <!-- <a href="#"><i class="fab fa-google icon-redes-footer"></i></a>  -->
                <a href="https://www.instagram.com/adopet.sb/" target="_blank"><i class="fab fa-instagram icon-redes-footer"></i></a>
                <a href="https://api.whatsapp.com/send?phone=94976009&text=¿Qué servicios ofrecen?" target="_blank"><i class="fab fa-whatsapp icon-redes-footer"></i></a>
            </div>

            <hr>
            <h4>© 2024 Erick Barahona - Todos los Derechos Reservados</h4>

    </footer>
</html>
