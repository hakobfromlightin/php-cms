<?php

class AdminController
{
    public function actionAdd()
    {
        if(!empty($_POST)){
            $data=[];
            if(!empty($_POST['title'])){
                $data['title'] = $_POST['title'];
            }
            if(!empty($_POST['article'])) {
                $data['article'] = $_POST['article'];
            }
            if(isset($data['title']) && $data['article']){
                NewsModel::insert($data);
                header('Location: http://geekbrains.home');
            }else{
                return false;
            }
        }
        $view = new View();
        $view->render('add.php');
    }
}