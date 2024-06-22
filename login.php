<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/stylelogin.css" />
    <link rel="stylesheet" href="css/styleindex.css">
    <link href="img/logos/LOGO.png" rel="icon">
    <title>Login</title>

</head>
<body>

      <!--Header - menu-->
      <header>

        <div class="header-content">

            <div class="logo">
                <h1>Ado<b>Pet</b></h1>
            </div>

            <div class="menu" id="show-menu">

                <nav>
                    <ul class="menu-selected" class="text-menu-selected" >
                        <li><a href="index.php"> <i class="fas fa-home"></i> Inicio</a></li>
                        <li><a href="comoadoptar.php"> <i class="fas fa-file-alt"></i>¿Como adoptar?</a></li>
                        <li><a href="mascotas.php"> <i class="fab fa-adopta"> </i>Mascotas</a></li>
                        <li><a href="contacto.php"> <i class="fas fa-headset"></i> Contacto</a></li>
                        <!-- <li><a href="login.html"> <i class="fas fa-file-alt"></i>Login/Registro</a></li> -->
                    </ul>
                </nav>
                
            </div>

        </div>

        <div id="icon-menu">
            <i class="fas fa-bars"></i>
        </div>

    </header>

    <!-- div del js -->
    <div class="container">
        <div class="forms-container">
        <div class="signin-signup">

            <!-- inicio de sesión -->

            <form action="php/login_be.php" method="POST" class="sign-in-form">
              <h2 class="title">Inicia sesión</h2>
              <!-- informacion -->
              <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="email" title="No te olvides del @"  placeholder="Correo Electronico"  name="email" required=""/>
              </div>
              <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" minlength="4" maxlength="12" placeholder="Contraseña" name="password" required=""/>
              </div>
              <input type="submit" value="Iniciar sesión" class="btn solid" />
              <!-- <p class="social-text">Iniciar sesión con plataformas sociales</p> -->
              <!-- redes sociales -->
              <!-- <div class="social-media">
                <a href="#" class="social-icon">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-icon">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-icon">
                  <i class="fab fa-google"></i>
                </a>
              </div> -->
            </form>

            <!-- registro  -->
            <form action="php/registro_be.php" method="POST" class="sign-up-form" id="registro">
              <h2 class="title">Registro</h2>
              <!-- campos para informacion -->
              <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" pattern="[A-Za-zÑñÁáÉéÍíÓóÚú\s]+" title="Solo se pueden letras" placeholder="Nombre Completo" name="usuario" id="usuario"/>
              </div>
              <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input type="email"  title="No te olvides del @" placeholder="Correo Electronico" name="email" id="email"/>
              </div>
              <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" title="Debe tener 4 caracteres como minimo, 12 como maximo" minlength="4" maxlength="12" placeholder="Contraseña" name="password" id="passqord"/>
              </div>
              <input type="submit" class="btn" value="Registrarse" />
              <!-- <p class="social-text">Registro con plataformas sociales</p> -->
              <!-- botones redes sociales -->
              <!-- <div class="social-media">
                <a href="#" class="social-icon">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-icon">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-icon">
                  <i class="fab fa-google"></i>
                </a>
              </div> -->
            </form>
          </div>
        </div>
        <!-- comentarios de arriba -->
        <div class="panels-container">
          <div class="panel left-panel">
            <div class="content">
              <!-- comentario de inicio sesión -->
              <h3>¿ERES NUEVO?</h3>
              <p>
                "En los ojos de una mascota, encontrarás el reflejo puro del amor."
              </p>
              <!-- boton para ir a registro -->
              <!-- segunda const del js -->
              <button class="btn transparent" id="sign-up-btn">
                UNETÉ
              </button>
            </div>
            <!-- imagen inicio sesión -->
            <img src="img/dog.svg" class="image" alt="" />
          </div>
          <!-- comentario registro -->
          <div class="panel right-panel">
            <div class="content">
              <h3>¿Eres uno de nosotros?</h3>
              <p>
                "Una mascota es un recordatorio constante de que el amor verdadero no necesita palabras."
              </p>
              <!-- boton comentario -->
              <!-- boton del primer const en el js -->
              <button class="btn transparent" id="sign-in-btn"> 
                Inicia sesión
              </button>
            </div>
            <!-- imagen comentario -->
            <img src="img/cat.svg" class="image" alt="" />
          </div>
        </div>
      </div>
      
      <!-- llamado documento js -->
      <script src="js/app.js"></script>

<    <!-- Script para manejar los mensajes de error -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function getParameterByName(name) {
            const url = new URL(window.location.href);
            return url.searchParams.get(name);
        }

        const error = getParameterByName('error');
        const success = getParameterByName('success');

        if (error === 'invalid_credentials') {
            Swal.fire({
                toast: true,
                position: "top-end",
                icon: "error",
                title: "Correo o contraseña no existente",
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
                window.location = "login.php";
            });
        } else if (error === 'email_registered') {
            Swal.fire({
                toast: true,
                position: "top-end",
                icon: "error",
                title: "Este correo ya está registrado",
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
                window.location = "login.php";
            });
        } else if (error === 'user_registered') {
            Swal.fire({
                toast: true,
                position: "top-end",
                icon: "error",
                title: "Este usuario ya está registrado",
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
                window.location = "login.php";
            });
        } else if (success === 'registered') {
            Swal.fire({
                toast: true,
                position: "top-end",
                icon: "success",
                title: "Registro exitoso",
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
</body>
</html>