<?php
    require __DIR__ . '/models/class_article.php';

    $News = new News();

    $items = $News->news_getAll();

    include __DIR__ . '/views/index.php';

    echo '<html><link rel="stylesheet" href="views/1.css"></html>';