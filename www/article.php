<?php
    $id = $_GET['id'];
    require __DIR__ . '/models/news.php';

    $items = News_get($id);

    include __DIR__ . '/views/article.php';