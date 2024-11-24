<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina</title>
    <link rel="stylesheet" href="ESTILOS\index.css">
    <style>
    .option-box22{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    width: 48.5vw; /* Para que se ajuste a la columna */
    height: 18vw; /* Cuadros cuadrados, basados en ancho de la ventana */
    max-height: 25vh; /* Altura máxima para pantallas más grandes */
    background-color: #1A5276;
    border-radius: 10px;
    color: white;
    text-decoration: none; /* Elimina subrayado en los enlaces */
    transition: background-color 0.3s ease;
    
}
.option-box22 span{
    font-size: 1.5vw; /* Texto adaptado al ancho de la ventana */
}
.option-box22:hover {
    background-color: #154360; /* Cambia el color al pasar el mouse */
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
    
    <!-- Sección de cuadros -->
<section class="options-grid">
    <a href="gestionProductos.php" class="option-box">
        <img class="icon" src="RECURSO_VISUALIES/box-solid-72.png" alt="Opción 1">
        <span> Gestión de 
        Productos</span>
    </a>
    <a href="controldeinventario.php" class="option-box">
        <img class="icon" src="RECURSO_VISUALIES/task-regular-72.png" alt="Opción 2">
        <span>Control de  Inventario</span>
    </a>
    
    <a href="clientes.php" class="option-box">
        <img class="icon" src="RECURSO_VISUALIES/contact-solid-72.png" alt="Opción 4">
        <span>Gestión de Clientes</span>
    </a>
    
    <a href="provedores.php" class="option-box">
        <img class="icon" src="RECURSO_VISUALIES/spreadsheet-solid-72.png" alt="Opción 6">
        <span>Gestión de Proveedores</span>
    </a>
   
    
</section>
<section class="options-grid">
    <a href="puntodeventa.php" class="option-box22">
        <img class="icon" src="RECURSO_VISUALIES/line-chart-regular-72.png" alt="Opción 1">
        <span> Punto de Venta

        </span>
    </a>
</section>
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

    </script>


</body>
</html>
