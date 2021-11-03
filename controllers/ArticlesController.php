<?php
require 'BaseController.php';
require 'models/articles.php';

class ArticlesController extends BaseController
{
    public $articles;
    
    public function __construct()
    {
        $this->folder = 'articles';
        $this->articles = new Article;
    }

    public function index()
    {
        $data = ['articles' => $this->articles->getArticleOfUser()];
        return $this->view('index', $data);
    }

    public function create()
    {
        $data = [
            'articles' => $this->articles->create($_POST['create']),
            'user' => $this->articles->existUser()
        ];
       
        return $this->view('create', $data);
    }

    public function edit()
    {
        $data = [
            'articles' => $this->articles->edit($_POST['edit']),
            'article' => $this->articles->getArticle($_GET['items']),
        ];
        return $this->view('edit', $data);
    }

    public function delete()
    {
        $this->articles->del();
        header("location: index.php?page=articles");
    }
}
