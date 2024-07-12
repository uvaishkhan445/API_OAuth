<?php
require_once 'vendor/autoload.php';
$config = require_once 'config.php';

use Firebase\JWT\JWT;

$secret_key = $config['jwt_secret'];
$payload = [
    "iss" => "https://example.com",
    "iat" => time(),
    "exp" => time(), // 1 hour
    "email" => "example@example.com"
];

$jwt = JWT::encode($payload, $secret_key, "HS256");
echo "JWT: " . $jwt;