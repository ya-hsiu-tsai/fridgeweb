<?php require 'header.php'; ?>
<?php
session_start();
echo '使用者回報系統<br>';
echo '管理者：', $_SESSION['user']['name'], '<br>';
echo '回報內容（未解決）：<br>';
echo '//啪啪一堆<br>';
echo '已解決問題<br>'
?>
<?php require 'footer.php'; ?>