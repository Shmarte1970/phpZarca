<?php

// Solicitar al usuario que ingrese el nombre de la base de datos
$dbname = readline('Ingrese el nombre de la base de datos: ');

// Solicitar al usuario que ingrese el nombre de la tabla
$tabla = readline('Ingrese el nombre de la tabla: ');

$servername = 'localhost';
$username = 'admin';
$password = 'admin2023';
// $dbname = 'erasezarca';
// $tabla = 'zccontactos';

// Crear conexión
$conectar = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conectar->connect_error) {
    die('Error de conexion: ' . $conectar->connect_error);
} else {
    echo 'Conectado con la BBDD de ' . $dbname . ' en SQL '."\n";        
}


// Desactivar las comprobaciones de claves foráneas
$sql = "SET FOREIGN_KEY_CHECKS = 0";
if ($conectar->query($sql) === TRUE) {
    echo "Comprobaciones de claves foráneas desactivadas.\n";
} else {
    echo "Error al desactivar comprobaciones de claves foráneas: " . $conectar->error . "\n";
}

// SQL para borrar todos los datos de la tabla 'empresa'
$sql = "DELETE FROM $tabla";
if ($conectar->query($sql) === TRUE) {
    echo "Todos los datos de la tabla ".$tabla." han sido borrados."."\n";
} else {
    echo "Error al borrar datos: " . $conectar->error . "<br>";
}

// Activar las comprobaciones de claves foráneas
$sql = "SET FOREIGN_KEY_CHECKS = 1";
if ($conectar->query($sql) === TRUE) {
    echo "Comprobaciones de claves foráneas activadas."."\n";
} else {
    echo "Error al activar comprobaciones de claves foráneas: " . $conectar->error . "<br>";
}

// Cerrar la conexión
$conectar->close();
?>