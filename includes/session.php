<?php
/**
 * Aplica cabeceras de seguridad comunes a toda la aplicación.
 */
function apply_security_headers(): void
{
    if (headers_sent()) {
        return;
    }

    header("X-Frame-Options: DENY");
    header("X-Content-Type-Options: nosniff");
    header("Referrer-Policy: same-origin");
    header("Permissions-Policy: geolocation=(), microphone=(), camera=()");
    $cspDirectives = [
        "default-src 'self'",
        "img-src 'self' data: https://i.ytimg.com https://*.ytimg.com",
        "style-src 'self' 'unsafe-inline'",
        "script-src 'self' https://www.youtube.com https://www.youtube-nocookie.com https://s.ytimg.com",
        "connect-src 'self' https://www.youtube.com https://www.youtube-nocookie.com https://i.ytimg.com https://*.ytimg.com https://*.googlevideo.com",
        "media-src 'self' https://*.googlevideo.com",
        "frame-src 'self' https://www.youtube.com https://www.youtube-nocookie.com",
        "child-src 'self' https://www.youtube.com https://www.youtube-nocookie.com",
        "font-src 'self' https://fonts.gstatic.com",
        "frame-ancestors 'none'",
        "base-uri 'self'",
        "form-action 'self'",
    ];

    header('Content-Security-Policy: ' . implode('; ', $cspDirectives));

    $isSecure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');

    if ($isSecure) {
        header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload");
    }
}

/**
 * Inicia una sesión configurada con parámetros seguros.
 * Evita repetir configuración en cada archivo que use session_start().
 */
function start_secure_session(): void
{
    if (session_status() === PHP_SESSION_ACTIVE) {
        return;
    }

    apply_security_headers();

    $secureCookie = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');

    ini_set('session.use_strict_mode', '1');
    ini_set('session.use_only_cookies', '1');
    ini_set('session.cookie_httponly', '1');
    if ($secureCookie) {
        ini_set('session.cookie_secure', '1');
    }

    session_name('ODS4SESSID');

    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'domain' => '',
        'secure' => $secureCookie,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);

    session_start();
}

