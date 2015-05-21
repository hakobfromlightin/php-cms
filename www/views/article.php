<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<h2>Article</h2>
<?php foreach ($items as $item): ?>
    <?php
    if (!empty($item["id"])) {
        $article_id = $item["id"];
    } else {
        $article_id = 0;
    }
    echo $item['name'] . '<br>';
    echo $item['text'] . '<br>';
    echo $item['date'] . '<br>';
    ?><br>
<?php endforeach; ?>
<a href="../update_news.php">Update an article</a><br>
<a href="../add_news.php">Add an article</a><br>
</body>
</html>