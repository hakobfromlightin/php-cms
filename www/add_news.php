<?php
    require_once __DIR__ . '/models/class_article.php';

    $News = new News();

    if(!empty($_POST)){
        $data=[];
        if(!empty($_POST['title'])){
            $data['title'] = $_POST['title'];
        }
        if(!empty($_POST['article'])) {
            $data['article'] = $_POST['article'];
        }
        if(isset($data['title']) && $data['article']){
            $News->news_insert($data);
            header('Location: http://geekbrains.home//');
        }else{
            return false;
        }
    }

    include __DIR__ . '/views/add_news_form.php';