<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="ESTILOS/login.css">
</head>
<body>

    <!-- Cuadro de login -->
    <div class="login-container">
        <div class="login-box">
            <img src="RECURSO_VISUALIES/Recurso 4.png" alt="Logo" class="login-logo">
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="username">Usuario</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="role">Tipo de Usuario</label>
                    <select id="role" name="role" required>
                        <option >Seleccionar</option>
                        <option value="administrativo">Administrativo</option>
                        <option value="empleado">Empleado</option>
                    </select>
                </div>
                
            </form>
            <button type="submit" class="login-btn">Ingresar</button>
        </div>
    </div>

</body>
</html>
