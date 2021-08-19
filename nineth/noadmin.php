<div style="background: darkturquoise">

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
    $sql1 = 'select description,name,id,imgpath,age from singer order by age ';
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
                    '"style="width:100px;height:100px;border-radius:3%;">' .
                    ' <br>' . '<hr>' . $sing['description'] ?>
            </div>
        </div>
    <?php }
    ?>
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
    foreach ($resLightQuery1

             as $img) { ?>
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
            <?php echo '<img src="img/' . $img['img'] . '"style="width:200px;height:200px">' ?>
        </div>
    <?php } ?>


</div>
<form style="text-align: center" action="nineth.php">
    <button>Перейти на админ версию</button>
</form>