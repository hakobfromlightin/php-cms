<?php
    require __DIR__ . '/autoload.php';
    use Application\Classes\E404Exception;
    use Application\Classes\ErrorLog;
    use Application\Classes\View;
    use Application\Controllers;

    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $pathParts = explode('/', $path);

    $ctrl = !empty($pathParts[1]) ? 'Application\\Controllers\\' . ucfirst($pathParts[1]) : 'Application\\Controllers\\News';
    $act = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'All';

    $controllerClassName = $ctrl;

    try {
        $controller = new $controllerClassName;
        $method = 'action' . $act;
        $controller->$method();
    } catch (E404Exception $e) {
        $log = new ErrorLog();
        $log->newMessage($e);
        $view = new View();
        $view->error = $e;
        echo $view->render('error.php');
    } catch (PDOException $e) {
        $log = new ErrorLog();
        $log->newMessage($e);
        $view = new View();
        $view->error = $e;
        echo $view->render('error.php');
    } catch (Exception $e) {
        $log = new ErrorLog();
        $log->newMessage($e);
        die('Something was wrong');
    }
