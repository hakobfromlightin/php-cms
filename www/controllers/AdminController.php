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
                $article->save();
                header('Location: http://geekbrains.home');
            }else{
                return false;
            }
        }
        $view = new View();
        echo $view->render('add.php');
    }

    public function actionEdit()
    {
        $id = $_GET['id'];
        if (!empty($_POST)) {
            if (isset($_POST['title']) && $_POST['article']) {
                $article = new NewsModel();
                $article->name = $_POST['title'];
                $article->text = $_POST['article'];
                $article->date = date("Y-m-d");
                $article->id = $id;
                $article->save();
                header('Location: http://geekbrains.home');
            } else {
                return false;
            }
        }
        $article = NewsModel::findOneByPk($id);
        $view = new View();
        $view->item = $article;
        echo $view->render('update.php');
    }

    public function actionDelete()
    {
        $article = new NewsModel();
        $article->delete();
        header('Location: http://geekbrains.home');
    }
}