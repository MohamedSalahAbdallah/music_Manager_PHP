<?php
require_once("models/user.model.php");

$user = new user("mo", "mo2000", "m@m.com", "123456789");


$user->userLogin("m@m.com", "123456789");
