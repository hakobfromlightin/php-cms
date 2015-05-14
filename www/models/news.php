<?php
    function News_getAll(){

        $connection = mysqli_connect('localhost', 'root', '', 'test');
        //Test if connection succeeded
        if(mysqli_connect_errno()){
            die("Database connection failed: "
                . mysqli_connect_error() . " ("
                . mysqli_connect_errno() . ")");
        }

        //Perform database query
        $query  = "SELECT * ";
        $query .= "FROM news ";
        $query .= "ORDER BY date DESC";


        $result = mysqli_query($connection, $query);
        //Test if there was a query error
        if(!$result){
            die("Database query failed.");
        }
        $ret = [];

        while ($row = mysqli_fetch_assoc($result)){
            $ret[] = $row;
        }

        return $ret;
    }