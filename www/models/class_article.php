<?php

    require_once __DIR__ . "/class_db.php";

    abstract class Article {
    }

    class News extends Article{

        public function news_getAll()
        { // метод выводит все новости отсортированные по дате

            $database = new Database();

            //выполняем запрос к базе
            $query = "SELECT * ";
            $query .= "FROM news ";
            $query .= "ORDER BY date DESC";

            return $database->sql_query($query); //подключение к базе и выполнение запроса
        }

        public function news_get($page_id)
        { //выводит выбранную пользователем новость

            $database = new Database();

            //выполняем запрос к базе
            $query = "SELECT name, text, date ";
            $query .= "FROM news ";
            $query .= "WHERE id =" . $page_id;

            return $database->sql_query($query); //выполнение запроса
        }

        public function news_insert($data)
        { // добавляет новость в базу данных
            $name = $data['title'];
            $text = $data['article'];
            $date = date("Y-m-d");

            $database = new Database();

            // команда вставки в таблицу
            $query = "INSERT INTO news (";
            $query .= "name, text, date";
            $query .= ")VALUES (";
            $query .= " '$name', '$text', '$date'";
            $query .= ")";

            $res = $database->sql_query($query);

            return $res;
        }

    }