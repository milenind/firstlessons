<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="about">
    <h1 style="text-align: center">Веб приложение о любимом исполнителе</h1>
    <img src="img/mark.jpg" style="width:100px; height:100px;margin-left: 10px">
    <p style="float: right;margin-left: 10px">Markul[5] (рус. Марку́л, полное имя Марк Вадимович Марку́л; род. 31 марта
        1993 года,
        Москва, Россия) — российский хип-хоп-исполнитель, певец, автор песен и член творческого объединения «Green
        Park Gang». За свою музыкальную карьеру выпустил 2 студийных альбома, 2 мини-альбома, 1 микстейп и множество
        синглов.</p>
</div>
<div class="disc">
    <h2>Дискография</h2>
</div>
<?php
require '../eighth/DB.php';
$db = new DB();
$queryString = 'SELECT * FROM singer';
$res = $db->execute($queryString);
$sql1 = 'select description,name,id,imgpath,age from singer ORDER BY age';
$resLightQuery = $db->lightquery($sql1);
foreach ($resLightQuery as $sing) { ?>
    <div class="alboms">
        <div>
            <?php echo 'Альбом - ' . $sing['name'] . '<br>' . $sing['age'] . '<br>' . '<img src="img/' . $sing['imgpath'] .
                '"style="width:100px;height:100px">' .
                ' <br>' . '<hr>' . $sing['description'] ?>
        </div>
    </div>
    <br>
<?php }
?>
<div class="addalboms">
    <form action="insert.php" method="post">
        <input type="text" name="name"> Введите название альбома<br>
        <input type="text" name="description"> Введите описание альбома<br>
        <input type="text" name="age"> Введите год альбома<br>
        <input type="text" name="imgpath"> Введите адрес обложки<br>
        <button name="send">Добавить альбом</button>
    </form>
</div>
</pre>
<div class="gallery">
    <h2>Фотогалерея</h2>
</div>
<?php
$queryString1 = 'SELECT * FROM image';
$res1 = $db->execute($queryString1);
$sql2 = 'select img from image ';
$resLightQuery1 = $db->lightquery($sql2);
foreach ($resLightQuery1 as $img) { ?>
    <div class="image">
        <?php echo '<img src="img/' . $img['img'] . '"style="width:200px;height:200px;border-radius:3%">' ?>
    </div>
<?php } ?>
<div class="addimg">

    <form action="insertimg.php" method="post" style="text-align: center">
        Введите адрес обложки<br>
        <input type="text" name="imgpath"><br>
        <button name="sendimg">Добавить фото</button>
    </form>
    <?php
    if (isset($_POST['sendimg'])) {
        if ($_POST['imgpath'] == ' 1 ') {
            die('Путь не введен');
        }
    }
    ?>
</div>
</body>




