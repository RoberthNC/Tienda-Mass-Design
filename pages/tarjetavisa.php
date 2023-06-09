<?php

    session_start();
    error_reporting(0);

    $_SESSION["idFormaPago"] = 2;

    require "../config/conexion.php";
    require "../config/debuguear.php";

    $conn = conexionBD();

    $id = $_SESSION["id"];
    //Obtenemos la dirección
    $queryCliente = "SELECT * FROM cliente WHERE id_cliente='$id'";
    $resultadosCliente = mysqli_query($conn, $queryCliente);
    $datosCliente = mysqli_fetch_assoc($resultadosCliente);

    $nombre = $_SESSION["nombre"];

    if($_SERVER["REQUEST_METHOD"]==="POST"){
        $monto = $_SESSION["subtotal"];
        $monto_igv = $_SESSION["igv"];
        $id_cliente = $_SESSION["id"];
        $id_forma_pago = $_SESSION["idFormaPago"];
        $id_tipo_entrega = $_SESSION["idTipoEntrega"];
        $fecha_compra = date("Y-m-d");
        $queryPedido = "INSERT INTO pedido(estado,monto,monto_igv,id_cliente,id_forma_pago,id_tipo_entrega,fecha_compra)VALUES('CO','$monto','$monto_igv','$id_cliente','$id_forma_pago','$id_tipo_entrega','$fecha_compra')";

        //Ejecutamos el query
        $resultadosPagoPedido = mysqli_query($conn,$queryPedido);

        if($resultadosPagoPedido){
            //Reiniciamos los valores
            $_SESSION["arregloIdProductos"] = [];
            $_SESSION["subtotal"] = 0;
            $_SESSION["igv"] = 0;

            header("Location: ./index.php");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarjeta Visa</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/carrito.css">
</head>
<body>
    <header class="header">
        <div class="logo">
            <h1>
                <a href="./index.php">
                    <i class="letra-azul">Mass</i>
                </a>
            </h1>
        </div>
        <nav class="navegacion">
            <div class="block">
                <a href="" class="letra-azul">Catálogo</a>
                <a href="./contacto.php" class="letra-azul">Contáctanos</a>
                <a href="./nosotros.php" class="letra-azul">Nosotros</a>
            </div>
            <div class="block">
                <a href="./login.php" class="letra-azul">
                    <span class="icon-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#25318C" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        </svg>
                        <p>
                            <?php
                                echo $nombre;
                            ?>
                        </p>
                    </span>
                </a>
                <a href="./carrito.php" class="letra-azul">
                    <span class="icon-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#25318C" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M17 17h-11v-14h-2" />
                            <path d="M6 5l14 1l-1 7h-13" />
                        </svg>
                        <p>Carrito</p>
                    </span>
                </a>
            </div>
        </nav>
    </header>

    <main style="margin-top: 15rem; padding:2.5rem 30px;">
        <h2 style="text-align:center;">Pago</h2>
        <div style="display: flex; justify-content: space-around; margin-top:30px;">
            <!-- Lado Izquierdo -->
            <div style="display: flex; flex-direction: column; gap:50px;">
                <div>
                    <p style="margin-bottom: 5px; font-weight: bold;">SELECCIONAR TARJETA</p>
                    <div style="display: flex; flex-direction: column; gap:10px; border:solid 2px black; padding:10px 20px;">
                        <div style="display: flex; align-items:center; gap:5px;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-credit-card" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M3 5m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z" />
                                <path d="M3 10l18 0" />
                                <path d="M7 15l.01 0" />
                                <path d="M11 15l2 0" />
                            </svg>
                            <a href="./tarjetamass.php" style="background-color:white; border-radius:5px; cursor: pointer; border:2px solid black; padding:3px 10px;">Tarjeta Mass</a>
                        </div>
                        <div style="display: flex; align-items:center; gap:5px;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-credit-card" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M3 5m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z" />
                                <path d="M3 10l18 0" />
                                <path d="M7 15l.01 0" />
                                <path d="M11 15l2 0" />
                            </svg>
                            <a href="./tarjetavisa.php" style="background-color:#bdf76c;  border-radius:5px; cursor: pointer; border:2px solid black; padding:3px 10px;">Tarjeta Visa</a>
                        </div>
                    </div>

                    <div style="margin-top:10px;">
                        <p style="margin-bottom: 5px; font-weight: bold;">TUS DATOS DE PAGO: <span style="font-weight: bold;">Tarjeta Visa</span></p>
                        <form method="POST" style="border:2px solid black; padding:10px 20px; display:flex; flex-direction: column; row-gap:10px;">
                            <div style="display: flex; flex-direction: column; row-gap:5px;">
                                <label for="titular">Titular de la tarjeta</label>
                                <input type="text" name="titular" placeholder="Ej. Rodolfo Rivera" required style="border-radius: 5px; padding:5px;">
                            </div>
                            <div style="display: flex; flex-direction: column; row-gap:5px;">
                                <label for="tarjeta">Número de la tarjeta</label>
                                <input type="number" name="tarjeta" placeholder="XXXX XXXX XXXX XXXX" maxlength="16" required style="border-radius: 5px; padding:5px;">
                            </div>

                            <div style="display: flex; column-gap: 10px;">
                                <div style="display: flex; flex-direction: column; row-gap:5px;">
                                    <label for="mes_vencimiento">Mes de vencimiento</label>
                                    <input type="number" name="mes" maxlength="2" placeholder="MM" required style="border-radius: 5px; padding:5px;">
                                </div>
                                <div style="display: flex; flex-direction: column; row-gap:5px;">
                                    <label for="anio_vencimiento">Año de vencimiento</label>
                                    <input type="number" name="anio" maxlength="4" placeholder="YYYY" required style="border-radius: 5px; padding:5px;">
                                </div>
                            </div>

                            <div style="display: flex; flex-direction: column; row-gap:5px;">
                                <label for="cvv">CVV</label>
                                <input type="number" name="cvv" maxlength="3" placeholder="Ej. 123" required style="border-radius: 5px; padding:5px;">
                            </div>

                            <input type="submit" style="border-radius: 5px; padding:5px;" value="Pagar Ahora">
                        </form>
                    </div>
                </div>
            </div>
            <!-- Lado Derecho -->
            <div>
                <p>Resumen de la Orden</p>
                <div style="padding:20px; border:2px solid black; margin-top:10px; display:flex; flex-direction: column; gap:1rem;">

                    <?php
                        
                        foreach($_SESSION["arregloIdProductos"] as $idProductoActual){
                            $queryProductoActual = "SELECT * FROM producto WHERE id_producto='$idProductoActual'";
                            $resultadosProductoActual = mysqli_query($conn, $queryProductoActual);
                            $datosProductoActual = mysqli_fetch_assoc($resultadosProductoActual);
                    ?>
                        <!-- Este div es el que se va a generar por la bd -->
                        <div class="contenido-producto">
                            <img src="../productos/<?php echo $datosProductoActual['imagen'];?>" alt="Producto" style="height:150px; width:75px;">
                            <div class="descripcion-producto">
                                <p><?php echo $datosProductoActual['nombre'];?></p>
                                <p><?php echo $datosProductoActual['nombre'];?></p>
                                <p>Precio: <?php echo $datosProductoActual['precio_venta'];?></p>
                            </div>
                        </div>
                    <?php
                        }
                    ?>

                    <a href="./carrito.php" style="margin-bottom: 10px; padding:5px 10px; background-color: #f1c755; border-radius:5px; border:1px solid black; text-align:center;">Volver al Carro</a>
                    <p style="margin-bottom: 15px;">COSTO DE ENVÍO: x</p>
                    <p style="margin-bottom: 15px;">SUBTOTAL(*): <?php echo $_SESSION["subtotal"];?> + x</p>
                    <p style="margin-bottom: 15px;">TOTAL(*): <?php echo $_SESSION["subtotal"];?> + x</p>
                </div>
            </div>
        </div>
        <div style="display:flex; align-items:center; gap:10px; margin-top:20px;">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#25318C" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M9 3a1 1 0 0 1 .877 .519l.051 .11l2 5a1 1 0 0 1 -.313 1.16l-.1 .068l-1.674 1.004l.063 .103a10 10 0 0 0 3.132 3.132l.102 .062l1.005 -1.672a1 1 0 0 1 1.113 -.453l.115 .039l5 2a1 1 0 0 1 .622 .807l.007 .121v4c0 1.657 -1.343 3 -3.06 2.998c-8.579 -.521 -15.418 -7.36 -15.94 -15.998a3 3 0 0 1 2.824 -2.995l.176 -.005h4z" stroke-width="0" fill="currentColor" />
            </svg>
            <p>¿Necesitas ayuda? Llámanos al 012037076</p>
        </div>
    </main>
    <script src="../js/index.js"></script>
</body>
</html>