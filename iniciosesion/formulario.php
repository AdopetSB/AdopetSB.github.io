<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['id_cargo'] != 0) {
    header('Location: ../login.php');
    exit();
}
?>

<?php
include("../Perros/connection.php");
$con = connection();

// Capturar el ID de la URL
$id = $_GET['id'];

// Primera consulta
$sql_mascotas = "SELECT * FROM mascotas WHERE id = '$id'";
$query_mascotas = mysqli_query($con, $sql_mascotas);

// Segunda consulta
$sql_perfilusuario = "SELECT * FROM perfilusuario WHERE correo = '".$_SESSION["email"]."'";
$query_perfilusuario = mysqli_query($con, $sql_perfilusuario);

?>





<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopcion</title>


    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="../img/logos/LOGO.png" rel="icon">

    <link rel="stylesheet" href="../css/solicitudes.css">
    <link rel="stylesheet" href="../css/styleindex.css">
    <link rel="stylesheet" href="../css/styleWyM.css">
    <link rel="stylesheet" href="../css/iniciosesion.css">
    <link rel="stylesheet" href="../css/formulario.css">
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
                    <li><a href="contacto.php"> <i class="fas fa-file-alt"></i>Contacto</a></li>
                    <!-- <li><a href="login.php"> <i class="fas fa-file-alt"></i>Login/Registro</a></li> -->
                    <ul class="navbar-nav ml-auto ml-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <ion-icon name="person-outline"></ion-icon></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#"><?php echo $_SESSION['email']; ?></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="perfil/perfil.php?id=<?php echo $row['id']; ?>">Perfil</a>
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

<script>
        // Mostrar notificación temporal y más pequeña para completar el perfil
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'info',
            title: 'Completa tu perfil',
            text: 'Por favor, completa tu perfil para acceder a todas las funcionalidades.',
            footer: '<a href="../perfil/perfil.php" style="color: blue;">Completar Perfil</a>',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            customClass: {
                popup: 'my-popup-class',
                title: 'my-title-class',
                icon: 'my-icon-class',
                footer: 'my-footer-class'
            }
        });
    </script>

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


        <form class="form" action="../php/preguntas_be.php" method="POST" autocomplete="off">
            <!-- <form id="form" action="https://formsubmit.co/61e7ed3fe8d1c62d130abe6f556457e0" method="POST" autocomplete="off"> -->
            <h3>Informacion de la Mascota que quiero Adoptar:</h3>
            <?php while ($row_mascotas = mysqli_fetch_array($query_mascotas)): ?>
            <?php 
            $row_perfilusuario = mysqli_fetch_array($query_perfilusuario); ?>
            <div class="mascota">
            <div class="input-box">
                <label name="nombre_mascota">Nombre de la Mascota</label>
                <input type="text" pattern="[A-Za-zÑñÁáÉéÍíÓóÚú\s]+" title="Solo se pueden letras" name="nombre_mascota" placeholder="Ingresa tu respuesta" value="<?= $row_mascotas['nombre']?>" readonly>
            </div>

            <div class="input-box">
                <label name="raza">Raza de la Mascota</label>
                <input type="text" pattern="[A-Za-zÑñÁáÉéÍíÓóÚú\s]+" title="Solo se pueden letras" name="raza" placeholder="Ingresa tu respuesta" value="<?= $row_mascotas['raza']?>" readonly>
            </div>
            <br>

            <div class="input-box" style="margin-top: 5px;" name="tipo_mascota">
                <label for="role" id="label-role" name="tipo_mascota" >
                    Tipo de mascota
                </label>
                <input type="text" pattern="[A-Za-zÑñÁáÉéÍíÓóÚú\s]+" title="Solo se pueden letras" name="tipo_mascota" placeholder="Ingresa tu respuesta" value="<?= $row_mascotas['tipo_mascota']?>" readonly>
            </div>
            
            <br>
            <br>
            <?php if ($row_perfilusuario): ?>
            <h2>Datos del solicitante</h2>
            <div class="input-box">
                <label name="nombre">Nombre Completo</label>
                <input type="text" pattern="[A-Za-zÑñÁáÉéÍíÓóÚú\s]+" title="Solo se pueden letras" name="nombre" placeholder="Ingresa tu nombre completo" value="<?= $row_perfilusuario['nombre_completo']?>" readonly>
            </div>

            <div class="input-box">
                <label name="correo">Correo Electronico</label>
                <input type="email" title="No te olvides del @" name="correo" placeholder="Ingresa tu direccion de correo" value="<?= $row_perfilusuario['correo']?>" readonly>
            </div>

            <div class="column">
                <div class="input-box">
                    <label name="telefono">Numero Telefonico</label>
                    <input type="tel" pattern="[0-9]{4}[0-9]{4}" title="(Debe tener 8 dígitos)" name="telefono" placeholder="Ingresa tu numero telefonico"  value="<?= $row_perfilusuario['telefono']?>" readonly>
                </div>

                <div class="input-box">
                    <label>Fecha de Nacimiento</label>
                    <input type="date" name="nacimiento" placeholder="Ingresa tu Fecha de Nacimiento" value="<?= $row_perfilusuario['fecha_nacimiento']?>" readonly>
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label name="nacimiento">Ocupacion</label>
                    <input type="text" pattern="[A-Za-zÑñÁáÉéÍíÓóÚú\s]+" title="Solo se pueden letras" name="ocupacion" placeholder="Ingresa tu ocupacion" value="<?= $row_perfilusuario['ocupacion']?>" readonly>
                </div>

                <div class="input-box">
                    <label name="horario">Horario en el que te podemos encontrar</label>
                    <input type="text"pattern="[A-Za-zÑñÁáÉéÍíÓóÚú\s]+" title="Solo se pueden letras" name="horario" placeholder="Ingresa tu horario en que estes en casa" value="<?= $row_perfilusuario['horario']?>" readonly>
                </div>
            </div>

            <div class="input-box" style="margin-top: 5px;" name="genero">
            <br>
                <label for="role" id="label-role" name="genero">
                    Genero
                </label>
                <input type="text"pattern="[A-Za-zÑñÁáÉéÍíÓóÚú\s]+" title="Solo se pueden letras" name="horario" placeholder="Ingresa tu genero" value="<?= $row_perfilusuario['genero']?>" readonly>
                <!-- <br>
                <br>
                <input type="radio" name="genero" id="genero" value="Hombre" checked> Hombre
                <input type="radio" name="genero" id="genero" value="Mujer"> Mujer
                <input type="radio" name="genero" id="genero" value="Prefiero no decirlo"> Prefiero no decirlo -->
            </div>

            <div class="input-box address">
                <label name="direccion">Direccion</label>
                <br>
                <a href="https://www.google.com/maps" target="_blank"><i class="fa fa-location-dot"
                        title="Google Maps"></i></a>
                <input type="text" pattern="[A-Za-zÑñÁáÉéÍíÓóÚú.,\s]+" title="Solo se pueden letras" name="direccion" placeholder="Ingresa su direccion" value="<?= $row_perfilusuario['direccion']?>" readonly>
                <input type="text" pattern="[A-Za-zÑñÁáÉéÍíÓóÚú.,\s]+" title="Solo se pueden letras" name="direccion1" placeholder="Ingresa su direccion 2" value="<?= $row_perfilusuario['direccion1']?>" readonly>
            </div>

            <?php endif; ?>
            </div>
            <?php endwhile; ?>

            <br>
            <h4>Responder con total sinceridad</h4>
            <div class="input-box">
                <label name="familia">¿Tu familia esta de acuerdo con esta adopcion?</label>
                                <select name="familia" id="familia">
                                    <option value="" disabled selected>Elige una opción</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                    <!-- <option value="opcion3">Opción 3</option>
                                    <option value="opcion4">Opción 4</option> -->
                                </select>
            </div>

            <div class="input-box">
                <label name="porque">¿Porque deseas adoptar?</label>
                <input type="text" name="porque" placeholder="Ingresa tu respuesta" required="">
            </div>

            <div class="input-box">
                <label name="mas_mascotas">¿Tienes mascotas en casa?</label>
                    <select name="mas_mascotas" id="mas_mascotas">
                                    <option value="" disabled selected>Elige una opción</option>
                                    <option value="Si tengo">Si tengo mascotas</option>
                                    <option value="No tengo">No tengo mascotas</option>
                                    <!-- <option value="opcion3">Opción 3</option>
                                    <option value="opcion4">Opción 4</option> -->
                                </select>
                <!-- <input type="text" name="mas_mascotas" placeholder="Ingresa tu respuesta" required=""> -->
            </div>

            <div class="input-box">
                <label name="pasaria">¿Que pasaria con la mascota si tienes que cambiarte de casa o pais?</label>
                <input type="text" name="pasaria" placeholder="Ingresa tu respuesta" required="">
            </div>

            <div class="input-box">
                <label name="situacion_casa">¿Vives en casa propia o alquilada?</label>
                    <select name="situacion_casa" id="situacion_casa">
                                    <option value="" disabled selected>Elige una opción</option>
                                    <option value="Propia">Vivienda propia</option>
                                    <option value="Alquilada">Vivienda alquilada</option>
                                    <option value="Familiar">Vivienda familiar</option>
                                    <!-- <option value="opcion4">Opción 4</option> -->
                                </select>
                <!-- <input type="text" name="situacion_casa" placeholder="Ingresa tu respuesta" required=""> -->
            </div>

            <div class="input-box">
                <label name="hobbies">¿Que haces en tus tiempos libres (hobbies)? ¿Cual de estos compartirias con tus mascotas?</label>
                <input type="text" name="hobbies" placeholder="Ingresa tu respuesta" required="">
            </div>

            <div class="input-box">
                <label name="consideras">¿Porque consideras que debemos darte a esta mascota en adopcion?</label>
                <select name="consideras" id="consideras">
                                    <option value="" disabled selected>Elige una opción</option>
                                    <option value="Necesito que cuide la casa">Necesito que cuide la casa</option>
                                    <option value="Quiero un amigo fiel y su compañia ">Quiero un amigo fiel y su compañia</option>
                                    <option value="Mis hijos quieren un perro">Mis hijos quieren un perro</option>
                                    <!-- <option value="opcion4">Opción 4</option> -->
                                </select>
                <!-- <input type="text" name="consideras" placeholder="Ingresa tu respuesta" required=""> -->
            </div>

            <div class="input-box">
                <label name="mas_personas">¿Hay niños en casa? ¿Estan acostumbrados a convivir con
                    mascotas?</label>
                    <select name="mas_personas" id="mas_personas">
                                    <option value="" disabled selected>Elige una opción</option>
                                    <option value="Si hay niños y si estan acostumbrados">Si hay niños y si estan acostumbrados a las mascotas</option>
                                    <option value="Si hay niños y no estan acostumbrados">Si hay niños y no estan acostumbrados a las mascotas</option>
                                    <option value="No hay niños">No hay niños en casa</option>
                                    <!-- <option value="opcion4">Opción 4</option> -->
                                </select>
                <!-- <input type="text" name="mas_personas" placeholder="Ingresa tu respuesta" required=""> -->
            </div>

            <!-- <div class="input-box">
                <label>¿Porque deseas adoptar?</label>
                <input type="text" placeholder="Ingresa tu respuesta" required="">
            </div> -->

            <div class="input-box">
                <label name="vacaciones">¿Que pasara con la mascota si sales de vacaciones?</label>
                <input type="text" name="vacaciones" placeholder="Ingresa tu respuesta" required="">
            </div>

            <div class="input-box">
                <label name="espacio">¿En que espacio va a dormir, comer y vivir tu mascota?</label>
                <select name="espacio" id="espacio">
                                    <option value="" disabled selected>Elige una opción</option>
                                    <option value="En el patio, en un lugar techado">En el patio, en un lugar techado</option>
                                    <option value="El tendría su propio espacio dentro de la casa">El tendría su propio espacio dentro de la casa</option>
                                    <option value="Considero que no es importante el espacio en el que se encuentre">Considero que no es importante el espacio en el que se encuentre</option>
                                    <option value="No lo he pensado">No lo he pensado</option>
                                </select>
                <!-- <input type="text" name="espacio" placeholder="Ingresa tu respuesta" required=""> -->
            </div>

            <div class="input-box">
                <label name="con_quien">¿Cuando no estes en casa, donde y con quien estara la mascota?</label>
                <input type="text" name="con_quien" placeholder="Ingresa tu respuesta" required="">
            </div>

            <div class="input-box">
                <label name="adoptar">Para ti,¿que es adoptar?</label>
                <input type="text" name="adoptar" placeholder="Ingresa tu respuesta" required="">
            </div>

            <div class="input-box">
                <label name="elegiste">¿Porque elegiste a esta mascota? En caso de que esta mascota haya sido
                    adoptado
                    al momento de recibir tu solicitud ¿a que otra mascota te gustaria darle la oportunidad?</label>
                <input type="text" name="elegiste" placeholder="Ingresa tu respuesta" required="">
            </div>

            <div class="input-box">
                <label name="amigo">Escribe el contacto (Nombre, Telefono) de alguien que te conozca muy bien, que pueda dar
                    referencias sobre ti.</label>
                <input type="text" name="amigo" placeholder="Ingresa tu respuesta" required="">
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
            <button class="button button1" class="cta" type="submit" value="Enviar">Enviar</button>
            <!-- <input type="reset" value="Borrar"> -->

            <input type="hidden" name="_next" value="http://localhost/adopet/formulario.php" />
            <input type="hidden" name="_captcha" value="false" />


            <!-- Script para manejar los mensajes de estado -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
        function getParameterByName(name) {
            const url = new URL(window.location.href);
            return url.searchParams.get(name);
        }

        const status = getParameterByName('status');

        if (status === 'success') {
            Swal.fire({
                toast: true,
                position: "top-end",
                icon: "success",
                title: "Informacion enviada, Espere respuestas.",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                customClass: {
                    popup: "my-popup-class",
                    title: "my-title-class",
                    icon: "my-icon-class"
                }
            });
        } else if (status === 'error') {
            Swal.fire({
                toast: true,
                position: "top-end",
                icon: "error",
                title: "Error en el envio",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                customClass: {
                    popup: "my-popup-class",
                    title: "my-title-class",
                    icon: "my-icon-class"
                }
            });
        }
    </script>
    <style>
        .my-popup-class {
            background-color: #f8d7da; /* Fondo rosado claro */
            border: 1px solid #f5c6cb; /* Borde rosado */
        }
        .my-title-class {
            color: #721c24; /* Texto color rojo oscuro */
        }
        .my-icon-class {
            color: #f5c6cb; /* Color del icono */
        }
    </style>

        </form>

    </section>

</body>

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
</div>

</html>