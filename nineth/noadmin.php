<head>
    <link rel="stylesheet" Вызвать соответствующий экшн по имени.type="text/css" href="Style/style.css">
</head>
<body class="maindiv">
<div>

    <div class="about">
        <h1 style="text-align: center">Веб приложение о любимом исполнителе</h1>
        <img src="img/mark.jpg" style="width:100px; height:100px;padding-left: 10px">
        <p style="float: right;padding-left: 10px">Markul[5] (рус. Марку́л, полное имя Марк Вадимович Марку́л; род. 31 марта 1993 года,
            Москва, Россия) — российский хип-хоп-исполнитель, певец, автор песен и член творческого объединения «Green
            Park Gang». За свою музыкальную карьеру выпустил 2 студийных альбома, 2 мини-альбома, 1 микстейп и множество
            синглов.</p>
    </div>

    <div class="disc">
        <h2>Дискография</h2>
    </div>
    <?php
    require 'Models/DB.php';
    $db = new DB();
    $queryString = 'SELECT * FROM singer';
    $res = $db->execute($queryString);
    $sql1 = 'select description,name,id,imgpath,age from singer order by age ';
    $resLightQuery = $db->lightquery($sql1);
    foreach ($resLightQuery as $sing) { ?>
        <div class="alboms">
            <div>
                <?php echo 'Альбом - ' . $sing['name'] . '<br>' . $sing['age'] . '<br>' . '<img src="img/' . $sing['imgpath'] .
                    '"style="width:100px;height:100px;border-radius:3%;">' .
                    ' <br>' . '<hr>' . $sing['description'] ?>
            </div>
        </div>
    <?php }
    ?>
    <div class="gallery">
        <h2>Фотогалерея</h2>
    </div>

    <?php
    $queryString1 = 'SELECT * FROM image';
    $res1 = $db->execute($queryString1);
    $sql2 = 'select img from image ';
    $resLightQuery1 = $db->lightquery($sql2);
    foreach ($resLightQuery1

             as $img) { ?>
        <div class="image">
            <?php echo '<img src="img/' . $img['img'] . '"style="width:200px;height:200px">' ?>
        </div>
    <?php } ?>
</div>
<form style="text-align: center" action="nineth.php">
    <button>Перейти на админ версию</button>
</form>
</body>