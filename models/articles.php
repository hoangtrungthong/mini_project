<?php
require 'validate.php';

class Article
{
    public $db;
    public function __construct()
    {
        $this->db = new DB;
    }

    public function show()
    {
        return $this->db->get('articles');
    }

    public function existUser()
    {
        if (isset($_SESSION['username'])) {
            $user = $this->db->getOne('users', 'username', $_SESSION['username']);
        } else if (isset($_COOKIE['auth'])) {
            parse_str($_COOKIE['auth'], $get_user);
            $user = $this->db->getOne('users', 'username', $get_user['user']);
        }

        return $user;
    }

    public function getArticleOfUser() {
        $user = $this->existUser();

        return $this->db->getArticlesForUser($user['id']); 
    }

    public function getArticle($id)
    {
       return $this->db->getOne('articles', 'article_id', $id);
    }

    public function create($request)
    {
        parse_str($_COOKIE['auth'], $get_user);
        $user = $this->existUser();
        if (isset($request) && (isset($_SESSION['username']) || isset($get_user['pw']))) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $error = validateArticles($title, $content);

            if(empty($error)) {
                $data = [
                    'user_id' => $user['id'],
                    'title' => $title,
                    'content' => $content,
                ];
                $this->db->insert('articles', $data);
                header("location: index.php?page=articles");
            }

            return $error;
        }
    }

    public function edit($request)
    {
        if(isset($request)) {
            $title = $_POST['title'];
            $content = $_POST['content'];
           
            $error = validateArticles($title, $content);

            if(empty($error)) {
                $data = [
                    'title' => $title,
                    'content' => $content
                ];
                $this->db->update('articles', $data, 'article_id', $_GET['items']);
                header("location: index.php?page=articles");
            }
            
            return $error;
        }
    }

    public function del()
    {
        return $this->db->delete('articles', 'article_id', $_GET['items']);
    }
}
