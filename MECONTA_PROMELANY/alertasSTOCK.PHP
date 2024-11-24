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
    top:0vw;
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


table {
    width: 70vw;
    position: relative;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
    top:10.7vw;
    left:53vh;
}

th, td {
    padding: 0.75rem;
    text-align: left;
    border: 1px solid #ddd;
}

/* Color de fondo personalizado para el encabezado */
th {
    background-color: #0D3232; /* Cambiado a verde, puedes usar el color que prefieras */
    color: white;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

/* Título de la página */
h1 {
    text-align: center;
    font-size: 1.5rem;
    color: black;
    margin-top: 1rem;
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
                <li><a href="gestionProductos.php">Ingresar Productos</a></li>
                <li><a href="listadeProductoinCP.PHP">Lista de Productos</a></li>
                <li><a href="alertasSTOCK.PHP" class="PRINCIPAL">Alertas de Stock</a></li>
               
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
    

    <table>
  
        <tr>
            <th>Producto</th>
            <th>Descripción</th>
            <th>Stock</th>
            <th>Precio Unitario</th>
        </tr>

        <?php
        // Conexión a la base de datos
        $conexion = new mysqli("localhost", "root", "", "mecontan");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Consulta para obtener productos con stock menor o igual a 10
        $sql = "SELECT nombre, descripcion, stock, precio_unitario FROM productos WHERE stock <= 10";
        $resultado = $conexion->query($sql);

        // Mostrar productos en la tabla
        if ($resultado->num_rows > 0) {
            while ($producto = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $producto['nombre'] . "</td>";
                echo "<td>" . $producto['descripcion'] . "</td>";
                echo "<td>" . $producto['stock'] . "</td>";
                echo "<td>$" . number_format($producto['precio_unitario'], 2) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No hay productos con stock bajo.</td></tr>";
        }

        // Cerrar la conexión
        $conexion->close();
        ?>

    </table>


    

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
 
</body>
</html>
