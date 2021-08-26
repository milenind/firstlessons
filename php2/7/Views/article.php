<?php
/**
 * @var \App\View $this
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<a href="/article/">
    К списку статей
</a>
<hr>
<?php

/** @var \App\Models\Article $articles - статьи */
$article = $this->article;
?>
<h1>
    Автор статьи - <?= $article->author->name ?>
</h1>
<h2>
    <?= $article['title'] ?>
</h2>
<article>
    <?= $article['content'] ?>
</article>
</body>
</html>