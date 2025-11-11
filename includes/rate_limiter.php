<?php
/**
 * Control básico de intentos por IP utilizando archivos temporales.
 */

function rate_limit_allow(string $scope, int $maxAttempts, int $decaySeconds): array
{
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $key = hash('sha256', $scope . '|' . $ip);
    $filePath = rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'ods4_rl_' . $key;
    $now = time();

    $record = [
        'attempts' => 0,
        'reset' => $now + $decaySeconds,
    ];

    if (is_file($filePath)) {
        $contents = file_get_contents($filePath);
        if ($contents !== false) {
            $decoded = json_decode($contents, true);
            if (is_array($decoded) && isset($decoded['attempts'], $decoded['reset'])) {
                $record = $decoded;
            }
        }
    }

    if ($now > $record['reset']) {
        $record = [
            'attempts' => 0,
            'reset' => $now + $decaySeconds,
        ];
    }

    if ($record['attempts'] >= $maxAttempts) {
        $retryAfter = max(0, $record['reset'] - $now);
        return [false, $retryAfter];
    }

    $record['attempts']++;
    file_put_contents($filePath, json_encode($record, JSON_THROW_ON_ERROR), LOCK_EX);

    $retryAfter = max(0, $record['reset'] - $now);
    return [true, $retryAfter];
}

function rate_limit_reset(string $scope): void
{
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $key = hash('sha256', $scope . '|' . $ip);
    $filePath = rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'ods4_rl_' . $key;

    if (is_file($filePath)) {
        @unlink($filePath);
    }
}

