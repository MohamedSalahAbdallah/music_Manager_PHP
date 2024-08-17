<?php
require_once("models/user.model.php");
$errors = [];

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = new user();

    $user->userLogin($email, $password);
    if ($user->email) {
        # code...
        session_start();
        $_SESSION['email'] = $email;
        header("Location: /profile.php");
    } else {
        $errors["invalid"] = "email or password is incorrect";
    }
}
