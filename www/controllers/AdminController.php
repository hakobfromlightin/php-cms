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
                header("HTTP/1.1 404 Not Found");
                throw new E404Exception('Данные для редактирования записи не отправлены');
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
                if(empty($article)){
                    throw new E404Exception('Попытка отредактировать несуществующую запись');
                }
                $article->name = $_POST['title'];
                $article->text = $_POST['article'];
                $article->date = date("Y-m-d");
                $article->id = $id;
                $article->save();
                header('Location: http://geekbrains.home');
            } else {
                header("HTTP/1.1 404 Not Found");
                throw new E404Exception('Данные для редактирования записи не отправлены');
            }
        }
        $article = NewsModel::findOneByPk($id);
        if(empty($article)){
            header("HTTP/1.1 404 Not Found");
            throw new E404Exception('Запись для редактирования не найдена');
        }
        $view = new View();
        $view->item = $article;
        echo $view->render('update.php');
    }

    public function actionDelete()
    {
        $article = new NewsModel();
        $article->id = $_GET['id'];
        if(empty($article)){
            header("HTTP/1.1 404 Not Found");
            throw new E404Exception('Попытка удалить несуществующую запись');
        }
        $article->delete();
        header('Location: http://geekbrains.home');
    }

    public function actionLog()
    {
        $view = new View();
        echo $view->render('log.php');
    }
}