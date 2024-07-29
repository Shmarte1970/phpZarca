<?php

$servername = 'localhost';
$username = 'admin';
$password = 'admin2023';
$dbname = 'covellog';

$conectar = new mysqli($servername, $username, $password, $dbname);

if ($conectar->connect_error){
    die('Error de conexion'.$conectar->$connect_error);

    }else{
        echo 'conectado con la BBDD de'.$dbname.' en SQL';                
        echo "\n";
}

$sql = "SELECT * FROM empresa LIMIT 5";
$result = $conectar->query($sql);

if ($result->num_rows > 0) {


    $columns = array_keys($result->fetch_assoc());
    $result->data_seek(0); // Reset the result set pointer

    // Imprimir los nombres de las columnas disponibles
    echo "Columnas disponibles: ".implode(", ", $columns);
    echo "\n";

    // Los Datos
    while ($row = $result->fetch_assoc()){
        echo "Resultado"."\n";
        echo "- ID:". $row["ID"]."\n";
        echo "- codiclient: ". $row ["CODICLIENT"]."\n";
        echo "- idPotencial: ". $row ["IDPOTENCIAL"]."\n"; 
        echo "- idComercial: ". $row["IDCOMERCIAL"]."\n"; 
        echo "- nom: ". $row["NOM"]."\n";
        echo "- cif: ". $row ["CIF"]."\n";
        echo "- idTipusIva: ". $row ["IDTIPUSVIA"]."\n"; 
        echo "- Direccion1: ". $row["DIRECCIO"]."\n";
        echo "- Direccion2: ". $row["DIRECCIO2"]."\n";
        echo "- codipostal: ". $row["CODIPOSTAL"]."\n"; 
        echo "- Localidad: ". $row ["LOCALITAT"]."\n";
        echo "- Provincia: ". $row ["PROVINCIA"]. "\n"; 
        echo "- Pais: ". $row["PAIS"]."\n";
        echo "- Telefono:". $row["TELEFON1"]."\n";
        echo "- Telefono2: ". $row["TELEFON2"]."\n";
        echo "- Email: ". $row ["EMAIL"]."\n";
        echo "- emailFact: ". $row ["EMAILFACT"]."\n";
        echo "- swift: ". $row["SWIFT"]."\n";
        echo "- IBAN:". $row["IBAN"]."\n";
        echo "- NombreBanc: ". $row["NOMBANC"]."\n";
        echo "- cccorrent: ". $row ["CCORRENT"]."\n";
        echo "- comptetransfer: ". $row ["COMPTETRANSFER"]."\n";
        echo "- observaciones: ". $row["OBSERVACIONS"]."\n";
        echo "- formapagollog:". $row["FORMAPAGLLOG"]."\n";
        echo "- vencillog: ". $row["VENCILLOG"]."\n";
        echo "- diavencillog: ". $row ["DIAVENCILLOG"]."\n";
        echo "- FormaPagoComp: ". $row ["FORMAPAGLLOG"]."\n";
        echo "- vencicomp: ". $row["VENCILLOG"]."\n";
        echo "- Tipus:". $row["TIPUS"]."\n";
        echo "- EsCliente: ". $row["ESCLIENT"]."\n";
        echo "- esProveedor: ". $row ["ESPROVEIDOR"]."\n";
        echo "- esdepot: ". $row ["ESDEPOT"]."\n";
        echo "- estransportista: ". $row["ESTRANSPORTISTA"]."\n";
        echo "- contacte:". $row["CONTACTE"]. "\n";
        echo "\n";
    }
}else {
    echo "0 resultados";
}

$conectar->close();
?>

