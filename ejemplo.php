<?php

// Código con un "code smell" y una vulnerabilidad

// Code Smell: Uso excesivo de variables globales
$usuario = $_POST['usuario']; // Se asigna directamente el valor del campo 'usuario' del formulario a una variable global.
$contrasena = $_POST['contrasena']; // Se asigna directamente el valor del campo 'contrasena' del formulario a una variable global.

// Vulnerabilidad: Uso de consultas SQL sin preparar
$query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
$resultado = mysqli_query($conexion, $query);

if(mysqli_num_rows($resultado) == 1) {
    // Usuario autenticado
    echo "Bienvenido, $usuario!";
} else {
    // Usuario no autenticado
    echo "Error: Usuario o contraseña incorrectos";
}

?>
