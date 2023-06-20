<?php

    require "../config/conexion.php";
    require "../config/debuguear.php";

    $conn = conexionBD();

    $queryClientes = "SELECT cliente.id_cliente as id_cliente, cliente.nombre as nombre, cliente.apellido as apellido, cliente.dni as dni, cliente.telefono as telefono, cliente.email as email, cliente.direccion_domicilio as direccion_domicilio FROM cliente INNER JOIN usuario ON cliente.id_cliente=usuario.id_cliente WHERE usuario.es_admin=0";
    $resultadosClientes = mysqli_query($conn,$queryClientes);

    $band = false;

    if($_SERVER["REQUEST_METHOD"]==="POST"){
        $band = true;
        $filtro = $_POST["filtro"];
        $queryFiltrado = "SELECT * FROM cliente WHERE nombre LIKE '%$filtro%'";
        $resultadosFiltrado = mysqli_query($conn,$queryFiltrado);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Clientes</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/listarclientes.css">
    <script src="../js/cliente.js"></script>
</head>
<body>
    <?php
        include "./modaleliminarcliente.php";
    ?>
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
            <img src="../img/clientes.jpg" alt="Cliente">
        </div>
        <div class="contenedor-derecha">
            <h2>LISTADO DE CLIENTES</h2>
            <form method="POST" class="formulario">
                <h3>Buscar</h3>
                <input type="text" name="filtro" placeholder="Ingrese el cliente a buscar">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                        <path d="M21 21l-6 -6" />
                    </svg>
                </button>
            </form>
            <div class="contenedor-tabla">
                <table>
                    <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Teléfono</th>
                        <th>email</th>
                        <th>Dirección</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php
                            if($band === false){
                                while($row=mysqli_fetch_assoc($resultadosClientes)){                        
                        ?>
                                <tr>
                                    <td><?php echo $row["id_cliente"];?></td>
                                    <td><?php echo $row["nombre"];?></td>
                                    <td><?php echo $row["apellido"];?></td>
                                    <td><?php echo $row["dni"];?></td>
                                    <td><?php echo $row["telefono"];?></td>
                                    <td><?php echo $row["email"];?></td>
                                    <td><?php echo $row["direccion_domicilio"];?></td>
                                    <td>
                                        <button class="boton-eliminar" onclick="mostrarModalEliminarCliente(<?php echo $row['id_cliente'];?>)">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FF0000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M4 7l16 0" />
                                                <path d="M10 11l0 6" />
                                                <path d="M14 11l0 6" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                        <?php
                                }
                            }
                            else if($band === true){
                                while($row2=mysqli_fetch_assoc($resultadosFiltrado)){
                        ?>
                                <tr>
                                    <td><?php echo $row2["id_cliente"];?></td>
                                    <td><?php echo $row2["nombre"];?></td>
                                    <td><?php echo $row2["apellido"];?></td>
                                    <td><?php echo $row2["dni"];?></td>
                                    <td><?php echo $row2["telefono"];?></td>
                                    <td><?php echo $row2["email"];?></td>
                                    <td><?php echo $row2["direccion_domicilio"];?></td>
                                    <td>
                                        <button class="boton-eliminar" onclick="mostrarModalEliminarCliente(<?php echo $row2['id_cliente'];?>)">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FF0000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M4 7l16 0" />
                                                <path d="M10 11l0 6" />
                                                <path d="M14 11l0 6" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>