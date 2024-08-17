<?php
require_once("models/user.model.php");

$user = new user();

$user->registerUser("mo", "mo2000", "m@maaaaaaaaaaaaaaaaaaaaaaaaaaa.com", "123456789");


var_dump($user->searchInDataBase($user->id));
