<?php

    require_once __DIR__ . '/../functions/sql.php';

    function News_getAll(){ // выводит все новости отсортированные по дате

        //выполняем запрос к базе
        $query  = "SELECT * ";
        $query .= "FROM news ";
        $query .= "ORDER BY date DESC";

        return sql_query($query); //подключение к базе и выполнение запроса
    }

    function News_get($page_id){ // выводит выбранную пользователем новость

        //выполняем запрос к базе
        $query  = "SELECT name, text, date ";
        $query .= "FROM news ";
        $query .= "WHERE id =" . $page_id;

        return sql_query($query); //выполнение запроса
    }

    function News_insert(){ // добавляет новость в базу данных

        if(empty($_POST['name']) || empty($_POST['text'])){ //проверяем введены ли данные
            echo "Название или текст пустые";
            exit;
        } else {
            $name = $_POST['name'];
            $text = $_POST['text'];
            $date = date("Y.d.m");

            // команда вставки в таблицу
            $query = "INSERT INTO news (";
            $query .= "name, text, date";
            $query .= ")VALUES (";
            $query .= " '{$name}', '{$text}', '{$date}'";
            $query .= ")";

            $res = sql_query($query);
            if($res){
                return true;
            }
        }
    }