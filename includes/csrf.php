<?php
/**
 * Funciones auxiliares para manejar tokens CSRF.
 */

/**
 * Genera (o reutiliza) un token CSRF asociado a la sesión actual.
 */
function generate_csrf_token(): string
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        throw new RuntimeException('La sesión debe estar iniciada antes de generar el token CSRF.');
    }

    $shouldRefresh = empty($_SESSION['csrf_token'])
        || empty($_SESSION['csrf_token_expiration'])
        || $_SESSION['csrf_token_expiration'] < time();

    if ($shouldRefresh) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        $_SESSION['csrf_token_expiration'] = time() + 1800; // 30 minutos
    }

    return $_SESSION['csrf_token'];
}

/**
 * Valida el token CSRF proveniente de un formulario.
 */
function validate_csrf_token(?string $token): bool
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        return false;
    }

    if (
        empty($_SESSION['csrf_token']) ||
        empty($_SESSION['csrf_token_expiration']) ||
        $_SESSION['csrf_token_expiration'] < time()
    ) {
        return false;
    }

    if (!is_string($token) || !hash_equals($_SESSION['csrf_token'], $token)) {
        return false;
    }

    // Rotar el token tras uso exitoso para evitar reutilización.
    unset($_SESSION['csrf_token'], $_SESSION['csrf_token_expiration']);

    return true;
}

