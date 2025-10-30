<?php
/**
 * Funciones auxiliares del proyecto
 */

/**
 * Redireccionar a una URL
 */
function redirect($url) {
    header("Location: $url");
    exit();
}

/**
 * Limpiar datos de entrada
 */
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * Mostrar mensaje de error en sesión
 */
function set_error($message) {
    $_SESSION['error'] = $message;
}

/**
 * Obtener y limpiar mensaje de error
 */
function get_error() {
    if (isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
        return $error;
    }
    return null;
}

/**
 * Mostrar mensaje de éxito en sesión
 */
function set_success($message) {
    $_SESSION['success'] = $message;
}

/**
 * Obtener y limpiar mensaje de éxito
 */
function get_success() {
    if (isset($_SESSION['success'])) {
        $success = $_SESSION['success'];
        unset($_SESSION['success']);
        return $success;
    }
    return null;
}

/**
 * Verificar si el usuario está autenticado
 */
function is_authenticated() {
    return isset($_SESSION['correo']) && isset($_SESSION['id']);
}

/**
 * Generar token CSRF
 */
function generate_csrf_token() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Verificar token CSRF
 */
function verify_csrf_token($token) {
    if (!isset($_SESSION['csrf_token'])) {
        return false;
    }
    return hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Formatear fecha en español
 */
function format_date($date) {
    $meses = [
        'January' => 'Enero', 'February' => 'Febrero', 'March' => 'Marzo',
        'April' => 'Abril', 'May' => 'Mayo', 'June' => 'Junio',
        'July' => 'Julio', 'August' => 'Agosto', 'September' => 'Septiembre',
        'October' => 'Octubre', 'November' => 'Noviembre', 'December' => 'Diciembre'
    ];
    
    $fecha = date('d \d\e F \d\e Y', strtotime($date));
    return str_replace(array_keys($meses), array_values($meses), $fecha);
}

/**
 * Generar slug desde texto
 */
function generate_slug($text) {
    $text = strtolower($text);
    $text = preg_replace('/[^a-z0-9\s-]/', '', $text);
    $text = preg_replace('/[\s-]+/', '_', $text);
    return trim($text, '_');
}
?>