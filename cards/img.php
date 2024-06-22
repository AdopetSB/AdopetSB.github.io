<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Imagen</title>
</head>
<body>
    <form action="subir_imagen.php" method="post" enctype="multipart/form-data">
        <input type="file" name="imagen" accept="image/*">
        <button type="submit">Subir Imagen</button>
    </form>
</body>
</html>