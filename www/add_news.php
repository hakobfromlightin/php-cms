<?php
    require_once __DIR__ . '/models/news.php';

    if(!empty($_POST)){
        $data=[];
        if(!empty($_POST['title'])){
            $data['title'] = $_POST['title'];
        }
        if(!empty($_POST['article'])) {
            $data['article'] = $_POST['article'];
        }
        if(isset($data['title']) && $data['article']){
            News_insert($data);
            header('Location: /');
        }else{
            echo "Название или текст пустые";
        }
    }

    include __DIR__ . '/views/add_news_form.php';