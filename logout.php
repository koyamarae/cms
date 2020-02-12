<?php
// セッションを開始
session_start();
// セッションを破棄
$_SESSION = array();
session_destroy();
echo '<script type="text/javascript">alert("ログアウトしました");</script>';
header("Location: login.php");
exit();
?>
