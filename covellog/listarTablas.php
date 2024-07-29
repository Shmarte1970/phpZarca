<?php

$servername = 'localhost';
$username = 'admin';
$password = 'admin2023';
$dbname = 'covellog';

$conectar = new mysqli($servername, $username, $password, $dbname);

if ($conectar->connect_error){
    die('Error de conexion: '.$conectar->connect_error);
} else {
    echo 'Conectado con la BBDD de '.$dbname.' en SQL' . "\n";                
}

// Abre el archivo para escritura
$file = fopen("resultados.txt", "w");

$sql = "SELECT * FROM empresa LIMIT 1";
$result = $conectar->query($sql);

if ($result->num_rows > 0) {
    $columns = array_keys($result->fetch_assoc());
    $result->data_seek(0); // Reset the result set pointer

    // Imprimir los nombres de las columnas disponibles
    $columnas = "Columnas disponibles: "."\n".implode(", ", $columns) . "\n";
    echo $columnas;
    fwrite($file, $columnas);

    // Los Datos
    while ($row = $result->fetch_assoc()){
        $output = "Resultado"."\n";
        $output .= "- ID: ". $row["ID"]."\n";
        $output .= "- codiclient: ". $row["CODICLIENT"]."\n";
        $output .= "- idPotencial: ". $row["IDPOTENCIAL"]."\n"; 
        $output .= "- idComercial: ". $row["IDCOMERCIAL"]."\n"; 
        $output .= "- nom: ". $row["NOM"]."\n";
        $output .= "- cif: ". $row["CIF"]."\n";
        $output .= "- idTipusIva: ". $row["IDTIPUSVIA"]."\n"; 
        $output .= "- Direccion1: ". $row["DIRECCIO"]."\n";
        $output .= "- Direccion2: ". $row["DIRECCIO2"]."\n";
        $output .= "- codipostal: ". $row["CODIPOSTAL"]."\n"; 
        $output .= "- Localidad: ". $row["LOCALITAT"]."\n";
        $output .= "- Provincia: ". $row["PROVINCIA"]."\n"; 
        $output .= "- Pais: ". $row["PAIS"]."\n";
        $output .= "- Telefono: ". $row["TELEFON1"]."\n";
        $output .= "- Telefono2: ". $row["TELEFON2"]."\n";
        $output .= "- Email: ". $row["EMAIL"]."\n";
        $output .= "- emailFact: ". $row["EMAILFACT"]."\n";
        $output .= "- swift: ". $row["SWIFT"]."\n";
        $output .= "- IBAN: ". $row["IBAN"]."\n";
        $output .= "- NombreBanc: ". $row["NOMBANC"]."\n";
        $output .= "- cccorrent: ". $row["CCORRENT"]."\n";
        $output .= "- comptetransfer: ". $row["COMPTETRANSFER"]."\n";
        $output .= "- observaciones: ". $row["OBSERVACIONS"]."\n";
        $output .= "- formapagollog: ". $row["FORMAPAGLLOG"]."\n";
        $output .= "- vencillog: ". $row["VENCILLOG"]."\n";
        $output .= "- diavencillog: ". $row["DIAVENCILLOG"]."\n";
        $output .= "- FormaPagoComp: ". $row["FORMAPAGLLOG"]."\n";
        $output .= "- vencicomp: ". $row["VENCILLOG"]."\n";
        $output .= "- Tipus: ". $row["TIPUS"]."\n";
        $output .= "- EsCliente: ". $row["ESCLIENT"]."\n";
        $output .= "- esProveedor: ". $row["ESPROVEIDOR"]."\n";
        $output .= "- esdepot: ". $row["ESDEPOT"]."\n";
        $output .= "- estransportista: ". $row["ESTRANSPORTISTA"]."\n";
        $output .= "- contacte: ". $row["CONTACTE"]."\n";
        $output .= "\n";

        // Imprimir en pantalla y escribir en el archivo
        echo $output;
        fwrite($file, $output);
    }
} else {
    $no_resultados = "0 resultados\n";
    echo $no_resultados;
    fwrite($file, $no_resultados);
}

// Cierra el archivo
fclose($file);
echo 'Datos grabados en resultados.txt';

$conectar->close();
?>
