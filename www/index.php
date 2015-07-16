<?php
    require __DIR__ . '/autoload.php';

    $ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
    $act = isset($_GET['act']) ? $_GET['act'] : 'All';

    try{
        $controllerClassName = $ctrl . 'Controller';
        $controller = new $controllerClassName;
        $method = 'action' . $act;
        $controller->$method();
    } catch (E404Exception $e){
        $log = new ErrorLog();
        $log->newMessage($e);
        $view = new View();
        $view->error = $e;
        echo $view->render('error.php');
    } catch (PDOException $e){
        $log = new ErrorLog();
        $log->newMessage($e);
        $view = new View();
        $view->error = $e;
        echo $view->render('error.php');
    } catch (Exception $e){
        $log = new ErrorLog();
        $log->newMessage($e);
        die('Something was wrong');
    }
