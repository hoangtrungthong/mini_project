<?php
session_start();
error_reporting(0);

$pages = [
    'home'=> ['index', 'error'],
    'articles' => ['index', 'create', 'edit', 'delete'],
    'users' => ['register', 'login', 'logout'],
];

if (!array_key_exists($page, $pages) || !in_array($action, $pages[$page])) {
    $page = 'home';
    $action = 'error';
}
require 'controllers/'. ucwords($page).'Controller.php';
$class = ucwords($page) . 'Controller';
$page = new $class;
$page->$action();
