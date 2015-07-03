<?php

class NewsController
{
    public function actionAll()
    {
        $news = NewsModel::getAll();
        $view = new View();

        $view->items = $news;
        //echo count($view);
        echo $view->render('all.php');
        echo '<html><link rel="stylesheet" href="../assets/1.css"></html>';
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $article = NewsModel::getOne($id);
        $view = new View();

        $view->item = $article;
        $view->render('one.php');
    }
}