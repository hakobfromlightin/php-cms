<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div class="header">
    <h1>Blog</h1>
</div>
<div class="content">
    <h2>News</h2>
    <table border="1">
        <tr>
            <td>Название</td>
        </tr>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?php
                    $article_id = $item->id;
                    $nws_ref = '<a href=index.php?ctrl=News&act=One&id=' . $article_id . '>' . $item->name . '</a>';
                    echo $nws_ref;
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="/../index.php?ctrl=Admin&act=Add">Add an article</a>
</div>
<div class="footer"></div>
</body>
</html>