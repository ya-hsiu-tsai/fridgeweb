<?php require 'header.php'; ?>
<?php
session_start();
echo '管理者：', $_SESSION['user']['name'], '<br>';
echo 'email：', $_SESSION['user']['mail'], '<br>';
?>
修改資料<br>
<a href="logout.php"> 登出 </a><br>
刪除帳號<br>
<?php require 'footer.php'; ?>