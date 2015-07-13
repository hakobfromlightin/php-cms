<?php

class NewsModel
    extends AbstractModel
{
    protected static $table = 'news';

    /*


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