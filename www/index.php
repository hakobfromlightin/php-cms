<?php
    require __DIR__ . '/autoload.php';

    $ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
    $act = isset($_GET['act']) ? $_GET['act'] : 'All';

    try{
        $controllerClassName = $ctrl . 'Controller';
        $controller = new $controllerClassName;
        $method = 'action' . $act;
        $controller->$method();
    } catch (E404Ecxeption $e){
        $view = new View();
        $view->error = $e;
        echo $view->render('error.php');
    }
