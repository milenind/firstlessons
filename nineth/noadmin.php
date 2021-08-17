<?php
echo 'noadmin' . '<br>';
?>
<h1>Веб приложение о любимом исполнителе</h1>
<?php
require '../eighth/DB.php';
$db = new DB();
$queryString = 'SELECT * FROM singer';
$res = $db->execute($queryString);
$sql1 = 'select description,name,id from singer order by age ';
$resLightQuery = $db->lightquery($sql1);
echo '<pre>';
foreach ($resLightQuery as $sing) { ?>
    <div style="white-space: normal">
        <article style="background:slateblue;color:whitesmoke">
            <?php echo 'Альбом - ' . $sing['name'] . '<br>' . '<br>' . '<img src="img/10.jpg" width="100px" height="100px">' . ' <br>' . '<br>' . '<hr>' . $sing['description'] . '<br>'; ?>
        </article>
        <br>
    </div>
<?php }

?>



