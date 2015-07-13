<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div class="header">
    <h1>Article</h1>
</div>
<?php '<h2>' . $item->name . '</h2><br>'; ?>
<?php echo $item->text . '<br>'; ?>
<?php echo $item->date . '<br>'; ?>
<!-- <a href="../controllers/update_news.php">Update an article</a><br> -->
<a href="../controllers/add_news.php">Add an article</a><br>
<a href="../index.php">Home</a><br>

<div class="footer"></div>
</body>
</html>