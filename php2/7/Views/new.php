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
<a href="/news/">
    К списку новостей
</a>
<hr>
<?php

/** @var \App\Models\News $new */
$new = $this->new;
?>
<h1>
    Автор новости - <?= $new->author->name ?>
</h1>
<h2>
    Название новости - <?= $new->title ?>
</h2>
<article>
    <h2>Содержание</h2> <?= $new->content ?>
</article>

</body>
</html>