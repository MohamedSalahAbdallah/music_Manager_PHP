<?php
require_once('models/user.model.php');

session_start();

$user = new user();
$user->searchInDataBase("email", $_SESSION["email"]);
