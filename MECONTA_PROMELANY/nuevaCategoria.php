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
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        position: relative;
        top:6vh;
        left:-7vw;
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

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #dee2e6;
        border-radius: 5px;
    }

    .form-group textarea {
        resize: vertical;
        height: 100px;
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
        background-color: #1A5276;
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
                
                <li><a  href="categorias.php">Categorias</a></li>
                <li><a class="PRINCIPAL"  href="pagina2.html">Nueva Categoria</a></li>
                
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
    <h2>Agregar Nueva Categoría</h2>
    <form action="agregar_categoria.php" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre de la Categoría:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingresa el nombre de la categoría" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" placeholder="Ingresa una descripción (opcional)"></textarea>
        </div>
        <button type="submit" class="btn-submit">Agregar Categoría</button>
    </form>

    <?php
    // Mostrar mensaje de éxito o error si existe
    if (isset($_GET['mensaje'])) {
        echo "<div class='message'>" . htmlspecialchars($_GET['mensaje']) . "</div>";
    } elseif (isset($_GET['error'])) {
        echo "<div class='message error'>" . htmlspecialchars($_GET['error']) . "</div>";
    }
    ?>
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
