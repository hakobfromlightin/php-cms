<?php

    function db_connection(){
        define("DB_SERVER", "localhost");
        define("DB_USER", "root");
        define("DB_PASS", "");
        define("DB_NAME", "test");

        //подключаемся к базе данных

        $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        //проверяем успешно ли подклчение
        if(mysqli_connect_errno()){
            die("Database connection failed: "
                . mysqli_connect_error() . " ("
                . mysqli_connect_errno() . ")");
        }

        return $connection;
    }

   function db_close(){
       // закрываем подключение
       if (isset($connection)){
           mysqli_close($connection);
       }
   }

   function sql_query($query){
       $con = db_connection();

       $result = mysqli_query($con, $query);
       //проверяем не было ли ошибок
       if(!$result){
           die("Database query failed.");
       }
       $ret = [];

       while ($row = mysqli_fetch_assoc($result)){
           $ret[] = $row;
       }

       return $ret;
   }