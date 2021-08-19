<head>
    <style>body {
            background = '1 . jpg';
        }</style>
</head>
<body>
<div style="width: 100%; /* Ширина слоя */
            white-space: normal;
            background: slateblue;
            float: right;
            color:whitesmoke">
    <h1 style="text-align: center">Веб приложение о любимом исполнителе</h1>
    <img src="img/mark.jpg" style="width:100px; height:100px;">
    <p style="float: right">Markul[5] (рус. Марку́л, полное имя Марк Вадимович Марку́л; род. 31 марта 1993 года,
        Москва, Россия) — российский хип-хоп-исполнитель, певец, автор песен и член творческого объединения «Green
        Park Gang». За свою музыкальную карьеру выпустил 2 студийных альбома, 2 мини-альбома, 1 микстейп и множество
        синглов.</p>
</div>

<div style="width: 100%; /* Ширина слоя */
            white-space: normal;
            background: slateblue;
            float: right;
            color:whitesmoke;
            text-align: center;
            margin-top: 10px">
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
    <style>
        .layer1 {
            background-color: slateblue; /* Цвет фона слоя */
            padding: 1px; /* Поля вокруг текста */
            float: left; /* Обтекание по правому краю */
            width: 210px; /* Ширина слоя */
            white-space: normal;
            display: inline-block;
            margin: 10px;
            height: 450px;
            color: whitesmoke;
            border-radius: 3%;

        }
    </style>

    <div class="layer1">
        <div>
            <?php echo 'Альбом - ' . $sing['name'] . '<br>' . $sing['age'] . '<br>' . '<img src="img/' . $sing['imgpath'] .
                '"style="width:100px;height:100px">' .
                ' <br>' . '<hr>' . $sing['description'] ?>
        </div>
    </div>
    <br>

<?php }
?>

<div style="width: 100%; /* Ширина слоя */
            padding-top: 10px;
            white-space: normal;
            background: slateblue;
            float: right;
            color:whitesmoke;
            text-align: center;
            margin-top: 10px;">
    <form action="insert.php" method="post" style="text-align: center">
        <input type="text" name="name"> Введите название альбома<br>
        <input type="text" name="description"> Введите описание альбома<br>
        <input type="text" name="age"> Введите год альбома<br>
        <input type="text" name="imgpath"> Введите адрес обложки<br>
        <button name="send">Добавить альбом</button>
    </form>
</div>


</pre>
<div style="width: 100%; /* Ширина слоя */
            white-space: normal;
            background: slateblue;
            float: right;
            color:whitesmoke;
            text-align: center;
            margin-top: 10px">
    <h2>Фотогалерея</h2>
</div>

<?php
$queryString1 = 'SELECT * FROM image';
$res1 = $db->execute($queryString1);
$sql2 = 'select img from image ';
$resLightQuery1 = $db->lightquery($sql2);
foreach ($resLightQuery1 as $img) { ?>
    <style>
        .layer2 {
            background-color: slateblue; /* Цвет фона слоя */
            padding: 1px; /* Поля вокруг текста */
            float: left; /* Обтекание по правому краю */
            width: 200px; /* Ширина слоя */
            white-space: normal;
            display: inline-flex;
            margin: 10px;
            height: 200px;
            color: whitesmoke;
            border-radius: 3%;
            text-align: center;
        }
    </style>

    <div class="layer2">
        <?php echo '<img src="img/' . $img['img'] . '"style="width:200px;height:200px;border-radius:3%">' ?>
    </div>


<?php } ?>
<div style="width: 100%; /* Ширина слоя */
            padding-top: 10px;
            white-space: normal;
            background: slateblue;
            float: right;
            color:whitesmoke;
            text-align: center;
            margin-top: 10px;">

    <form action="insertimg.php" method="post" style="text-align: center">
        Введите адрес обложки<br>
        <input type="text" name="imgpath"><br>
        <button name="sendimg">Добавить фото</button>
    </form>
    <?php
    if (isset($_POST['sendimg'])) {
        if($_POST['imgpath'] == ' 1 '){
            die('Путь не введен');
        }
    }
    ?>
</div>
</body>




