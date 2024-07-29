<?php

$servername = 'localhost';
$username = 'admin';
$password = 'admin2023';
$dbname = 'covellog';

$conectar = new mysqli($servername, $username, $password, $dbname);

if ($conectar->connect_error){
    die('Error de conexion'.$conectar->$connect_error);

    }else{
        echo 'conectado con la BBDD de '.$dbname.' en SQL';                
        echo "\n";
}

// Array para almacenar los nombres de las tablas
$tablas = array();

// Consulta para obtener los nombres de las tablas
$sql = "SHOW TABLES";
$result = $conectar->query($sql);

if ($result->num_rows > 0) {
    // Almacenar los nombres de las tablas en el array
    while ($row = $result->fetch_array()) {
        $tablas[] = $row[0];
    }
    echo "Tablas en la base de datos " . $dbname . ":\n";
    print_r($tablas); // Imprimir los nombres de las tablas
} else {
    echo "No se encontraron tablas en la base de datos.";
}

// Cerrar la conexión
$conectar->close();
echo 'Conexion con la BBDD '.$dbname.' Cerrada';
echo "\n";

// conectar con fusion

$servername = 'localhost';
$username = 'admin';
$password = 'admin2023';
$dbname = 'fusion';

$conectar = new mysqli($servername, $username, $password, $dbname);

if ($conectar->connect_error){
    die('Error de conexion'.$conectar->$connect_error);

    }else{
        echo 'conectado con la BBDD de '.$dbname.' en SQL';                
        echo "\n";
}

// Borrar todas las tablas en el array $tablas de la base de datos fusion
foreach ($tablas as $tabla) {
    $sql = "DROP TABLE IF EXISTS $tabla";
    if ($conectar->query($sql) === TRUE) {
        echo "Tabla $tabla eliminada con éxito.\n";
    } else {
        echo "Error al eliminar la tabla $tabla: " . $conectar->error . "\n";
    }
}

// Cerrar la conexión con fusion
$conectar->close();
echo 'Conexion con la BBDD ' . $dbname . ' Cerrada' . "\n";



?>
