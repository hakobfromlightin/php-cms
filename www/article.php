<?php
    $id = $_GET['id'];
    require __DIR__ . '/models/class_article.php';

    $News = new News();

    $items = $News->news_get($id);

    include __DIR__ . '/views/article.php';