<?php

// Include the file
require 'Token.php';

// Define a key
const KEY = 'thisisademokey';

// Generate token
$token = Token::Sign(['id' => 'Admin123'], KEY, 60 * 5);
echo $token;


// Vefity token
// $payload = Token::Verify($token, KEY);
// echo $payload;