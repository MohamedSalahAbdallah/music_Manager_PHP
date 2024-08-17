<?php


require_once('models/user.model.php');

$errors = [];


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if (!isset($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }
    if (!isset($password) || strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters long";
    }
    if (!isset($username) || strlen(trim($username) < 1)) {
        $errors['username'] = "Username is required";
    }
    if (!isset($name) || strlen(trim($name) < 1)) {
        $errors['name'] = "Name is required";
    }
    if ($password != $confirmPassword) {
        $errors['password'] = "Passwords do not match";
    }
    if (empty($errors)) {
        $user = new user();
        $user->registerUser($name, $username, $email, $password, $confirmPassword);
        session_start();
        $_SESSION['email'] = $user->email;
        header('Location: profile.php');
    }
}
