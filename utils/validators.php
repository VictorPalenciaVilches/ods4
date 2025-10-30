<?php
/**
 * Validadores de datos
 */

/**
 * Validar correo electrónico
 */
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Validar contraseña
 * Mínimo 8 caracteres
 */
function validate_password($password) {
    return strlen($password) >= 8;
}

/**
 * Validar contraseña fuerte
 * Mínimo 8 caracteres, 1 mayúscula, 1 minúscula, 1 número
 */
function validate_strong_password($password) {
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $length = strlen($password) >= 8;
    
    return $uppercase && $lowercase && $number && $length;
}

/**
 * Validar nombre (solo letras y espacios)
 */
function validate_name($name) {
    return preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $name);
}

/**
 * Validar que un campo no esté vacío
 */
function validate_required($value) {
    return !empty(trim($value));
}

/**
 * Validar longitud mínima
 */
function validate_min_length($value, $min) {
    return strlen(trim($value)) >= $min;
}

/**
 * Validar longitud máxima
 */
function validate_max_length($value, $max) {
    return strlen(trim($value)) <= $max;
}

/**
 * Validar número entero
 */
function validate_integer($value) {
    return filter_var($value, FILTER_VALIDATE_INT) !== false;
}

/**
 * Validar número positivo
 */
function validate_positive($value) {
    return is_numeric($value) && $value > 0;
}

/**
 * Validar URL
 */
function validate_url($url) {
    return filter_var($url, FILTER_VALIDATE_URL) !== false;
}

/**
 * Validar que dos valores coincidan
 */
function validate_match($value1, $value2) {
    return $value1 === $value2;
}

/**
 * Validar formulario de registro
 */
function validate_registration($nombre, $correo, $password, $confirm_password) {
    $errors = [];
    
    if (!validate_required($nombre)) {
        $errors[] = "El nombre es obligatorio.";
    } elseif (!validate_name($nombre)) {
        $errors[] = "El nombre solo puede contener letras y espacios.";
    }
    
    if (!validate_required($correo)) {
        $errors[] = "El correo es obligatorio.";
    } elseif (!validate_email($correo)) {
        $errors[] = "El correo electrónico no es válido.";
    }
    
    if (!validate_required($password)) {
        $errors[] = "La contraseña es obligatoria.";
    } elseif (!validate_password($password)) {
        $errors[] = "La contraseña debe tener al menos 8 caracteres.";
    }
    
    if (!validate_match($password, $confirm_password)) {
        $errors[] = "Las contraseñas no coinciden.";
    }
    
    return $errors;
}

/**
 * Validar formulario de login
 */
function validate_login($correo, $password) {
    $errors = [];
    
    if (!validate_required($correo)) {
        $errors[] = "El correo es obligatorio.";
    } elseif (!validate_email($correo)) {
        $errors[] = "El correo electrónico no es válido.";
    }
    
    if (!validate_required($password)) {
        $errors[] = "La contraseña es obligatoria.";
    }
    
    return $errors;
}
?>