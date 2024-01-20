<?php

class UserController {
    public function __construct() 
    {
        require_once("app/models/user.php");
        $this->conn = sql_connect("db.sql");
        require_once("app/repositories/users.php");
        $this->repo = new Users();
    }

    public function login($email)
    {
        // Check if user exists
        $existing = $repo->getByEmail($email);
        $num_existing = count($existing);

        if ($num_existing > 0) {
            $_user = $existing[0];
            return new User(
                $_user[0],
                $_user[1],
                $_user[2],
                $_user[3],
                $_user[4]
            );
        } else {
            echo redirect("/login"); // TODO: Why is this here?
            return new User(-1, null, null, null, null);
        }
    }

    public function register($email, $name, $username, $password) {
        // Check if user exists
        $existing = $repo->getByEmailUsername($email, $username);
        $num_existing = count($existing);

        // If user exists, redirect to the same page, raise alert?
        if ($num_existing > 0) {
            return new User(-1, null, null, null, null);
        } else {
            // Build new user in db
            $id = $repo->createUser($username, $name, $email, $password);
            return new User($id, $email, $name, $username, $password);
        }
    }

    public function getByID($id) {
        $user = $repo->getByID($id);
        return new User(
            $user[0],
            $user[1],
            $user[2],
            $user[3],
            $user[4]
        );
    }
}

?>