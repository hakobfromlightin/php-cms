<?php

class NewsController
{
    public function actionAll()
    {
        $items = NewsModel::getAll();
        View::display('all.php');
        echo '<html><link rel="stylesheet" href="views/1.css"></html>';
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = NewsModel::getOne($id);
        View::display('one.php');
    }
}