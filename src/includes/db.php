<?php

namespace forum;

require_once('config.php');

class DatabaseException extends \Exception {}

class Database {
    private $connection;
    private $connected = false;

    public function connect() {
        global $config;

        $this->connection = new \mysqli(
            $config['mysql']['host'],
            $config['mysql']['user'],
            $config['mysql']['pass'],
            $config['mysql']['db']
        );

        if ($this->connection->connect_errno) {
            throw new DatabaseException($this->connection->connect_error);
        }

        $this->connected = true;
    }

    public function disconnect() {
        if ($this->connected) {
            $this->connection->close();
        }
    }

    public function query($queryStr) {
        if (!$this->connected) {
            throw new DatabaseException('Not connected to database');
        }
        return $this->connection->query($this->secure($queryStr));
    }

    private function secure($queryStr) {
        if (!$this->connected) {
            throw new DatabaseException('Not connected to database');
        }
        return $this->connection->real_escape_string($query);
    }
}
