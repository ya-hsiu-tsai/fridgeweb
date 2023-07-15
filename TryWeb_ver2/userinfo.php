<?php require 'header.php'; ?>
<?php
session_start();
echo '管理者：', $_SESSION['users']['name'], '<br>';
echo 'email：', $_SESSION['users']['mail'], '<br>';
echo '聯絡電話：', $_SESSION['users']['tel'], '<br>';
echo '所屬機構：', $_SESSION['users']['company'], '<br>';
?>
<a href="userhome.php"> 回首頁 </a><br>
<a href="logout.php"> 登出 </a><br>
<a href="userdelete.php" onclick="return confirm('是否確認要刪除帳號？（帳號連同所屬冰箱將永遠刪除）')"> 刪除帳號 </a><br>
<?php require 'footer.php'; ?>