<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Categoría</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/nuevacategoria.css">
</head>
<body>
    <header class="header">
        <i class="letra-azul">Tienda Mass</i>
    </header>
    <main class="main">
        <div class="contenedor-izquierda">
            <a href="./admin.php">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="68" height="68" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M5 12l14 0" />
                    <path d="M5 12l6 6" />
                    <path d="M5 12l6 -6" />
                </svg>
            </a>
            <img src="../img/categorias.png" alt="Nueva categoria">
        </div>
        <div class="contenedor-derecha">
            <h2>AGREGAR UNA CATEGORIA</h2>
            <form method="POST" class="formulario">
                <div class="bloque1-formulario">
                    <div class="contenedor-campos">
                        <label for="nombre">NOMBRE:</label>
                        <input type="text" name="nombre" placeholder="Ingrese el nombre" required>
                    </div>

                    <button>AGREGAR CATEGORIA</button>
                </div>

                <div class="bloque2-formulario">
                    <label>FOTO:</label>
                    <img src="../img/categorias.png" alt="Foto de categoria">
                </div>
            </form>
        </div>
    </main>
</body>
</html>

<?php

    require "../config/conexion.php";
    require "../config/debuguear.php";

    $conn = conexionBD();

    if($_SERVER["REQUEST_METHOD"]==="POST"){
        $nombre = $_POST["nombre"];

        $query = "INSERT INTO categoria(nombre)VALUES('$nombre')";
        $resultado = mysqli_query($conn,$query);

        if($resultado){
            header("Location: ./admin.php");
        }
    }

?>