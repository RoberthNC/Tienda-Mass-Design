<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Proveedor</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/actualizarproveedor.css">
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
            <img src="../img/proveedores.jpg" alt="Actualizar proveedor">
        </div>
        <div class="contenedor-derecha">
            <h2>ACTUALIZAR UN PROVEEDOR</h2>
            <form class="formulario">
                <div class="bloque1-formulario">
                    <div class="contenedor-campos">
                        <label for="nombre">NOMBRE:</label>
                        <input type="text" placeholder="Ingrese el nombre" required>
                    </div>
                    <div class="contenedor-campos">
                        <label for="apellido">APELLIDO:</label>
                        <input type="text" placeholder="Ingrese el apellido" required>
                    </div>
                    <div class="contenedor-campos">
                        <label for="nombre">RUC:</label>
                        <input type="text" placeholder="Ingrese el ruc" maxlength="11" required>
                    </div>
                    <div class="contenedor-campos">
                        <label for="email">EMAIL:</label>
                        <input type="email" placeholder="Ingrese el email" required>
                    </div>
                    <div class="contenedor-campos">
                        <label for="calle">CALLE:</label>
                        <input type="text" placeholder="Ingrese la calle" required>
                    </div>
                    <div class="contenedor-campos">
                        <label for="numero">NÚMERO:</label>
                        <input type="number" placeholder="Ingrese el número de calle" required>
                    </div>
                    <div class="contenedor-campos">
                        <label for="ciudad">CIUDAD:</label>
                        <input type="text" placeholder="Ingrese la ciudad" required>
                    </div>

                    <button>ACTUALIZAR PROVEEDOR</button>
                </div>

                <div class="bloque2-formulario">
                    <label>FOTO:</label>
                    <img src="../img/proveedores.jpg" alt="Foto de proveedor">
                    <input type="file">
                </div>
            </form>
        </div>
    </main>
</body>
</html>