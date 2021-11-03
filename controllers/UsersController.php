<?php
require 'BaseController.php';
require 'models/users.php';

class UsersController extends BaseController
{
    public $users;
    
    public function __construct()
    {
        $this->folder = 'users';
        $this->users = new User;
    }

    public function register()
    {
        $data = ['users' => $this->users->register($_POST['register'])];
        return $this->view('register', $data);
    }

    public function login()
    {
        $data = ['users' => $this->users->login($_POST['login'])];
        return $this->view('login',$data);
    }

    public function logout()
    {
        $this->users->logout();
    }
}
