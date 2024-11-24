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
        width: 80%;
        margin: 0 auto;
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
        background-color: #f2f2f2;
    }
    /* Estilos generales del formulario */
#formAgregarCliente {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    position: relative;
    left:-10vw;
    top:7vh;
}
#formAgregarCliente h2{
    margin-bottom:2vh;
}
/* Estilos para los inputs */
#formAgregarCliente input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

/* Efecto hover para los inputs */
#formAgregarCliente input:hover,
#formAgregarCliente input:focus {
    border-color: #0D323;
}

/* Estilos para el botón */
#btnAgregarCliente {
    width: 100%;
    padding: 10px;
    background-color: #0D3232;
    color: #fff;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

/* Efecto hover para el botón */
#btnAgregarCliente:hover {
    background-color: #154360;
    transform: translateY(-2px);
}

/* Efecto activo para el botón */
#btnAgregarCliente:active {
    background-color: #004080;
    transform: translateY(0);
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
                
                <li><a href="clientes.php" >Clientes</a></li>
                <li><a href="agregarClientes.php" class="PRINCIPAL">Agregar Clientes</a></li>
                
                
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
    <!-- Formulario para agregar nuevos clientes -->
    
    <form id="formAgregarCliente">
    <h2>Agregar Nuevo Cliente</h2>
        <div class="form-group">
            <input type="text" id="nombre" placeholder="Nombre" required>
        </div>
        <div class="form-group">
            <input type="text" id="apellido" placeholder="Apellido" required>
        </div>
        <div class="form-group">
            <input type="text" id="telefono" placeholder="Teléfono">
        </div>
        <div class="form-group">
            <input type="email" id="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="text" id="direccion" placeholder="Dirección">
        </div>
        <button type="button" id="btnAgregarCliente" onclick="agregarCliente()">Agregar Cliente</button>
    </form>
</div>


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
         // Función para agregar un nuevo cliente
    function agregarCliente() {
        const nombre = document.getElementById('nombre').value;
        const apellido = document.getElementById('apellido').value;
        const telefono = document.getElementById('telefono').value;
        const email = document.getElementById('email').value;
        const direccion = document.getElementById('direccion').value;

        fetch('addCliente.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ nombre, apellido, telefono, email, direccion })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Cliente agregado con éxito');
                cargarClientes();
                document.getElementById('formAgregarCliente').reset();
            } else {
                alert('Error al agregar cliente: ' + data.message);
            }
        });
    }

    </script>

</body>
</html>
