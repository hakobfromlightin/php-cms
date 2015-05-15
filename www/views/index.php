<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>Blog</h1>
    <h2>News</h2>
    <table border="1">
        <tr>
            <td>Название</td>
        </tr>
        <?php foreach($items as $item): ?>
        <tr>
            <td><?php
            if (!empty($item["id"])) {
                $article_id = $item["id"];
            } else {
                $article_id = 0;
            }
            $nws_ref = '<a href=article.php?id=' . $article_id . '>' . $item['name'] . '</a>';
            echo $nws_ref;
            ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <a href="../add_news.php">Add an article</a>
</body>
</html>