<?php
require 'DB.php';

$db = new DB();
$queryString = 'SELECT * FROM articles';
$res = $db->execute($queryString);
$sql = 'select * from articles where id = :id or name = :name or author=:author or text=:text';
$data = [':id' => $_GET['id'], ':name' => $_GET['name'], ':author' => $_GET['author'], ':text' => $_GET['text']];
$resQuery = $db->query($sql, $data);
echo '<pre>';
foreach ($resQuery as $item) { ?>
    <div style="white-space: normal">
        <article style="background:grey;color:whitesmoke">
           <?php echo 'Название статьи : ' . $item['name'] . '<br>' . '<br>' . $item['text'] . '<br>' ;?>
        </article>
        <br>
    </div>
<?php } ?>
