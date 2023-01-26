<?php

final class DatabaseConnection{
    public ?\PDO $connection = null;

    const HOST = 'localhost';
    const DATABASE_NAME = 'snowaddict';
    const USERNAME = 'root';
    const PASSWORD = '';
    const OPTIONS = [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
    ];

    public function getConnection(): \PDO {
        if (null === $this->connection) {
            try {
                $this->connection = new \PDO('mysql:host='.self::HOST.';dbname='.self::DATABASE_NAME.';charset=utf8', self::USERNAME, self::PASSWORD, self::OPTIONS);
            } 
            catch(\PDOException $exception) {
                throw new \PDOException($exception->getMessage(), (int)$exception->getCode());
            }
        }

        return $this->connection;
    }
}