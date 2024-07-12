<?php
require_once 'vendor/autoload.php';
$config = require_once 'config.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secret_key = $config['jwt_secret'];
$headers = apache_request_headers();
if (isset($headers['Authorization']) && $headers['Authorization'] != "") {
    $token = explode(' ', $headers['Authorization'])[1];
    try {
        $decoded = JWT::decode($token, new Key($secret_key, 'HS256'));
        print_r($decoded);
        // print_r($decoded->email);
    } catch (Exception $e) {
        http_response_code(401);
        echo 'Token is invalid';
    }
} else {
    http_response_code(401);
    echo 'Authorization header is missing';
}