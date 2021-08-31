<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<a href="/news/">К списку новостей</a><br>
<a href="/article/">К списку статей</a><br>
<a href="/admin/getTable">Просмотр таблицы</a>
<br>
<hr>
<?php foreach ($this->news as $article) { ?>
    id записи: <?= $article->id ?>

    <h1>
        Имя автора - <?= $article->author->name ?>
    </h1>

    <a href="/article/viewArticle/?id=<?= $article->id ?>">
        <h2>
            Название статьи - <?= $article->title ?>
        </h2>
    </a>
    <article>
        <h2>Содержание</h2> <?= $article->content ?>
    </article>
    <hr>
<?php } ?>
<br>
<div style="text-align: center">
    <form action="/admin/saveArticle/" method="POST">
        <label>
            Id автора
            <input type="text" name="authorId">
        </label>
        <br>
        <label>
            Имя
            <input type="text" name="title">
        </label>
        <br>
        <label>
            Контент
            <input type="text" name="content">
        </label>
        <br>
        <button type="submit">Добавить запись</button>
    </form>
</div>
<hr>
<div style="text-align: center">
    <form action="/admin/delete" method="POST">
        <br>
        <label>
            Id
            <input type="text" name="id">
        </label>
        <br>
        <button type="submit">Удалить запись</button>
    </form>
</div>
</body>
</html>
