<?php

// Conexion  con la base de datos zarca

$servername = 'localhost';
$username = 'admin';
$password = 'admin2023';
$dbname = 'zarca';

// Creacion de conexion
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die('Error connecting'.$conn->connect_error);
    }else{
        echo 'Conexion exitosa';
    
}

$sql = "SELECT * FROM zcempresa LIMIT 50";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Salida de datos de cada fila
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Nombre: " . $row["nombre"] . " - Otra columna: " . $row["otra_columna"] . "<br>";
    }
} else {
    echo "0 resultados";
}

// Cierre de la conexion
$conn->close();

?>


