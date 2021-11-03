<?php
function validateRegister($username, $email, $password, $rePassword)
{
    $errors = [];

    if (empty($username)) {
        $errors['name'] = "Please enter username!";
    } else if (!preg_match("/^[A-Za-z][A-Za-z0-9]{5,31}$/", $username)) {
        $errors['name'] = 'Username can only letters, numbers and be between 5 and 31 characters in length.';
    }

    if (empty($email)) {
        $errors['email'] = "Please enter email address!";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email address format!";
    }

    if (empty($password)) {
        $errors['password'] = "Please enter password!";
    } else if (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters";
    }

    if (empty($rePassword)) {
        $errors['rePassword'] = "Please enter confirm password!";
    }

    return $errors;
}

function validateLogin($email, $password)
{
    $errors = [];

    if (empty($email)) {
        $errors['email'] = "Please enter email address!";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email address format!";
    }

    if (empty($password)) {
        $errors['password'] = "Please enter password!";
    }

    return $errors;
}

function validateArticles($title, $content)
{
    $errors = [];

    if (empty($title)) {
        $errors['title'] = "Please enter title!";
    } else if (strlen($title) < 5 || strlen($title) > 100) {
        $errors['title'] = 'Title must be between 5 and 100 characters in length';
    }

    if (empty($content)) {
        $errors['content'] = "Please enter content!";
    } else if (strlen($content) < 20) {
        $errors['content'] = 'Content must be at least 20 characters';
    }

    return $errors;
}
