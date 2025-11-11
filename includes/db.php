<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$servername = getenv('ODS4_DB_HOST') ?: 'localhost';
$username = getenv('ODS4_DB_USER') ?: 'root';
$password = getenv('ODS4_DB_PASSWORD') !== false ? getenv('ODS4_DB_PASSWORD') : '';
$dbname = getenv('ODS4_DB_NAME') ?: 'ods4_db';

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset('utf8mb4');
} catch (mysqli_sql_exception $exception) {
    error_log('Error de conexión a la base de datos: ' . $exception->getMessage());
    http_response_code(500);
    exit('No se pudo completar la solicitud. Inténtalo más tarde.');
}
?>