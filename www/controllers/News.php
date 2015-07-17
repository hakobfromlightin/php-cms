<?php
namespace Application\Controllers;

use Application\Models\News as Model;
use Application\Classes\View;
use Application\Classes\E404Exception;

class News
{
    public function actionAll()
    {
        $news = Model::findAll();
        $view = new View();

        $view->items = $news;
        echo $view->render('all.php');
        echo '<html><link rel="stylesheet" href="../assets/1.css"></html>';
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $article = Model::findOneByPk($id);
        if(empty($article)){
            header("HTTP/1.1 404 Not Found");
            http_response_code(404);
            throw new E404Exception('Запись не сущетсвует');
        }
        $view = new View();
        $view->item = $article;
        echo $view->render('one.php');
    }
}