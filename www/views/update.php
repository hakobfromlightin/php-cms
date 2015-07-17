<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div class="header">
    <h2>Edit an article</h2>
</div>
<form action="/../Admin/Edit?id=<?php echo $_GET['id']?>" method="post">
    Article name:<input type="text" name="title" value="<?php echo $item->name; ?>"><br>
    Text:<textarea rows="10" cols="70" name="article"><?php echo $item->text; ?></textarea><br>
    <input type="submit" value="Send"><br>
</form>
<a href="../index.php">Home</a><br/>
<div class="footer"></div>
</body>
</html>