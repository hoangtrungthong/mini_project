<?php
require 'validate.php';

class User
{
    public $db;
    
    public function __construct()
    {
        return $this->db = new DB;
    }

    public function getUser($value)
    {
        return $this->db->getOne('users', 'email', $value);
    }

    public function checkUniqueEmail($table, $key, $value)
    {
        $query = $this->db->selectSql($table, $key, $value);

        return mysqli_num_rows($query);
    }

    public function checkUniqueUsername($table, $key, $value)
    {
        $query = $this->db->selectSql($table, $key, $value);

        return mysqli_num_rows($query);
    }

    public function uniqueEmail($value)
    {
        return $this->checkUniqueEmail('users', 'email', $value);
    }

    public function uniqueUsername($value)
    {
        return $this->checkUniqueUsername('users', 'username', $value);
    }

    public function register($request)
    {
        if (isset($request)) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $RePassword = md5($_POST['Re_password']);
            $data = [
                'username' => $username,
                'email' => $email,
                'password' => $password,
            ];
            $error = validateRegister($username, $email, $_POST['password'], $_POST['Re_password']);
            if (empty($error)) {
                if ($password === $RePassword) {
                    $existUsername = $this->uniqueUsername($username);
                    $existEmail = $this->uniqueEmail($email);
                    if ($existUsername > 0) {
                        $message['used'] = "Username is already taken!";
                    } else if ($existEmail > 0) {
                        $message['used'] = "Email address is already taken!";
                    } else {
                        $result = $this->db->insert("users", $data);
                        if(isset($result)) {
                            $user = $this->getUser($email);
                            $_SESSION['username'] = $username;
                            setcookie('auth', 'user=' . $user['username'] . '&pw=' . $user['password'], time() + 3600 * 24 * 30, '/', '', 0);
                            echo "<script>alert('Register success!')</script>";
                            echo '<script>window.location.href="index.php?page=home"</script>';
                        }
                    }
                } else {
                    $message['fail'] = "Confirm password is incorrect!";
                }

                return $message;
            }

            return $error;
        }
    }

    public function login($request)
    {
        if (isset($request)) {
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $msg = [];
            $user = $this->getUser($email);

            $error = validateLogin($email, $_POST['password']);
            $remember = isset($_POST['remember']) ? $password : '';

            if (empty($error)) {
                if ($user['password'] === $password && $user['email'] === $email) {
                    $_SESSION['username'] = $user['username'];
                    if ($remember === $password) {
                        setcookie('auth', 'user=' . $user['username'] . '&pw=' . $user['password'], time() + 3600 * 24 * 30, '/', '', 0);
                    }
                    header("location: index.php?page=home");
                } else {
                    $msg['error'] = "Incorrect email or password";
                }

                return $msg;
            }

            return $error;
        }
    }

    public function logout()
    {
        if (isset($_SESSION['username']) || isset($_COOKIE['auth'])) {
            unset($_SESSION['username']);
            setcookie('auth', '', time() - (3600 * 24 * 30), '/', '', 0);
            header("location: index.php?page=users&action=login");
        }
    }
}
