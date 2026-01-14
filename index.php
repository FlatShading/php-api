<?php

declare(strict_types=1);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

require_once 'config/database.php';
require_once 'Router.php';

$router = new Router();

$router->get('/api/health', fn(): array => [
    'status' => 'OK',
    'message' => 'API is running',
    'timestamp' => time(),
]);

$router->get('/api/users', fn(): array => [
    'users' => [],
]);

$router->post('/api/users', function(): array {
    $data = json_decode(
        json: file_get_contents('php://input'),
        associative: true,
        flags: JSON_THROW_ON_ERROR
    ) ?? [];

    return [
        'message' => 'User created',
        'data' => $data,
    ];
});

$router->run();
