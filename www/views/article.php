<?php $id = $_GET['id']; ?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h2>Article</h2>
    <?php
    //Perform database query
    $query  = "SELECT name, text, date ";
    $query .= "FROM news ";
    $query .= "WHERE id =" . $id;

    $result = mysqli_query($connection, $query);
    //Test if there was a query error
    if(!$result){
        die("Database query failed.");
    }

    // Use returned data (if any)
    if ($item = mysqli_fetch_assoc($result)){
        //output data from each row
        echo $item['name'];
        echo $item['text'];
        echo $item['date'];


        $result = mysqli_query($connection, $query);
        if(!$result){
            die("Database query failed. " . mysqli_error($connection));
        }
    }
    ?>

    <?php// foreach($items as $item): ?>
        <?php// echo $item['name']; ?><br>
        <?php// echo $item['text']; ?><br>
        <?php //echo $item['date']; ?><br>
    <?php //endforeach; ?>

</body>
</html>