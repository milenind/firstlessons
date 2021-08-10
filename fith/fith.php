<?php
session_start();
setcookie('username','dima');
?>
<form method="post" action="users.php">
<input type="text" name="login"/>
<button type="submit" name="send">Войти</button>
</form>
<?php
