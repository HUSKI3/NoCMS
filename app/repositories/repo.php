<?php
class Repository {
    protected $conn;

    public function __construct() {
        $this->conn = sql_connect("db.sql");
    }
}
?>