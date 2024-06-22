<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['id_cargo'] != 1) {
    header('Location: ../login.php');
    exit();
}
?>

<?php 
    include("solicitudes/connection.php");
    $con=connection();

    $id=$_GET['id'];

    $sql="SELECT * FROM solicitudes WHERE id='$id'";
    $query=mysqli_query($con, $sql);

    $row=mysqli_fetch_array($query);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopcion</title>


    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>

    <link href="img/logos/LOGO.png" rel="icon">
    <link rel="stylesheet" href="css/solicitudes.css">
    <link rel="stylesheet" href="css/styleindex.css">
    <link rel="stylesheet" href="css/styleWyM.css">
    <link rel="stylesheet" href="css/iniciosesion.css">

        <link rel="stylesheet" href="solicitudes/CSS/estilos.css">
        <link rel="stylesheet" href="css/assets/css/style.css">
        <link rel="stylesheet" href="css/active.css">
        <link rel="stylesheet" href="css/agregar.css">
</head>

<!--Header - menu-->
<!-- <header>

    <div class="header-content">

        <div class="logo">
            <h1>Ado<b>Pet</b></h1>
        </div>

        <div class="menu" id="show-menu">

            <nav>
                <ul>
                    <li><a href="index.php"> <i class="fas fa-home"></i> Inicio</a></li>
                    <li><a href="comoadoptar.php"> <i class="fas fa-file-alt"></i>¿Como adoptar?</a></li>
                    <li><a href="mascotas.php"> <i class="fab fa-adopta"> </i>Mascotas</a></li>
                    <li><a href="contacto.php"> <i class="fas fa-file-alt"></i>Contacto</a></li>
                    <ul class="navbar-nav ml-auto ml-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <ion-icon name="person-outline"></ion-icon></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#"><?php echo $_SESSION['email']; ?></a>
                                <div class="dropdown-divider"></div>
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

</header> -->

<body>

<div class="l-navbar" id="navbar">
            <nav class="nav">
                <div>
                    <div class="nav__brand">
                        <ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle"></ion-icon>
                        <a href="#" class="nav__logo">Adopet</a>
                    </div>
                    <div class="nav__list">
                        <p class="perfil">
                            <img src="img/logos/LOGO.png" alt="">
                            <span class="nav__name"><?php echo $_SESSION['email']; ?></span>
                        </p>
                        <a href="../perfil_admin.php" class="nav__link" title="Dashboard">
                            <ion-icon name="home-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Dashboard</span>
                        </a>
                        <a href="../usuarios/index.php" class="nav__link" title="Usuarios">
                            <ion-icon name="people-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Usuarios</span>
                        </a>
                        <a href="../lista_mascotas.php" class="nav__link" title="Mascotas">
                        <ion-icon name="paw-outline" class="nav__icon"></ion-icon>
                        <span class="nav__name">Mascotas</span>
                        </a>
                        <a href="../contacto/index.php" class="nav__link" title="Contactos">
                            <ion-icon name="chatbox-ellipses-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Contactos</span>
                        </a>
                        <a href="index.php" class="nav__link active" title="Solicitudes">
                            <ion-icon name="folder-open-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Solicitudes</span>
                        </a>
                        <a href="adopciones/index.php" class="nav__link" title="Adopciones">
                            <ion-icon name="file-tray-stacked-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Adopciones</span>
                        </a>
                        <a href="../voluntarios/index.php" class="nav__link " title="Voluntarios">
                            <ion-icon name="hand-right-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Voluntarios</span>
                        </a>
                    </div>
                </div>

                <a href="../php/cerrar_admin.php" class="nav__link" title="Cerrar Sesion">
                    <ion-icon name="log-out-outline" class="nav__icon"></ion-icon>
                    <span class="nav__name">Cerrar Sesíon</span>
                </a>
            </nav>
        </div>
        <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="css/assets/js/main.js"></script>

        <ul class="breadcrumb">
            <li><a href="perfil_admin.php">Dashboard</a></li>
            <li><a href="solicitudes/index.php" active>Solicitudes</a></li>
            <li><a class="si" href="#" active>Observacion</a></li>

        </ul>
        <br>
        <br>
    <section class="container">
        <aside>
            <a href="javascript: history.go(-1)"><ion-icon name="arrow-back-circle-outline" title="Volver Atras"></ion-icon></a>
            <h1>SOLICITUD DE ADOPCION ANIMAL</h1> 
            
            <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
            <hr>
            <br>
            <h4>Por favor llenar las siguiente ENTREVISTA de adopcion</h4>
            <br>
            <br>
            <h5>Observaciones (FAVOR LEER)</h5>
            <p>-- Estos perros vienen DE LA CALLE O MALTRATO, consideralo por favor. ELLOS necesitan una FAMILIA, no
                dueños.</p>
            <p>--Cuando adoptas, estás dando una segunda oportunidad a un animal necesitado. Pero también estás
                asumiendo la responsabilidad de ser su héroe para siempre.</p>
        </aside>


        <form class="form" action="php/preguntas_be.php" method="POST" autocomplete="off">
            <!-- <form id="form" action="https://formsubmit.co/61e7ed3fe8d1c62d130abe6f556457e0" method="POST" autocomplete="off"> -->
            <h3>Informacion de la Mascota que quiero Adoptar:</h3>
            <div class="input-box">
                <label name="nombre_mascota">Nombre de la Mascota</label>
                <input type="text" name="nombre_mascota" placeholder="nombre_mascota" value="<?= $row['nombre_mascota']?>" readonly>
                <!-- <input type="text" pattern="[A-Za-zÑñÁáÉéÍíÓóÚú]+" title="Solo se pueden letras" name="nombre_mascota" placeholder="Ingresa tu respuesta" required=""> -->
            </div>

            <div class="input-box">
                <label name="raza">Raza de la Mascota</label>
                <input type="text" name="raza" placeholder="Raza" value="<?= $row['raza']?>" readonly>
                <!-- <input type="text" name="raza" placeholder="Ingresa tu respuesta" required=""> -->
            </div>
            <br>

            <div class="input-box" style="margin-top: 5px;" name="tipo_mascota">
                <label for="role" id="label-role" name="tipo_mascota" >
                    Tipo de mascota
                </label>
                <br>
                <br>
                <!-- <input type="radio" name="tipo_mascota" id="pets" value="perro" checked> Perro
                <input type="radio" name="tipo_mascota" id="pets" value="gato"> Gato
                <input type="radio" name="tipo_mascota" id="pets" value="conejo"> Conejo
                <input type="radio" name="tipo_mascota" id="pets" value="ave"> Ave
                <input type="radio" name="tipo_mascota" id="pets" value="other"> Otro -->
                <input type="text" name="tipo_mascota" placeholder="tipo_mascota" value="<?= $row['tipo_mascota']?>" readonly>
            </div>

            <br>
            <br>
            <h2>Datos del solicitante</h2>
            <div class="input-box">
                <label name="nombre">Nombre Completo</label>
                <input type="text" name="tipo_mascota" placeholder="tipo_mascota" value="<?= $row['nombre']?>" readonly>
                <!-- <input type="text" pattern="[A-Za-zÑñÁáÉéÍíÓóÚú]+" title="Solo se pueden letras" name="nombre" placeholder="Ingresa tu nombre completo" required=""> -->
            </div>

            <div class="input-box">
                <label name="correo">Correo Electronico</label>
                <input type="text" name="correo" placeholder="correo" value="<?= $row['correo']?>" readonly>
                <!-- <input type="email" name="correo" placeholder="Ingresa tu direccion de correo" required=""> -->
            </div>

            <div class="column">
                <div class="input-box">
                    <label name="telefono">Numero Telefonico</label>
                    <input type="tel" name="telefono" placeholder="telefono" value="<?= $row['telefono']?>" readonly>
                    <!-- <input type="tel" pattern="[0-9]{4}\s[0-9]{4}" title="(Debe tener 8 dígitos separados por un espacio en blanco)" name="telefono" placeholder="Ingresa tu numero telefonico" required=""> -->
                </div>

                <div class="input-box">
                    <label>Fecha de Nacimiento</label>
                    <input type="date" name="nacimiento" placeholder="nacimiento" value="<?= $row['nacimiento']?>" readonly>
                    <!-- <input type="date" name="nacimiento" placeholder="Ingresa tu Fecha de Nacimiento" required=""> -->
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label name="nacimiento">Ocupacion</label>
                    <input type="text" name="ocupacion" placeholder="ocupacion" value="<?= $row['ocupacion']?>" readonly>
                    <!-- <input type="text" name="ocupacion" placeholder="Ingresa tu ocupacion" required=""> -->
                </div>

                <div class="input-box">
                    <label name="horario">Horario en el que te podemos encontrar</label>
                    <input type="text" name="horario" placeholder="horario" value="<?= $row['horario']?>" readonly>
                    <!-- <input type="text" name="horario" placeholder="Ingresa tu horario en que estes en casa" required=""> -->
                </div>
            </div>

            <div class="input-box" style="margin-top: 5px;" name="genero">
            <br>
                <label for="role" id="label-role" name="genero">
                    Genero
                </label>
                <br>
                <br>
                <!-- <input type="radio" name="genero" id="genero" value="hombre" checked> Hombre
                <input type="radio" name="genero" id="genero" value="mujer"> Mujer
                <input type="radio" name="genero" id="genero" value="prefiero no decirlo"> Prefiero no decirlo -->
                <input type="text" name="genero" placeholder="genero" value="<?= $row['genero']?>" readonly>
            </div>

            <div class="input-box address">
                <label name="direccion">Direccion</label>
                <br>
                <a href="https://www.google.com/maps" target="_blank"><i class="fa fa-location-dot"
                        title="Google Maps"></i></a>
                    <input type="text" name="direccion1" placeholder="direccion1" value="<?= $row['direccion']?>" readonly>
                    <input type="text" name="direccion1" placeholder="direccion1" value="<?= $row['direccion1']?>" readonly>
                <!-- <input type="text" name="direccion" placeholder="Ingresa su direccion" required>
                <input type="text" name="direccion1" placeholder="Ingresa su direccion 2" required> -->
            </div>

            <br>
            <h4>Responder con total sinceridad</h4>
            <div class="input-box">
                <label name="familia">¿Tu familia esta de acuerdo con esta adopcion?</label>
                <input type="text" name="familia" placeholder="familia" value="<?= $row['familia']?>" readonly>
                <!-- <input type="text" name="familia" placeholder="Ingresa tu respuesta" required=""> -->
            </div>

            <div class="input-box">
                <label name="porque">¿Porque deseas adoptar?</label>
                <input type="text" name="porque" placeholder="porque" value="<?= $row['porque']?>" readonly>
                <!-- <input type="text" name="porque" placeholder="Ingresa tu respuesta" required=""> -->
            </div>

            <div class="input-box">
                <label name="mas_mascotas">¿Tienes mascotas en casa?</label>
                <input type="text" name="mas_mascotas" placeholder="mas_mascotas" value="<?= $row['mas_mascotas']?>" readonly>
                <!-- <input type="text" name="mas_mascotas" placeholder="Ingresa tu respuesta" required=""> -->
            </div>

            <div class="input-box">
                <label name="pasaria">¿Que pasaria con la mascota si tienes que cambiarte de casa o pais?</label>
                <input type="text" name="pasaria" placeholder="pasaria" value="<?= $row['pasaria']?>" readonly>
                <!-- <input type="text" name="pasaria" placeholder="Ingresa tu respuesta" required=""> -->
            </div>

            <div class="input-box">
                <label name="situacion_casa">¿Vives en casa propia o alquilada?</label>
                <input type="text" name="situacion_casa" placeholder="situacion_casa" value="<?= $row['situacion_casa']?>" readonly>
                <!-- <input type="text" name="situacion_casa" placeholder="Ingresa tu respuesta" required=""> -->
            </div>

            <div class="input-box">
                <label name="hobbies">¿Que haces en tus tiempos libres (hobbies)? ¿Cual de estos compartirias con
                    tus
                    mascotas?</label>
                    <input type="text" name="hobbies" placeholder="hobbies" value="<?= $row['hobbies']?>" readonly>
                <!-- <input type="text" name="hobbies" placeholder="Ingresa tu respuesta" required=""> -->
            </div>

            <div class="input-box">
                <label name="consideras">¿Porque consideras que debemos darte a esta mascota en adopcion?</label>
                <input type="text" name="consideras" placeholder="consideras" value="<?= $row['consideras']?>" readonly>
                <!-- <input type="text" name="consideras" placeholder="Ingresa tu respuesta" required=""> -->
            </div>

            <div class="input-box">
                <label name="mas_personas">¿Hay niños en casa? ¿De que edades? ¿Estan acostumbrados a convivir con
                    mascotas?</label>
                    <input type="text" name="mas_personas" placeholder="mas_personas" value="<?= $row['mas_personas']?>" readonly>
                <!-- <input type="text" name="mas_personas" placeholder="Ingresa tu respuesta" required=""> -->
            </div>

            <!-- <div class="input-box">
                <label>¿Porque deseas adoptar?</label>
                <input type="text" placeholder="Ingresa tu respuesta" required="">
            </div> -->

            <div class="input-box">
                <label name="vaciones">¿Que pasara con la mascota si sales de vacaciones?</label>
                <input type="text" name="vacaciones" placeholder="vacaciones" value="<?= $row['vacaciones']?>" readonly>
                <!-- <input type="text" name="vaciones" placeholder="Ingresa tu respuesta" required=""> -->
            </div>

            <div class="input-box">
                <label name="espacio">¿En que espacio va a dormir, comer y vivir tu mascota?</label>
                <input type="text" name="espacio" placeholder="espacio" value="<?= $row['espacio']?>" readonly>
                <!-- <input type="text" name="espacio" placeholder="Ingresa tu respuesta" required=""> -->
            </div>

            <div class="input-box">
                <label name="con_quien">¿Cuando no estes en casa, donde y con quien estara la mascota?</label>
                <input type="text" name="con_quien" placeholder="con_quien" value="<?= $row['con_quien']?>" readonly>
                <!-- <input type="text" name="con_quien" placeholder="Ingresa tu respuesta" required=""> -->
            </div>

            <div class="input-box">
                <label name="adoptar">Para ti,¿que es adoptar?</label>
                <input type="text" name="adoptar" placeholder="adoptar" value="<?= $row['adoptar']?>" readonly>
                <!-- <input type="text" name="adoptar" placeholder="Ingresa tu respuesta" required=""> -->
            </div>

            <div class="input-box">
                <label name="elegiste">¿Porque elegiste a esta mascota? En caso de que esta mascota haya sido
                    adoptado
                    al momento de recibir tu solicitud ¿a que otra mascota te gustaria darle la oportunidad?</label>
                <input type="text" name="elegiste" placeholder="elegiste" value="<?= $row['elegiste']?>" readonly>
                <!-- <input type="text" name="elegiste" placeholder="Ingresa tu respuesta" required=""> -->
            </div>

            <div class="input-box">
                <label name="amigo">Escribe el contacto (Telefono) de alguien que te conozca muy bien, que pueda dar
                    referencias sobre ti.</label>
                <input type="text" name="amigo" placeholder="amigo" value="<?= $row['amigo']?>" readonly>
                <!-- <input type="text" name="amigo" placeholder="Ingresa tu respuesta" required=""> -->
            </div>

            <br>
            <br>
            <!-- <a href="#" class="cta" type="submit" value="Enviar">
            <span>Enviar</span>
            <svg width="13px" height="10px" viewBox="0 0 13 10">
            <path d="M1,5 L11,5"></path>
            <polyline points="8 1 12 5 8 9"></polyline>
            </svg>
            </a> -->
            <!-- <button class="button button1" class="cta" type="submit" value="Enviar">Enviar</button> -->
            
            <!-- <input type="reset" value="Borrar"> -->

            <input type="hidden" name="_next" value="http://localhost/adopet/formulario.php" />
            <input type="hidden" name="_captcha" value="false" />

        </form>

    </section>

</body>

<!-- div del contacto de abajo derecha -->
<!-- <div class="container-redes">
    <a href="https://api.whatsapp.com/send?phone=94976009&text=¿Qué servicios ofrecen?" target="_blank">
        <img src="img/icon-whatsapp.png" title="Enviar mensaje de WhatsApp" alt="">
    </a>

    <a href="http://m.me/themagtimus" target="_blank">
        <img src="img/icon-messenger.png" alt="" title="Enviar mensaje por Messenger">
    </a>
</div> -->

<!-- pie de la pagina -->
<!-- <div class="container-footer">
    <footer>
        <div class="logo-footer">
            <img src="img/logos/LOGO.png" alt="">
        </div>

        <div class="redes-footer">
            <a href="#"><i class="fab fa-facebook-f icon-redes-footer"></i></a>
            <a href="#"><i class="fab fa-instagram icon-redes-footer"></i></a>
            <a href="#"><i class="fab fa-whatsapp icon-redes-footer"></i></a>
        </div>

        <hr>
        <h4>© 2024 Erick Barahona - Todos los Derechos Reservados</h4>

    </footer>
</div> -->

</html>