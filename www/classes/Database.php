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
        $dsn = 'mysql:dbname=' . self::$db_name . ';host=' . self::$host;
        $this->dbh = new PDO($dsn, self::$db_user, self::$db_password);
    }

    protected function affectedRow()
    {
        return $this->dbh->lastInsertId();
    }

    public function query($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $this->affectedRow();
    }
}