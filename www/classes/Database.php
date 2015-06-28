<?php
    class Database{
        protected $db_server = "localhost";
        protected $db_user = "root";
        protected $db_password = "";
        protected $db_name = "test";

        public function __construct(){ //метод подлючения к базе
            $this->connection = mysqli_connect($this->db_server, $this->db_user, $this->db_password, $this->db_name);
            //проверяем успешно ли подклчение
            if(mysqli_connect_errno()){
                die("Database connection failed: "
                    . mysqli_connect_error() . " ("
                    . mysqli_connect_errno() . ")");
            }
            return $this->connection;
        }

        public function db_close(){ // метод отключения от базы
            // закрываем подключение
            if (isset($this->connection)){
                mysqli_close($this->connection);
            }
        }

        public function queryAll($query, $class='stdClass'){ //метод выполняющий запрос

            $result = mysqli_query($this->connection, $query);
            //проверяем не было ли ошибок
            if(!$result){
                die("Database query failed.");
            }
            $ret = [];

            while ($row = mysqli_fetch_object($result, $class)){
                $ret[] = $row;
            }
            return $ret;
        }

        public function queryOne($query, $class='stdClass'){ //метод выполняющий запрос

            return $this->queryAll($query, $class)[0];
        }
    }