<?php
require 'DB.php';
$db = new DB();
$queryString = 'SELECT * FROM articles';
$res = $db->execute($queryString);
$sql1 = 'select text,name,id from articles';
$resLightQuery = $db->lightquery($sql1);
echo '<pre>';
foreach ($resLightQuery as $item) { ?>
    <div style="white-space: normal">
        <article style="background:grey;color:whitesmoke">
            <?php echo $item['id'] . ' статья - ' . $item['name'] . '<br>' . '<hr>' . $item['text'] . '<br>'; ?>
        </article>
        <br>
    </div>
<?php } ?>



