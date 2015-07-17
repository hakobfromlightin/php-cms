<?php

namespace Application\Classes;

abstract class AbstractModel
{
    protected static $table;
    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function __isset($k)
    {
        return isset($this->data[$k]);
    }

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
        return $db->query($sql, [':id' => $id])[0];
    }

    public static function findByColumn($column, $value)
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . ' = :' . $column;
        $db = new Database();
        $db->setClassName($class);
        return $db->query($sql, [":$column" => $value])[0];
    }

    protected function insert()
    {
        $cols = array_keys($this->data); // названия столбцов
        $data = [];

        foreach ($cols as $col) {
            $data[':' . $col] = $this->data[$col];
        }

        $sql = 'INSERT INTO ' . static::$table . '(' . implode(', ', $cols) . ') VALUES (' . implode(', ', array_keys($data)) . ')';
        $db = new Database();

        $db->execute($sql, $data);
        return $this->id = $db->lastInsertId();
    }

    protected function update()
    {
        $cols = array_keys($this->data); // названия столбцов
        $data = [];
        $dataV = [];

        foreach ($cols as $col) {
            $data[':' . $col] = $this->data[$col];
            if('id'== $col){
                continue;
            }
            $dataV[$col] = $col . '=:' . $col;
        }

        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $dataV) . ' WHERE id=:id';
        $db = new Database();
        return $db->execute($sql, $data);
    }

    public function save()
    {
        if (isset($this->id)) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
        $db = new Database();
        return $db->execute($sql, $this->data);
    }
}