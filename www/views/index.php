<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>Blog</h1>
    <h2>News</h2>
    <?php foreach($items as $item): ?>
        <?php
        if (!empty($item["id"])) {
            $article_id = $item["id"];
        } else {
            $article_id = 0;
        }
        $nws_ref = '<a href=article.php?id=' . $article_id . '>' . $item['name'] . '</a>';
        echo $nws_ref;

        ?><br>
    <?php endforeach; ?>
</body>
</html>