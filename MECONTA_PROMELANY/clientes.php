<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina</title>
    <link rel="stylesheet" href="ESTILOS/controldeinventario.css">
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
.PRINCIPAL{
    background-color: #1A5276

}
.container {
        width: 60%;
        margin: 0 auto;
        position: relative;
        top:7vh;
        left:5vw;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }
    th {
        background-color: #0D3232;
        color:white;
    }
    form {
        margin-top: 20px;
    }
    input, button {
        padding: 10px;
        margin: 5px 0;
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
                
                <li><a href="clientes.php" class="PRINCIPAL">Clientes</a></li>
                <li><a href="agregarClientes.php">Agregar Clientes</a></li>
                
                
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
            <img class="icon" src="RECURSO_VISUALIES/task-regular-72.png" alt="">
            <p>Control de  Inventario</p>
        </div>
    </div>
    <div class="container">
    <h1>Control de Clientes</h1>

    <!-- Tabla para mostrar los clientes -->
    <table id="tablaClientes">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Dirección</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí se insertarán las filas dinámicamente -->
        </tbody>
    </table>

    <!-- Formulario para agregar nuevos clientes -->
  

<!-- Script para manejar los datos -->
<script>
    // Función para obtener los clientes desde la base de datos (Simulación)
    function cargarClientes() {
        fetch('getClientes.php')
            .then(response => response.json())
            .then(data => {
                const tbody = document.querySelector('#tablaClientes tbody');
                tbody.innerHTML = ''; // Limpiar la tabla
                data.forEach(cliente => {
                    const fila = `
                        <tr>
                            <td>${cliente.id_cliente}</td>
                            <td>${cliente.nombre}</td>
                            <td>${cliente.apellido}</td>
                            <td>${cliente.telefono}</td>
                            <td>${cliente.email}</td>
                            <td>${cliente.direccion}</td>
                        </tr>`;
                    tbody.innerHTML += fila;
                });
            });
    }

   
    // Cargar los clientes al iniciar la página
    document.addEventListener('DOMContentLoaded', cargarClientes);
</script>
 
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
