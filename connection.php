<?php

    class SqlConnection {
        private $connection;
        private $host;
        private $username;
        private $password;
        private $database;

        public function __construct($host, $username, $password, $database) {
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }

        public function open() {
            $this->connection = sqlsrv_connect($this->host, 
                ['UID' => $this->username, 'PWD' => $this->password, 'DATABASE' => $this->database]);
            return (bool) $this->connection;
        }

        public function executeQuery($query) {
            $result = sqlsrv_query($this->connection, $query);
            return new SqlResultSet($result);
        }

        public function executeCommand($command) {
            //var_dump($this->connection);
            sqlsrv_execute(sqlsrv_prepare($this->connection, $command));
        }

        public function close() {
            sqlsrv_close($this->connection);
        }
    }

    class SqlResultSet {
        private $result;
        
        public function __construct($result) {
            $this->result = $result;
        }

        public function getNextRow() {
            $row = sqlsrv_fetch_array($this->result, SQLSRV_FETCH_ASSOC);
            return $row;
        }
    }