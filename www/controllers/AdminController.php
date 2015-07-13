<?php

class AdminController
{
    public function actionAdd()
    {
        if(!empty($_POST)){
            if(isset($_POST['title']) && $_POST['article']) {
                $article = new NewsModel();
                $article->name = $_POST['title'];
                $article->text = $_POST['article'];
                $article->date = date("Y-m-d");
                $article->insert();
                header('Location: http://geekbrains.home');
            }else{
                return false;
            }
        }
        $view = new View();
        echo $view->render('add.php');
    }
}