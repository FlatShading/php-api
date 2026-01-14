<?php

declare(strict_types=1);

final class Database
{
    private string $host = 'localhost';
    private string $port = '5432';
    private string $dbName = 'your_database';
    private string $username = 'postgres';
    private string $password = '';
    private ?PDO $conn = null;

    public function getConnection(): ?PDO
    {
        if ($this->conn !== null) {
            return $this->conn;
        }

        try {
            $dsn = sprintf(
                "pgsql:host=%s;port=%s;dbname=%s",
                $this->host,
                $this->port,
                $this->dbName
            );

            $this->conn = new PDO(
                $dsn,
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
        } catch (PDOException $e) {
            throw new RuntimeException(
                "Database connection failed: " . $e->getMessage(),
                (int) $e->getCode(),
                $e
            );
        }

        return $this->conn;
    }
}
