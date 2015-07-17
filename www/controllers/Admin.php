<?php

namespace Application\Controllers;

use Application\Classes\E404Exception;
use Application\Classes\View;
use Application\Models\News as Model;


class Admin
{
    public function actionAdd()
    {
        if(!empty($_POST)){
            if(isset($_POST['title']) && $_POST['article']) {
                $article = new Model();
                $article->name = $_POST['title'];
                $article->text = $_POST['article'];
                $article->date = date("Y-m-d");
                $article->save();
                $mail=new \PHPMailer();
                $mail->isSMTP();
                $mail->Host='smtp.gmail.com';
                $mail->Username='hakob93bagghdasaryan@gmail.com';
                $mail->Password='secret';
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'ssl';
                $mail->Port = '465';
                $mail->addAddress('hakob93bagghdasaryan@gmail.com');
                $mail->Body='Created news';
                $mail->AltBody='Body created';
                $mail->send();
                $mail->clearAddresses();
                header('Location: http://geekbrains.home');
            }else{
                header("HTTP/1.1 404 Not Found");
                throw new E404Exception('Данные для редактирования записи не отправлены');
            }
        }
        $mailer = new \PHPMailer();
        $mailer->send();
        $view = new View();
        echo $view->render('add.php');
    }

    public function actionEdit()
    {
        $id = $_GET['id'];
        if (!empty($_POST)) {
            if (isset($_POST['title']) && $_POST['article']) {
                $article = new Model();
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
        $article = Model::findOneByPk($id);
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
        $article = new Model();
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