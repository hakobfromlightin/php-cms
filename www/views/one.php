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
<?php echo '<h2>' . $item->name . '</h2><br>'; ?>
<?php echo $item->text . '<br>'; ?>
<?php echo $item->date . '<br>'; ?>

<a href="/../index.php?ctrl=Admin&act=Add">Add new article</a><br>
<?php echo $nws_ref = '<a href=/../index.php?ctrl=Admin&act=Edit&id=' . $item->id . '>Edit an article</a><br>'; ?>
<?php echo $nws_ref = '<a href=/../index.php?ctrl=Admin&act=Delete&id=' . $item->id . '>Delete an article</a><br>'; ?>
<a href="../index.php">Home</a><br>

<div class="footer"></div>
</body>
</html>