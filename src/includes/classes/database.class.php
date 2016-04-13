<?php

namespace forum;

class DatabaseException extends \Exception {}

class Database {
    private $connection;
    private $connected = false;

    public function connect($host, $user, $password, $database) {
        $this->connection = new \mysqli($host, $user, $password, $database);

        if ($this->connection->connect_errno) {
            throw new DatabaseException($this->connection->connect_error, $this->connection->connect_errno);
        }

        $this->connected = true;
    }

    public function disconnect() {
        if ($this->connected) {
            $this->connection->close();
            $this->connected = false;
        }
    }

    public function getError() {
        return $this->connection->error;
    }

    public function getErrNo() {
        return $this->connection->errno;
    }

    public function query($queryStr) {
        if (!$this->connected) {
            throw new DatabaseException('Not connected to database');
        }

        $result = $this->connection->query($this->secure($queryStr));

        if (!$result) {
            throw new DatabaseException($this->getError());
        }

        return $result;
    }

    private function secure($queryStr) {
        if (!$this->connected) {
            throw new DatabaseException('Not connected to database');
        }

        return $this->connection->real_escape_string($queryStr);
    }

	public function prepare($queryStr, &$params) {
		if (!$this->connected) {
			throw new DatabaseException('Not connected to database');
		}

		$stmt = $this->connection->prepare($queryStr);
		if (!$stmt) {
			throw new DatabaseException($this->getError());
		}

		foreach ($params as $type => $param) {
			$stmt->bind_param($type, $param);
		}

		return $stmt;
	}

	public function executePrepared($prepared) {
		if (!$prepared->execute()) {
            throw new DatabaseException($this->getError());
        }

		$result = $prepared->get_result();

        if (!$result) {
            throw new DatabaseException($this->getError(), $this->getErrNo());
        }

        return $result;
	}
}
