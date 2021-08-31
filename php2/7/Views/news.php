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
<a href="/article/">
    К списку статей
</a>
<hr>
<h1 style="text-align: center">Новости</h1>
<hr>
<?php

$news = $this->news;

foreach ($news as $new) { ?>
    <h1>
        Автор новости - <?= $new->author->name ?>
    </h1>
    <a href="/News/viewNew/?id=<?= $new->id ?>">
        <h2>Название - <?= $new->title ?></h2>
    </a>
    <article>
        <h2>Содержание</h2><?= $new->content ?>
    </article>
    <hr>
<?php } ?>
</body>
</html>