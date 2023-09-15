<?php
require_once("IUser.php");

class User implements IUser
{
    protected string $username;
    protected string $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->username;
    }
}
