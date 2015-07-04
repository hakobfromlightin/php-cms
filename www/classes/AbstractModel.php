<?php

abstract class AbstractModel
{
    protected static $table;

    public static function findAll()
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table;
        $db = new Database();
        $db->setClassName($class);
        return $db->query($sql);
    }

    public static function findOneByPk($id)
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $db = new Database();
        $db->setClassName($class);
        return $db->query($sql, [':id' => $id]);
    }
}