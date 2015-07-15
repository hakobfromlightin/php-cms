<?php

class Database
{
    protected static $host = "localhost";
    protected static $db_user = "root";
    protected static $db_password = "";
    protected static $db_name = "test";
    private $dbh;
    private $className = 'stdClass';

    public function setClassName($className)
    {
        $this->className = $className;
    }

    public function __construct()
    { //метод подлючения к базе
        try {
            $dsn = 'mysql:dbname=' . self::$db_name . ';host=' . self::$host;
            $this->dbh = new PDO($dsn, self::$db_user, self::$db_password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Проблема с базой данных';
            $log = Log::newMessage($e);
            die;
        }
    }

    public function lastInsertId()
    {
        try {
            return $this->dbh->lastInsertId();
        } catch (PDOException $e) {
            echo 'Проблема с базой данных';
            $log = Log::newMessage($e);
            die;
        }
    }

    public function query($sql, $params = [])
    {
        try {
            $sth = $this->dbh->prepare($sql);
            $sth->execute($params);
            return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
        } catch (PDOException $e) {
            echo 'Проблема с базой данных';
            $log = Log::newMessage($e);
            die;
        }
    }

    public function execute($sql, $params = [])
    {
        try {
            $sth = $this->dbh->prepare($sql);
            $sth->execute($params);
            return $this->lastInsertId();
        } catch (PDOException $e) {
            echo 'Проблема с базой данных';
            $log = Log::newMessage($e);
            die;
        }
    }
}