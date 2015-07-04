<?php

class NewsModel
    extends AbstractModel
{
    protected static $table = 'news';

    public $id;
    public $title;
    public $text;
    /*
    protected static $order = 'date DESC';
    protected static $class = 'NewsModel';

    public static function insert($data)
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

        return $database->queryAll($query, static::$class);
    }

    public static function update($data)
    {// обновляем новость в базе
       $name = $data['title'];
       $text = $data['article'];

       $database = new Database();

       // команда обновления таблицы
       $query = "UPDATE news SET ";
       $query .= "name = '{$name}', ";
       $query .= "text = {$text} ";
       $query .= "WHERE id = {$_GET['id']}";

       $res = $database->queryAll($query);

       return $res;
    }
    */
}