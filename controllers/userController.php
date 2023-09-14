<?php
require_once("../lib/codigoazul/user/User.php");

$user = new User("tomas", "goku123");
echo $user->getUsername();
