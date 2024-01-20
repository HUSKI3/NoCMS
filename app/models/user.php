<?php

class User {
    private id;
    public username;
    private name;
    private email;
    private password;
    

    public function __construct($_id, $_email, $_name, $_username, $_password) 
    {
        $this->id = $_id;
        $this->email = $_email;
        $this->name = $_name;
        $this->username = $_username;
        $this->password = $_password;
    }
}

?>