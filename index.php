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

const DATETIME_FORMAT = 'Y-m-d H:i:s';

$router = new Router();

$router->get('/api/health', fn(): array => [
    'status' => 'OK',
    'message' => 'API is running',
    'timestamp' => (new DateTimeImmutable())->format(DATETIME_FORMAT),
]);

$router->run();
