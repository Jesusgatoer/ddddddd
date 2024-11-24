<?php
include("listaconexion.php");

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
?>
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
    width: 70%;
    border-collapse: collapse;
    position: relative;
    top: 30vh;
    left: 25vw;
    /* Eliminar el background-color de la tabla */
}

table, th, td {
    border: 1px solid #333333;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #0D3232; /* Color de fondo solo para el encabezado */
    color: white;
    font-family: Arial, Helvetica, sans-serif;
}

td {
    background-color: white; /* O cualquier color que desees para las celdas de datos */
}


img {
    width: 20px;
    height: 20px;
    cursor: pointer;
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
                <li><a href="gestionProductos.php" >Ingresar Productos</a></li>
                <li><a href="listadeProductoinCP.PHP" class="PRINCIPAL">Lista de Productos</a></li>
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
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio Unitario</th>
            <th>Stock</th>
            <th>Fecha Compra</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['precio_unitario']; ?></td>
            <td><?php echo $row['stock']; ?></td>
            <td><?php echo $row['fecha_compra']; ?></td>
            <td>
                <!-- Botón de Editar con icono -->
                <a href="editar.php?id=<?php echo $row['id_producto']; ?>">
                    <img src="IMAGES\edit-solid-24.png" alt="Editar" title="Editar">
                </a>
                <!-- Botón de Eliminar con icono -->
                <a href="eliminar.php?id=<?php echo $row['id_producto']; ?>" onclick="return confirm('¿Estás seguro de eliminar este producto?');">
                    <img src="IMAGES\trash-solid-24.png" alt="Eliminar" title="Eliminar">
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
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
