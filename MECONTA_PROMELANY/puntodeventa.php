<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina</title>
    <link rel="stylesheet" href="ESTILOS\index.css">
    <style>
        .container {
    width: 90%;
    max-width: 1200px;
    margin: auto;
    padding: 20px;
}
h1 {
    text-align: center;
}
.form-section {
    margin: 20px 0;
}
input {
    padding: 10px;
    margin: 5px;
    width: calc(100% - 22px);
}
button {
    padding: 10px;
    margin-top: 10px;
    cursor: pointer;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}
th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
   
    </style>
</head>
<body>

    <!-- Barra superior -->
    <header class="top-bar">
        <div class="left-text">
            MECONTA
        </div>
        <div class="right-section">
            <span>Administrador</span>
            <button class="image-btn" id="logout-btn">
                <img src="RECURSO_VISUALIES\Recurso 1.png" alt="Botón">
            </button>
        </div>
    </header>
    <div class="user-card" id="user-card">
    <p class="user-name">Nombre del Usuario</p>
    <p class="user-time">Tiempo en línea: 00:15:30</p>
    <button class="logout-action-btn" id="logout-action-btn">Cerrar sesión</button>
    </div>

    <!-- Barra inferior -->
    <div class="bottom-bar">
        <div class="banner-content">
            <img class="icon" src="RECURSO_VISUALIES/dashboard-solid-72.png" alt="">
            <p>Banner Principal</p>
            
        </div>
        
    </div>
    <div class="container">
    <h1>Punto de Venta - Mecontan</h1>
    <div class="form-section">
        <form id="formVenta">
            <input type="text" id="productoBuscar" placeholder="Buscar producto">
            <input type="number" id="cantidadProducto" placeholder="Cantidad" min="1">
            <button type="button" onclick="agregarAlCarrito()">Agregar al Carrito</button>
        </form>
        <h2>Carrito</h2>
        <table id="tablaCarrito">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <h3>Total: $<span id="totalVenta">0.00</span></h3>
        <button type="button" onclick="finalizarVenta()">Finalizar Venta</button>
    </div>
</div>
<script src="script.js"></script>
    

<script>
        document.getElementById('logout-btn').addEventListener('click', function() {
    const userCard = document.getElementById('user-card');
    
    // Muestra la tarjeta cuando se pulsa el botón
    userCard.style.display = userCard.style.display === 'none' || !userCard.style.display 
        ? 'flex' 
        : 'none'; // Alterna entre mostrar/ocultar
});

document.getElementById('logout-action-btn').addEventListener('click', function() {
    // Aquí puedes implementar la lógica de cierre de sesión
    alert("Has cerrado sesión");
});
const carrito = [];
let total = 0;

function agregarAlCarrito() {
    const producto = document.getElementById("productoBuscar").value;
    const cantidad = parseInt(document.getElementById("cantidadProducto").value);
    const precio = 10;  // Precio fijo para simplificación

    const item = {
        producto,
        cantidad,
        precio,
        total: cantidad * precio
    };

    carrito.push(item);
    total += item.total;
    actualizarTabla();
}

function actualizarTabla() {
    const tbody = document.querySelector("#tablaCarrito tbody");
    tbody.innerHTML = '';

    carrito.forEach((item, index) => {
        const row = `
            <tr>
                <td>${item.producto}</td>
                <td>${item.cantidad}</td>
                <td>${item.precio.toFixed(2)}</td>
                <td>${item.total.toFixed(2)}</td>
                <td><button onclick="eliminarItem(${index})">Eliminar</button></td>
            </tr>`;
        tbody.innerHTML += row;
    });

    document.getElementById("totalVenta").innerText = total.toFixed(2);
}

function eliminarItem(index) {
    total -= carrito[index].total;
    carrito.splice(index, 1);
    actualizarTabla();
}

function finalizarVenta() {
    alert(`Venta finalizada. Total: $${total.toFixed(2)}`);
    carrito.length = 0;
    total = 0;
    actualizarTabla();
}


    </script>


</body>
</html>
