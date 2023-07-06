<?php require 'header.php'; ?>
<?php
session_start();
echo '管理者：', $_SESSION['user']['name'], '<br>';
echo 'email：', $_SESSION['user']['mail'], '<br>';
echo '聯絡電話：', $_SESSION['user']['tel'], '<br>';
echo '所屬機構：', $_SESSION['user']['company'], '<br>';
?>
<a href="userhome.php"> 回首頁 </a><br>
修改資料<br>
<a href="logout.php"> 登出 </a><br>
刪除帳號<br>
<?php require 'footer.php'; ?>