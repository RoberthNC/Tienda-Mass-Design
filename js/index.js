const agregarId = async(id) => {
    try {
        const data = new FormData();
        data.append("idProductoNuevo",id);
        const resultados = await fetch("../pages/carrito.php",{
            method:"POST",
            body:data
        });
        alert("Producto agregado al carrito");
    } catch (error) {
        console.log(error);
    }
}

const fuenteRegular = () => {
    const arregloP = document.querySelectorAll("p");
    const arregloH2 = document.querySelectorAll("h2");

    arregloP.forEach(p => {
        p.classList.remove("fuente-mediana");
        p.classList.remove("fuente-grande");
        p.classList.add("fuente-pequenia");
    });
    arregloH2.forEach(p => {
        p.classList.remove("fuente-mediana");
        p.classList.remove("fuente-grande");
        p.classList.add("fuente-pequenia");
    });
}

const fuenteMediana = () => {
    const arregloP = document.querySelectorAll("p");
    const arregloH2 = document.querySelectorAll("h2");

    arregloP.forEach(p => {
        p.classList.remove("fuente-pequenia");
        p.classList.remove("fuente-grande");
        p.classList.add("fuente-mediana");
    });
    arregloH2.forEach(p => {
        p.classList.remove("fuente-pequenia");
        p.classList.remove("fuente-grande");
        p.classList.add("fuente-mediana");
    });
}

const fuenteGrande = () => {
    const arregloP = document.querySelectorAll("p");
    const arregloH2 = document.querySelectorAll("h2");

    arregloP.forEach(p => {
        p.classList.remove("fuente-mediana");
        p.classList.remove("fuente-pequenia");
        p.classList.add("fuente-grande");
    });
    arregloH2.forEach(p => {
        p.classList.remove("fuente-mediana");
        p.classList.remove("fuente-pequenia");
        p.classList.add("fuente-grande");
    });
}

const eliminarDeCarrito = async(id) => {
    try {
        const dataEliminar = new FormData();
        dataEliminar.append("idEliminarProductoCarrito",id);
        const response = await fetch("../pages/eliminarcarrito.php",{
            method:"POST",
            body:dataEliminar
        });
        window.location.href = "./carrito.php";
    } catch (error) {
        console.log(error.message);
    }
}