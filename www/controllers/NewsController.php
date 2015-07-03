<?php

class NewsController
{
    public function actionAll()
    {
        $db = new Database();
        $res = $db->query(
            'SELECT * FROM news WHERE id=:id',
            [':id' => 1]
        );
        var_dump($res);die;
        /*
        $news = NewsModel::getAll();
        $view = new View();

        $view->items = $news;
        //echo count($view);
        echo $view->render('all.php');
        echo '<html><link rel="stylesheet" href="../assets/1.css"></html>';
        */
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