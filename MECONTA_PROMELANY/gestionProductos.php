<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina</title>
    <link rel="stylesheet" href="ESTILOS/gestionProductos.css">
    <style>
       /* Barra lateral */
.menu-lateral {
    width: 20vw;
    height: 82vh;
    background-color: #154360;
    color: white;
    position: fixed;
    top: 18vh;
    left: 0;
    z-index: 999;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding-top: 0; /* Elimina el espacio superior */
}

.menu-lateral nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.menu-lateral nav ul li {
    margin: 0; /* Elimina cualquier margen alrededor del elemento */
    background-color: #154360;
    width: 100%;
    height: 45px;
    box-sizing: border-box;
    
    display: flex;
    align-items: center;
}

.menu-lateral nav ul li a {
    display: block;
    color: white;
    text-decoration: none;
    font-size: 1.2em;
    padding-left: 15px;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
}

.menu-lateral nav ul li:hover {
    background-color: #1A5276 ; /* Cambia el color cuando el ratón pasa sobre el enlace */
}
.PRINCIPAL{
    background-color: #1A5276

}

/* Estilos para el botón de volver */
.btn-volver {
    background-color: #333333;
    color: white;
    text-decoration: none;
    text-align: center;
    padding: 10px 20px;
    border-radius: 5px;
    display: block;
    margin: 20px auto;
    font-size: 1.2em;
}

.btn-volver:hover {
    background-color: #1A5276;
}
/* Formularios */
/* Estilo del formulario */
/* Contenedor principal del formulario */
#formProducto {
    width: 60%; /* Ancho total del formulario */
    max-width: 800px;
    display: grid;
    grid-template-columns: 1fr 1fr; /* Dos columnas de igual tamaño */
    gap: 15px; /* Espacio entre los elementos */
    padding: 20px;
    
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    box-sizing: border-box;
    position: relative;
    top:25vh;
    left:25vw;
    
}

/* Estilos para cada campo (input, textarea, select) */
#formProducto label {
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
}

#formProducto input[type="text"],
#formProducto input[type="number"],
#formProducto input[type="date"],
#formProducto textarea,
#formProducto select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

/* Estilo para asegurar que cada etiqueta quede sobre el input */
#formProducto div {
    display: flex;
    flex-direction: column;
}

/* Estilo para el botón de "Añadir Nueva Categoría" */
#addCategoria {
    padding: 8px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
}

#addCategoria:hover {
    background-color: #0056b3;
}

/* Botón Guardar Producto a lo ancho completo */
.gbutton {
    grid-column: span 2; /* Abarca ambas columnas */
    padding: 10px 15px;
    background-color: #0D3232;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
    font-size: 16px;
    width:30vw;
    position: relative;
    left:12vw;
}

.gbutton:hover {
    background-color: #154360;
}


.top-bar {
    width: 100%;
    height: 11vh; /* Altura relativa a la ventana */
    background-color: #0D3232;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 2%; /* Margen interno lateral */
    position:fixed;
    z-index: 9999;
}
.bottom-bar {
    width: 100%;
    height: 7vh; /* Altura fija */
    background-color: #333333;
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    z-index: 9999;
    top: 11vh;
}


.image-btn {
    background: none;
    border: none;
    cursor: pointer;
    width: 10vw;
    
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

    <!-- Barra lateral -->
    <aside class="menu-lateral">
        <nav>
            <ul>
                <li><a href="gestionProductos.php" class="PRINCIPAL">Ingresar Productos</a></li>
                <li><a href="listadeProductoinCP.PHP">Lista de Productos</a></li>
                <li><a href="alertasSTOCK.PHP">Alertas de Stock</a></li>
                
            </ul>
        </nav>
        <a href="index.php" class="btn-volver">Volver</a>
    </aside>

    <!-- Tarjeta de usuario -->
    <div class="user-card" id="user-card">
        <p class="user-name">Nombre del Usuario</p>
        <p class="user-time">Tiempo en línea: 00:15:30</p>
        <button class="logout-action-btn" id="logout-action-btn">Cerrar sesión</button>
    </div>
    

    <!-- Barra inferior -->
    <div class="bottom-bar">
        <div class="banner-content">
            <img class="icon" src="RECURSO_VISUALIES/box-solid-72.png" alt="">
            <p>Gestión de Productos</p>
        </div>
    </div>
    <form id="formProducto" action="guardar_producto.php" method="POST">

    <div>
        <label for="nombre">Nombre del Producto:</label>
        <input type="text" id="nombre" name="nombre" required>
    </div>

    <div>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"></textarea>
    </div>

    <div>
        <label for="categoria">Categoría:</label>
        <select id="categoria" name="categoria" required>
            <option value="">Seleccionar categoría</option>
            <option value="1">AAA</option>
            
            <!-- Opciones de categorías dinámicas -->
        </select>
        
    </div>

    <div>
        <label for="precio">Precio Unitario:</label>
        <input type="number" id="precio" name="precio" step="0.01" min="0" required>
    </div>

    <div>
        <label for="stock">Cantidad en Stock:</label>
        <input type="number" id="stock" name="stock" min="0" required>
    </div>

    <div>
        <label for="proveedor">Proveedor:</label>
        <select id="proveedor" name="proveedor" required>
            <option value="">Seleccionar proveedor</option>
            <option value="1">AAA</option>
            <!-- Opciones de proveedores dinámicas -->
        </select>
    </div>

    <div>
        <label for="costoTotal">Costo Total de Compra:</label>
        <input type="number" id="costoTotal" name="costoTotal" step="0.01" min="0">
    </div>

    <div>
        <label for="fechaCompra">Fecha de Ingreso:</label>
        <input type="date" id="fechaCompra" name="fechaCompra" required>
    </div>

    <button class="gbutton" type="submit">Guardar Producto</button>
</form>

    

    <script>
        // Lógica para mostrar/ocultar la tarjeta del usuario
        document.getElementById('logout-btn').addEventListener('click', function() {
            const userCard = document.getElementById('user-card');
            userCard.style.display = userCard.style.display === 'none' || !userCard.style.display 
                ? 'flex' 
                : 'none'; // Alterna entre mostrar/ocultar
        });

        document.getElementById('logout-action-btn').addEventListener('click', function() {
            // Lógica para el cierre de sesión
            alert("Has cerrado sesión");
        });
    </script>
    <script>
        document.getElementById('formProducto').addEventListener('submit', function(event) {
    event.preventDefault();

    return;
    }

    // Validar que el precio y el costo total de compra sean mayores a 0
    if (parseFloat(precio) < 0) {
        alert('El precio unitario debe ser un valor positivo.');
        return;
    }

    // Si todo es válido, se puede enviar el formulario
    alert('Producto guardado exitosamente.');
    event.target.submit();
);

    </script>

</body>
</html>
