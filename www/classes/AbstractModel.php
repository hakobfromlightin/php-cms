<?php

abstract class AbstractModel
    implements IModel
{

    protected static $table;
    protected static $order;
    protected static $class;

    public static function getAll()
    { // метод выводит все новости отсортированные по дате

        $database = new Database();

        //выполняем запрос к базе
        $query = "SELECT * ";
        $query .= "FROM " . static::$table;
        $query .= " ORDER BY " . static::$order;
        return $database->queryAll($query, static::$class); //подключение к базе и выполнение запроса
    }

    public static function getOne($id)
    { //выводит выбранную пользователем новость

        $database = new Database();

        //выполняем запрос к базе
        $query = "SELECT name, text, date ";
        $query .= "FROM " . static::$table;
        $query .= " WHERE id =" . $id;

        return $database->queryOne($query, static::$class); //выполнение запроса
    }

}