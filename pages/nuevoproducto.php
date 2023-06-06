<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/nuevoproducto.css">
</head>
<body>
    <header class="header">
        <i class="letra-azul">Tienda Mass</i>
    </header>
    <main class="main">
        <div class="contenedor-izquierda">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="68" height="68" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M5 12l14 0" />
                <path d="M5 12l6 6" />
                <path d="M5 12l6 -6" />
            </svg>
            <img src="../img/productos.jpg" alt="Nuevo producto">
        </div>
        <div class="contenedor-derecha">
            <h2>REGISTRO DE UN PRODUCTO</h2>
            <form method="POST" class="formulario" enctype="multipart/form-data">
                <div class="bloque1-formulario">
                    <div class="contenedor-campos">
                        <label for="nombre">NOMBRE:</label>
                        <input type="text" name="nombre" placeholder="Ingrese el nombre" required>
                    </div>
                    <div class="contenedor-campos">
                        <label for="precio">PRECIO DE VENTA:</label>
                        <input type="number" name="precio_venta" placeholder="Ingrese el precio de venta" required>
                    </div>
                    <div class="contenedor-campos">
                        <label for="descripcion">DESCRIPCIÓN:</label>
                        <input type="text" name="descripcion_producto" placeholder="Ingrese la descripcion" required>
                    </div>
                    <div class="contenedor-campos">
                        <label for="stock">STOCK:</label>
                        <input type="number" name="stock" placeholder="Ingrese el stock" required>
                    </div>
                    <div class="contenedor-campos">
                        <label for="precio2">PRECIO DE COMPRA:</label>
                        <input type="number" name="precio_compra" placeholder="Ingrese el precio de compra" required>
                    </div>

                    <input type="file" name="imagen" accept="image/jpeg, image/png">

                    <input type="submit" value="GUARDAR PRODUCTO">
                </div>

                <div class="bloque2-formulario">
                    <label>FOTO:</label>
                    <img src="../img/productos.jpg" alt="Foto de producto">
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
        $precio_venta = $_POST["precio_venta"];
        $descripcion_producto = $_POST["descripcion_producto"];
        $stock = $_POST["stock"];
        $precio_compra = $_POST["precio_compra"];
        $id_proveedor = 2;
        $id_marca = 1;
        $id_subcategoria = 1;

        $imagen = $_FILES["imagen"];

        $carpetaProductos = "../productos";

        if(!is_dir($carpetaProductos)){
            mkdir($carpetaProductos);
        }

        $nombreImagen = md5(uniqid(rand(),true)) . ".jpg";

        move_uploaded_file($imagen["tmp_name"],$carpetaProductos . "/". $nombreImagen);

        $query = "INSERT INTO producto(nombre,precio_venta,descripcion_producto,stock,precio_compra,id_proveedor,id_marca,id_subcategoria,imagen)VALUES('$nombre','$precio_venta','$descripcion_producto','$stock','$precio_compra',$id_proveedor,$id_marca,$id_subcategoria,'$nombreImagen')";
        $resultado = mysqli_query($conn,$query);
        if($resultado){
            header("Location: ./admin.php");
        }
    }

?>