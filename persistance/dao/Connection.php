<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 18.24.11
 * Time: 14:51
 */

class Connection {
    private $connection;
    private $host = 'localhost';
    private $user = 'forum';
    private $pass = 'forum';
    private $db = 'forum';

    public function __construct() {
        $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->db);
    }

    public function query($sql) {
        return $this->connection->query($sql);
    }

    public function error(){
        return $this->connection->error;
    }
}