<?php

namespace forum\database;

require_once('config.php');

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
            throw new \Exception($this->connection->connect_error);
        }

        $this->connected = true;
    }

    public function disconnect() {
        if ($this->connected) {
            $this->connection->close();
        }
    }

    public function query($query) {
        if (!$this->connected) {
            return false;
        }
        return $this->connection->query($this->secure($query));
    }

    private function secure($query) {
        if (!$this->connected) {
            return false;
        }
        return $this->connection->real_escape_string($query);
    }
}
