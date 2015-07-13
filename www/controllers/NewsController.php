<?php

class NewsController
{
    public function actionAll()
    {
        $news = NewsModel::findAll();
        $view = new View();

        $view->items = $news;
        echo $view->render('all.php');
        echo '<html><link rel="stylesheet" href="../assets/1.css"></html>';
    }

    public function actionOne()
    {
        $article = NewsModel::$table;
        var_dump($article);
        /*
        $id = $_GET['id'];
        $article = NewsModel::findOneByPk($id);
        $view = new View();

        $view->item = $article;
        echo $view->render('one.php');*/
    }
}