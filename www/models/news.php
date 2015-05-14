<?php
    function News_getAll(){ // выводит все новости отсортированные по дате

        $connection = mysqli_connect('localhost', 'root', '', 'test'); //подклчение к базе
        // проверяем успешность подключения
        if(mysqli_connect_errno()){
            die("Database connection failed: "
                . mysqli_connect_error() . " ("
                . mysqli_connect_errno() . ")");
        }

        //выполняем запрос к базе
        $query  = "SELECT * ";
        $query .= "FROM news ";
        $query .= "ORDER BY date DESC";


        $result = mysqli_query($connection, $query);
        //проверяем не было ли ошибок
        if(!$result){
            die("Database query failed.");
        }
        $ret = [];

        while ($row = mysqli_fetch_assoc($result)){
            $ret[] = $row;
        }

        return $ret;
    }

    function News_get($page_id){ // выводит выбранную пользователем новость
        $connection = mysqli_connect('localhost', 'root', '', 'test');//подклчение к базе
        // проверяем успешность подключения
        if(mysqli_connect_errno()){
            die("Database connection failed: "
                . mysqli_connect_error() . " ("
                . mysqli_connect_errno() . ")");
        }

        //выполняем запрос к базе
        $query  = "SELECT name, text, date ";
        $query .= "FROM news ";
        $query .= "WHERE id =" . $page_id;


        $result = mysqli_query($connection, $query);
        //проверяем не было ли ошибок
        if(!$result){
            die("Database query failed.");
        }
        $ret = [];

        while ($row = mysqli_fetch_assoc($result)){
            $ret[] = $row;
        }

        return $ret;
    }