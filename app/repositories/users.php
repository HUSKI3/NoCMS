<?php
namespace UsersRepo;
require_once("app/repositories/repo.php");

class Users extends Repository {
    function getAll()
    {
            $sql = "SELECT * FROM user";
            $users = sql_query($this->conn, $sql);

            return $users;
    }

    function getByID($id) {
            $sql = "SELECT * FROM user WHERE id=?";
            $users = sql_query_sane($this->conn, $sql, [$id]);

            return $users[0];
    }

    function getByEmail($email) {
        $sql = "SELECT * FROM user WHERE email=?";
        return sql_query_sane($this->conn, $sql, [$email]);
    }
    
    function getByEmailUsername($email, $username) {
        $sql = "SELECT * FROM user WHERE username=? OR email=?";
        return sql_query_sane($this->conn, $sql, [$username, $email]);
    }
    
    function createUser($username, $name, $email, $password) {
        $sql = "INSERT INTO user (username, name, email, password) VALUES (?, ?, ?, ?)";
        return sql_commit_sane($this->conn, $sql, [$username, $name, $email, $password]);
    }
}

?>