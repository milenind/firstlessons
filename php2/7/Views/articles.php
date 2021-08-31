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
<a href="/admin/">
    Админ-панель
</a>
<br>
<a href="/news/">
    К списку новостей
</a>
<hr>
<h1 style="text-align: center">Статьи</h1>
<hr>
<?php
/** @var \App\Models\Article $articles - статьи */
$articles = $this->articles;
foreach ($articles

         as $article) { ?>
    <div>
        <h1>
            Автор статьи - <?= $article->author->name ?>
        </h1>
        <a href="/Article/viewArticle/?id=<?= $article->id ?>">
            <h2>
                Название статьи - <?= $article->title ?>
            </h2>
        </a>
        <article>
            <h2>Содержание </h2> <?= $article->content ?>
        </article>
        <hr>
    </div>
<?php } ?>
</body>
</html>