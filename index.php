<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

require_once 'config/database.php';
require_once 'Router.php';

$router = new Router();

// Define your routes here
$router->get('/api/health', function() {
    return ['status' => 'OK', 'message' => 'API is running'];
});

$router->get('/api/users', function() {
    // Example endpoint
    return ['users' => []];
});

$router->post('/api/users', function() {
    $data = json_decode(file_get_contents('php://input'), true);
    return ['message' => 'User created', 'data' => $data];
});

// Run the router
$router->run();
