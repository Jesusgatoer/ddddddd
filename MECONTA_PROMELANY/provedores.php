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
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        position: relative;
        top:25vh;
        left:9vw;
    }

    h2 {
        text-align: center;
        color: #154360;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #dee2e6;
        border-radius: 5px;
    }

    .btn-submit {
        width: 100%;
        padding: 10px;
        background-color: #0D3232;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .btn-submit:hover {
        background-color: #154360;
    }

    .message {
        text-align: center;
        margin-top: 15px;
        font-size: 14px;
        color: #28a745;
    }

    .error {
        color: #dc3545;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .table thead {
        background-color: #007bff;
        color: #fff;
    }

    .table th, .table td {
        padding: 12px;
        text-align: left;
        border: 1px solid #dee2e6;
        
    }
    .table th{
        background-color: #0D3232;

    }
   

    .table tbody tr:hover {
        background-color: #f1f1f1;
    }
    .top-bar{
        position: fixed;
        z-index: 99999;
    }
    .bottom-bar{
        position: fixed;
        top:11vh;
        z-index: 99999;
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
                
                <li><a class="PRINCIPAL"  href="pagina2.html">Provedores</a></li>
                
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
            <p>Control de  Provedores</p>
        </div>
    </div>
    <div class="container">
    <h2>Gestión de Proveedores</h2>

    <!-- Formulario para agregar un nuevo proveedor -->
    <form action="agregar_proveedor.php" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre del Proveedor:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre del proveedor" required>
        </div>
        <div class="form-group">
            <label for="contacto">Contacto:</label>
            <input type="text" id="contacto" name="contacto" placeholder="Nombre del contacto">
        </div>
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" placeholder="Dirección del proveedor">
        </div>
        <div class="form-group">
            <label for="tipo_productos">Tipo de Productos:</label>
            <input type="text" id="tipo_productos" name="tipo_productos" placeholder="Tipo de productos que ofrece">
        </div>
        <button type="submit" class="btn-submit">Agregar Proveedor</button>
    </form>

    <!-- Tabla para mostrar los proveedores existentes -->
    <h2>Lista de Proveedores</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Contacto</th>
                <th>Dirección</th>
                <th>Tipo de Productos</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Datos de conexión
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "mecontan";

            // Crear conexión
            $conn = new mysqli($servername, $username, $password, $database);

            // Verificar conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Consulta SQL para obtener los datos de la tabla proveedores
            $sql = "SELECT id_proveedor, nombre, contacto, direccion, tipo_productos FROM proveedores";
            $result = $conn->query($sql);

            // Verificar si hay resultados
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id_proveedor"] . "</td>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>" . $row["contacto"] . "</td>";
                    echo "<td>" . $row["direccion"] . "</td>";
                    echo "<td>" . $row["tipo_productos"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay proveedores registrados</td></tr>";
            }

            // Cerrar conexión
            $conn->close();
            ?>
        </tbody>
    </table>
</div>
   

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
