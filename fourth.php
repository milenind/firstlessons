
<?php
$_FILES:if (isset($_FILES['new_f'])) {
    if(0==$_FILES['new_f']['ERROR']){
        $res = move_uploaded_file($_FILES['new_f']['tmp_name'],'/upload.php');
    }
}

<hr>
<form method="post" action="upload.php" enctype="multipart/form-data">
    Загрузите гостевую книгу!<br><br>
    <input type="file" name="new_f"/>
</form>