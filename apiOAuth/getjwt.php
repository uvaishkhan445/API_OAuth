<?php
require_once 'vendor/autoload.php';
$config = require_once 'config.php';

use Firebase\JWT\JWT;

/**
 * This function generates a JSON Web Token (JWT) using the provided payload and secret key.
 *
 * @param array $payload The data to be encoded into the JWT.
 * @param string $secret_key The secret key used to sign the JWT.
 * @param string $algorithm The algorithm used to sign the JWT.
 *
 * @return string The generated JWT.
 */
function generateJWT(array $payload, string $secret_key, string $algorithm): string
{
    $jwt = JWT::encode($payload, $secret_key, $algorithm);
    return $jwt;
}

$secret_key = $config['jwt_secret'];
$payload = [
    "iss" => "https://example.com",
    "iat" => time(),
    "exp" => time(), // 1 hour
    "email" => "example@example.com"
];

$jwt = generateJWT($payload, $secret_key, "HS256");
echo "JWT: " . $jwt;