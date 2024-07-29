<?php
require_once 'vendor/autoload.php' ; // Asegúrate de que Composer haya instalado TCPDF correctamente

// Función para extraer texto de un PDF usando pdftotext (Poppler)
function extractTextFromPDF($pdfPath) {
    $output = null;
    $retval = null;
    $text = '';
    $command = "pdftotext -layout " . escapeshellarg($pdfPath) . " -";
    exec($command, $output, $retval);

    if ($retval === 0) {
        $text = implode("\n", $output);
    } else {
        throw new Exception("Error al extraer texto del PDF.");
    }

    return $text;
}

// Función para convertir texto a XML simple
function textToXML($text) {
    $xml = new SimpleXMLElement('<document/>');
    $lines = explode("\n", $text);
    foreach ($lines as $line) {
        $xml->addChild('line', htmlspecialchars($line));
    }
    return $xml->asXML();
}

// Ruta del PDF de entrada
$pdfPath = 'FACTURA.pdf';

// Ruta del archivo XML de salida
$xmlOutputPath = 'archivo.xml';

try {
    // Extraer texto del PDF
    $text = extractTextFromPDF($pdfPath);

    // Convertir texto a XML
    $xmlContent = textToXML($text);

    // Guardar XML en un archivo
    file_put_contents($xmlOutputPath, $xmlContent);

    echo "Conversión completada. XML generado en: " . $xmlOutputPath;
} catch (Exception $e) {
    echo 'Error: ',  $e->getMessage(), "\n";
}
