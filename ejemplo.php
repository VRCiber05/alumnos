<?php

// Código corregido sin "code smell" y vulnerabilidades

// Obtener las credenciales del formulario de manera segura
$usuario = isset($_POST['usuario']) ? htmlspecialchars($_POST['usuario']) : "";
$contrasena = isset($_POST['contrasena']) ? htmlspecialchars($_POST['contrasena']) : "";

// Conexión a la base de datos (suponiendo que $conexion está definido en otro lugar)
// Aquí se debe usar una conexión segura, como PDO o mysqli con consultas preparadas
// $conexion = mysqli_connect("localhost", "usuario", "contrasena", "basededatos");

// Verificar si el usuario y la contraseña coinciden de manera segura
if (!empty($usuario) && !empty($contrasena)) {
    $query = "SELECT * FROM usuarios WHERE usuario = ? AND contrasena = ?";
    
    // Preparar la consulta
    $stmt = mysqli_prepare($conexion, $query);
    
    // Vincular los parámetros
    mysqli_stmt_bind_param($stmt, "ss", $usuario, $contrasena);
    
    // Ejecutar la consulta
    mysqli_stmt_execute($stmt);
    
    // Obtener el resultado
    $resultado = mysqli_stmt_get_result($stmt);
    
    // Verificar si se encontró un usuario autenticado
    if(mysqli_num_rows($resultado) == 1) {
        // Usuario autenticado
        echo "Bienvenido, $usuario!";
    } else {
        // Usuario no autenticado
        echo "Error: Usuario o contraseña incorrectos";
    }
} else {
    // Los campos están vacíos
    echo "Por favor, ingrese usuario y contraseña";
}

// Cerrar la conexión
mysqli_close($conexion);

?>

