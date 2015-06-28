<?php

class NewsController
{
    public function actionAll()
    {
        $items = NewsModel::getAll();
        include __DIR__ . '/../views/All.php';
        echo '<html><link rel="stylesheet" href="views/1.css"></html>';
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = NewsModel::getOne($id);
        include __DIR__ . '/../views/One.php';
    }
}