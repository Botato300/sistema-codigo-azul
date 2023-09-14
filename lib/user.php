<?php
interface IUser
{
    public function getUsername();
    public function getPassword();
}

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
        $this->username;
    }

    public function getPassword()
    {
        $this->username;
    }
}

$user = new User("tomas", "goku123");
var_dump($user->getUsername());
