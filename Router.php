<?php

declare(strict_types=1);

final class Router
{
    private array $routes = [];

    public function get(string $path, callable $callback): void
    {
        $this->addRoute('GET', $path, $callback);
    }

    public function post(string $path, callable $callback): void
    {
        $this->addRoute('POST', $path, $callback);
    }

    public function put(string $path, callable $callback): void
    {
        $this->addRoute('PUT', $path, $callback);
    }

    public function delete(string $path, callable $callback): void
    {
        $this->addRoute('DELETE', $path, $callback);
    }

    private function addRoute(string $method, string $path, callable $callback): void
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'callback' => $callback
        ];
    }

    public function run(): void
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && $route['path'] === $requestUri) {
                $response = ($route['callback'])();
                $this->sendJsonResponse($response);
                return;
            }
        }

        $this->sendJsonResponse(['error' => 'Route not found'], 404);
    }

    private function sendJsonResponse(mixed $data, int $statusCode = 200): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
